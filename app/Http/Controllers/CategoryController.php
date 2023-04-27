<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Category;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function list(Request $request)
    {
        $categories = Category::orderBy('name')->get();

        return view('categories.list', compact('categories'));
    }

    public function addForm(Request $request)
    {
        return view('categories.form');
    }

    public function editForm(Request $request, int $categoryId)
    {
        $category = Category::find($categoryId);

        return view('categories.form', compact('category'));
    }

    public function index(Request $request, int $categoryId)
    {
        $category = Category::with('log')->find($categoryId);
        $articles = Articles::where('category_id', $categoryId)
            ->orderByDesc('created_at')    
            ->get();

        if ($category) {
            Log::set('view', null, $category->id);
        }

        return view('categories.listArticles', compact('category', 'articles'));
    }

    public function add(Request $request)
    {
        if (!empty($request->name)) {
            $category = new Category();
            $category->name = Str::ucfirst($request->name);
            if ($category->save()) {
                return redirect()->route('categoryList');
            }
        }
    }

    public function edit(Request $request, int $categoryId)
    {
        if (!empty($request->name)) {
            $category = Category::find($categoryId);
            $category->name = Str::ucfirst($request->name);

            if ($category->save()) {
                return redirect()->route('categoryList')
                    ->with('info', 'Pomyślnie edytowano kategorię.');
            }
        }
    }

    public function delete(Request $request, int $categoryId)
    {
        try {
            Category::where('id', $categoryId)
                ->delete();

            return redirect()->route('categoryList');
        } catch (\Exception $e) {
            return redirect()->route('categoryList')
                ->with('warning', 'Nie powiodło się usuwanie kategorii.');
        }
    }
}
