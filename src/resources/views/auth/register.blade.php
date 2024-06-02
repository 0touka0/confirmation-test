@extends('layouts.app')

@section('title')
    <title>ユーザ登録ページ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

{{-- ログインページへ遷移 --}}
@section('nav')
    <nav class="header-nav">
        <form class="form" action="/login" method="get">
        @csrf
            <button class="header-nav__button">login</button>
        </form>
    </nav>
@endsection

{{-- ユーザー登録ページ --}}
@section('content')
    <div class="form-content">
        <div class="form-content__heading">
            <h2>Register</h2>
        </div>
        <form class="register-form" action="/register" method="post">
            @csrf
            <div class="register-form__item">
                {{-- お名前 --}}
                <div class="register-form__item-list">
                    <div class="item-list__title">
                        <label for="name">お名前</label>
                    </div>
                    <div class="item-list__content">
                        <input id="name" class="item-list__content--input" type="text" name="name" placeholder="例: 山田  太郎">
                        {{-- エラーメッセージ --}}
                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- メールアドレス --}}
                <div class="register-form__item-list">
                    <div class="item-list__title">
                        <label for="email">メールアドレス</label>
                    </div>
                    <div class="item-list__content">
                        <input id="email" class="item-list__content--input" type="email" name="email" placeholder="例: test@example.com">
                        {{-- エラーメッセージ --}}
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- パスワード --}}
                <div class="register-form__item-list">
                    <div class="item-list__title">
                        <label for="password">パスワード</label>
                    </div>
                    <div class="item-list__content">
                        <input id="password" class="item-list__content--input" type="password" name="password" placeholder="例: coachtech1106">
                        {{-- エラーメッセージ --}}
                        @error('password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="register-form__item-button">
                    <button class="register-form__item-button--submit" type="submit">登録</button>
                </div>
            </div>
        </form>
    </div>
@endsection