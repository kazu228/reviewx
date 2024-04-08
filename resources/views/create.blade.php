@extends('layouts.layout')

@section('content')
<div class="container masthead">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-1"><a href="{{ route('home') }}" style="text-decoration:none; color:inherit;">{{ config('app.name') }}</a></h1>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-end">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" style="text-decoration:none; color:inherit;">一覧ページ</a></li>
                  <li class="breadcrumb-item active" aria-current="page">レビューしてもらう</li>
                </ol>
            </nav>
            <h3>書いたコードをレビューしてもらう</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header"></div>
                

                <div class="card-body">
                    <form method="POST" action="{{ route('add') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">タイトル</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="title" value="{{ old('title') }}" required autocomplete="name" autofocus placeholder="プログラムの内容を簡潔に">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contents" class="col-md-4 col-form-label text-md-end">レビューしてもらう<br>プログラムファイル<br></label>

                            <div class="col-md-6">
                                {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"> --}}
                                <input type="file" name="contents[]"  multiple="multiple" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">レビューしてもらうにあたって伝えたいこと</label>

                            <div class="col-md-6">
                                {{-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"> --}}
                                <textarea name="sentences" rows="4" cols="40" class="form-control" placeholder="特に見てもらいたいところ、問題点など"></textarea>
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  登録
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
