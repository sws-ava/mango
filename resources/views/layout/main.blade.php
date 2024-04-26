
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//RU">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title') | {{ env('APP_NAME', '') }}</title>
    <meta name="robots" content="{{ env('APP_INDEX', 'noindex, nofollow') }}">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('$keywords')">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Dancing+Script:700|Oswald:300,400,600,700,900">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}" type="text/css">
    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
</head>


<body>

    <div class="page text-center">
        @include('components.front.header.header')
        @include('components.front.header.include.cartBlock')

        <main class="page-content clearfix">
            <section class="context-dark">
                <div data-on="false" data-md-on="true" class="rd-parallax">
                    <div data-speed="0.45"
                         data-type="media"
                         data-url="
                         @if(isset($page->slug))
                            @if($page->slug == 'main')
                                {{asset('images/intro-01-1920x955.jpg')}}
                            @else
                                {{asset('images/preview/'.$page->slug.'.jpg')}}
                            @endif
                        @else
                            {{asset('images/intro-01-1920x955.jpg')}}
                        @endif

                        "
                         class="rd-parallax-layer">
                    </div>
                    <div data-speed="0.3" data-type="html" data-fade="true" class="rd-parallax-layer">
                        <div class="shell">
                            <div class="section-110 section-cover range range-xs-center range-xs-middle">
                                <div class="cell-md-8">
                                    <h1 class="font-accent">
                                        <span class="big">
                                            Cafe
                                            <span style="font-size: 1.6em;">Mango</span>
                                            Japanese &amp; Thai
                                        </span>
                                    </h1>
                                    <div class="group">
                                        <div class="group-item reveal-block"><span class="icon icon-xxs mdi mdi-navigation text-middle"></span>
                                            <span class="text-middle">
                                                <a href="#" data-custom-scroll-to="gmap">{{ $translates['address']}}</a>
                                            </span>
                                        </div>
                                        <div class="group-item">
                                            <span class="icon icon-xxs mdi mdi-clock text-middle"></span>
                                            <span class="text-middle">{{ $translates['workHours']}}</span>
                                        </div>
                                        <div class="group-item">
                                            <span class="icon icon-xxs mdi mdi-phone text-middle"></span>
                                            <span class="text-middle">
                                                <a href="tel:{{ $translates['phone1full']}}">{{ $translates['phone1']}}</a>, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="tel:{{ $translates['phone2full']}}">{{ $translates['phone2']}}</a>
                                            </span>
                                        </div>
                                    </div>
                                    <p class="offset-top-24 big reveal-sm-block">
                                        @lang('static.allPagesSubTitle')
                                    </p>
                                    @if(isset($page->id))
                                        <div class="group offset-top-50">
                                            <a href="#" data-custom-scroll-to="titlelink" class="btn btn-lg btn-primary">
                                                @if($page->id == 1)
                                                    @lang('static.moreAboutUs')
                                                @else
                                                    @yield('title')
                                                @endif
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @yield('content')

        </main>

        @include('components.front.footer.footer')


    </div>


<!-- Global Mailform Output-->
<div id="form-output-global" class="snackbars"></div>
<!-- PhotoSwipe Gallery-->
<div tabindex="-1" role="dialog" aria-hidden="true" class="pswp">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button title="Close (Esc)" class="pswp__button pswp__button--close"></button>
                <button title="Share" class="pswp__button pswp__button--share"></button>
                <button title="Toggle fullscreen" class="pswp__button pswp__button--fs"></button>
                <button title="Zoom in/out" class="pswp__button pswp__button--zoom"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>
            <button title="Previous (arrow left)" class="pswp__button pswp__button--arrow--left"></button>
            <button title="Next (arrow right)" class="pswp__button pswp__button--arrow--right"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__cent"></div>
            </div>
        </div>
    </div>
</div>
<!-- Java script-->
<script type="text/javascript" src="{{asset('/js/core.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/script.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/shop.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#phone").inputmask({"mask": "+38 (999) 999-99-99"});
    });
</script>

<script defer src="{{asset('/js/jquery.zoom.js')}}"></script>

<script>
    var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ? true : false;

    $(document).ready(function(){
        if(!isMobile) {
            $('#ex001').zoom();
            $('#ex002').zoom();
            $('#ex1').zoom();
            $('#ex2').zoom();
            $('#ex3').zoom();
            $('#ex4').zoom();
            $('#ex5').zoom();
            $('#ex6').zoom();
            $('#ex7').zoom();
            $('#ex8').zoom();
            $('#ex9').zoom();
            $('#ex10').zoom();
            $('#ex11').zoom();
            $('#ex12').zoom();
            $('#ex13').zoom();
            $('#ex14').zoom();
            $('#ex15').zoom();
            $('#ex16').zoom();
            $('#ex17').zoom();
            $('#ex18').zoom();
            $('#ex19').zoom();
            $('#ex20').zoom();
            $('#ex21').zoom();
            $('#ex22').zoom();
            $('#ex23').zoom();
            $('#ex24').zoom();
            $('#ex25').zoom();
            $('#ex26').zoom();
            $('#ex27').zoom();
            $('#ex28').zoom();
            $('#ex29').zoom();
        }
    });
</script>



</body>
</html>
