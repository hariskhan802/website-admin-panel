		
        @php
            

        @endphp
        <!--Footer Content Start-->
        <footer class="padding-top {{ $page->slug == 'kitchens' || $page->slug == 'mentoring-program' ? 'btom' : '' }}">
            <div class="footer-1">
                <div class="container">
                    <div class="row flexRow">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="logo-head-foot">
                                <img src="{{ get_image(@$headerFooter['footer']['column_1']['logo']) }}" alt="...">
                                <p>{!! @$headerFooter['footer']['column_1']['text'] !!}</p>
                                <ul class="font-11">
                                    <li> <a href="{{ @$headerFooter['footer']['column_1']['facebook_link'] }}"><i class="fa fa-facebook"></i> </li>
                                    </a>
                                    <li> <a href="{{ @$headerFooter['footer']['column_1']['twitter_link'] }}"><i class="fa fa-twitter"></i> </li>
                                    </a>
                                    <li> <a href="{{ @$headerFooter['footer']['column_1']['instagram_link'] }}"><i class="fa fa-instagram"></i> </li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="thumbnail-322">
                                <h1>{{ @$headerFooter['footer']['column_2']['heading'] }}</h1>
                                @if (is_array(@$headerFooter['footer']['column_2']['menus']))
                                <ul>
                                    @foreach(@$headerFooter['footer']['column_2']['menus'] as $item)
                                    <li><a href="{{ @$item['menu_link'] }}">{{ @$item['menu_label'] }}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="thumbnail-322">
                                <h1>{{ @$headerFooter['footer']['column_3']['heading'] }}</h1>
                                
                                @if (is_array(@$headerFooter['footer']['column_3']['menus']))
                                <ul>
                                    @foreach(@$headerFooter['footer']['column_3']['menus'] as $item)
                                    <li><a href="{{ @$item['menu_link'] }}">{{ @$item['menu_label'] }}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="thumbnail-320">
                                <h2>{{ @$headerFooter['footer']['column_4']['heading'] }}</h2>
                                <div class="fonts-p-567">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <p>{{ @$headerFooter['footer']['column_4']['address'] }}
                                    </p>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <p> {{ @$headerFooter['footer']['column_4']['phone'] }}</p>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <p>{{ @$headerFooter['footer']['column_4']['email'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-21"></div>
            <div class="end-foot">
                <div class="thumbnail-876">
                    <p>{{ @$headerFooter['footer']['bottom']['copy_right_text'] }}</p>
                </div>
                <div class="thumbnail-877">
                    {{-- <p>Terms & Condition      |   Privacy Policy</p> --}}
                    <p>
                        @if (is_array(@$headerFooter['footer']['bottom']['page_repeater']))
                            @foreach (@$headerFooter['footer']['bottom']['page_repeater'] as $item)
                                <a href="{{ @$item['menu_link'] }}">{{ @$item['menu_label'] }}</a>
                            @endforeach
                        @endif
                    </p>
                </div>
                <div class="thumbnail-898">
                    @php
                        // print_r(@$headerFooter['footer']['bottom']['image']);
                    @endphp
                    <img src="{{ get_image(@$headerFooter['footer']['bottom']['image']) }}" alt="..." class="footer=img">
                </div>
            </div>
            </div> 
        </footer>
        <!--Footer Content End-->