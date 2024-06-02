@extends('layouts.app')

@section('title')
    <title>お問い合わせフォーム確認</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

{{-- お問い合わせフォームの確認画面 --}}
@section('content')
    <div class="confirm-content">
        <div class="confirm-content__heading">
            <h2>Confirm</h2>
        </div>
        {{-- contactsテーブルに送信されサンクスページへ --}}
        <form class="confirm-form" action="/thanks" method="post">
        @csrf
            <table class="confirm-table">
                <tr>
                    <th>お名前</th>
                    <td>{{ $contact['first_name'] }}</td>
                    <td>{{ $contact['last_name'] }}</td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>{{ $genderText }}</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{ $contact['email'] }}</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>{{ $contact['tell1'] . $contact['tell2'] . $contact['tell3'] }}</td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>{{ $contact['address'] }}</td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>{{ $contact['building'] }}</td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td>{{ $contact['content'] }}</td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td>{{ $contact['detail'] }}</td>
                </tr>
            </table>
            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
            <input type="hidden" name="email" value="{{ $contact['email'] }}">
            <input type="hidden" name="tell" value="{{ $contact['tell1'] . $contact['tell2'] . $contact['tell3'] }}">
            <input type="hidden" name="address" value="{{ $contact['address'] }}">
            <input type="hidden" name="building" value="{{ $contact['building'] }}">
            <input type="hidden" name="content" value="{{ $contact['content'] }}">
            <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
            {{-- 送信ボタン --}}
            <div class="confirm-form__button">
                <button class="confirm-form__button--submit" type="submit">送信</button>
            </div>
        </form>
        <a href="/">修正</a>
    </div>
@endsection