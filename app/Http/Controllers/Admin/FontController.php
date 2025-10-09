<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Font;
use App\Models\Category;
use App\Models\Tag;

class FontController extends Controller
{
    // Hiển thị danh sách font
    public function index(Request $request)
    {
        $query = Font::with('category', 'tags');

        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->has('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('id', $request->tag);
            });
        }

        $fonts = $query->paginate(12);

        return view('Admin.Font.list-font', compact('fonts'));
    }

    // Hiển thị form tạo font
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('Admin.Font.create-font', compact('categories', 'tags'));
    }

    // Lưu font mới
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'slug' => 'required|string|max:150|unique:fonts',
            'file_path' => 'required|string|max:255',
            'preview_text' => 'nullable|string|max:255',
            'format' => 'required|in:ttf,otf,woff,woff2',
            'category_id' => 'required|exists:categories,id',
            'status' => 'boolean',
        ]);

        $font = Font::create($data);

        if ($request->tags) {
            $font->tags()->sync($request->tags);
        }

        return redirect()->route('fonts.index')->with('success', 'Font đã được thêm');
    }

    // Hiển thị chi tiết 1 font
    public function show($id)
    {
        $font = Font::with('category', 'tags')->findOrFail($id);
        return view('Admin.Font.show-font', compact('font'));
    }

    // Hiển thị form edit
    public function edit($id)
    {
        $font = Font::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('Admin.Font.edit-font', compact('font', 'categories', 'tags'));
    }

    // Cập nhật font
    public function update(Request $request, $id)
    {
        $font = Font::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:150',
            'slug' => 'required|string|max:150|unique:fonts,slug,' . $id,
            'file_path' => 'required|string|max:255',
            'preview_text' => 'nullable|string|max:255',
            'format' => 'required|in:ttf,otf,woff,woff2',
            'category_id' => 'required|exists:categories,id',
            'status' => 'boolean',
        ]);

        $font->update($data);

        if ($request->tags) {
            $font->tags()->sync($request->tags);
        }

        return redirect()->route('fonts.index')->with('success', 'Font đã được cập nhật');
    }

    // Xoá font
    public function destroy($id)
    {
        $font = Font::findOrFail($id);
        $font->delete();
        return redirect()->route('fonts.index')->with('success', 'Font đã bị xoá');
    }
}
