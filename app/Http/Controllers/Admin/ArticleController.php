<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Validator;
use File;
use Image;

class ArticleController extends Controller
{
    private function add_edit_and_listing($req) {
        $article1 = Article::query();
        $article2 = Article::query();
        $name = 'article';
        $totalRecords = $article1/* ->where('post_status', '!=', 'trashed') */->count();
        if ($req->input('search')) {
            $article2->where('articles.title', 'like', "%{$req->input('search')}%");
        }
        // var_dump(c_user() ); die;
        if (c_user()->is_super_admin != 1) {
            $article2->where('articles.user_id', '=', c_user()->id);
        }
        /* if ($req->input('status') == '') {
            $article2->where(['post_status' => 'published'])->orWhere(['post_status' => 'drafted']);
        }
        else if ($req->input('status') == 'published') {
            $article2->where(['post_status' => 'published']);
        }
        else if ($req->input('status') == 'drafts') {
            $article2->where(['post_status' => 'drafted']);
        }   
        else if ($req->input('status') == 'trash') {
            $article2->where(['post_status' => 'trashed']);
        } */
        return view('Admin.Article.index', ['name' => $name, 'totalRecords' => $totalRecords, 'data' => $article2->select(['articles.id', 'articles.title', 'articles.featured_image', 'articles.created_at', 'articles.updated_at',])->orderBy('articles.id', 'DESC')->paginate(10)]);
    }
    public function index(Request $req) {
        return $this->add_edit_and_listing($req);
    }
    public function add(Request $req) {
        $data = $req->all();
        $response = ['status' => [], 'errors' => []];
        $validated = Validator::make($data, [
            'title' => 'required',
            'slug' => 'required|unique:articles',
            'featured_image' => 'required||file|max:1000|mimes:'.get_image_extensions('string'),
        ]);
        $data['content'] = !empty(@$data['content']) ? @$data['content'] : '';
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
        $image = $req->file('featured_image');
        $input['imagename'] = 'img-'.uniqid().time().'.'.$image->extension();
        $path = public_path('/assets/images');
        if(!File::exists($path)){
            File::makeDirectory($path, $mode = 0777, true, true);
        }
        $img = Image::make($image->path());
        $img->save($path.'/'.$input['imagename'], 50);
        $data['featured_image'] = $input['imagename'];
        
        if(Article::create($data)) {
            $response['status'] = 'success';
            $response['message'] = 'You have added successfully';
        }
        return $response;
    }
    public function edit($id, Request $req) {
        if (c_user()->is_super_admin != 1) {
            if (Article::where(['id' => $id, 'user_id' => c_user()->id])->count() == 0) {
                $response['errors'] = 'Permission Denied';
                $response['status'] = 'permissiondenied';
                return response()->json($response ,403);
            }
        }
        $article = Article::findOrfail($id);
        if ($req->isMethod('post')) {
            $data = $req->all();
            $content = [];
            
            
            $response = ['status' => [], 'errors' => []];
            $vArgs = [
                'title' => 'required',
                'slug' => 'required|unique:articles',
                'featured_image' => 'required|file|max:1000|mimes:'.get_image_extensions('string'),
            ];
            if ($data['_featured_image']  == $article->featured_image)
                $vArgs['featured_image'] = 'file|max:1000|mimes:'.get_image_extensions('string');
            
            if ($data['slug'] == $article->slug)
                unset($vArgs['slug']);

            $validated = Validator::make($data, $vArgs);
            $data['content'] = !empty(@$data['content']) ? @$data['content'] : '';
            $data['post_status'] = 'drafted';
            if ($data['_status'] == 'Publish' || $data['_status'] == 'Update') {
                $data['post_status'] = 'published';
            }
            if ($validated->fails()) {
                $response['errors'] = $validated->getMessageBag()->toArray();
                $response['status'] = 'fail';
                return $response;
            }

            $data['featured_image'] = $data['_featured_image'];
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
            
            if($article->update($data)) {
                $response['status'] = 'success';
                $response['message'] = 'You have updated successfully';
            }
            return $response;
        }
        else {
            if ($req->ajax()) {
                $response = ['status' => 'success', 'item' => $article];
                return $response;
            }
            else {
                return $this->add_edit_and_listing($req);
            }
        }

    }

    /* 
    public function delete($id = null, Request $req) {
        if (c_user()->is_super_admin != 1) {
            if ($id) {
                if (Article::where(['id' => $id, 'user_id' => c_user()->id])->count() == 0) {
                    return back()->with('errormsg', 'Permission Denied');
                }
            }
            else {
                if (Article::whereIn('id', $req->input('action_ids'))->where(['user_id' => c_user()->id])->count() == 0) {
                    return back()->with('errormsg', 'Permission Denied');
                }
            }
        }
        if ($id) {
            if (Article::where(['id' => $id])->where('post_status', '!=', 'trashed')->count() > 0) {
               Article::where(['id' => $id])->where('post_status', '!=', 'trashed')->update(['post_status' => 'trashed']);
            }

            else if (Article::where(['id' => $id, 'post_status' => 'trashed'])->count() > 0) {
                $fImg = Article::select('featured_image')->where(['id' => $id])->first()->toArray()['featured_image'];
                File::delete('public/assets/images/'.$fImg);
                Article::where(['id' => $id, 'post_status' => 'trashed'])->delete();
            }
            return back()->with('msg', 'Delete successfully');
        }
        else {
            if ($req->input('rec_action') == 'trash') {
                if (Article::whereIn('id', $req->input('action_ids'))->where('post_status', '!=', 'trashed')->count() > 0) {
                    Article::whereIn('id', $req->input('action_ids'))->where('post_status', '!=', 'trashed')->update(['post_status' => 'trashed']);
                }
            }
            if ($req->input('rec_action') == 'delete') {
                if (Article::whereIn('id', $req->input('action_ids'))->where(['post_status' => 'trashed'])->count() > 0) {
                    $fImgs = Article::select('featured_image')->whereIn('id', $req->input('action_ids'))->get()->toArray();
                    foreach ($fImgs as $key => $fImg) {
                        File::delete('public/assets/images/'.$fImg['featured_image']);
                    }
                    
                    Article::whereIn('id', $req->input('action_ids'))->where(['post_status' => 'trashed'])->delete();
                }
            }
            return back()->with('msg', 'Delete successfully');
        }
    }

    public function restore($id = null, Request $req) {
        if (c_user()->is_super_admin != 1) {
            if ($id) {
                if (Article::where(['id' => $id, 'user_id' => c_user()->id])->count() == 0) {
                    return back()->with('errormsg', 'Permission Denied');
                }
            }
            else {
                if (Article::whereIn('id', $req->input('action_ids'))->where(['user_id' => c_user()->id])->count() == 0) {
                    return back()->with('errormsg', 'Permission Denied');
                }
            }
        }

        if ($id) {
            if (Article::where(['id' => $id, 'post_status' => 'trashed'])->count() > 0) {
                Article::where(['id' => $id, 'post_status' => 'trashed'])->update(['post_status' => 'published']);
                return back()->with('msg', 'Restored successfully');
            }
        }
        else {
            if ($req->input('rec_action') == 'restore') {
                if (Article::whereIn('id', $req->input('action_ids'))->where('post_status', 'trashed')->count() > 0) {

                    Article::whereIn('id', $req->input('action_ids'))->where('post_status', 'trashed')->update(['post_status' => 'published']);
                    return back()->with('msg', 'Restored successfully');
                }
            }
        }
    }
     */


}
