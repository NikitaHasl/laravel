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
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Название</th>
                                <th>Описание</th>
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
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}"
                                            style='font-size:12px'>ред.</a>

                                        &nbsp;
                                        <a href="#" style='font-size:12px;color:red'>уд.</a>
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
@start
