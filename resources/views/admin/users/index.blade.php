@extends('layouts.admin')
@section('title') Панель админа. @stop
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Админка</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Панель админа</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Список пользователей
                </div>
                <div class="card-body">
                    @include('inc.message')
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Имя</th>
                                <th>Email</th>
                                <th>Админ</th>
                                <th>Дата добавления</th>
                                <th>Управление</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->is_admin === true)
                                            Да
                                        @else
                                            Нет
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', ['user' => $user]) }}"
                                            style='font-size:12px'>ред.</a>
                                        &nbsp;
                                        <a href="javascript:;" class="delete" rel="{{ $user->id }}"
                                            style='font-size:12px;color:red'>уд.</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td collspan=6>Записей не найдено</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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
                        url: "/admin/users/" + $(this).attr("rel"),
                        complete: function() {
                            alert('Пользователь удален');
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>

@endpush
