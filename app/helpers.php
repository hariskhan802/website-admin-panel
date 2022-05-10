<?php
    use App\Models\Option;
    use App\Models\Page;
    if (!function_exists('get_user_image')) {

        function get_user_image($img) {
            $imgPath = public_path('/assets/images/'.$img);
            $url = File::exists($imgPath) && File::isFile($imgPath) ? asset('public/assets/images/'.$img) : asset('public/assets/img/demo_profile.svg');
            return $url;
        }

    }

    if (!function_exists('get_image')) {

        function get_image($img) {
            $url = '';
            if(is_string($img) &&  $img != '' && (File::exists(public_path('/assets/images/'.$img)) && File::isFile(public_path('/assets/images/'.$img)))) {
                $url = asset('public/assets/images/'.$img);
            }
            else {
                $url = asset('public/assets/img/placeholder-img.jpg');
            }
            return $url;
        }

    }
    if (!function_exists('get_video')) {

        function get_video($video) {
            $url = '';
            if(is_string($video) &&  $video != '' && (File::exists(public_path('/assets/videos/'.$video)) && File::isFile(public_path('/assets/videos/'.$video)))) {
                $url = asset('public/assets/videos/'.$video);
            }
            else {
                $url = asset('public/assets/img/placeholder-video.png');
            }
            return $url;
        }

    }

    if (!function_exists('c_user')) {

        function c_user() {
            return Auth::user();
        }

    }

    if (!function_exists('array_value')) {

        function array_value($array, $key) {
            if (is_array($array) && array_key_exists($key, $array)) {
                return $array[$key];
            }
        }

    }
    
    if (!function_exists('get_image_extensions')) {

        function get_image_extensions($type = 'string') {
            $ext = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd', 'webp'];
            if ($type == 'string') 
                $ext = implode(',', $ext);
            return $ext;
        }

    }

    if (!function_exists('word_format')) {

        function word_format($name, $type = null) {

            if (!$type) {
               $name = $name;
            }
            else if ($type == 'ucfirst') {
               $name = ucfirst($name);
            }
            else if ($type == 'ucwords') {
               $name = ucwords($name);
            }
            else if ($type == 'plural') {
               $name = \Illuminate\Support\Str::plural($name);
            }
            else if ($type == 'cPlural') {
               $name =  ucfirst(\Illuminate\Support\Str::plural($name));
            }
            return $name;
        }

    }

    if (!function_exists('get_admin_body_classes')) {

        function get_admin_body_classes($class = '') {
            $classes = ''; 
            if (Route::is('edit-*')  ) {
                $classes .= ' edit-page';
            }
            $classes .= ' '.$class;
            return $classes;
        }

    }

    if (!function_exists('get_admin_body_attributes')) {

        function get_admin_body_attributes($attribute = []) {
            $attributes = ''; 
            
            foreach ($attribute as $key => $att) {
                $attributes .= ' '.$key.'='.$att.'';
            }
            
            return $attributes;
        }

    }


    if (!function_exists('get_option')) {

        function get_option($optionName) {
            $optionValue =  Option::select(['option_value'])->where(['option_name' => $optionName])->pluck('option_value')->first();
            return  $optionValue == '[]' ? '' : $optionValue;
        }

    }

    if (!function_exists('add_option')) {

        function add_option($optionName, $optionValue) {
            $success = false;
            if(Option::where('option_name', $optionName)->count() > 0 ) {
                $success = false;
            }
            else if(Option::create(['option_name' => $optionName, 'option_value' => $optionValue])) {
                $success = true;
            }
            return $success;
        }

    }

    if (!function_exists('update_option')) {

        function update_option($optionName, $optionValue) {
            $success = false;
            
            if(Option::where('option_name', $optionName)->count() > 0 ) {
                if (Option::where(['option_name' => $optionName])->update(['option_value' => $optionValue])) {
                    $success = true;
                }
                
            }
            else if(Option::create(['option_name' => $optionName, 'option_value' => $optionValue])) {
                $success = true;
            }
            return $success;
        }

    }


    function array_column_keys($array, $column, $index_key = null)
    {   
        $output = [];

        foreach ($array as $key => $item) {
            $output[@$item[$index_key] != '' ? @$item[$index_key] : $key] = @$item[$column];
        }

        return array_filter($output, function($item) {
            return null !== $item;
        });
    }

    function image_upload($imgObj) {
            // var_dump($imgObj); die;
            $image = $imgObj;
            // if(!$image || $image == 'undefined') 
            //     return false;

            $cImg = 'img-'.uniqid().time().'.'.$image->extension();
            $path = public_path('/assets/images');
            if(!File::exists($path)){
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $img = Image::make($image->path());
            $img->save($path.'/'.$cImg, 50);
            return $cImg;
    }
    function video_upload($videoObj) {
        
        $video = $videoObj;
       
        // if(!$video || $video == 'undefined') 
        //     return false;

        $cVideo = 'video-'.uniqid().time().'.'.$video->extension();
        $path = public_path('/assets/videos');
        if(!File::exists($path)){
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $video = $cVideo;
        $videoObj->move($path, $video);
        
        return $cVideo;
    }

    function object_to_array($data)
    {
        if (is_array($data) || is_object($data))
        {
            $result = [];
            foreach ($data as $key => $value)
            {
                $result[$key] = (is_array($data) || is_object($data)) ? object_to_array($value) : $value;
            }
            return $result;
        }
        return $data;
    }

    function get_page($id)
    {
        $page = Page::findOrFail($id);
        $page->url = route('inner-page', $page->slug);
        return $page;
    }
    // if (!function_exists('fields')) {

    //     function update_option($optionName, $optionValue) {
    //         $success = false;
            
    //         if(Option::where('option_name', $optionName)->count() > 0 ) {
    //             if (Option::where(['option_name' => $optionName])->update(['option_value' => $optionValue])) {
    //                 $success = true;
    //             }
                
    //         }
    //         else if(Option::create(['option_name' => $optionName, 'option_value' => $optionValue])) {
    //             $success = true;
    //         }
    //         return $success;
    //     }

    // }