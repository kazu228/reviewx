@extends('layouts.layout')

@section('content')
<div class="container masthead">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-1"><a href="{{ route('home') }}" style="text-decoration:none; color:inherit;">{{ config('app.name') }}</a></h1>
            <h3>人が書いたコードをレビューする</h3>
            <div class="card">
                {{-- <div class="card-header"></div> --}}
                <div class="card-body">

                    <div class="row mb-3">
                        <label for="title" class="col-md-4 col-form-label text-md-end">タイトル</label>

                        <div class="col-md-6">
                            {{ $review->title }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="contents" class="col-md-4 col-form-label text-md-end">レビューする<br>プログラムファイル</label>

                        <div class="col-md-6">
                           {{ $program }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">レビューしてもらうにあたって伝えたいこと</label>

                        <div class="col-md-6">
                            {{ $review->sentences }}
                        </div>
                    </div>
                </div>
                

                <div class="card-body">
                    <form method="POST" action="{{ route('comment_store', ['id' => $review_id ]) }}">
                        @csrf

                        {{-- <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">タイトル</label>

                            <div class="col-md-6"> --}}
                                {{-- <input id="name" type="text" class="form-control " name="title" value="{{ old('title') }}" required autocomplete="name" autofocus placeholder="プログラムの内容を簡潔に"> --}}

                                {{-- @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            {{-- </div> --}}
                        </div>

                        {{-- <div class="row mb-3">
                            <label for="contents" class="col-md-4 col-form-label text-md-end">レビューしてもらう<br>プログラムファイル</label>

                            <div class="col-md-6">
                            </div>
                        </div> --}}

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">レビュー内容</label>

                            <div class="col-md-6">
                                <textarea name="sentences" rows="4" cols="40" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-9">
                                <button type="submit" class="btn btn-primary">
                                  送信
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
