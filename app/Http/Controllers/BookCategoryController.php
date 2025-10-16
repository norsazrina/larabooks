<?php
namespace App\Http\Controllers;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class BookCategoryController extends Controller
{
    public function index()
    {
        $categories = BookCategory::all();
        return view('bookcategories.index', compact('categories'));
    }

    public function create()
    {
        return view('bookcategories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        BookCategory::create($request->only('name'));
        return redirect()->route('bookcategories.index')->with('success', 'Category created!');
    }

    public function edit(BookCategory $bookcategory)
    {
        return view('bookcategories.edit', compact('bookcategory'));
    }

    public function update(Request $request, BookCategory $bookcategory): RedirectResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        $bookcategory->update($request->only('name'));
        return redirect()->route('bookcategories.index')->with('success', 'Category updated!');
    }

    public function destroy(BookCategory $bookcategory)
    {
        $bookcategory->delete();
        return redirect()->route('bookcategories.index')->with('success', 'Category deleted!');
    }

}
