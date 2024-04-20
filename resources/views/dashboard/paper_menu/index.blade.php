@extends('layout.dashboard')

@section('content')

    <div>
        <h5>Страницы сайта</h5>
        <div class="mt-4">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Тип меню</th>
                    <th scope="col">Язык меню</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <th scope="row">
                            {{ $item->id }}
                        </th>
                        <td>
                            {{ $item->title }}
                        </td>
                        <td>
                            {{ $item->locale }}
                        </td>
                        <td>
                            <a
                                href="{{ route('paper_menu.edit', $item->id) }}"
                                class="btn btn-outline-primary btn-sm"
                            >
                                Редактировать
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
