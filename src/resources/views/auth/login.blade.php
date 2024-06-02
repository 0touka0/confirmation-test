@extends('layouts.app')

@section('title')
    <title>ログインページ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

{{-- 登録ページへ遷移 --}}
@section('nav')
    <nav class="header-nav">
        <form class="form" action="/register" method="get">
        @csrf
            <button class="header-nav__button">register</button>
        </form>
    </nav>
@endsection

{{-- ログインページ --}}
@section('content')
    <div class="form-content">
        <div class="form-content__heading">
            <h2>login</h2>
        </div>
        <form class="login-form" action="/login" method="post">
            @csrf
            <div class="login-form__item">
                <div class="login-form__item-list">
                    <div class="item-list__title">
                        <label for="email">メールアドレス</label>
                    </div>
                    <div class="item-list__content">
                        <input id="email" class="item-list__content--input" type="email" name="email" placeholder="例: test@example.com">
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="login-form__item-list">
                    <div class="item-list__title">
                        <label for="password">パスワード</label>
                    </div>
                    <div class="item-list__content">
                        <input id="password" class="item-list__content--input" type="password" name="password" placeholder="例: coachtech1106">
                        @error('password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="login-form__item-button">
                    <button class="login-form__item-button--submit" type="submit">ログイン</button>
                </div>
            </div>
        </form>
    </div>
@endsection