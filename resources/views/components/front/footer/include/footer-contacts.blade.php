<section id="titlelink" class="bg-gray-darkest">
    <div class="context-dark">
        <!-- RD Parallax-->
        <div data-on="false" data-md-on="true" class="rd-parallax">
            <div data-speed="0.35" data-type="media" data-url="{{asset('images/image-03-1920x1018.jpg')}}"
                 class="rd-parallax-layer"></div>
            <div data-speed="0" data-type="html" class="rd-parallax-layer">
                <div id="contact" class="shell section-98 section-110">
                    <h1><span class="reveal-block font-accent big">
                            @lang('navigation.contacts')
                        </span>
                        <span class="reveal-block offset-top-4 h4 text-light text-uppercase">
                            @lang('static.howFindUs')
                        </span>
                    </h1>
                    <hr class="divider bg-mantis offset-top-30">
                    <div class="range offset-top-66">
                        <div class="cell-md-8 cell-lg-6">
                            <div class="inset-lg-right-20">
                                <!-- Post Event-->
                                <article class="post post-classic">
                                    <!-- Post media-->
                                    <header class="post-media">
                                        <div data-photo-swipe="gallery"><a class="thumbnail-classic">
                                                <figure>
                                                    <img
                                                        width="553" height="320"
                                                        src="{{asset('images/post-01-553x320.jpg')}}"
                                                        alt=""
                                                    />
                                                </figure>
                                            </a>
                                        </div>
                                    </header>
                                </article>
                            </div>
                        </div>
                        <div class="cell-md-8 cell-lg-6 offset-top-41 offset-lg-top-0">
                            <div class="inset-lg-left-20">
                                <hr class="hr bg-gray-darker">
                                <!-- Post Event-->
                                <article class="post post-classic">
                                    <!-- Post media-->
                                    <!-- Post content-->
                                    <h3 class="font-accent"><span class="big"><span
                                                style="font-size: 1.5em;">Mango</span><br>Japanese & Thai cafe</span>
                                    </h3>
                                    <div class="group">
                                        <div class="group-item reveal-block"><span
                                                class="icon icon-xxs mdi mdi-navigation text-middle"></span> <span
                                                class="text-middle">{{ $translates['address']}}</span>
                                        </div>
                                        <div class="group-item"><span
                                                class="icon icon-xxs mdi mdi-clock text-middle"></span> <span
                                                class="text-middle">{{ $translates['workHours']}}</span>
                                        </div>
                                        <br>
                                        <div class="group-item"><span
                                                class="icon icon-xxs mdi mdi-phone text-middle"></span> <span
                                                class="text-middle">
                                                <a href="tel:{{ $translates['phone1full']}}">{{ $translates['phone1']}}</a>, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="tel:{{ $translates['phone2full']}}">{{ $translates['phone2']}}</a></span>
                                        </div>
                                    </div>
                                </article>
                                <br>
                                <hr class="hr bg-gray-darker">
                                <!-- Post Event-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
