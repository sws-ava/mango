    <header class="page-head section-top-15 section-lg-top-0">
        <!-- RD Navbar-->
        <div
            class="rd-navbar-wrap rd-navbar-variant-1"
        >
            <nav class="rd-navbar rd-navbar-original "
                 data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fullwidth" data-md-layout="rd-navbar-fullwidth"
                 data-lg-layout="rd-navbar-fullwidth" data-device-layout="rd-navbar-fixed" data-sm-device-layout="rd-navbar-fixed"
                 data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fullwidth" data-lg-stick-up-offset="207px">



                <button
                    data-rd-navbar-toggle=".rd-navbar-top-panel" type="submit" class="rd-navbar-collapse-toggle"><span></span></button>
                <div
                    ref="subMenuHolder"
                    class="rd-navbar-top-panel toggle-original-elements">
                    <div class="rd-navbar-top-panel-inner">
                        <div class="rd-navbar-address">
                            <div class="unit unit-horizontal unit-spacing-xs" style="align-items: center">
                                <div class="unit-left"><span class="icon icon-xxs mdi mdi-map-marker"></span></div>
                                <div class="unit-body"><a href="#" class="text-base">{{ $translates['address']}}</a></div>

                                <div class="unit-left">
                                    <a target="_blank" style="padding-left: 2em;" href="https://www.facebook.com/krabisushicafe/">
                                        <span class="icon icon-sm mdi mdi-facebook"></span>
                                    </a>
                                    <a target="_blank" style="padding-left: 2em;" href="https://www.instagram.com/krabicafe/">
                                        <span class="icon icon-sm mdi mdi-instagram"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="localesHolder">
                            <a href="{{ LaravelLocalization::getLocalizedURL('bg') }}">BG</a>
                            <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">EN</a>
                            <a href="{{ LaravelLocalization::getLocalizedURL('ua') }}">UA</a>
                            <a href="{{ LaravelLocalization::getLocalizedURL('ru') }}">RU</a>
                        </div>
                        <div class="rd-navbar-address" style="align-items: center">
                            <div class="unit unit-horizontal unit-spacing-xs">
                                <div class="unit-left"><span class="icon icon-xxs mdi mdi-phone"></span></div>
                                <div class="unit-body">
                                    <a
                                        href="tel:{{ $translates['phone1full']}}"
                                        class="text-base"
                                        style="display: block;"
                                    >
                                        {{ $translates['phone1']}}
                                    </a>
                                </div>
                            </div>
                            <div class="unit unit-horizontal unit-spacing-xs">
                                <div class="unit-left"><span class="icon icon-xxs mdi mdi-clock"></span></div>
                                <div class="unit-body">
                                    <time datetime="2016">{{ $translates['workHours']}}</time>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rd-navbar-main-panel">
                    <div class="rd-navbar-inner">
                        <!-- RD Navbar Panel-->
                        <div class="rd-navbar-panel">
                            <!-- RD Navbar Toggle-->
                            <button
                                data-rd-navbar-toggle=".rd-navbar-nav-wrap" type="submit" class="rd-navbar-toggle toggle-original"><span></span></button>
                            <!-- Little logo-->
                            <a
                                href="{{ LaravelLocalization::localizeUrl('/') }}"
                                class="little-logo"
                            >
							<span>
								<img src="{{asset('/images/logo-mini.png')}}">
							</span>
                            </a>

                            <!-- RD Navbar Brand-->
                            <div class="rd-navbar-brand">

                                <a
                                    href="{{ LaravelLocalization::localizeUrl('/') }}"
                                    class="brand-name"
                                >
                                    <span title="Кафе Манго, кафе mango, суши манго, sushi mango" alt="Кафе Манго, кафе mango, суши манго, sushi mango" >Sushi Mango</span>
                                    <span>Thai & Japanese Cafe</span>
                                    <div class="rd-navbar-address"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="rd-navbar-nav-inner justify-around display-flex align-center">
                        <div
                            ref="menuHolder"
                            class="rd-navbar-nav-wrap">
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
                                        href="{{ LaravelLocalization::localizeUrl('/concept') }}"
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
                                        href="{{ LaravelLocalization::localizeUrl('/promotions') }}"
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
                                        href="{{ LaravelLocalization::localizeUrl('/contacts') }}"
                                    >
                                        @lang('navigation.contacts')
                                    </a>
                                </li>
                            </ul>
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
