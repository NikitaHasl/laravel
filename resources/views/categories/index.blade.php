@extends('layouts.main')
@section('heading') Категории новостей@stop
@section('content')
    <ul class="row" style="list-style-type:none">
        @forelse($categoryList as $category)
            <li class="nav-item col">
                <p><a href="<?= route('news.category', ['categoryId' => $category->id]) ?>"
                        class="nav-link"><?= $category->title ?></a>
                </p>
            </li>
        @empty
            <h1>Список пуст!</h1>
        @endforelse
    </ul>
@endsection
