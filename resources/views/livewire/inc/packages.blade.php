<div>
    <div id="Packages"    class="vc_row wpb_row section vc_row-fluid  vc_custom_1586273393897 grid_section" style=' text-align:center;'>
        <div class=" section_inner clearfix">
            <div class='section_inner_margin clearfix'>
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                            <div class='q_elements_holder one_column responsive_mode_from_768' >
                                <div class='q_elements_item ' data-768-1024='107px 10% 70px' data-600-768='107px 4% 70px' data-480-600='107px 0% 70px' data-480='107px 0% 70px' data-animation='no' data-item-class='q_elements_holder_custom_783880' style='text-align:center;'>
                                    <div class='q_elements_item_inner'>
                                        <div class='q_elements_item_content q_elements_holder_custom_783880' style='padding:107px 16% 70px'>
                                            <div class="wpb_text_column wpb_content_element ">
                                                <div class="wpb_wrapper">
                                                    <h1>Choose Your Perfect Package</h1>
                                                </div>
                                            </div>
                                            <div class="vc_empty_space"  style="height: 16px" >
                                            <span class="vc_empty_space_inner">
                                                <span class="empty_space_image" ></span>
                                            </span>
                                            </div>
                                            <div class="wpb_text_column wpb_content_element ">
                                                <div class="wpb_wrapper">
                                                    <h4>Our production system has been built from the group up with large volume orders in mind. We use both automated and manual quality control systems, so rest assured that your images will turn out just as you wanted them.</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($packages)
                            <div class="qode_pricing_tables clearfix four_columns">
                                @foreach($packages as $package)
                                <div class='q_price_table '>
                                    <div class='price_table_inner'>
                                        <ul>
                                            <li class='cell table_title'>
                                                <h3 class='title_content'>{{ $package['name'] }}</h3>
                                            <li class='prices'>
                                                <div class='price_in_table'>
                                                    <sup class='value'>.</sup>
                                                    <span class='price'>{{ $package['price'] }}</span>
                                                    <span class='mark' style="background: #262626">{{ $package['price_time'] }}</span>
                                                </div>
                                            </li>
                                            <li class='pricing_table_content'>{{ $package['title'] }}</p>
                                                <p>&nbsp;</p>
                                                <p>{{ $package['line_one'] }}</p>
                                            </li>
                                            <li class='price_button'>
                                                <a itemprop='url' class='qbutton white medium' href='#' target='_self'>Get Started</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
