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
                <li class="breadcrumb-item">
                    <a href="{{route('category.index')}}">
                        Категории меню
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Создать категорию</li>
            </ol>
        </nav>

        <form method="POST" action="{{route('category.store')}}">
            @csrf
            <div class="row">
                @foreach(LaravelLocalization::getSupportedLocales() as $locale => $value)
                    <div class="form-group col-lg-7">
                        <small  class="form-text text-muted">Название категории <b>{{ $locale }}</b></small>
                        <input
                            name="title_{{ $locale }}"
                            value=""
                            type="text"
                            class="form-control"
                            required
                        >
                    </div>
                @endforeach

                <div class="d-flex justify-content-between col-12">
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
                            href="{{route('category.index')}}"
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
