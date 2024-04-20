@extends('layout.dashboard')

@section('content')
    <div>
        <h5 class="mb-3">Категория</h5>
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
                <li class="breadcrumb-item active" aria-current="page">Создать блюдо</li>
            </ol>
        </nav>

        <form method="POST" action="{{route('goods.store')}}">
            @csrf
            <div class="row">
                <div class="form-group col-lg-7">
                    <small class="form-text text-muted">Выбрать категорию</small>
                    <select
                        name="category"
                        required
                        class="form-control"
                    >
                        <option value="">Выбрать категорию</option>
                        @foreach($cats as $cat)
                            <option value="{{$cat->id}}">{{ $cat->title_ru }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <hr>
                </div>
                @foreach(LaravelLocalization::getSupportedLocales() as $locale => $value)
                    <div class="form-group col-lg-6">
                        <small  class="form-text text-muted">Название блюда <b>{{ $locale }}</b></small>
                        <input
                            name="title_{{ $locale }}"
                            value=""
                            type="text"
                            class="form-control"
                            required
                        >
                    </div>
                @endforeach
                <div class="col-12">
                    <hr>
                </div>
                @foreach(LaravelLocalization::getSupportedLocales() as $locale => $value)
                    <div class="form-group col-lg-6">
                        <small  class="form-text text-muted">Описание блюда <b>{{ $locale }}</b></small>
                        <input
                            name="desc_{{ $locale }}"
                            value=""
                            type="text"
                            class="form-control"
                        >
                    </div>
                @endforeach
                <div class="d-flex justify-content-between col-12 mt-4">
                    <div class="form-group mt-2">
                        <button
                            type="submit"
                            class="btn btn-sm btn-success"
                        >
                            Сохранить

                        </button>
                    </div>
                    <div class="form-group mt-2">
                        <a
                            href="{{route('menu.show')}}"
                            @click="backToCategories()"
                            class="btn btn-sm btn-secondary"
                        >
                            Назад

                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
