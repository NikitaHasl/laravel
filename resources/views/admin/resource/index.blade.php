@extends('layouts/admin')
@section('title') Список ресурсов - @parent @stop
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Ресурсы</h1>
            <a href="{{ route('admin.resources.create') }}" class="btn btn-primary" style="float: right;">Добавить
                ресурс</a>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Список ресурсов</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Список Ресурсов
                </div>
                <div class="card-body">
                    @include('inc.message')
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Url</th>
                                <th>Дата добавления</th>
                                <th>Управление</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($resourceList as $res)
                                <tr>
                                    <td>{{ $res->id }}</td>
                                    <td>{{ $res->url }}</td>
                                    <td>{{ $res->created_at }}</td>
                                    <td>
                                        <a href="javascript:;" class="delete" rel="{{ $res->id }}"
                                            style='font-size:12px;color:red'>уд.</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td collspan=4>Записей не найдено</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        $(function() {
            $(".delete").on("click", function() {
                if (confirm("Подтверждаете удаление?")) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "DELETE",
                        url: "/admin/resources/" + $(this).attr("rel"),
                        complete: function($data, $msg) {
                            alert('Запись удалена');
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>

@endpush
@start
