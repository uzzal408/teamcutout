<div>
    <div class="wrapper">
        <div class="wrapper_inner">
            @include('frontend/include/nav')
            <a id="back_to_top" href="#">
            <span class="fa-stack">
                <i class="qode_icon_font_awesome fa fa-arrow-up"></i>
            </span>
            </a>
            <div class="content content_top_margin">
                <div class="content_inner">
                    <div class="container" style='background-color:#ffffff'>
                        <div class="container_inner default_template_holder clearfix page_container_inner" >
                            @include('frontend/include/home')
                            @include('frontend/include/about')
                            @include('frontend/include/services')
{{--                            @include('frontend/include/portfolio')--}}
                            @include('frontend/include/packageo')
                            @include('frontend/include/packagee')
                            @include('frontend/include/payment')
{{--                            @include('frontend/include/contacta')--}}
                            @include('frontend/include/contactb')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
