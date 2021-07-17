@extends('layouts/admin')
@section('title') Список новостей - @parent @stop
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Новости</h1>
            <a href="{{ route('admin.news.create') }}" class="btn btn-primary" style="float: right;">Добавить новость</a>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Список Новостей</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Список Новостей
                </div>
                <div class="card-body">
                    @include('inc.message')
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Заголовок</th>
                                <th>Slug</th>
                                <th>Категория</th>
                                <th>Автор</th>
                                <th>Описание</th>
                                <th>Статус</th>
                                <th>Дата добавления</th>
                                <th>Управление</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($newsList as $news)
                                <tr>
                                    <td>{{ $news->id }}</td>
                                    <td>{{ $news->title }}</td>
                                    <td>{{ $news->slug }}</td>
                                    <td>{{ optional($news->category)->title }}</td>
                                    <td>{{ optional($news->user)->firstname }}</td>
                                    <td>{{ $news->description }}</td>
                                    <td>{{ $news->status }}</td>
                                    <td>{{ $news->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.news.edit', ['news' => $news]) }}"
                                            style='font-size:12px'>ред.</a>
                                        &nbsp;
                                        <a href="#" style='font-size:12px;color:red'>уд.</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td collspan=8>Записей не найдено</td>
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
