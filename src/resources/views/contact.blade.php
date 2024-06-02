@extends('layouts.app')

@section('title')
    <title>お問い合わせフォーム入力</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

{{-- お問い合わせ作成ページ --}}
@section('content')
    <div class="contact-content">
        <div class="contact-content__heading">
            <h2>Contact</h2>
        </div>
        <form class="create-form" action="/confirm" method="post">
            @csrf
            {{-- 名前フォーム --}}
            <div class="create-form__group">
                <div class="create-form__group-title">
                    <span class="create-form__label--item">お名前</span>
                    <span class="create-form__label--marker">※</span>
                </div>
                <div class="create-form__group-content">
                    {{-- first_name --}}
                    <input class="create-form__group-content__input" type="text" name="first_name" placeholder="例: 山田" value="{{ old('first_name', $contact['first_name'] ?? '') }}">
                    @if ($errors->has('first_name'))
                        <span class="error-message">{{ $errors->first('first_name') }}</span>
                    @endif
                    {{-- last_name --}}
                    <input class="create-form__group-content__input" type="text" name="last_name" placeholder="例: 太郎" value="{{ old('last_name', $contact['last_name'] ?? '') }}">
                    @if ($errors->has('last_name'))
                        <span class="error-message">{{ $errors->first('last_name') }}</span>
                    @endif
                </div>
            </div>
            {{-- 性別フォーム --}}
            <div class="create-form__group">
                <div class="create-form__group-title">
                    <span class="create-form__label--item">性別</span>
                    <span class="create-form__label--marker">※</span>
                </div>
                <div class="create-form__group-content">
                    <input type="radio" id="male" name="gender" value="1" checked {{ (old('gender', $contact['gender'] ?? 1) == 1) ? 'checked' : '' }}>
                    <label for="male">男性</label>
                    <input type="radio" id="female" name="gender" value="2" {{ (old('gender', $contact['gender'] ?? 1) == 2) ? 'checked' : '' }}>
                    <label for="female">女性</label>
                    <input type="radio" id="other" name="gender" value="3" {{ (old('gender', $contact['gender'] ?? 1) == 3) ? 'checked' : '' }}>
                    <label for="other">その他</label>
                    @if ($errors->has('gender'))
                        <span class="error-message">{{ $errors->first('gender') }}</span>
                    @endif
                </div>
            </div>
            {{-- メールアドレスフォーム --}}
            <div class="create-form__group">
                <div class="create-form__group-title">
                    <span class="create-form__label--item">メールアドレス</span>
                    <span class="create-form__label--marker">※</span>
                </div>
                <div class="create-form__group-content">
                    <input class="create-form__group-content__input-email" type="email" name="email" placeholder="例: test@example.com" value="{{ old('email', $contact['email'] ?? '') }}">
                    @if ($errors->has('email'))
                        <span class="error-message">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            {{-- 電話番号フォーム --}}
            <div class="create-form__group">
                <div class="create-form__group-title">
                    <span class="create-form__label--item">電話番号</span>
                    <span class="create-form__label--marker">※</span>
                </div>
                <div class="create-form__group-content">
                    <input type="tel" name="tell1" placeholder="080" value="{{ old('tell1', $contact['tell1'] ?? '') }}"><span>-</span>
                    <input type="tel" name="tell2" placeholder="1234" value="{{ old('tell1', $contact['tell2'] ?? '') }}"><span>-</span>
                    <input type="tel" name="tell3" placeholder="5678" value="{{ old('tell1', $contact['tell3'] ?? '') }}">
                    @if ($errors->has('tell1'))
                        <span class="error-message">{{ $errors->first('tell1') }}</span>
                    @endif
                </div>
            </div>
            {{-- 住所フォーム --}}
            <div class="create-form__group">
                <div class="create-form__group-title">
                    <span class="create-form__label--item">住所</span>
                    <span class="create-form__label--marker">※</span>
                </div>
                <div class="create-form__group-content">
                    <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address', $contact['address'] ?? '') }}">
                    @if ($errors->has('address'))
                        <span class="error-message">{{ $errors->first('address') }}</span>
                    @endif
                </div>
            </div>
            {{-- 建物名フォーム --}}
            <div class="create-form__group">
                <div class="create-form__group-title">
                    <span class="create-form__label--item">建物名</span>
                </div>
                <div class="create-form__group-content">
                    <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building', $contact['building'] ?? '') }}">
                </div>
            </div>
            {{-- お問い合わせの種類フォーム --}}
            <div class="create-form__group">
                <div class="create-form__group-title">
                    <span class="create-form__label--item">お問い合わせの種類</span>
                    <span class="create-form__label--marker">※</span>
                </div>
                <div class="create-form__group-content">
                    <select name="content">
                        <option value="">選択してください</option>
                        @foreach ($selectOptions as $selectOption)
                            <option value="{{ $selectOption->content }}" {{ isset($contact['content']) && $contact['content'] == $selectOption->content ? 'selected' : '' }}>{{ $selectOption->content }}
                        @endforeach
                    </select>
                    @if ($errors->has('content'))
                        <span class="error-message">{{ $errors->first('content') }}</span>
                    @endif
                </div>
            </div>
            {{-- お問い合わせ内容フォーム --}}
            <div class="create-form__group">
                <div class="create-form__group-title">
                    <span class="create-form__label--item">お問い合わせ内容</span>
                    <span class="create-form__label--marker">※</span>
                </div>
                <div class="create-form__group-content">
                    <textarea name="detail" cols="30" rows="10" placeholder="お問い合わせ内容をご記載ください">{{ old('detail', $contact['detail'] ?? '') }}</textarea>
                    @if ($errors->has('detail'))
                        <span class="error-message">{{ $errors->first('detail') }}</span>
                    @endif
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">確認画面</button>
            </div>
        </form>
    </div>
@endsection