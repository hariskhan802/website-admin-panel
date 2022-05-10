
        @extends('Frontend.Layout.layout')
        @section('content')
        <!-- section Start -->
        @php
            $customFields = $page->custom_fields;
            // var_dump(@$customFields['section_1']); die;
        @endphp
        <section class="slider-sec">
            <div class="owl-carousel owl-theme">
                @if (is_array(@$customFields['section_1']['slider']))
                    @foreach (@$customFields['section_1']['slider'] as $item)
                        
                    
                        <div class="item">
                            <div class="bannr">
                                <img src="{{ get_image(@$item['banner_image']) }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="h1-bannr">
                                <h1>{!! @$item['heading_1'] !!}
                                </h1>
                                <p class="p-bannr">{{ @$item['text_1'] }}</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="btn text-center">
                                    <a href="{{ @$item['button_1_link'] }}" class="theme_btn2">{{ @$item['button_1_text'] }}</a>
                                </div>
                                <div class="btn text-center">
                                    <a href="{{ @$item['button_2_link'] }}" class="theme_btn3">{{ @$item['button_2_text'] }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                
            </div>
        </section>
        <!-- section End -->
        <section class="services_sec">
            <div class="container">
                <div class="row">
                    @if (is_array(@$customFields['section_2']['boxes']))
                    @foreach (@$customFields['section_2']['boxes'] as $item)
                    
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="servicesBox">
                                <div class="logo-main-1">
                                    <img src="{{ get_image(@$item['image_1']) }}" alt="..." class="logo1">
                                    <img src="{{ get_image(@$item['image_2']) }}" alt="..." class="logo2">
                                </div>
                                <h3>{{ @$item['heading_1'] }}</h3>
                                <p>
                                    {{ @$item['text_1'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach 
                    @endif
                </div>
            </div>
        </section>
        <section class="about-sec">
            <div class="servicebox-3-2">
                <div class="service-box-main-090998-4">
                    <div class="container-fluid">
                        <div class="row flexRow ">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="about-main-3-5656">
                                    <img src="{{ get_image(@$customFields['section_3']['who_are_we']['image_1']) }}" alt="..." class="about131-222">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <div class="head-main-097-5">
                                    <h4>{{ @$customFields['section_3']['who_are_we']['heading_1'] }}</h4>
                                    <p class="parag189-01"> {!!  nl2br(@$customFields['section_3']['who_are_we']['content_1'])  !!}</p>
                                    <div class="tags-1-main2-1">
                                        @if (@$customFields['section_3']['who_are_we']['text_repeater'])
                                        <ul>
                                            @foreach (@$customFields['section_3']['who_are_we']['text_repeater'] as $key => $item)
                                            @php
                                            if($key == 2){
                                                break;
                                            }
                                            @endphp
                                            <li><a href="javascript:;">{{ @$item['text'] }}</a></li>
                                           
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div>
                                    <div class="tags-2-main3-1">
                                        @if (@$customFields['section_3']['who_are_we']['text_repeater'])
                                        <ul>
                                            @foreach (@$customFields['section_3']['who_are_we']['text_repeater'] as $key => $item)
                                            @php
                                                if($key <= 1){
                                                    continue;
                                                }
                                            @endphp
                                            <li><a href="javascript:;">{{ @$item['text'] }}</a></li>
                                            
                                            @endforeach       
                                        </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row flexRow">
                    <div class="side-img-3">
                        <img src="{{ asset('public/assets/img/sideimg1.png') }}" alt="...">
                    </div>
                    <div class="servicesBox-6">

                        <div class="heading-box3">
                            <h6>{{ @$customFields['section_4']['heading'] }}</h6>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="servicesBox-5">
                                <h3>{{ @$customFields['section_4']['boxes'][0]['heading'] }}</h3>
                                <p>{{ @$customFields['section_4']['boxes'][0]['text'] }}</p>
                                <a href="{{ @$customFields['section_4']['boxes'][0]['button_1_link'] }}">{{ @$customFields['section_4']['boxes'][0]['button_1_text'] }}</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="servicesBox-5">
                                <h3>{{ @$customFields['section_4']['boxes'][1]['heading'] }}</h3>
                                <p>{{ @$customFields['section_4']['boxes'][1]['text'] }}</p>
                                <a href="{{ @$customFields['section_4']['boxes'][1]['button_1_link'] }}">{{ @$customFields['section_4']['boxes'][1]['button_1_text'] }}</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="servicesBox-5">
                                <h5>{{ @$customFields['section_4']['boxes'][2]['heading'] }}
                                </h5>
                                <ul class="fonts">
                                    <li> <a href="{{ @$customFields['section_4']['boxes'][2]['facebook_1_link'] }}"><i class="fa fa-facebook"></i> </a></li>
                                    
                                    <li> <a href="{{ @$customFields['section_4']['boxes'][2]['twitter_1_link'] }}"><i class="fa fa-twitter"></i> </a></li>
                                    
                                    <li> <a href="{{ @$customFields['section_4']['boxes'][2]['instagram_1_link'] }}"><i class="fa fa-instagram"></i> </a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="side-img-4">
                            <img src="{{ asset('/public/assets/img/sideimg2.png') }}" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="main_video_slider">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="main_section_heading">
                            <h1>{{ @$customFields['section_5']['heading'] }}</h1>
                        </div>
                    </div>
                </div>
                <div class="video-main-d">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="main_slider_box">
                                @if (is_array(@$customFields['section_5']['video_slider']))
                                @foreach (@$customFields['section_5']['video_slider'] as $item)
                                    
                                <div class="box_bg">
                                    <div class="video_thumbnail">
                                        <a href="{{ get_video(@$item['video']) }}" ddd="{{ @$item['video'] }}" data-fancybox="">
                                            <img src="{{ get_image(@$item['image']) }}" class="" alt="">
                                            
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="card-main-1">
            <div class="ancor4">
                <h5>{{ @$customFields['section_6']['heading'] }}</h5>
            </div>
            <!-- <div class="col-md-2 col-sm-2 col-xs-12"> -->
            <div class="ancors-2">
                             
                <a href="{{ @$customFields['section_6']['classes']['link_1'] }}">{{ @$customFields['section_6']['classes']['text_1'] }}</a>
                <a href="{{ @$customFields['section_6']['classes']['link_2'] }}">{{ @$customFields['section_6']['classes']['text_2'] }}</a>
                <a href="{{ @$customFields['section_6']['classes']['link_3'] }}">{{ @$customFields['section_6']['classes']['text_3'] }}</a>
            </div>
            <!-- </div> -->
            <div class="col-md-2 col-sm-2 col-xs-12">
                <div class="ancor-3">
                <a href="{{ @$customFields['section_6']['classes']['button_1_link'] }}">{{ @$customFields['section_6']['classes']['button_1_text'] }}</a>

                </div>
            </div>
        </section>
        <section class="services-1-sec">
            <div class="head-main0909">
                <h1>{{ @$customFields['section_7']['heading_1'] }}</h1>
                <h2>{{ @$customFields['section_7']['heading_2'] }}</h2>
            </div>
            <div class="servicesbox-main-000">
                <div class="container">
                    <div class="row flexRow">
                        @if ($articles->count())
                            
                        @foreach($articles as $key => $article)
                        <div class="col-md-4 col-lg-4 col-sm-12">
                            <div class="servicesBox-00">
                                <div class="logo-main-01">
                                    <img src="{{ get_image($article->featured_image) }}" alt="..." class="logo-1">
                                </div>
                                <p>{{ $article->title }}
                                </p>
                                <div class="progress" style="height: 5px; width: 80%;">
                                    <div class="progress-bar" role="progressbar" style="width: 50%"  aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                </div>
                                <h1>
                                    {{ date('d F,Y', strtotime($article->created_at)) }}
                                </h1>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <section class="form-sec-9101">
            <div class="heading-form44">
                <h1>{{ @$customFields['section_8']['heading'] }}</h1>
                <p>{{ @$customFields['section_8']['contact_form']['text'] }}</p>
            </div>
            <div class="form-090">
                <form method="post" class="c-form-e" action="{{ route('form-submit') }}">
                    <input type="text" name="name" class="form-11" placeholder=" Name" required>
                    <input type="email" name="email" class="form-22" placeholder=" Email" required><br>
                    <input type="text" name="subject" class="form-33" placeholder="Subject" required><br>
                    <textarea name="message" class="control" placeholder="Message" rows="4" required></textarea><br>
                    <input type="submit" name="submit" class="form-control submit" value="Submit">
                    <input type="hidden" name="__subject" value="Become a Volunteer">
                </form>
            </div>
        </section>
        <section class="thumbnail-1-sec">
            <div class="side-87">
                <h1>{{ @$customFields['section_9']['heading'] }}</h1>
                <img src="{{ asset('public/assets/img/pattren1.png') }}" alt="..." class="left-side-img">
            </div>
            <div class="container">
                <div class="row flexRow">
                    @if (is_array(@$customFields['section_9']['our_members']))
                        @foreach (@$customFields['section_9']['our_members'] as $item)
                            
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="servicesBox-08">
                                <div class="logo-main-098">
                                    <img src="{{ get_image(@$item['image']) }}" alt="..." class="logo00-9">
                                </div>
                                <h4>{{ @$item['name'] }}</h4>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="side-88">
                <img src="{{ asset('public/assets/img/pattren2.png') }}" alt="..." class="right-side-img">
            </div>
        </section>
        @endsection
