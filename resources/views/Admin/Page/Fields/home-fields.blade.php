
    
    @if (@$cfFields !== null)
    <div class="sections">
        <h5>Section 1</h5>
        <div class="cf-group repeater-field-g">
            <label>Slider</label>
            <div class="c-form-group">
                @if( array_value(@$cfFields, 'section_1') )
                
                @foreach (@$cfFields['section_1']['slider'] as $key => $item)
                <div class="c-form-row">
                    <div class="c-form-row-sub">
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Heading 1
                                </label>
                                <input type="text" pname="cf[section_1][slider]"data-name="heading_1"  value="{{ @$item['heading_1'] }}" data-index="{{ $key }}"  >
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Text 1
                                </label>
                                <input type="text" pname="cf[section_1][slider]"  data-name="text_1"   value="{{ @$item['text_1'] }}" data-index="{{ $key }}" >
                            </div>
                        </div>
                        <div class="f-c fc-file">
                            <div class="f-c-sub">
                                <label>
                                    Banner Image
                                </label>
                                <input type="file" pname="cf[section_1][slider]" accept="image/*" data-file="{{ @$item['banner_image'] }}" data-name="banner_image" data-index="{{ $key }}"  >
                                <img src="{{ get_image(@$item['banner_image']) }}" width="50" class="cf-preview-img"  />
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Button 1 Text
                                </label>
                                <input type="text" pname="cf[section_1][slider]"  data-name="button_1_text"   value="{{ @$item['button_1_text'] }}" data-index="{{ $key }}"  >
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Button 1 Link
                                </label>
                                <input type="text" pname="cf[section_1][slider]"  data-name="button_1_link"   value="{{ @$item['button_1_link'] }}" data-index="{{ $key }}"  >
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Button 2 Text
                                </label>
                                <input type="text" pname="cf[section_1][slider]"  data-name="button_2_text"   value="{{ @$item['button_2_text'] }}" data-index="{{ $key }}"  >
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Button 2 Link
                                </label>
                                <input type="text" pname="cf[section_1][slider]"  data-name="button_2_link"   value="{{ @$item['button_2_link'] }}" data-index="{{ $key }}"  >
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
                                    Heading 1
                                </label>
                                <input type="text" pname="cf[section_1][slider]"data-name="heading_1"  data-index="0"  >
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Text 1
                                </label>
                                <input type="text" pname="cf[section_1][slider]"  data-name="text_1"   data-index="0" >
                            </div>
                        </div>
                        <div class="f-c fc-file">
                            <div class="f-c-sub">
                                <label>
                                    Banner Image
                                </label>
                                <input type="file" pname="cf[section_1][slider]" accept="image/*" data-file="" data-name="banner_image" data-index="0"  >
                                
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Button 1 Text
                                </label>
                                <input type="text" pname="cf[section_1][slider]"  data-name="button_1_text"    data-index="0"  >
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Button 1 Link
                                </label>
                                <input type="text" pname="cf[section_1][slider]"  data-name="button_1_link"  data-index="0"  >
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Button 2 Text
                                </label>
                                <input type="text" pname="cf[section_1][slider]"  data-name="button_2_text"   value="{{ @$item['button_2_text'] }}" data-index="0"  >
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Button 2 Link
                                </label>
                                <input type="text" pname="cf[section_1][slider]"  data-name="button_2_link"   value="{{ @$item['button_2_link'] }}" data-index="0"  >
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
        <h5>Section 2</h5>
        <div class="cf-group ">
            <label>Boxes</label>
            <div class="c-form-group">
                @if( array_value(@$cfFields, 'section_2')  )
                @foreach (@$cfFields['section_2']['boxes'] as $key => $item)
                <div class="c-form-row">
                    <div class="c-form-row-sub">
                        <div class="f-c  fc-file">
                            <div class="f-c-sub">
                                <label>
                                    Image 1
                                </label>
                                <input type="file" name="cf[section_2][boxes][{{ $key }}][image_1]"  data-file="{{ @$item['image_1'] }}"  accept="image/*" >
                                <img src="{{  get_image(@$item['image_1']) }}" width="50" class="cf-preview-img"  />
                            </div>
                        </div>
                        <div class="f-c  fc-file">
                            <div class="f-c-sub">
                                <label>
                                    Image 2
                                </label>
                                <input type="file" name="cf[section_2][boxes][{{ $key }}][image_2]"  data-file="{{ @$item['image_2'] }}"  accept="image/*" >
                                <img src="{{ get_image( @$item['image_2']) }}" width="50" class="cf-preview-img"  />
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Heading 1
                                </label>
                                <input type="text" name="cf[section_2][boxes][{{ $key }}][heading_1]" value="{{  @$item['heading_1'] }}" >
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Text 1
                                </label>
                                <textarea rows="4" name="cf[section_2][boxes][{{ $key }}][text_1]">{{  @$item['text_1'] }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                </div>
                @endforeach
                @endif
            </div>
            <small class="error-msg"></small>
        </div>
    </div>
    
    <div class="sections">
        <h5>Section 3</h5>
        <div class="cf-group simple-field-group">
            <label>Who Are We</label>
            <div class="c-form-group c-col-4">
                @if (array_value(@$cfFields, 'section_3'))
                <div class="c-form-row">
                    <div class="c-form-row-sub">
                        <div class="f-c  fc-file">
                            <div class="f-c-sub">
                                <label>
                                    Image 1
                                </label>
                                <input type="file" name="cf[section_3][who_are_we][image_1]"  data-file="{{ @$cfFields['section_3']['who_are_we']['image_1'] }}"  accept="image/*" >
                                <img src="{{ get_image(@$cfFields['section_3']['who_are_we']['image_1']) }}" width="50" class="cf-preview-img"  />

                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Heading 1
                                </label>
                                <input type="text" name="cf[section_3][who_are_we][heading_1]" value="{{ @$cfFields['section_3']['who_are_we']['heading_1'] }}" >
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Content 1
                                </label>
                                <textarea rows="4" name="cf[section_3][who_are_we][content_1]" >{{ @$cfFields['section_3']['who_are_we']['content_1'] }}</textarea>
                            </div>
                        </div>
                        <div class="f-c f-c-sub-field">
                            <div class="f-c-sub">

                                <div class="cf-group repeater-field-g">
                                    <div class="c-form-group">
                                        @php
                                            // print_r($cfFields['section_3']); die;
                                        @endphp
                                        @if( is_array(@$cfFields['section_3']['who_are_we']['text_repeater']) )
                                        @foreach(@$cfFields['section_3']['who_are_we']['text_repeater'] as $key2 => $item)
                                            <div class="c-form-row">
                                                <div class="c-form-row-sub">
                                                    
                                                    <div class="f-c">
                                                        <div class="f-c-sub">
                                                            <label>
                                                                Text
                                                            </label>
                                                            <input type="text" pname="cf[section_3][who_are_we][text_repeater]"  data-name="text" value="{{ @$item['text'] }}" data-index="{{ $key2 }}" >
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
                                                            Text
                                                        </label>
                                                        <input type="text" pname="cf[section_3][who_are_we][text_repeater]"  data-name="text"  data-index="0" >
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
                    </div>
                    
                </div>
                @endif
            </div>
            <small class="error-msg"></small>
        </div>
    </div>

    
    <div class="sections">
        <h5>Section 4</h5>
        @if (array_value(@$cfFields, 'section_4'))
        <div class="cf-group ">
            <label>Boxes</label>
            <div class="c-form-group">
                <div class="c-form-row">
                    <div class="c-form-row-sub">
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Heading
                                </label>
                                <input type="text" name="cf[section_4][heading]" value="{{ @$cfFields['section_4']['heading'] }}" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cf-group ">
            <label>Boxes</label>
            <div class="c-form-group">
                <div class="c-form-row">
                    <div class="c-form-row-sub">
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Heading
                                </label>
                                <input type="text" name="cf[section_4][boxes][0][heading]" value="{{ @$cfFields['section_4']['boxes'][0]['heading'] }}" >
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Text
                                </label>
                                <textarea rows="4" name="cf[section_4][boxes][0][text]">{{ @$cfFields['section_4']['boxes'][0]['heading'] }}</textarea>
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Button 1 Text
                                </label>
                                <input type="text" name="cf[section_4][boxes][0][button_1_text]"  value="{{ @$cfFields['section_4']['boxes'][0]['button_1_text'] }}" >
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Button 1 Link
                                </label>
                                <input type="text" name="cf[section_4][boxes][0][button_1_link]"  value="{{ @$cfFields['section_4']['boxes'][0]['button_1_link'] }}"  >
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="c-form-row">
                    <div class="c-form-row-sub">
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Heading
                                </label>
                                <input type="text" name="cf[section_4][boxes][1][heading]" value="{{ @$cfFields['section_4']['boxes'][1]['heading'] }}"  >
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Text
                                </label>
                                <textarea rows="4" name="cf[section_4][boxes][1][text]" >{{ @$cfFields['section_4']['boxes'][1]['text'] }}</textarea>
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Button 1 Text
                                </label>
                                <input type="text" name="cf[section_4][boxes][1][button_1_text]" value="{{ @$cfFields['section_4']['boxes'][1]['button_1_text'] }}"  >
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Button 1 Link
                                </label>
                                <input type="text" name="cf[section_4][boxes][1][button_1_link]" value="{{ @$cfFields['section_4']['boxes'][1]['button_1_link'] }}"  >
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="c-form-row">
                    <div class="c-form-row-sub">
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Heading
                                </label>
                                <input type="text" name="cf[section_4][boxes][2][heading]" value="{{ @$cfFields['section_4']['boxes'][2]['heading'] }}"  >
                            </div>
                        </div>
                        
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Facebook 1 Link
                                </label>
                                <input type="text" name="cf[section_4][boxes][2][facebook_1_link]"  value="{{ @$cfFields['section_4']['boxes'][2]['facebook_1_link'] }}"  >
                            </div>
                        </div>
                        
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Twitter 1 Link
                                </label>
                                <input type="text" name="cf[section_4][boxes][2][twitter_1_link]"   value="{{ @$cfFields['section_4']['boxes'][2]['twitter_1_link'] }}"  >
                            </div>
                        </div>
                        
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Instagram 1 Link
                                </label>
                                <input type="text" name="cf[section_4][boxes][2][instagram_1_link]"   value="{{ @$cfFields['section_4']['boxes'][2]['instagram_1_link'] }}"  >
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <small class="error-msg"></small>
            </div>
        </div>
        @endif
    
    </div>
    
    
    <div class="sections">
        <h5>Section 5</h5>
        <div class="cf-group repeater-field-g">
            <label>Video Slider</label>
            <div class="c-form-group c-col-4">
                
                @if(array_value(@$cfFields, 'section_5'))
                @foreach(@$cfFields['section_5']['video_slider'] as $key => $item)
                <div class="c-form-row">
                    <div class="c-form-row-sub">
                        <div class="f-c  fc-file">
                            <div class="f-c-sub">
                                <label>
                                    Video
                                </label>
                                <input type="file" pname="cf[section_5][video_slider]"  data-file="{{ @$item['video'] }}"  data-name="video" data-index="{{ $key }}" accept="video/*" >
                                @php
                                    // var_dump(@$item['video']); die;
                                @endphp
                                @if (@$item['video'] != '')
                                    
                                <a href="{{ asset('public/assets/videos/'.@$item['video']) }}" target="blank">View Video</a>
                                @endif
                            </div>
                        </div>
                        <div class="f-c  fc-file">
                            <div class="f-c-sub">
                                <label>
                                    Image
                                </label>
                                <input type="file" pname="cf[section_5][video_slider]"  data-file="{{ @$item['image'] }}"  data-name="image" data-index="{{ $key }}" accept="image/*" >
                                <img src="{{ get_image(@$item['image']) }}" width="50" class="cf-preview-img"  />
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
                        <div class="f-c  fc-file">
                            <div class="f-c-sub">
                                <label>
                                    Video
                                </label>
                                <input type="file" pname="cf[section_5][video_slider]"  data-name="video" data-index="0" accept="video/*" >
                                
                            </div>
                        </div>
                        <div class="f-c  fc-file">
                            <div class="f-c-sub">
                                <label>
                                    Image
                                </label>
                                <input type="file" name="cf[section_5][video_slider]" data-name="image" data-index="0" accept="image/*" >
                                
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
        <h5>Section 6</h5>
        @if(array_value(@$cfFields, 'section_6'))
        <div class="cf-group ">
            <label>Classes</label>
            
            <div class="c-form-group">
                
                <div class="c-form-row">
                    <div class="c-form-row-sub">
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Heading
                                </label>
                                <input type="text" name="cf[section_6][heading]" value="{{ @$cfFields['section_6']['heading']}}" >
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                
                
                <small class="error-msg"></small>
            </div>
        </div>
        <div class="cf-group ">
            <div class="c-form-group">
                <div class="c-form-row">
                    <div class="c-form-row-sub">
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Text 1
                                </label>
                                <input type="text" name="cf[section_6][classes][text_1]" value="{{ @$cfFields['section_6']['classes']['text_1']}}"  >
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Link 1
                                </label>
                                <input type="text" name="cf[section_6][classes][link_1]" value="{{ @$cfFields['section_6']['classes']['link_1']}}"  >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-form-row">
                    <div class="c-form-row-sub">
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Text 2
                                </label>
                                <input type="text" name="cf[section_6][classes][text_2]"  value="{{ @$cfFields['section_6']['classes']['text_2']}}"  >
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Link 2
                                </label>
                                <input type="text" name="cf[section_6][classes][link_2]" value="{{ @$cfFields['section_6']['classes']['link_2']}}"  >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-form-row">
                    <div class="c-form-row-sub">
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Text 3
                                </label>
                                <input type="text" name="cf[section_6][classes][text_3]"  value="{{ @$cfFields['section_6']['classes']['text_3']}}"  >
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Link 3
                                </label>
                                <input type="text" name="cf[section_6][classes][link_3]" value="{{ @$cfFields['section_6']['classes']['link_3']}}"  >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-form-row">
                    <div class="c-form-row-sub">
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Button 1 Text
                                </label>
                                <input type="text" name="cf[section_6][classes][button_1_text]"  value="{{ @$cfFields['section_6']['classes']['button_1_text']}}"  >
                            </div>
                        </div>
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Button 1 Link
                                </label>
                                <input type="text" name="cf[section_6][classes][button_1_link]"  value="{{ @$cfFields['section_6']['classes']['button_1_link']}}"  >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    
    
    </div>


    <div class="sections">
        <h5>Section 7</h5>
        @if(array_value(@$cfFields, 'section_7'))
        <div class="cf-group ">
            <label>Latest Articles</label>
            
            <div class="c-form-group">
                <div class="c-form-row">
                    <div class="c-form-row-sub">
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Heading 1
                                </label>
                                <input type="text" name="cf[section_7][heading_1]" value="{{ @$cfFields['section_7']['heading_1'] }}" >
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="c-form-row">
                    <div class="c-form-row-sub">
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Heading 2
                                </label>
                                <input type="text" name="cf[section_7][heading_2]" value="{{ @$cfFields['section_7']['heading_2'] }}" >
                            </div>
                        </div>
                        
                    </div>
                </div>
                <small class="error-msg"></small>
            </div>
        </div>
        <div class="cf-group ">
            <div class="c-form-group">
                <div class="c-form-row">
                    <div class="c-form-row-sub">
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Articles Shorcode
                                </label>
                                <input type="text" name="cf[section_7][latest_articles][articles_shorcode]"  value="{{ @$cfFields['section_7']['latest_articles']['articles_shorcode'] }}"  >
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        @endif
    </div>


    <div class="sections">
        <h5>Section 8</h5>
        @if(array_value(@$cfFields, 'section_8'))
        <div class="cf-group ">
            <label>Contact Form</label>
            
            <div class="c-form-group">
                <div class="c-form-row">
                    <div class="c-form-row-sub">
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Heading
                                </label>
                                <input type="text" name="cf[section_8][heading]"   value="{{ @$cfFields['section_8']['heading'] }}"  >
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                
                <small class="error-msg"></small>
            </div>
        </div>
        <div class="cf-group ">
            <div class="c-form-group">
                <div class="c-form-row">
                    <div class="c-form-row-sub">
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Text
                                </label>
                                <input type="text" name="cf[section_8][contact_form][text]"  value="{{ @$cfFields['section_8']['contact_form']['text'] }}" >
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        @endif
    </div>

    <div class="sections">
        <h5>Section 9</h5>
        @if(array_value(@$cfFields, 'section_9'))
        <div class="cf-group ">
            <label>Our Members</label>
            
            <div class="c-form-group">
                <div class="c-form-row">
                    <div class="c-form-row-sub">
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Heading
                                </label>
                                <input type="text" name="cf[section_9][heading]"  value="{{ @$cfFields['section_9']['heading'] }}"  >
                            </div>
                        </div>
                    </div>
                </div>
                <small class="error-msg"></small>
            </div>
        </div>
        <div class="cf-group repeater-field-g">
            <div class="c-form-group">
                @foreach(@$cfFields['section_9']['our_members'] as $key => $item)
                <div class="c-form-row">
                    <div class="c-form-row-sub">
                        <div class="f-c">
                            <div class="f-c-sub">
                                <label>
                                    Name
                                </label>
                                <input type="text" pname="cf[section_9][our_members]" data-name="name" value="{{ @$item['name'] }}" data-index="{{ $key }}" >
                            </div>
                        </div>
                        
                        <div class="f-c fc-file">
                            <div class="f-c-sub">
                                <label>
                                    Image
                                </label>
                                <input type="file" pname="cf[section_9][our_members]" accept="image/*"  data-file="{{ @$item['image'] }}"  data-name="image" data-index="{{ $key }}"  >
                                <img src="{{ get_image(@$item['image']) }}" width="50" class="cf-preview-img" />
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
                <div class="r-plus-btn-wrap r-i-d">
                    <div class=" r-plus-btn-sub">
                        <a href="javascript:;" class="r-plus-btn"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <small class="error-msg"></small>
        </div>
        @endif
    </div>
    @endif