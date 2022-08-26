<div>
    <div id="about" class="vc_row wpb_row section vc_row-fluid  vc_custom_1586273171286 grid_section" style=' text-align:center;'>
        <div class=" section_inner clearfix">
            <div class='section_inner_margin clearfix'>
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                            <div class="wpb_text_column wpb_content_element ">
                                <div class="wpb_wrapper">
                                    <h1>KEEP THE CLIENT DELIGHTED</h1>
                                </div>
                            </div>
                            <div class="vc_empty_space"  style="height: 20px">
                            <span class="vc_empty_space_inner">
                                <span class="empty_space_image"></span>
                            </span>
                            </div>
                            <div class="wpb_text_column wpb_content_element ">
                                <div class="wpb_wrapper">
                                    <h4>SkillGraphics is a Professional Image Post Production Company with its main studio located in Dhaka, Bangladesh (GMT+6). We provide services to help reduce the cost of image post-production for web shops/e-commerce, Photography, Fashion, Advertising and Digital Marketing Agencies, A pool of experienced professional is always ready to provide service for any Image Post Production.</h4>
                                </div>
                            </div>
                            <div class="vc_row wpb_row section vc_row-fluid vc_inner " style=' text-align:center;'>
                                <div class=" full_section_inner clearfix">
                                    <div class="row">
                                        @foreach($abouts as $about)
                                    <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-md-4">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class='q_icon_with_title medium custom_icon_image center qode_iwt_hover_enabled'>
                                                    <div class="icon_holder " style=" ">
                                                        <img itemprop="image" style="" src="{{ asset('storage/'.$about['image']) }}" alt="">
                                                    </div><div class="icon_text_holder" style="">
                                                        <div class="icon_text_inner" style="">
                                                            <h3 class="icon_title" style="color: #bb009b;">{{ $about['title'] }}</h3>
                                                            <p style=''>{{ $about['desc'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
