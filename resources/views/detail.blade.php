@extends('layouts.layout')

@section('content')
<body id="page-top">
<div class="container masthead">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-1"><a href="{{ route('home') }}" style="text-decoration:none; color:inherit;">{{ config('app.name') }}</a></h1>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-end">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" style="text-decoration:none; color:inherit;">一覧ページ</a></li>
                  <li class="breadcrumb-item active" aria-current="page">レビューする</li>
                </ol>
            </nav>
            <h3>このコードをレビューする</h3>
            <div class="card">
                <div class="card-header">
                    <h4>ID:{{ $review->user_id }} {{ $review->user_name }}さんのレビュー依頼</h4>
                    <h4>{{ $review->title }}</h4>
                </div>


                <div class="card-body">
                    @include('components.program', ['program' => $program])

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">レビューしてもらうにあたって伝えたいこと</label>
                        {{ $review->sentences }}
                    </div>
                </div>
            </div>
                <form method="POST" action="{{ route('comment', ['id' => $review->id ]) }}">
                    @csrf

                    <div class="row mb-5 m-3">
                        <div class="col-md-6 offset-md-10">
                            <button type="submit" class="btn btn-primary">
                            レビューする
                            </button>
                        </div>
                    </div>
                </form>

            @foreach($comments as $comment)
            <div class="card">

                <div class="card-header">
                    <h4>ID:{{ $comment->user_id }} {{ $comment->user_name }}さんのレビュー</h4>
                </div>


                <div class="card-body">
                    <div class="row mb-3">
                        <label for="contents" class="col-md-4 col-form-label text-md-end">レビューコメント</label>
                        {{ $comment->sentences }}
                    </div>

                    {{-- <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">レビューしてもらうにあたって伝えたいこと</label>
                        {{ $review->sentences }}
                    </div> --}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</body>
@endsection
