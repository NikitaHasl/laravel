@extends('layouts.main')
@section('heading') Категории новостей@stop
@section('content')
<ul class="row" style="list-style-type:none">
    @forelse($categoryList as $key => $item)
    <li class="nav-item col">
        <p><a href="<?= route('categories.show', ['id' => $key]) ?>" class="nav-link"><?= $item ?></a></p>
    </li>
    @empty
    <h1>Список пуст!</h1>
    @endforelse
</ul>
@endsection
