@extends('layouts.main')
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                <div class="post-preview">
                    <h1 class="post-title">{{ $news->title }}</h2>
                        <h2 class="post-subtitle">{{ optional($news->category)->title }}</h3>
                            <h3 class="post">{{ $news->description }}</h3>
                            <p class="post-meta">
                                Опубликовал
                                <a href="#!">{{ optional($news->user)->firstname }}</a>
                                от {{ $news->created_at }}
                            </p>
                </div>
            </div>
        </div>
    </div>

@endsection
