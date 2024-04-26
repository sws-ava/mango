@extends('layout.main')


@section('title'){{ $page->title }}@endsection
@section('description'){{ $page->description }}@endsection
@section('pageId'){{ $page->id }}@endsection

@section('content')

    <section class="text-center section-50 section-sm-115">
        <div class="shell">
            <div
                data-isotope-layout="masonry"
                data-isotope-group="gallery"
                data-photo-swipe-gallery="gallery"
                class="isotope masonry-gallery range isotope--loaded isotope--loaded"
            >
                @foreach($images as $item)
                    <div class="isotope-item cell-xs-6 cell-sm-6 cell-md-3">
                        <div class="thumbnail-gallery">
                            <a href="{{asset('storage/'.$item->path_lg)}}" data-photo-swipe-item="" data-size="800x534">
                                <img src="{{asset('storage/'.$item->path)}}" alt="">
                                <span class="overlay"></span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <hr class="hr-sealine-gray offset-top-45">
        <hr class="hr-gray offset-top-45">
    </section>



@endsection
