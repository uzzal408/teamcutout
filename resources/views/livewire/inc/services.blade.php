
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
                                                    <h1>Title</h1>
                                                </div>
                                            </div>
                                            <div class="vc_empty_space"  style="height: 16px" >
                                            <span class="vc_empty_space_inner">
                                                <span class="empty_space_image" ></span>
                                            </span>
                                            </div>
                                            <div class="wpb_text_column wpb_content_element ">
                                                <div class="wpb_wrapper">
                                                    <h4>DEsc</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($services)
                                <div class="qode_pricing_tables clearfix">
                                    @php $sl=0 @endphp
                                    <div class="row">
                                    @foreach($services as $service)
                                        @php $sl++ @endphp
                                        <div class="col-md-4">
                                            <div class='container_1'>
                                                <div class="compare compare_{{$sl}}">
                                                    <div class="before" style="position: relative; top: 0px; width: 100%; height: 100%; background: url('{{ asset('storage/'.$service['image']) }}'); background-repeat: no-repeat">
                                                        <div class="after" style="position: absolute; top: 0px;left: 0px; width: 140px;height: 220px;  background: url('{{ asset('storage/'.$service['before_image']) }}'); background-repeat: no-repeat; z-index: 2;"></div>
                                                    </div>
                                                    <input type="range" min="0" max="500px" value="50"  id="compare-id_{{ $sl }}">
                                                </div>
                                            </div>
                                            <br>
                                            <h1>Test</h1>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div>--}}
{{--    <section id="Services"   data-speed="1" class="parallax_section_holder">--}}
{{--        <div class="parallax_content left">--}}
{{--            <div class='parallax_section_inner_margin clearfix'>--}}
{{--                <div class="wpb_column vc_column_container vc_col-sm-12">--}}
{{--                    <div class="vc_column-inner">--}}
{{--                        <div class="wpb_wrapper">--}}
{{--                            <div class="wpb_text_column wpb_content_element ">--}}
{{--                                <div class="wpb_wrapper">--}}
{{--                                    <h1 style="text-align: center;">Check Out Our Services</h1>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="vc_empty_space"  style="height: 50px" >--}}
{{--                            <span class="vc_empty_space_inner">--}}
{{--                                <span class="empty_space_image"></span>--}}
{{--                            </span>--}}
{{--                            </div>--}}
{{--                            @if($services)--}}
{{--                            <div  class="vc_row wpb_row section vc_row-fluid vc_inner  vc_custom_1523537064983" style=' text-align:left;'>--}}

{{--                                <div class=" full_section_inner clearfix">--}}
{{--                                    <div class="row">--}}
{{--                                        @php $sl=0 @endphp--}}
{{--                                        @foreach($services as $service)--}}
{{--                                            @php $sl++ @endphp--}}
{{--                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">--}}
{{--                                        <div class='container_1'>--}}
{{--                                            <div class="title">title</div>--}}
{{--                                            <div class="compare compare_{{$sl}}">--}}
{{--                                                <div class="before" style="position: relative; top: 0px; width: 100%; height: 100%; background: url('{{ asset('frontend/uploads/image_one.jpg') }}'); background-repeat: no-repeat">--}}
{{--                                                    <div class="after" style="position: absolute; top: 0px;left: 0px; width: 140px;height: 220px;  background: url('{{ asset('frontend/uploads/image_two.jpg') }}'); background-repeat: no-repeat; z-index: 2;"></div>--}}
{{--                                                </div>--}}
{{--                                                <input type="range" min="0" max="500px" value="50"  id="compare-id_{{ $sl }}">--}}
{{--                                                <h3>Test</h3>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        </div>--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @endif--}}

{{--                                <div class="vc_empty_space"  style="height: 200px" >--}}
{{--                            <span class="vc_empty_space_inner">--}}
{{--                                <span class="empty_space_image"></span>--}}
{{--                            </span>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--</div>--}}
<style>
    .container_1{
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }

    .container_1 .title{
        text-align: center;
        margin-bottom: 20px;
        color: #acacac;
        font-size: 40px;
    }
    .compare{
        position: relative;
        width: 330px;
        height: 220px;
        border: 1px solid #f5f5f5;
        box-shadow: 0px 0px 20px 5px rgba(0,0,0,0.15);
    }
    /*.compare .before{*/
    /*    position: relative;*/
    /*    top: 0px;*/
    /*    width: 100%;*/
    /*    height: 100%;*/
    /*    background: url("https://i.picsum.photos/id/1022/6000/3376.jpg?hmac=FBA9Qbec8NfDlxj8xLhV9k3DQEKEc-3zxkQM-hmfcy0");*/
    /*}*/

    /*.compare .before .after{*/
    /*    position: absolute;*/
    /*    top: 0px;*/
    /*    left: 0px;*/
    /*    width: 320px;*/
    /*    height: 300px;*/
    /*    background: url("https://i.picsum.photos/id/1021/2048/1206.jpg?hmac=fqT2NWHx783Pily1V_39ug_GFH1A4GlbmOMu8NWB3Ts");*/
    /*    z-index: 2;*/
    /*}*/
    .compare input{
        position: absolute;
        top: 0px;
        left: 0px;
        -webkit-appearance: none;
        z-index: 3;
        width: 100%;
        height: 100%;
        background: transparent;
    }
    .compare input::-webkit-slider-thumb{
        -webkit-appearance: none;
        display: block;
        width: 10px;
        height: 220px;
        border: 1px solid #f5f5f5;
        background: #5b83dc;
        cursor: pointer;
    }

    .compare input::-webkit-slider-thumb:active{
        background: #e25a5a;
        border: 1px solid #e25a5a;
        transition: all 300ms ease-in-out;
    }
</style>
@php $sl=0 @endphp
@foreach($services as $service)
    @php $sl++ @endphp
<script>
    document.querySelector(".compare_{{$sl}} #compare-id_{{ $sl }}").addEventListener("input", function (e){
            document.querySelector(".compare_{{ $sl }} .before .after")
                .style.width = (+e.target.value) + "%";
    });
</script>
@endforeach
