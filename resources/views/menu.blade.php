@extends('layout.main')


@section('title')
    {{ $page->title }}
@endsection
@section('description')
    {{ $page->description }}
@endsection
@section('pageId')
    {{ $page->id }}
@endsection



@section('content')
    @php
        $time = \Carbon\Carbon::now();
        $morning = \Carbon\Carbon::create($time->year, $time->month, $time->day, 10, 0, 0); //set time to 08:00
        $evening = \Carbon\Carbon::create($time->year, $time->month, $time->day, 21, 30, 0); //set time to 21:30
    @endphp

    <section class="context-dark" style="background-color: #000000">
    <div class="shell" style="padding-top: 30px">
        <div class="panel-group menu_all" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="range">
                @foreach($cats as $cat)
                    @if($cat->show == 1)
                        <div class="cell-sm-12">
                    <div class="" role="tab" id="heading-{{$cat->id}}">
                        <h2 class="">
                            <a role="button" data-toggle="collapse" href="#collapse-{{$cat->id}}" aria-expanded="true" aria-controls="collapse-{{$cat->id}}">
                                {{$cat->title}}
                            </a>
                        </h2>
                    </div>
                    <div id="collapse-{{$cat->id}}" style="padding-top: 30px; padding-bottom: 30px;" class="panel-collapse collapse pt-2 pb-4" role="tabpanel" aria-labelledby="heading-{{$cat->id}}">
                        <div class="range">
                            @foreach($cat->goods as $good)

                                @if($good->show == 1)
                                    <div class="cell-sm-6 cell-md-4 item_holder" style="margin-bottom: 50px;">
                                    <div class="image_holder">
{{--                                        <img class="image 2" src="{{asset('storage/'.$good->picture)}}">--}}
                                        @if(isset($good->images[0]->path))
                                            <img class="image 2" src="{{asset('storage/'.$good->images[0]->path)}}">
                                        @endif
                                    </div>
                                    <h4>{{ $good->title }}</h4>
                                    <p class="description">
                                    </p>

                                    @foreach($good->goodsItems as $goodItem)
                                            @php
                                                $title = '';
                                                if($good->title == $goodItem->title){
                                                    $title = $good->title;
                                                }else{
                                                    $title = $good->title . ' ' . $goodItem->title;
                                                }
                                            @endphp
                                            @if($goodItem->show == 1)
                                                <div class="price_weight text_left" style="display: flex; justify-content: space-between; align-items: center;">
                                                    <span style="font-size: 12px; text-align: left;padding-right: 20px; text-transform: uppercase;">
                                                        {{ $goodItem->title }} {{ $goodItem->weight }} {{ $goodItem->weightKind }}
                                                    </span>
                                                @if($catalog_settings->is_online_order && $time->between($morning, $evening, true))
                                                    <span
                                                        onclick="addToCart({{ $goodItem->id }}, {{ $goodItem->price }}, '{{ $title }} {{ $goodItem->weight }} {{ $goodItem->weightKind }}')"
                                                        class="price"
                                                        style="font-weight: 700"
                                                    >
                                                        {{ $goodItem->price }}
                                                        <svg style="fill: #fff; width: 20px; height: 20px; margin-left: 10px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20h44v44c0 11 9 20 20 20s20-9 20-20V180h44c11 0 20-9 20-20s-9-20-20-20H356V96c0-11-9-20-20-20s-20 9-20 20v44H272c-11 0-20 9-20 20z"/></svg>
                                                    </span>
                                                @else
                                                    <span
                                                        class="price"
                                                        style="font-weight: 700"
                                                    >
                                                    {{ $goodItem->price }}
                                                </span>
                                                @endif
                                                </div>

                                                @if($goodItem->desc)
                                                    <span style="font-size: 12px; margin-top: -18px; display: block">
                                                        / {{$goodItem->desc}} /
                                                    </span>
                                                @endif
                                            @endif
                                    @endforeach
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <br>
{{--    <section class="section-top-50 section-bottom-83 section-sm-top-70 section-sm-bottom-83 text-center text-sm-left">--}}
{{--        <div class="col-xs-12 section-bottom-34 clearfix">--}}
{{--            <div class="row">--}}
{{--                @foreach($paper_menu->photos as $pmenu)--}}
{{--                    <div class="menudiv col-lg-3 col-md-4 col-sm-6 col-xs-12">--}}
{{--                            <span class="zoom" id="ex{{ $loop->index + 1 }}"--}}
{{--                                  style="position: relative; overflow: hidden;">--}}
{{--                                <img src="{{asset('storage/'.$pmenu->path)}}" width="100%" alt="">--}}
{{--                            <img role="presentation" src="{{asset('storage/'.$pmenu->path)}}" class="zoomImg"--}}
{{--                                 style="position: absolute; top: -128.095px; left: -152.937px; opacity: 0; width: 636px; height: 1026px; border: none; max-width: none; max-height: none;"></span>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <style>

        .price_weight {
            max-width: 80%;
            margin: 0 auto 12px;
        }

        @media (max-width: 992px) {
            .price_weight {
                margin: 0 auto 20px;
            }
        }

        .price {
            display: flex;
            align-items: center;
            cursor: pointer;
            opacity: 1;
            transition: opacity 0.25s ease-in-out;
        }

        .price:hover {
            opacity: 0.7;
            transition: opacity 0.25s ease-in-out;
        }

        .price .fa-icon {
            margin-left: 10px;
            color: #e0ca8f;
            width: 36px;
            height: 21px;
        }

        .image_holder img {
            max-width: 250px;
        }
    </style>
</section>
@endsection
