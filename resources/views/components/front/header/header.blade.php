<!-- Page Head-->
<header class="page-head slider-menu-position">
    <!-- RD Navbar Transparent-->
    <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-default rd-navbar-transparent" data-auto-height="true" data-md-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-lg-stick-up="true">
            <div class="rd-navbar-inner">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel" style="height: 50px; float: left;">
                    <!-- RD Navbar Toggle-->
                    <button data-rd-navbar-toggle=".rd-navbar, .rd-navbar-nav-wrap" class="rd-navbar-toggle"><span></span></button>
                    <!--Navbar Brand-->
                    <div class="rd-navbar-brand">
                        <a href="{{ LaravelLocalization::localizeUrl('/') }}">
                            <img
                                style='margin-top: -8px;margin-left: -15px;' width='138' height=''
                                src="{{asset('logo.png')}}"
                                alt="{{ env('APP_NAME', '') }}"
                            />
                        </a>
                    </div>
                </div>
                <div class="rd-navbar-menu-wrap">
                    <div class="rd-navbar-nav-wrap">
                        <div class="rd-navbar-mobile-scroll">
                            <!-- RD Navbar Nav-->
                            <ul class="rd-navbar-nav">
                                <li>
                                    <a
                                        href="{{ LaravelLocalization::localizeUrl('/menu') }}"
                                    >
                                        @lang('navigation.menu')
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="{{ LaravelLocalization::localizeUrl('/conception') }}"
                                    >
                                        @lang('navigation.concept')
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="{{ LaravelLocalization::localizeUrl('/interior') }}"
                                    >
                                        @lang('navigation.interior')
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="{{ LaravelLocalization::localizeUrl('/delivery') }}"
                                    >
                                        @lang('navigation.delivery')
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="{{ LaravelLocalization::localizeUrl('/news') }}"
                                    >
                                        @lang('navigation.news')
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="{{ LaravelLocalization::localizeUrl('/aktsii') }}"
                                    >
                                        @lang('navigation.sale')
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="{{ LaravelLocalization::localizeUrl('/gallery') }}"
                                    >
                                        @lang('navigation.gallery')
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="{{ LaravelLocalization::localizeUrl('/contact') }}"
                                    >
                                        @lang('navigation.contacts')
                                    </a>
                                </li>
                                <li class="langs_holder">
                                    <a href="{{ LaravelLocalization::getLocalizedURL('ua') }}">UA</a>
                                    <span style="margin: 0 5px; color:#fff;">|</span>
                                    <a href="{{ LaravelLocalization::getLocalizedURL('ru') }}">RU</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>

<style>
    .localesHolder {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 6px;
        margin: 20px;
    }
    .localesHolder a {
        margin-left: 15px;
        margin-right: 15px;
    }
    /*.localesHolder a + a {*/
    /*    margin-left: 30px;*/
    /*}*/
</style>
