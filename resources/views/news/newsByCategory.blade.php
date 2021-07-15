@extends('layouts.main')
@section('heading') Новости @stop
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @forelse($newsList as $news)
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{ route('news.show', ['id' => $news->id]) }}">
                            <h2 class="post-title">{{ $news->title }}</h2>
                            <h3 class="post-subtitle">{{ $news->category }}</h3>
                            <h3 class="post-subtitle">{{ $news->description }}</h3>
                        </a>
                        <p class="post-meta">
                            Опубликовал
                            <a href="#!">{{ $news->username }}</a>
                            от {{ $news->created_at }}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                @empty
                    <h1>Новостей нет</h1>
                @endforelse
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts
                        →</a></div>
            </div>
        </div>
    </div>
@endsection
