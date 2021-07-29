@extends('layouts.admin')
@section('title') Редактировать новость - @parent @stop
@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Редактировать новость</h3>
                        </div>
                        <div class="card-body">
                            @include('inc.error')
                            <form method='post' action="{{ route('admin.news.update', ['news' => $news]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="title" name="title" type="text"
                                        value="{{ $news->title }}" />
                                    <label for="title">Заголовок</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="user" name="user_id">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" @if ($news->user_id === $user->id) selected @endif>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="user">Пользователь</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="category" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if ($news->category_id === $category->id) selected @endif>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="category">Категория</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="img" name="img" type="file" />
                                    <label for="category">Изображение</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="status" id="status">
                                        <option @if ($news->status === 'DRAFT') selected @endif>DRAFT
                                        </option>
                                        <option @if ($news->status === 'PUBLISHED') selected @endif>PUBLISHED</option>
                                        <option @if ($news->status === 'PRIVATE') selected @endif>PRIVATE</option>
                                    </select>
                                    <label for="status">Статус</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="description" name="description"
                                        style="height: 12rem">{{ $news->description }}</textarea>
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
@push('js')
    <script>
        CKEDITOR.replace('description', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        });
    </script>
@endpush
