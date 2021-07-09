@extends('layouts.main')
@section('heading') Форма обратной связи@stop
@section('content')
<form method='post' action="#">
    @csrf
    <div class='form-group'>
        <label for="name">
            Имя пользователя
        </label>
        <input type='text' class='form-control' id='name' name='name' value="{{ old('name') }}">
    </div><br>
    <div class='form-group'>
        <label for="email">
            Email
        </label>
        <input type='email' class='form-control' id='email' name='email' value="{{ old('email') }}">
    </div><br>
    <div class='form-group'>
        <label for="message">
            Текст обращения
        </label>
        <textarea class='form-control' id='message' name='message'>{{ old('message') }}</textarea>
    </div><br>
    <button type='submit' class='btn btn-primary'>Отправить</button><br>
</form><br>
@endsection
