@extends('layouts.layout')

@section('content')
<body id="page-top">
<div class="container masthead">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-1">{{ config('app.name') }}</h1>
            <h3>レビュー待ちの一覧</h3>
            
            @foreach($reviews as $review)
            <div class="card">
                <div class="card-header">
                    <h4>ID:{{ $review->user_id }} {{ $review->user_name }}さんのレビュー依頼</h4>
                    <h4><a href="{{ route('detail', ['id' => $review->id ]) }}" style="text-decoration:none;">{{ $review->title }}</a></h4>
                </div>

                <div class="card-body">
                    {{ $review->sentences }}
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>
</body>
@endsection