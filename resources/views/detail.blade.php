@extends('layouts.layout')

@section('content')
<body id="page-top">
<div class="container masthead">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-1"><a href="{{ route('home') }}" style="text-decoration:none; color:inherit;">{{ config('app.name') }}</a></h1>
            <h3>タイトルのレビュー</h3>
            
            <div class="card">
                <div class="card-header">
                    <h4>ID:12345 ○○○○さんのレビュー依頼</h4>
                    <h4>{{ $review->title }}</h4>
                </div>

                {{-- プログラムが来る --}}

                <div class="card-body">
                    {{ $review->sentences }}
                </div>

                <form method="POST" action="{{ route('comment', ['id' => $review->id ]) }}">
                    @csrf

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-9">
                            <button type="submit" class="btn btn-primary">
                            レビューする
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
</body>
@endsection
