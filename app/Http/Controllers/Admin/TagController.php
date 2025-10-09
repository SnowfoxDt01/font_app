<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    // Danh sách tags
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('tags.index', compact('tags'));
    }

    // Hiển thị form tạo
    public function create()
    {
        return view('tags.create');
    }

    // Lưu tag mới
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'required|string|max:100|unique:tags',
        ]);

        Tag::create($data);

        return redirect()->route('tags.index')->with('success', 'Tag đã được thêm');
    }

    // Hiển thị chi tiết 1 tag
    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag'));
    }

    // Hiển thị form sửa
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    // Cập nhật tag
    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'required|string|max:100|unique:tags,slug,' . $tag->id,
        ]);

        $tag->update($data);

        return redirect()->route('tags.index')->with('success', 'Tag đã được cập nhật');
    }

    // Xóa tag
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Tag đã bị xóa');
    }
}
