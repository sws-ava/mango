@extends('layout.dashboard')

@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb-my">
                <li class="breadcrumb-item">
                    <a href="/dashboard/">
                        Главная
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route('menu.show')}}">
                        Меню
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Категория "{{$cat->title_ru}}"</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-12 mb-4">
                <a
                    href="{{route('menu.show')}}"
                >
                    Назад
                </a>
            </div>
            <div class="col-12 mb-2">
                <h5 class="mb-3">
                    Категория "{{$cat->title_ru}}"
                    <a
                        class="ml-4"
                        href="{{ route('category.edit', $cat->id) }}"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg"  height="16" width="12" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                    </a>
                </h5>
            </div>
        </div>
        <form
            method="POST"
            action="{{route('category.update_prices_in_cat')}}"
        >
            @csrf
            <div class="row">
            <div class="col-12">
                <table class="table">
                    <tbody>
                    @foreach($cat->goods as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td class="w-100">
                                {{$item->title_ru}}
                                <div class="subItemsHolder mt-2">
                                    @foreach($item->goodsItems as $subitem)

                                    <div class="subItemsHolderFlex">
                                        <div class="price-holder mb-1">
                                            <div class="subItemHandler">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <small class="form-text text-muted w-100 ">
                                                            {{$subitem->title_ru}} {{$subitem->weight}} {{$subitem->weightKind}}
                                                        </small>
                                                    </div>
                                                    <div class="col-3">
                                                        <input name="goodsItems[{{$subitem->id}}][id]" type="hidden" value="{{$subitem->id}}">
                                                        <input
                                                            name="goodsItems[{{$subitem->id}}][price]"
                                                            value="{{$subitem->price}}"
                                                            type="text"
                                                            class="w-100 form-control priceInput"
                                                        >
                                                    </div>
{{--                                                    <div class="col-3 d-flex align-items-center">--}}
{{--                                                        <div class="ml-2">--}}
{{--                                                            @if($subitem->show === 0)--}}
{{--    --}}{{--                                                        <a href="{{route('category.show_category', [$cat->id, 1])}}">--}}
{{--                                                                <a href="#" title="Показать категорию">--}}
{{--                                                                    <svg style="fill: red" xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/></svg>--}}
{{--                                                                </a>--}}
{{--                                                                @elseif($subitem->show === 1)--}}
{{--                                                                <a href="#" title="Скрыть категорию">--}}
{{--    --}}{{--                                                        <a href="{{route('category.show_category', [$cat->id, 1])}}">--}}
{{--                                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>--}}
{{--                                                                </a>--}}
{{--                                                                <style>--}}
{{--                                                                    a:hover{--}}
{{--                                                                        text-decoration: none;--}}
{{--                                                                    }--}}
{{--                                                                    a:hover svg{--}}
{{--                                                                        scale: 1.1;--}}
{{--                                                                    }--}}
{{--                                                                </style>--}}
{{--                                                            @endif--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                            </td>
                            <td class="btns-holder">
                                <div class="d-flex justify-content-between mb-2" style="gap:10px;">
                                    <a
                                        href="{{route('goods.edit', $item->id)}}"
                                        class="btn btn-outline-primary btn-sm"
                                        style="white-space: nowrap;"
                                    >
                                        Редактировать блюдо
                                    </a>
{{--                                    @if($item->show === 1)--}}
{{--                                        <div class="btn btn-outline-secondary btn-sm" >--}}
{{--                                            Скрыть--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                    @if($item->show === 0)--}}
{{--                                    <div class="btn btn-outline-secondary btn-sm" >--}}
{{--                                        Показать--}}
{{--                                    </div>--}}
{{--                                    @endif--}}
                                </div>
                                <div class="upDownHolder">
                                    @if(!$loop->last)
                                        <span class="fa-icon-holder mr-2 ml-2" title="Изменить порядок вывода (вниз)">
                                            <a href="{{ route('goods.order_bottom', [$cat->id, $item->order]) }}" class="fa-icon-holder mr-4" >
                                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>
                                            </a>
                                        </span>
                                    @endif

                                    @if($loop->index !== 0)
                                        <span class="fa-icon-holder ml-2 mr-2" title="Изменить порядок вывода (вверх)">
                                            <a href="{{ route('goods.order_top', [$cat->id, $item->order]) }}" class="fa-icon-holder" >
                                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"/></svg>
                                            </a>
							            </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            <div class="form-group mt-2">
                <button
                    type="submit"
                    class="btn btn-sm btn-success"
                >
                    Сохранить цены

                </button>
            </div>
        </form>
    </div>

@endsection
