<!DOCTYPE html>
<html lang="zxx">
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/assets/img/favi.ico') }}">
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <title>::: Prject Name :::</title>
        @include('Frontend.Layout.top-scripts')
    </head>
    <body>
        @include('Frontend.Layout.header')    
    

    

        @yield('content')

        
        @include('Frontend.Layout.footer')
        @include('Frontend.Layout.bottom-scripts')    
    </body>
</html>