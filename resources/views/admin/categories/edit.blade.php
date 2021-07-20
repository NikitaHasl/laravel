@extends('layouts.admin')
@section('title') Редактировать категорию - @parent @stop
@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Редактировать категорию</h3>
                        </div>
                        <div class="card-body">
                            @include('inc.error')
                            <form method="POST"
                                action="{{ route('admin.categories.update', ['category' => $category]) }}">
                                @csrf
                                @method('put')
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="title" name="title" type="text"
                                        value="{{ $category->title }}" />
                                    <label for="title">Название категории</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="color" name="color" type="text"
                                        value="{{ $category->color }}" />
                                    <label for="color">Цвет</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="description" name="description"
                                        style="height: 12rem">{{ $category->description }}</textarea>
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
