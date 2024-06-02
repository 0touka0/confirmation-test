<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $categories = Category::all();
        return view('admin', compact('categories'));
    }
}
