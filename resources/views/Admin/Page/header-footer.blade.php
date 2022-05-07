

@extends('Admin.Layout.layout')

@section('content')

	<div class="main-wrap {{ $name.'-wrap' }}">
            

            
            
            <div class="main-c-wrap header-footer-wrap">

            
            @if(session('errormsg'))
            <div class="card mb-4 border-left-danger">
                <div class="card-body">
                    {{ session('errormsg') }}
                </div>
            </div>
            @endif
            <div class="card shadow mb-4">
                
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ word_format($name, 'ucfirst')  }}</h6>
                </div>
                
                <div class="card-body">
                    <div class="tabs-wrap">
                        <form method="post" action="{{ route('header-footer') }}" novalidate enctype="multipart/form-data">
                            <div class="form-wrap">
                                
                                <div class="cf-wrap form-group ">                        
                                    
                                    
                                    <div class="form-head">
                                        <h6>Header</h6>
                                    </div>
                                    <div class="sections">
                                        
                                        <div class="cf-group simple-field-group">
                                            <label>Logo</label>
                                            <div class="c-form-group">
                                                @if ( array_value(array_value(@$headerFooter, 'header'), 'logo'))
                                                <div class="c-form-row">
                                                    <div class="c-form-row-sub">
                                                        <div class="f-c  fc-file">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Image
                                                                </label>
                                                                <input type="file" name="cf[header][logo][image]"  data-file="{{ @$headerFooter['header']['logo']['image'] }}"  accept="image/*" >
                                                                <img src="{{ get_image(@$headerFooter['header']['logo']['image']) }}" width="50" class="cf-preview-img"  />
                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                @else
                                                <div class="c-form-row">
                                                    <div class="c-form-row-sub">
                                                        <div class="f-c  fc-file">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Image
                                                                </label>
                                                                <input type="file" name="cf[header][logo][image]"  data-file=""  accept="image/*" >
                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                @endif
                                            </div>
                                            <small class="error-msg"></small>
                                        </div>
                                    </div>
                                    <div class="sections">    
                                        <div class="cf-group repeater-field-g">
                                            <label>Menu</label>
                                            <div class="c-form-group">
                                                @if ( array_value(array_value(@$headerFooter, 'header'), 'menu'))
                                                @foreach (@$headerFooter['header']['menu'] as $key => $item)
                                                <div class="c-form-row">
                                                    <div class="c-form-row-sub">
                                                        <div class="f-c">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Menu Label
                                                                </label>
                                                                <input type="text" pname="cf[header][menu]" data-name="menu_label"  value="{{ @$item['menu_label'] }}" data-index="{{ $key }}"  >
                                                            </div>
                                                        </div>
                                                        <div class="f-c">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Menu Link
                                                                </label>
                                                                <input type="text" pname="cf[header][menu]"  data-name="menu_link"   value="{{ @$item['menu_link'] }}" data-index="{{ $key }}" >
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="f-c r-i-d">
                                                        <div class="f-c-sub">
                                                            <a href="javascript:;" class="r-minus-btn"><i class="fa fa-minus"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                @endforeach
                                                @else
                                                <div class="c-form-row">
                                                    <div class="c-form-row-sub">
                                                        <div class="f-c">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Menu Label
                                                                </label>
                                                                <input type="text" pname="cf[header][menu]" data-name="menu_label" data-index="0"  >
                                                            </div>
                                                        </div>
                                                        <div class="f-c">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Menu Link
                                                                </label>
                                                                <input type="text" pname="cf[header][menu]"  data-name="menu_link"  data-index="0" >
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="f-c r-i-d">
                                                        <div class="f-c-sub">
                                                            <a href="javascript:;" class="r-minus-btn"><i class="fa fa-minus"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="r-plus-btn-wrap r-i-d">
                                                    <div class=" r-plus-btn-sub">
                                                        <a href="javascript:;" class="r-plus-btn"><i class="fa fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <small class="error-msg"></small>
                                        </div>
                                    </div>
                                    <div class="sections">
                                        <div class="cf-group simple-field-group">
                                            <label>Buttons</label>
                                            <div class="c-form-group">
                                                @if ( array_value(array_value(@$headerFooter, 'header'), 'buttons'))
                                                <div class="c-form-row">
                                                    <div class="c-form-row-sub">
                                                        <div class="f-c  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Button 1 Text
                                                                </label>
                                                                <input type="text" name="cf[header][buttons][button_1_text]"  value="{{ @$headerFooter['header']['buttons']['button_1_text'] }}" >
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="f-c  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Button 1 Link
                                                                </label>
                                                                <input type="text" name="cf[header][buttons][button_1_link]"  value="{{ @$headerFooter['header']['buttons']['button_1_link'] }}" >
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                @else
                                                <div class="c-form-row">
                                                    <div class="c-form-row-sub">
                                                        <div class="f-c  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Button 1 Text
                                                                </label>
                                                                <input type="text" name="cf[header][buttons][button_1_text]"  value="{{ @$headerFooter['header']['buttons']['button_1_text'] }}" >
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="f-c  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Button 1 Link
                                                                </label>
                                                                <input type="text" name="cf[header][buttons][button_1_link]"  value="{{ @$headerFooter['header']['buttons']['button_1_link'] }}" >
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                @endif
                                            </div>
                                            <small class="error-msg"></small>
                                        </div>
                                    
                                    </div>
                                    <div class="form-head">
                                        <h6>Footer</h6>
                                    </div>
                                    <div class="sections">
                                        <label>Column 1</label>
                                        <div class="cf-group simple-field-group">
                                            
                                            <div class="c-form-group">
                                                @if ( array_value(array_value(@$headerFooter, 'footer'), 'column_1'))
                                                <div class="c-form-row">
                                                    <div class="c-form-row-sub">
                                                        <div class="f-c  fc-file">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Logo
                                                                </label>
                                                                <input type="file" name="cf[footer][column_1][logo]"  data-file="{{ @$headerFooter['footer']['column_1']['logo'] }}"  accept="image/*" >
                                                                <img src="{{ get_image(@$headerFooter['footer']['column_1']['logo']) }}" width="50" class="cf-preview-img"  />
                                    
                                                            </div>
                                                        </div>
                                                        <div class="f-c  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Text
                                                                </label>
                                                                <input type="text" name="cf[footer][column_1][text]"  value="{{ @$headerFooter['footer']['column_1']['text'] }}" >
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="f-c  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Facebook Link
                                                                </label>
                                                                <input type="text" name="cf[footer][column_1][facebook_link]"  value="{{ @$headerFooter['footer']['column_1']['facebook_link'] }}" >
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="f-c  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Twitter Link
                                                                </label>
                                                                <input type="text" name="cf[footer][column_1][twitter_link]"  value="{{ @$headerFooter['footer']['column_1']['twitter_link'] }}" >
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="f-c  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Instagram Link
                                                                </label>
                                                                <input type="text" name="cf[footer][column_1][instagram_link]"  value="{{ @$headerFooter['footer']['column_1']['instagram_link'] }}" >
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                @else
                                                <div class="c-form-row">
                                                    <div class="c-form-row-sub">
                                                        <div class="f-c  fc-file">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Logo
                                                                </label>
                                                                <input type="file" name="cf[footer][column_1][logo]"   accept="image/*" >
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="f-c  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Text
                                                                </label>
                                                                <input type="text" name="cf[footer][column_1][text]"   >
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="f-c  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Facebook Link
                                                                </label>
                                                                <input type="text" name="cf[footer][column_1][facebook_link]"   >
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="f-c  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Twitter Link
                                                                </label>
                                                                <input type="text" name="cf[footer][column_1][twitter_link]"   >
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="f-c  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Instagram Link
                                                                </label>
                                                                <input type="text" name="cf[footer][column_1][instagram_link]"  >
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                @endif
                                            </div>
                                            <small class="error-msg"></small>
                                        </div>
                                    </div>

                                    <div class="sections">
                                        <label>Column 2</label>
                                        <div class="cf-group ">
                                            
                                            <div class="c-form-group">
                                                <div class="c-form-row">
                                                    <div class="c-form-row-sub">
                                                        <div class="f-c">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Heading
                                                                </label>
                                                                <input type="text" name="cf[footer][column_2][heading]"   value="{{ @$headerFooter['footer']['column_2']['heading'] }}"  >
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                
                                                <small class="error-msg"></small>
                                            </div>
                                        </div>
                                        <div class="cf-group repeater-field-g">
                                            
                                            <div class="c-form-group">
                                                @if ( array_value(array_value(@$headerFooter, 'footer'), 'column_2'))
                                                @foreach (@$headerFooter['footer']['column_2']['menus'] as $key => $item)
                                                <div class="c-form-row">
                                                    <div class="c-form-row-sub">
                                                        <div class="f-c">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Menu Label
                                                                </label>
                                                                <input type="text" pname="cf[footer][column_2][menus]" data-name="menu_label"  value="{{ @$item['menu_label'] }}" data-index="{{ $key }}"  >
                                                            </div>
                                                        </div>
                                                        <div class="f-c">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Menu Link
                                                                </label>
                                                                <input type="text" pname="cf[footer][column_2][menus]"  data-name="menu_link"   value="{{ @$item['menu_link'] }}" data-index="{{ $key }}" >
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="f-c r-i-d">
                                                        <div class="f-c-sub">
                                                            <a href="javascript:;" class="r-minus-btn"><i class="fa fa-minus"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                @endforeach
                                                @else
                                                <div class="c-form-row">
                                                    <div class="c-form-row-sub">
                                                        <div class="f-c">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Menu Label
                                                                </label>
                                                                <input type="text" pname="cf[footer][column_2][menus]" data-name="menu_label"  data-index="0"  >
                                                            </div>
                                                        </div>
                                                        <div class="f-c">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Menu Link
                                                                </label>
                                                                <input type="text" pname="cf[footer][column_2][menus]"  data-name="menu_link"    data-index="0" >
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="f-c r-i-d">
                                                        <div class="f-c-sub">
                                                            <a href="javascript:;" class="r-minus-btn"><i class="fa fa-minus"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="r-plus-btn-wrap r-i-d">
                                                    <div class=" r-plus-btn-sub">
                                                        <a href="javascript:;" class="r-plus-btn"><i class="fa fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <small class="error-msg"></small>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="sections">
                                        <label>Column 3</label>
                                        <div class="cf-group ">
                                            
                                            <div class="c-form-group">
                                                <div class="c-form-row">
                                                    <div class="c-form-row-sub">
                                                        <div class="f-c">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Heading
                                                                </label>
                                                                <input type="text" name="cf[footer][column_3][heading]"   value="{{ @$headerFooter['footer']['column_3']['heading'] }}"  >
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                
                                                <small class="error-msg"></small>
                                            </div>
                                        </div>
                                        <div class="cf-group repeater-field-g">
                                            
                                            <div class="c-form-group">
                                                @if ( array_value(array_value(@$headerFooter, 'footer'), 'column_3'))
                                                @foreach (@$headerFooter['footer']['column_3']['menus'] as $key => $item)
                                                <div class="c-form-row">
                                                    <div class="c-form-row-sub">
                                                        <div class="f-c">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Menu Label
                                                                </label>
                                                                <input type="text" pname="cf[footer][column_3][menus]" data-name="menu_label"  value="{{ @$item['menu_label'] }}" data-index="{{ $key }}"  >
                                                            </div>
                                                        </div>
                                                        <div class="f-c">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Menu Link
                                                                </label>
                                                                <input type="text" pname="cf[footer][column_3][menus]"  data-name="menu_link"   value="{{ @$item['menu_link'] }}" data-index="{{ $key }}" >
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="f-c r-i-d">
                                                        <div class="f-c-sub">
                                                            <a href="javascript:;" class="r-minus-btn"><i class="fa fa-minus"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                @endforeach
                                                @else
                                                <div class="c-form-row">
                                                    <div class="c-form-row-sub">
                                                        <div class="f-c">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Menu Label
                                                                </label>
                                                                <input type="text" pname="cf[footer][column_3][menus]" data-name="menu_label"  data-index="0"  >
                                                            </div>
                                                        </div>
                                                        <div class="f-c">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Menu Link
                                                                </label>
                                                                <input type="text" pname="cf[footer][column_3][menus]"  data-name="menu_link"    data-index="0" >
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="f-c r-i-d">
                                                        <div class="f-c-sub">
                                                            <a href="javascript:;" class="r-minus-btn"><i class="fa fa-minus"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="r-plus-btn-wrap r-i-d">
                                                    <div class=" r-plus-btn-sub">
                                                        <a href="javascript:;" class="r-plus-btn"><i class="fa fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <small class="error-msg"></small>
                                        </div>
                                    </div>
                                    

                                    <div class="sections">
                                        <label>Column 4</label>
                                        <div class="cf-group ">
                                            
                                            <div class="c-form-group">
                                                <div class="c-form-row">
                                                    <div class="c-form-row-sub">
                                                        <div class="f-c">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Heading
                                                                </label>
                                                                <input type="text" name="cf[footer][column_4][heading]"   value="{{ @$headerFooter['footer']['column_4']['heading'] }}"  >
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                
                                                <small class="error-msg"></small>
                                            </div>
                                        </div>
                                        <div class="cf-group simple-field-group">
                                            
                                            <div class="c-form-group">
                                                @if ( array_value(array_value(@$headerFooter, 'header'), 'column_4'))
                                                <div class="c-form-row">
                                                    <div class="c-form-row-sub">
                                                        <div class="f-c  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Address
                                                                </label>
                                                                <input type="text" name="cf[footer][column_4][address]"  value="{{ @$headerFooter['footer']['column_4']['address'] }}" >
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="f-c  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Phone
                                                                </label>
                                                                <input type="text" name="cf[footer][column_4][phone]"  value="{{ @$headerFooter['footer']['column_4']['phone'] }}" >
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="f-c  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Email
                                                                </label>
                                                                <input type="text" name="cf[footer][column_4][email]"  value="{{ @$headerFooter['footer']['column_4']['email'] }}" >
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                @else
                                                <div class="c-form-row">
                                                    <div class="c-form-row-sub">
                                                        <div class="f-c  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Address
                                                                </label>
                                                                <input type="text" name="cf[footer][column_4][address]"  value="{{ @$headerFooter['footer']['column_4']['address'] }}" >
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="f-c  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Phone
                                                                </label>
                                                                <input type="text" name="cf[footer][column_4][phone]"  value="{{ @$headerFooter['footer']['column_4']['phone'] }}" >
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="f-c  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Email
                                                                </label>
                                                                <input type="text" name="cf[footer][column_4][email]"  value="{{ @$headerFooter['footer']['column_4']['email'] }}" >
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                @endif
                                            </div>
                                            <small class="error-msg"></small>
                                        </div>
                                    </div>

                                    <div class="sections">
                                        <label>Bottom</label>
                                        
                                        <div class="cf-group simple-field-group ">
                                            
                                            <div class="c-form-group c-col-3">
                                                @if ( array_value(array_value(@$headerFooter, 'footer'), 'bottom'))
                                                <div class="c-form-row">
                                                    <div class="c-form-row-sub">
                                                        <div class="f-c  f-c-col-1  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Copy Right Text
                                                                </label>
                                                                <input type="text" name="cf[footer][bottom][copy_right_text]"  value="{{ @$headerFooter['footer']['bottom']['copy_right_text'] }}" >
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="f-c  f-c-col-2  ">
                                                            <div class="f-c-sub">
                                                                <div class="cf-group repeater-field-g">
                                                                    <div class="c-form-group">
                                                                       @php
                                                                        //    print_r(@$headerFooter['footer']['bottom']['page_repeater']); die;
                                                                       @endphp
                                                                        @if( is_array(@$headerFooter['footer']['bottom']['page_repeater']) )
                                                                        @foreach(@$headerFooter['footer']['bottom']['page_repeater'] as $key2 => $item)
                                                                            <div class="c-form-row">
                                                                                <div class="c-form-row-sub">
                                                                                    
                                                                                    <div class="f-c">
                                                                                        <div class="f-c-sub">
                                                                                            <label>
                                                                                                Menu Label
                                                                                            </label>
                                                                                            <input type="text" pname="cf[footer][bottom][page_repeater]"  data-name="menu_label" value="{{ @$item['menu_label'] }}" data-index="{{ $key2 }}" >
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="f-c">
                                                                                        <div class="f-c-sub">
                                                                                            <label>
                                                                                                Menu Link
                                                                                            </label>
                                                                                            <input type="text" pname="cf[footer][bottom][page_repeater]"  data-name="menu_link" value="{{ @$item['menu_link'] }}" data-index="{{ $key2 }}" >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="f-c r-i-d">
                                                                                    <div class="f-c-sub">
                                                                                        <a href="javascript:;" class="r-minus-btn"><i class="fa fa-minus"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                
                                                                        @else
                                                                        <div class="c-form-row">
                                                                            <div class="c-form-row-sub">
                                                                                
                                                                                <div class="f-c">
                                                                                    <div class="f-c-sub">
                                                                                        <label>
                                                                                            Menu Label
                                                                                        </label>
                                                                                        <input type="text" pname="cf[footer][bottom][page_repeater]"  data-name="menu_label"  data-index="0" >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="f-c">
                                                                                    <div class="f-c-sub">
                                                                                        <label>
                                                                                            Menu Link
                                                                                        </label>
                                                                                        <input type="text" pname="cf[footer][bottom][page_repeater]"  data-name="menu_link" data-index="0" >
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="f-c r-i-d">
                                                                                <div class="f-c-sub">
                                                                                    <a href="javascript:;" class="r-minus-btn"><i class="fa fa-minus"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        <div class="r-plus-btn-wrap r-i-d">
                                                                            <div class=" r-plus-btn-sub">
                                                                                <a href="javascript:;" class="r-plus-btn"><i class="fa fa-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <small class="error-msg"></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="f-c  f-c-col-3  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Image
                                                                </label>
                                                                <input type="file" pname="cf[footer][bottom][image]" accept="image/*"  data-file="{{ @$headerFooter['footer']['bottom']['image'] }}"   >
                                                                <img src="{{ get_image(@$headerFooter['footer']['bottom']['image']) }}" width="50" class="cf-preview-img" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                @else
                                                <div class="c-form-row">
                                                    <div class="c-form-row-sub">
                                                        <div class="f-c f-c-col-1 ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Copy Right Text
                                                                </label>
                                                                <input type="text" name="cf[footer][bottom][copy_right_text]"  value="" >
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="f-c  f-c-col-2  ">
                                                            <div class="f-c-sub">
                                                                <div class="cf-group repeater-field-g">
                                                                    <div class="c-form-group">
                                                                       
                                                                        
                                                                        <div class="c-form-row">
                                                                            <div class="c-form-row-sub">
                                                                                
                                                                                <div class="f-c">
                                                                                    <div class="f-c-sub">
                                                                                        <label>
                                                                                            Menu Label
                                                                                        </label>
                                                                                        <input type="text" pname="cf[footer][bottom][page_repeater]"  data-name="menu_label" data-index="0" >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="f-c">
                                                                                    <div class="f-c-sub">
                                                                                        <label>
                                                                                            Menu Link
                                                                                        </label>
                                                                                        <input type="text" pname="cf[footer][bottom][page_repeater]"  data-name="menu_link"  data-index="0" >
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="f-c r-i-d">
                                                                                <div class="f-c-sub">
                                                                                    <a href="javascript:;" class="r-minus-btn"><i class="fa fa-minus"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="r-plus-btn-wrap r-i-d">
                                                                            <div class=" r-plus-btn-sub">
                                                                                <a href="javascript:;" class="r-plus-btn"><i class="fa fa-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <small class="error-msg"></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="f-c  f-c-col-3  ">
                                                            <div class="f-c-sub">
                                                                <label>
                                                                    Image
                                                                </label>
                                                                <input type="file" pname="cf[footer][bottom][image]" accept="image/*"  data-file=""   >
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                @endif
                                            </div>
                                            <small class="error-msg"></small>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="form-group">
                                    @csrf
                                    <input type="submit" name="submit" value="Update" class="btn btn-primary pull-right">
                                </div>
                            </div>
                        </form>                        
                        <div class="card mb-4 c-msg border-left-success">
                            <div class="card-body"></div>
                        </div>
                    </div>

                    
                    
                </div>
            </div>
                            
            </div>
        </form>
    </div>

    
@endsection