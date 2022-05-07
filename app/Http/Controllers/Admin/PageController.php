<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Option;
use Illuminate\Support\Facades\Validator;
use File;
use Image;
use Illuminate\Support\Str;

class PageController extends Controller
{
    private function add_edit_and_listing($req) {
        $page1 = Page::query();
        $page2 = Page::query();
        $name = 'page';
        $totalRecords = $page1/* ->where('post_status', '!=', 'trashed') */->count();
        if ($req->input('search')) {
            $page2->where('pages.title', 'like', "%{$req->input('search')}%");
        }
        // var_dump(c_user() ); die;
        if (c_user()->is_super_admin != 1) {
            $page2->where('pages.user_id', '=', c_user()->id);
        }
        /* if ($req->input('status') == '') {
            $page2->where(['post_status' => 'published'])->orWhere(['post_status' => 'drafted']);
        }
        else if ($req->input('status') == 'published') {
            $page2->where(['post_status' => 'published']);
        }
        else if ($req->input('status') == 'drafts') {
            $page2->where(['post_status' => 'drafted']);
        }   
        else if ($req->input('status') == 'trash') {
            $page2->where(['post_status' => 'trashed']);
        } */
        return view('Admin.Page.index', ['name' => $name, 'totalRecords' => $totalRecords, 'data' => $page2->select(['pages.id', 'pages.title', 'pages.featured_image', 'pages.created_at', 'pages.updated_at', 'pages.is_front_page'])->orderBy('pages.id', 'DESC')->paginate(10)]);
    }

    private function set_fields_value($fieldGroup) {
        $bannerImage = array_value($fieldGroup, 'banner_image');
        $image = array_value($fieldGroup, 'image');
        $video = array_value($fieldGroup, 'video');
        
        $image1 = array_value($fieldGroup, 'image_1');
        $image2 = array_value($fieldGroup, 'image_2');
        $logo = array_value($fieldGroup, 'logo');
        
        if (!empty($bannerImage) && $bannerImage != 'undefined' && !is_string($bannerImage) ) {
            $fieldGroup['banner_image'] = image_upload($bannerImage);
        }
        if (!empty($image) && $image != 'undefined' && !is_string($image)  ) {
            $fieldGroup['image'] = image_upload($image);
        }
        
        if (!empty($image1) && $image1 != 'undefined'  && !is_string($image1) ) {
            
            $fieldGroup['image_1'] = image_upload($image1);
        }
        if (!empty($image2) && $image2 != 'undefined' && !is_string($image2)) {
            $fieldGroup['image_2'] = image_upload($image2);
        }
        if (!empty($logo) && $logo != 'undefined' && !is_string($logo)) {
            $fieldGroup['logo'] = image_upload($logo);
        }
        if (!empty($video) && $video != 'undefined' && !is_string($video) ) {
            $fieldGroup['video'] = video_upload($video);
        }
        return $fieldGroup;
    }

