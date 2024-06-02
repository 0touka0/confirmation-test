@extends('layouts.app')

@section('title')
    <title>管理画面</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

{{-- ログアウト先はログインページ --}}
@section('nav')
    <nav class="header-nav">
        <form class="form" action="/logout" method="get">
        @csrf
            <button class="header-nav__button">logout</button>
        </form>
    </nav>
@endsection

@section('content')
    <div class="admin-content">
        <div class="admin-content__heading">
            <h2>Admin</h2>
        </div>
        <form class="search-form" action="{{-- /find（未作成） --}}" method="post">
            @csrf
            <div class="search-form__list">
                <input class="search-form__list--text-input" type="text" name="query" placeholder="名前やメールアドレスを入力してください">
                <select name="gender">
                    <option value="">性別</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
                <select name="content">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['content'] }}">{{ $category['content'] }}</option>
                    @endforeach
                </select>
                <input type="date" name="date">
            </div>
            <button type="submit" class="search-button">検索</button>
            <button type="reset" class="reset-button">リセット</button>
        </form>
        <button class="export-button">エクスポート</button>
        <table class="search-table">
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
            {{-- @foreach ($ as $)
                <tr>
                    <td>{{ $->name }}</td>
                    <td>{{ $->gender }}</td>
                    <td>{{ $->email }}</td>
                    <td>{{ $->content }}</td>
                    <td><button class="details-button">詳細</button></td>
                </tr>
            @endforeach --}}
        </table>
        {{-- <div class="pagination">
            {{ $->links() }}
        </div> --}}
    </div>
@endsection