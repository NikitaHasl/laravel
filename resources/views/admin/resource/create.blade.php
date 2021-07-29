@extends('layouts.admin')
@section('title') Добавить ресурс - @parent @stop
@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Добавить ресурс</h3>
                        </div>
                        <div class="card-body">
                            @include('inc.error')
                            <form method='post' action="{{ route('admin.resources.store') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="url" name="url" type="text"
                                        value="{{ old('url') }}" />
                                    <label for="url">URL</label>
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
