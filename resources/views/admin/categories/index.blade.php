@extends('layouts/admin')
@section('title') Список категорий - @parent @stop
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Категории</h1>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary" style="float: right;">Добавить
                категорию</a>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Список Категорий</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Список Категорий
                </div>
                <div class="card-body">
                    @include('inc.message')
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Название</th>
                                <th>Описание</th>
                                <th>Цвет</th>
                                <th>Кол-во новостей в категории</th>
                                <th>Дата добавления</th>
                                <th>Управление</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categoryList as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ $category->color }}</td>
                                    <td>{{ optional($category->news)->count() }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}"
                                            style='font-size:12px'>ред.</a>

                                        &nbsp;
                                        <a href="javascript:;" class="delete" rel="{{ $category->id }}"
                                            style='font-size:12px;color:red'>уд.</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td collspan=5>Записей не найдено</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        $(function() {
            $(".delete").on("click", function() {
                if (confirm("Подтверждаете удаление?")) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "DELETE",
                        url: "/admin/categories/" + $(this).attr("rel"),
                        complete: function($data, $msg) {
                            alert('Запись удалена');
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>

@endpush
@start
