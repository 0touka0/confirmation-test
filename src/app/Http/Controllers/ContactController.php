<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // お問い合わせフォーム表示
    public function contact(Request $request)
    {
        // 前回のデータを取得
        $contact = $request->session()->get('contact');
        //selectの選択肢の取得
        $selectOptions = Category::all();
        // dd($selectOptions);

        return view('contact', compact('contact', 'selectOptions'));
    }

    // データの受け取りと確認画面の表示
    public function confirm(ContactRequest $request)
    {
        // フォームからのデータをセッションに保存
        $request->session()->put('contact', $request->all());
        // ページに表示するデータ
        $contact = $request->all();

        // 性別の数値を文字列に変換
        $genderText = '';
        if ($contact['gender'] == 1) {
            $genderText = '男性';
        } elseif ($contact['gender'] == 2) {
            $genderText = '女性';
        } elseif ($contact['gender'] == 3) {
            $genderText = 'その他';
        }
        // $contact 配列に性別の文字列を追加
        $contact['gender_text'] = $genderText;
        // dd($contact);

        return view('confirm', compact('contact', 'genderText'));
    }

    // サンクスページ表示
    public function thanks(Request $request)
    {
        dd($request->all());//後で削除

        $contact = $request->all();
        Contact::create([
            'first_name' => $contact['first_name'],
            'last_name' => $contact['last_name'],
            'gender' => $contact['gender'],
            'email' => $contact['email'],
            'tell' => $contact['tell1'] . $contact['tell2'] . $contact['tell3'],
            'address' => $contact['address'],
            'building' => $contact['building'],
            'content' => $contact['content'],
            'detail' => $contact['detail'],
        ]);

        return view('thanks');
    }
}
