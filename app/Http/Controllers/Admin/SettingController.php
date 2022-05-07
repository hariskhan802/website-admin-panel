<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Option;


class SettingController extends Controller
{
    public function settings(Request $req) {
        if ($req->isMethod('post')) {
            $data = $req->all();
            $response = ['status' => [], 'errors' => []];
            $vArgs = [
                'site_title' => 'required',
                'administration_email_address' => 'required',
                
            ];
            unset($data['_token'], $data['submit']);
            

            $validated = Validator::make($data, $vArgs);

            if ($validated->fails()) {
                $response['errors'] = $validated->getMessageBag()->toArray();
                $response['status'] = 'fail';
                return $response;
            }
            foreach ($data as $option_name => $option_value) {
                if ($option_value != '' ) {
                    update_option($option_name, $option_value);
                }
            }
            $response['status'] = 'success';
            $response['message'] = 'You have updated successfully';
            return $response;

        }
        else {
            $name = 'settings';

            return view('Admin.Settings.settings', ['name' => $name, ]);
        }
    }

    
}