    public function index(Request $req) {
        return $this->add_edit_and_listing($req);
    }
    public function add(Request $req) {
        $data = $req->all();
        $response = ['status' => [], 'errors' => []];
        $validated = Validator::make($data, [
            'title' => 'required',
            // 'slug' => 'required|unique:pages',
            // 'featured_image' => 'required||file|max:1000|mimes:'.get_image_extensions('string'),
        ]);
        
        $data['user_id'] = c_user()->id;
        $data['post_status'] = 'drafted';
        if ($data['_status'] == 'Publish') {
            $data['post_status'] = 'published';
        }
        if ($validated->fails()) {
            $response['errors'] = $validated->getMessageBag()->toArray();
            $response['status'] = 'fail';
            return $response;
        }
        $data['featured_image'] = '';
        if(empty($data['content']))
        $data['content'] = empty($data['content']) ? '' : $data['content'];
        $image = $req->file('featured_image');
        if ($image) {

            # code...
            $input['imagename'] = 'img-'.uniqid().time().'.'.$image->extension();
            $path = public_path('/assets/images');
            if(!File::exists($path)){
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $img = Image::make($image->path());
            $img->save($path.'/'.$input['imagename'], 50);
            $data['featured_image'] = $input['imagename'];
        }

        if (array_value($data, 'is_front_page') == '1') {
            Page::where(['is_front_page' => '1'])->update(['is_front_page' => 0]);
        }
        
        if (empty(@$data['slug'])) {
            $data['slug'] = Str::slug(@$data['title']);
        }
        if(Page::create($data)) {
            $response['status'] = 'success';
            $response['message'] = 'You have added successfully';
        }
        return $response;
    }
    public function edit($id, Request $req) {
        if (c_user()->is_super_admin != 1) {
            if (Page::where(['id' => $id, 'user_id' => c_user()->id])->count() == 0) {
                $response['errors'] = 'Permission Denied';
                $response['status'] = 'permissiondenied';
                return response()->json($response ,403);
            }
        }
        $page = Page::findOrfail($id);
        if ($req->isMethod('post')) {
            $data = $req->all();
            if(is_array($data['cf'])) {
                // print_r($data['cf']); die;
                
                $cf = [];
                // print_r($data['cf']); 
                // echo('ttttttt');
                foreach ($data['cf'] as $key => $sec) {
                    $cf[$key] = $sec;
                    foreach ($sec as $key2 => $content) {
                        // $cf[$key][$key2] = $content;
                        if (is_array($content)) {
                            if (empty(array_value($content, 0))) {
                                $cf[$key][$key2] = $this->set_fields_value($content);
                            }
                            else{
                                foreach ($content as $key3 => $row) {
                                    $cf[$key][$key2][$key3] = $this->set_fields_value($row);
                                }
                            }
                        }
                    }
                }
                
            }
            if (empty(@$data['slug'])) {
                $data['slug'] = Str::slug(@$data['title']);
            }
            $data['slug'] = empty(@$data['slug']) ? Str::slug(@$data['title']) : @$data['slug'];
            $data['content'] = !empty(@$data['content']) ? @$data['content'] : '';
            
            $data['custom_fields'] = json_encode($cf);
            // $data['content'] = view('Admin.Page.Fields.home-fields');

            $response = ['status' => [], 'errors' => []];
            $vArgs = [
                'title' => 'required',
                // 'slug' => 'required|unique:pages',
                // 'content' => 'required',
                // 'featured_image' => 'required|file|max:1000|mimes:'.get_image_extensions('string'),
            ];
            // if ($data['_featured_image']  == $page->featured_image)
            //     $vArgs['featured_image'] = 'file|max:1000|mimes:'.get_image_extensions('string');
            
            if ($data['slug'] == $page->slug)
                unset($vArgs['slug']);

            $validated = Validator::make($data, $vArgs);
            $data['post_status'] = 'drafted';
            if ($data['_status'] == 'Publish' || $data['_status'] == 'Update') {
                $data['post_status'] = 'published';
            }
            if ($validated->fails()) {
                $response['errors'] = $validated->getMessageBag()->toArray();
                $response['status'] = 'fail';
                return $response;
            }
            
            $data['featured_image'] = !empty(@$data['_featured_image']) ? @$data['_featured_image'] : '';
            if ($req->file('featured_image')) {
                File::delete('public/assets/images/'.$data['_featured_image']);
                $image = $req->file('featured_image');
                $input['imagename'] = 'img-'.uniqid().time().'.'.$image->extension();
                $path = public_path('/assets/images');
                if(!File::exists($path)){
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $img = Image::make($image->path());
                $img->save($path.'/'.$input['imagename'], 50);
                $data['featured_image'] = $input['imagename'];
            }
            if (array_value($data, 'is_front_page') == '1') {
                Page::where(['is_front_page' => '1'])->update(['is_front_page' => 0]);
            }
           
            // print_r($data); die;
            if($page->update($data)) {
                $response['status'] = 'success';
                $response['message'] = 'You have updated successfully';
            }
            return $response;
        }
        else {
            if ($req->ajax()) {
                $fieldFiles = [
                    '1' => 'Admin.Page.Fields.home-fields',
                
                ];

                $customFields = $page->custom_fields;
                unset($page->custom_fields);
                // print_r(array_value($fieldFiles, $id)); die;
                $page->cfHTML = array_value($fieldFiles, $id) ? \View::make(array_value($fieldFiles, $id), ['cfFields' => object_to_array(json_decode($customFields)) ])->render() : '';
                $response = ['status' => 'success', 'item' => $page];
                return $response;
            }
            else {
                return $this->add_edit_and_listing($req);
            }
        }

    }


    public function header_footer(Request $req) {
        if (c_user()->is_super_admin != 1) {
            if (Page::where(['id' => $id, 'user_id' => c_user()->id])->count() == 0) {
                $response['errors'] = 'Permission Denied';
                $response['status'] = 'permissiondenied';
                return response()->json($response ,403);
            }
        }
        
        $headerFooter = object_to_array(json_decode(get_option('header_footer')));
        // echo '<pre>';
        // print_r($headerFooter); die;
        if ($req->isMethod('post')) {
            $data = $req->all();
            if(is_array($data['cf'])) {
                // print_r($data['cf']); die;
                
                $cf = [];
                // print_r($data['cf']); 
                // echo('ttttttt');
                foreach ($data['cf'] as $key => $sec) {
                    $cf[$key] = $sec;
                    foreach ($sec as $key2 => $content) {
                        // $cf[$key][$key2] = $content;
                        if (is_array($content)) {
                            if (empty(array_value($content, 0))) {
                                $cf[$key][$key2] = $this->set_fields_value($content);
                            }
                            else{
                                foreach ($content as $key3 => $row) {
                                    $cf[$key][$key2][$key3] = $this->set_fields_value($row);
                                }
                            }
                        }
                    }
                }
                
            }
            
            
            if(update_option('header_footer', json_encode($cf))) {
                $response['status'] = 'success';
                $response['message'] = 'You have updated successfully';
            }
            return $response;
        }
        else {
            if ($req->ajax()) {
                $fieldFiles = [
                    '1' => 'Admin.Page.Fields.home-fields',
                
                ];

                $customFields = $page->custom_fields;
                unset($page->custom_fields);
                // print_r($page->content); die;
                $page->cfHTML = \View::make(array_value($fieldFiles, $id), ['cfFields' => object_to_array(json_decode($customFields)) ])->render();
                $response = ['status' => 'success', 'item' => $page];
                return $response;
            }
            else {
                $name = 'header & footer';
                return view('Admin.Page.header-footer', ['name' => $name, 'headerFooter' => $headerFooter, ]);
            }
        }

    }

    /* 
    public function delete($id = null, Request $req) {
        if (c_user()->is_super_admin != 1) {
            if ($id) {
                if (Page::where(['id' => $id, 'user_id' => c_user()->id])->count() == 0) {
                    return back()->with('errormsg', 'Permission Denied');
                }
            }
            else {
                if (Page::whereIn('id', $req->input('action_ids'))->where(['user_id' => c_user()->id])->count() == 0) {
                    return back()->with('errormsg', 'Permission Denied');
                }
            }
        }
        if ($id) {
            if (Page::where(['id' => $id])->where('post_status', '!=', 'trashed')->count() > 0) {
               Page::where(['id' => $id])->where('post_status', '!=', 'trashed')->update(['post_status' => 'trashed']);
            }

            else if (Page::where(['id' => $id, 'post_status' => 'trashed'])->count() > 0) {
                $fImg = Page::select('featured_image')->where(['id' => $id])->first()->toArray()['featured_image'];
                File::delete('public/assets/images/'.$fImg);
                Page::where(['id' => $id, 'post_status' => 'trashed'])->delete();
            }
            return back()->with('msg', 'Delete successfully');
        }
        else {
            if ($req->input('rec_action') == 'trash') {
                if (Page::whereIn('id', $req->input('action_ids'))->where('post_status', '!=', 'trashed')->count() > 0) {
                    Page::whereIn('id', $req->input('action_ids'))->where('post_status', '!=', 'trashed')->update(['post_status' => 'trashed']);
                }
            }
            if ($req->input('rec_action') == 'delete') {
                if (Page::whereIn('id', $req->input('action_ids'))->where(['post_status' => 'trashed'])->count() > 0) {
                    $fImgs = Page::select('featured_image')->whereIn('id', $req->input('action_ids'))->get()->toArray();
                    foreach ($fImgs as $key => $fImg) {
                        File::delete('public/assets/images/'.$fImg['featured_image']);
                    }
                    
                    Page::whereIn('id', $req->input('action_ids'))->where(['post_status' => 'trashed'])->delete();
                }
            }
            return back()->with('msg', 'Delete successfully');
        }
    }

    public function restore($id = null, Request $req) {
        if (c_user()->is_super_admin != 1) {
            if ($id) {
                if (Page::where(['id' => $id, 'user_id' => c_user()->id])->count() == 0) {
                    return back()->with('errormsg', 'Permission Denied');
                }
            }
            else {
                if (Page::whereIn('id', $req->input('action_ids'))->where(['user_id' => c_user()->id])->count() == 0) {
                    return back()->with('errormsg', 'Permission Denied');
                }
            }
        }

        if ($id) {
            if (Page::where(['id' => $id, 'post_status' => 'trashed'])->count() > 0) {
                Page::where(['id' => $id, 'post_status' => 'trashed'])->update(['post_status' => 'published']);
                return back()->with('msg', 'Restored successfully');
            }
        }
        else {
            if ($req->input('rec_action') == 'restore') {
                if (Page::whereIn('id', $req->input('action_ids'))->where('post_status', 'trashed')->count() > 0) {

                    Page::whereIn('id', $req->input('action_ids'))->where('post_status', 'trashed')->update(['post_status' => 'published']);
                    return back()->with('msg', 'Restored successfully');
                }
            }
        }
    }
     */

    
}
