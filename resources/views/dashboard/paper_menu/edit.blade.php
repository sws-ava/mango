@extends('layout.dashboard')

@section('content')
    <div>
        <h5 class="mb-3">{{ $item->title }}</h5>

        <form
            method="POST"
            action="{{ route('paper_menu.update_menu_locale', $item->id) }}"
        >
            @csrf
            <div class="d-flex align-items-end">
                <div class="form-group">
                    <small class="form-text text-muted">Показывать меню {{ $item->default_locale }} из другого языка </small>
                    <select
                        name="locale"
                        required
                        class="form-control"
                    >
                        <option value="">Выбрать язык меню для показа</option>
                        @foreach($list as $list_item)
                            <option
                                @if($item->locale === $list_item->default_locale) selected @endif
                                value="{{$list_item->default_locale}}"
                            >
                                {{ $list_item->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group ml-2">
                    <small class="form-text text-muted"></small>
                    <button
                        type="submit"
                        class="btn btn-sm btn-success"
                    >
                        @lang('admin.buttons.save')

                    </button>
                </div>
            </div>
        </form>
        <form
            method="POST"
            enctype="multipart/form-data"
            action="{{ route('paper_menu_item.store') }}"
            class="d-flex align-items-center"
        >
            @csrf
            <input value="{{ $item->id }}" name="id" type="hidden">
            <input value="{{ $item->default_locale }}" name="default_locale" type="hidden">
            <div class="form-group">
                <label>Добавить фото</label>
                <input
                    name="files[]"
                    accept="image/*"
                    type="file"
                    class="form-control-file"
                    multiple="multiple"
                    required
                >
            </div>
            <button type="submit">Добавить фото</button>
        </form>
        <div class="row">
            @foreach($item->photos as $photo)
            <div class="col-lg-3 " style="margin-bottom: 100px">
                <div  class="block-holder  mb-2">
                    <label for="photo_{{$photo->id}}" class="image-holder">
                        <img src="{{asset('storage/'.$photo->path)}}">
                    </label>
                </div>

                <form
                    method="POST"
                    enctype="multipart/form-data"
                    action="{{ route('paper_menu_item.update_single_menu_item') }}"
                    class="d-flex align-items-center"
                >
                    @csrf
                    <div class="form-group">
                        <input value="{{$photo->id}}" name="id" type="hidden">
                        <input value="{{$photo->order}}" name="order" type="hidden">
                        <input
                            id="photo_{{$photo->id}}"
                            name="file"
                            accept="image/*"
                            type="file"
                            class="form-control-file"
                            required
                            style="width: 1px; height: 1px;"
                        >
                    </div>
                    <button class="m-auto" type="submit">Заменить фото</button>
                </form>
                <div class="arrows">
                    @if($loop->index !==0 )
                        <a
                            href="{{route('paper.left',$photo->order )}}"
                            class="fa-icon-holder"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                        </a>
                    @endif
                    <a
                        href="{{route('paper_menu_item.destroy',$photo->id )}}"
                        @click="showDelModal(photo)"
                        class="fa-icon-holder"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                    </a>
                    @if(!$loop->last)
                        <a
                            href="{{route('paper.right',$photo->order )}}"
                            v-if="index !== photos.length - 1"
                            class="fa-icon-holder"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                        </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        @if($item->photos && count($item->photos) > 0)
            <div class="d-flex justify-content-start col-12">
                <div class="form-group mt-2">
                    <a
                        href="{{route('paper_menu_item.destroy_all', $item->id)}}"
                        v-if="index !== photos.length - 1"
                        class="btn btn-sm btn-danger"
                        style="color: #fff!important;"
                    >
                        Удалить все фото
                    </a>
                </div>
            </div>
        @endif
    </div>
    <style>
        .block-holder {
            position: relative;
            width: 100%;
            padding-top: 100%;
        }
        .image-holder {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            font-size: 14px;
            display: flex;
        }
        .image-holder img {
            width: 100%;
            height: auto;
            object-fit: contain;
            cursor: pointer;
        }
        .arrows {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
        }
        .arrows span {
            cursor: pointer;
        }
        .fa-icon-holder + .fa-icon-holder {
            margin-left: 50px;
        }

    </style>
@endsection
