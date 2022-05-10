<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Article;
class FrontendController extends Controller
{
    public function home () {
        $page = Page::where(['id' => 1])->first();
        $headerFooter = object_to_array(json_decode(get_option('header_footer')));
        $page->custom_fields = object_to_array(json_decode($page->custom_fields));
        $articles = Article::orderBy('id', 'DESC')->get();
        return view('Frontend.Page.home', ['headerFooter' => $headerFooter, 
            'page' => $page, 
            'articles' => $articles
        ]);
    
    }

    public function inner_page ($slug) {
        $page = Page::where(['slug' => $slug])->first();
        $headerFooter = object_to_array(json_decode(get_option('header_footer')));
        $page->custom_fields = object_to_array(json_decode($page->custom_fields));
        return view('Frontend.Page.inner-page', ['headerFooter' => $headerFooter, 
            'page' => $page, 
        ]);
    
    }
    public function form_submit (Request $req) {
        $inputs = $req->post();
        
        $subject = @$inputs['__subject'];
        unset($inputs['__subject'], $inputs['_token'], $inputs['submit']);
        
        $data = ['inputs' => $inputs];
        \Mail::send('mail', $data, function($message) use ($subject, $req) {
            $message->to('harisquadtech@gmail.com')->subject
            ($subject);
            $message->from(get_option('administration_email_address'));
            if ($req->file('cv')) {
                $message->attach($req->file('cv')->getRealPath(), [
                    'as' => $req->file('cv')->getClientOriginalName(),
                    'mime' => $req->file('cv')->getClientMimeType(),
                ]);
            }
        });
        $response['status'] = 'success';
        $response['message'] = 'You have submitted form successfully';
        return $response;
    }
    
}
