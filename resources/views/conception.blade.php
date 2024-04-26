@extends('layout.main')


@section('title'){{ $page->title }}@endsection
@section('description'){{ $page->description }}@endsection


@section('content')
    {!! $page->content !!}
@endsection
