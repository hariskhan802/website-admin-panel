
    @php
    // echo '<pre>';
    // print_r(@$headerFooter['header']);
    // die;
@endphp
<!-- Header Start -->
<header class="main_header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-2 col-sm-12 ">
                <div class="main_logo text-left">
                    <a href="{{ url('') }}">
                        <img src="{{ get_image(@$headerFooter['header']['logo']['image']) }}" alt="img">
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12">
                <nav class="navbar navbar-expand-lg navbar-light menubarbg">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            @php
                                // print_r(@$headerFooter['header']['menus']); die;
                            @endphp
                            <ul class="navbar-nav">
                                @if (is_array(@$headerFooter['header']['menus']))
                                @foreach(@$headerFooter['header']['menus'] as $item)
                                <li class="nav-item   ">
                                    <a class="nav-link {{ @$item['page'] == $page->id ? 'active' : '' }} " aria-current="page" href="{{ @$item['page'] == 1 ? url('') : get_page(@$item['page'])->url }}">{{ get_page(@$item['page'])->title }}</a>
                                </li>
                                @endforeach
                                @endif
                                
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12">
                <div class="top_btn text-right">
                    <a href="{{ @$headerFooter['header']['buttons']['button_1_link'] }}" class="theme_btn1">{{ @$headerFooter['header']['buttons']['button_1_text'] }}</a>
                </div>
            </div>
        </div>
    </div>
    </nav>
</header>
<!-- Header End -->