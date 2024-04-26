@extends('layout.main')

@section('title'){{ $page->title }}@endsection
@section('description'){{ $page->description }}@endsection
@section('pageId'){{ $page->id }}@endsection


@section('content')
    @if($translates['showWarning'])
        <section class="section-top-70 section-bottom-70">
            <div class="shell">
                {!! $translates['warning'] !!}
                <hr class="hr-gray offset-top-50">
            </div>
        </section>
    @endif

    {!! $page->content !!}

    @include('main_page.our_menu')
    @include('main_page.interior')

@endsection
