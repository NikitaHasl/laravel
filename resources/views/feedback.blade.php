@extends('layouts.main')
@section('heading') Форма обратной связи@stop
@section('content')
    <main>
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                @include('inc.error')
                @include('inc.message')
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="my-5">
                        <form method='post' action="{{ route('feedback.store') }}">
                            @csrf
                            <div class="form-floating">
                                <input class="form-control" id="name" name="name" type="text"
                                    placeholder="Введите имя пользователя" />
                                <label for="name">Имя</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="email" name="email" type="email"
                                    placeholder="Введите адрес почты" />
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" id="message" name="message" placeholder="Введите сообщение"
                                    style="height: 12rem"></textarea>
                                <label for="message">Текст сообщения</label>
                            </div>
                            <br />
                            <button class="btn btn-primary text-uppercase" id="submitButton"
                                type="submit">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
