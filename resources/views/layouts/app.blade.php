<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/'.config('settings.site_favicon')) }}">
    <title>Team Cut Out Int.</title>
    <link rel='stylesheet' id='mxmtzc_font_awesome-css'  href='{{ asset('frontend/plugins/mx-time-zone-clocks/assets/font-awesome-4.6.3/css/font-awesome.min8fc0.css?ver=4.6.23') }}' type='text/css' media='all' />
    <link rel="stylesheet" href="{{ asset('frontend/carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/carousel/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/carousel/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/carousel/css/style.css') }}">
    <link rel='stylesheet' id='bridge-stylesheet-css'  href="{{ asset('frontend/themes/bridge/css/stylesheet.min8fc0.css?ver=4.6.23') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='bridge-responsive-css'  href={{ asset('frontend/themes/bridge/css/responsive.min8fc0.css?ver=4.6.23') }} type='text/css' media='all' />
    <link rel='stylesheet' id='bridge-style-dynamic-responsive-css'  href={{ asset('frontend/themes/bridge/css/style_dynamic_responsivee6f2.css?ver=1586272495') }} type='text/css' media='all' />
    <link rel='stylesheet' id='js_composer_front-css'  href={{ asset('frontend/plugins/js_composer/assets/css/js_composer.min9b2d.css?ver=6.1') }} type='text/css' media='all' />
    <script type='text/javascript' src="{{ asset('frontend/js/jquery/jqueryb8ff.js?ver=1.12.4') }}"></script>
<body class="home page page-id-294 page-template-default bridge-core-2.0.9  qode-title-hidden qode-theme-ver-19.6 qode-theme-bridge disabled_footer_top disabled_footer_bottom qode_header_in_grid wpb-js-composer js-comp-ver-6.1 vc_responsive">
    {{ $slot }}


<script type='text/javascript' src="{{ asset('frontend/themes/bridge/js/plugins/jquery.appear8fc0.js?ver=4.6.23') }}"></script>
<script type='text/javascript' src="{{ asset('frontend/themes/bridge/js/plugins/jquery.prettyPhoto8fc0.js?ver=4.6.23') }}"></script>
<script type='text/javascript' src="{{ asset('frontend/themes/bridge/js/default_dynamice6f2.js?ver=1586272495') }}"></script>
<script type='text/javascript' src="{{ asset('frontend/themes/bridge/js/default.min8fc0.js?ver=4.6.23') }}"></script>
<script src="{{ asset('frontend/carousel/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/carousel/js/popper.js') }}"></script>
<script src="{{ asset('frontend/carousel/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/carousel/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/carousel/js/main.js') }}"></script>
<script>
    $(document).ready(function(){
        var sectionIds = $('a.menu-item');
        $(document).scroll(function(){
            sectionIds.each(function(){

                var container = $(this).attr('href');
                var containerOffset = $(container).offset().top;
                var containerHeight = $(container).outerHeight();
                var containerBottom = containerOffset + containerHeight;
                var scrollPosition = $(document).scrollTop();

                if(scrollPosition < containerBottom - 50 && scrollPosition >= containerOffset - 50){
                    $(this).addClass('active');
                } else{
                    $(this).removeClass('active');
                }


            });
        });



    });
</script>
</body>

</html>
