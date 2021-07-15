@extends('layouts.admin')
@section('title') Добавить новость - @parent @stop
@section('content')
    {{-- <main>
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
                    <option @if (old('status') === 'Draft') selected @endif>Draft</option>
                    <option @if (old('status') === 'Published') selected @endif>Published</option>
                    <option @if (old('status') === 'Blocked') selected @endif>Blocked</option>
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

    </div> --}}
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Добавить новость</h3>
                        </div>
                        <div class="card-body">
                            <form method='post' action="{{ route('admin.news.store') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="title" name="title" type="text" />
                                    <label for="title">Заголовок</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="user" name="user" type="text" />
                                    <label for="user">Пользователь</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="category" name="category" type="text" />
                                    <label for="category">Категория</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="status" name="status" type="text" />
                                    <label for="status">Статус</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="description" style="height: 12rem"></textarea>
                                    <label for="description">Описание</label>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <button class="btn btn-primary text-uppercase" id="submitButton"
                                        type="submit">Отправить</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
