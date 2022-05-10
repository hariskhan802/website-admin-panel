

    @extends('Frontend.Layout.layout')
    @section('content')
    {!! str_replace('@', '', str_replace('@@imgUrl@@', asset('public/Frontend/images'), $page->content)) !!}
    @endsection