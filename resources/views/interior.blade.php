@extends('layout.main')


@section('title'){{ $page->title }}@endsection
@section('description'){{ $page->description }}@endsection
@section('pageId'){{ $page->id }}@endsection


@section('content')


    <section>
        <div class="shell-fluid section-bottom-34">
            <div class="isotope-wrap">
                <div class="row">
                    <!-- Isotope Content-->
                    <div class="col-xs-12">
                        <div data-isotope-layout="masonry" data-isotope-group="gallery" class="isotope">
                            <div data-photo-swipe-gallery class="row">
                                @foreach($images as $chunks)
                                    @foreach($chunks as $image)
                                        @if($loop->index + 1 === 1)
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 isotope-item">
                                                <a
                                                    class="thumbnail-classic"
                                                    data-photo-swipe-item=""
                                                    data-size="{{$image->width}}x{{$image->height}}"
                                                    href="{{asset('storage/'.$image->rows()->where('width', 1)->where('height', 1)->first()->path)}}"
                                                >
                                                    <figure>
                                                        <img width="285" height="285" src="{{asset('storage/'.$image->rows()->where('width', 460)->where('height', 460)->first()->path)}}" alt=""/>
                                                    </figure>
                                                </a>
                                            </div>
                                        @elseif($loop->index + 1 === 2)
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 isotope-item">
                                                <a
                                                    class="thumbnail-classic"
                                                    data-photo-swipe-item=""
                                                    data-size="{{$image->width}}x{{$image->height}}"
                                                    href="{{asset('storage/'.$image->rows()->where('width', 1)->where('height', 1)->first()->path)}}"
                                                >
                                                    <figure>
                                                        <img width="285" height="285" src="{{asset('storage/'.$image->rows()->where('width', 460)->where('height', 460)->first()->path)}}" alt=""/>
                                                    </figure>
                                                </a>
                                            </div>
                                        @elseif($loop->index + 1 === 3)
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 isotope-item">
                                                <a
                                                    class="thumbnail-classic"
                                                    data-photo-swipe-item=""
                                                    data-size="{{$image->width}}x{{$image->height}}"
                                                    href="{{asset('storage/'.$image->rows()->where('width', 1)->where('height', 1)->first()->path)}}"
                                                >
                                                    <figure>
                                                        <img width="285" height="285" src="{{asset('storage/'.$image->rows()->where('width', 456)->where('height', 336)->first()->path)}}" alt=""/>
                                                    </figure>
                                                </a>
                                            </div>
                                        @elseif($loop->index + 1 === 4)
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 isotope-item">
                                                <a
                                                    class="thumbnail-classic"
                                                    data-photo-swipe-item=""
                                                    data-size="{{$image->width}}x{{$image->height}}"
                                                    href="{{asset('storage/'.$image->rows()->where('width', 1)->where('height', 1)->first()->path)}}"
                                                >
                                                    <figure>
                                                        <img width="600" height="600" src="{{asset('storage/'.$image->rows()->where('width', 460)->where('height', 460)->first()->path)}}" alt=""/>
                                                    </figure>
                                                </a>
                                            </div>
                                        @elseif($loop->index + 1 === 5)
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 isotope-item">
                                                <a
                                                    class="thumbnail-classic"
                                                    data-photo-swipe-item=""
                                                    data-size="{{$image->width}}x{{$image->height}}"
                                                    href="{{asset('storage/'.$image->rows()->where('width', 1)->where('height', 1)->first()->path)}}"
                                                >
                                                    <figure>
                                                        <img width="600" height="600" src="{{asset('storage/'.$image->rows()->where('width', 460)->where('height', 460)->first()->path)}}" alt=""/>
                                                    </figure>
                                                </a>
                                            </div>
                                        @elseif($loop->index + 1 === 6)
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 isotope-item">
                                                <a
                                                    class="thumbnail-classic"
                                                    data-photo-swipe-item=""
                                                    data-size="{{$image->width}}x{{$image->height}}"
                                                    href="{{asset('storage/'.$image->rows()->where('width', 1)->where('height', 1)->first()->path)}}"
                                                >
                                                    <figure>
                                                        <img width="285" height="443" src="{{asset('storage/'.$image->rows()->where('width', 426)->where('height', 662)->first()->path)}}" alt=""/>
                                                    </figure>
                                                </a>
                                            </div>
                                        @elseif($loop->index + 1 === 7)
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 isotope-item">
                                                <a
                                                    class="thumbnail-classic"
                                                    data-photo-swipe-item=""
                                                    data-size="{{$image->width}}x{{$image->height}}"
                                                    href="{{asset('storage/'.$image->rows()->where('width', 1)->where('height', 1)->first()->path)}}"
                                                >
                                                    <figure>
                                                        <img width="285" height="443" src="{{asset('storage/'.$image->rows()->where('width', 426)->where('height', 662)->first()->path)}}" alt=""/>
                                                    </figure>
                                                </a>
                                            </div>
                                        @elseif($loop->index + 1 === 8)
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 isotope-item">
                                                <a
                                                    class="thumbnail-classic"
                                                    data-photo-swipe-item=""
                                                    data-size="{{$image->width}}x{{$image->height}}"
                                                    href="{{asset('storage/'.$image->rows()->where('width', 1)->where('height', 1)->first()->path)}}"
                                                >
                                                    <figure>
                                                        <img width="285" height="285" src="{{asset('storage/'.$image->rows()->where('width', 460)->where('height', 460)->first()->path)}}" alt=""/>
                                                    </figure>
                                                </a>
                                            </div>
                                        @elseif($loop->index + 1 === 9)
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 isotope-item">
                                                <a
                                                    class="thumbnail-classic"
                                                    data-photo-swipe-item=""
                                                    data-size="{{$image->width}}x{{$image->height}}"
                                                    href="{{asset('storage/'.$image->rows()->where('width', 1)->where('height', 1)->first()->path)}}"
                                                >
                                                    <figure>
                                                        <img width="285" height="285" src="{{asset('storage/'.$image->rows()->where('width', 460)->where('height', 460)->first()->path)}}" alt=""/>
                                                    </figure>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
