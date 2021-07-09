@extends('layouts.admin')
@section('title') Добавить Категорию - @parent @stop
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Добавить категорию</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Добавить новую категорию</li>
        </ol>
    </div>
    <div>
        <form method='post' action="{{ route('admin.categories.store') }}">
            @csrf
            <div class='form-group'>
                <label for="title">
                    Название категории
                </label>
                <input type='text' class='form-control' id='name' name='name' value="{{ old('name') }}">
            </div><br>
            <button type='submit' class='btn btn-primary'>Сохранить</button><br>
        </form><br>

    </div>
    @endsection
