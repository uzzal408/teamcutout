<div>
    <section id="Services"    data-speed="1" class="parallax_section_holder">
        <div class="parallax_content left">
            <div class='parallax_section_inner_margin clearfix'>
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                            <div class="wpb_text_column wpb_content_element ">
                                <div class="wpb_wrapper">
                                    <h1 style="text-align: center;">Check Out Our Services</h1>
                                </div>
                            </div>
                            <div class="vc_empty_space"  style="height: 50px" >
                            <span class="vc_empty_space_inner">
                                <span class="empty_space_image"></span>
                            </span>
                            </div>
                            @if($services)
                            <div  class="vc_row wpb_row section vc_row-fluid vc_inner  vc_custom_1523537064983" style=' text-align:left;'>
                                <div class=" full_section_inner clearfix">
                                    <div class="row">
                                        @foreach($services as $service)
                                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                                            <img src="{{ asset('storage/'.$service['image']) }}" class="img-responsive">
                                            <div class="wpb_wrapper">
                                                <h3></h3>
                                                <h3 style="text-align: center;">{{ $service['title'] }}</h3>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif

                                <div class="vc_empty_space"  style="height: 50px" >
                            <span class="vc_empty_space_inner">
                                <span class="empty_space_image"></span>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
