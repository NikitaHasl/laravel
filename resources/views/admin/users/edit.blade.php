@extends('layouts.admin')
@section('title') Редактировать пользователя - @parent @stop
@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Редактировать пользователя</h3>
                        </div>
                        <div class="card-body">
                            @include('inc.error')
                            <form method='post' action="{{ route('admin.users.update', ['user' => $user]) }}">
                                @csrf
                                @method('put')
                                <div class="form-floating mb-3">
                                    <input disabled class="form-control" id="name" name="name" type="text"
                                        value="{{ $user->name }}" />
                                    <label for="name">Имя</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input disabled class="form-control" id="email" name="email" type="text"
                                        value="{{ $user->email }}" />
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="is_admin" name="is_admin">
                                        <option value="1" @if ($user->is_admin === true) selected @endif>Да</option>
                                        <option value="0" @if ($user->is_admin === false) selected @endif>Нет</option>
                                    </select>
                                    <label for="is_admin">Админ</label>
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
