@extends('layout.main')


@section('title'){{ $page->title }}@endsection
@section('description'){{ $page->description }}@endsection
@section('pageId'){{ $page->id }}@endsection


@section('content')
    {!! $page->content !!}
@endsection
