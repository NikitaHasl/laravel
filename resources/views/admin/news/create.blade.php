@extends('layouts.admin')
@section('title') Добавить новость - @parent @stop
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Добавить новость</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Добавить новую новость</li>
        </ol>
    </div>
    <div>
        <form method='post' action="{{ route('admin.news.store') }}">
            @csrf
            <div class='form-group'>
                <label for="title">
                    Заголовок
                </label>
                <input type='text' class='form-control' id='title' name='title' value="{{ old('title') }}">
            </div><br>
            <div class='form-group'>
                <label for="status">
                    Статус
                </label>
                <select class='form-control' id='status' name='status'>
                    <option @if (old('status')==='Draft' ) selected @endif>Draft</option>
                    <option @if (old('status')==='Published' ) selected @endif>Published</option>
                    <option @if (old('status')==='Blocked' ) selected @endif>Blocked</option>
                </select>
            </div><br>
            <div class='form-group'>
                <label for="description">
                    Описание
                </label>
                <textarea class='form-control' id='description' name='description'>{{ old('description') }}</textarea>


            </div><br>
            <button type='submit' class='btn btn-primary'>Сохранить</button><br>
        </form><br>

    </div>
    @endsection
