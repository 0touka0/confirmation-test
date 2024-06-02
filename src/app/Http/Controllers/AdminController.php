<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $categories = Category::all();
        return view('admin', compact('categories'));
    }

    public function search(Request $request)
    {
        // 名前とメールアドレスの検索
        $query = '%' . $request->input('query') . '%';
        $contacts = Contact::where('first_name', 'LIKE', $query)
                            ->orWhere('last_name', 'LIKE', $query)
                            ->orWhere('email', 'LIKE', $query);
        // 性別の検索
        $gender = $request->input('gender');
        if ($gender) {
            $contacts = $contacts->where('gender', $gender);
        }
        // お問い合わせの検索
        $content = $request->input('content');
        if ($content) {
            $contacts = $contacts->where('category_id', $content);
        }
        // お問い合わせの種類の表示
        $contacts->with('category');

        // ページネーションを追加して7件ずつ表示
        $contacts = $contacts->paginate(7);
        // $categoriesの表示
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }
}
