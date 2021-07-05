@extends('layouts.main')
@section('heading') Добро пожаловать в наш новостной блог!@stop
@section('content')
<ul class="navbar-nav ms-auto py-2 py-lg-0">
    <li class="nav-item"><a href="<?= route('categories') ?>" class="nav-link px-lg-3 py-3 py-lg-4">Категории новостей</a></li>
    <li class="nav-item"><a href="<?= route('news') ?>" class="nav-link px-lg-3 py-3 py-lg-4">Новости</a></li>
</ul>
@endsection
