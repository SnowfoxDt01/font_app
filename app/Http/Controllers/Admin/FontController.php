<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Font;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;

class FontController extends Controller
{
    // Hiển thị danh sách font
    public function index(Request $request){
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



    // Lưu font mới
    public function store(Request $request){
    $data = $request->validate([
        'file_path' => 'required|file|mimetypes:font/ttf,font/sfnt,application/x-font-ttf,application/octet-stream',
    ]);

    $file = $request->file('file_path');
    $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
    $extension = $file->getClientOriginalExtension();
    $filename = time() . '_' . $file->getClientOriginalName();

    // Lưu file
    $path = $file->storeAs('fonts', $filename, 'public');

    // Tạo slug từ tên file (bỏ khoảng trắng, ký tự đặc biệt)
    $slug = Str::slug($originalName);

    // Tạo bản ghi trong DB
    $font = Font::create([
        'name' => $originalName,
        'slug' => $slug,
        'file_path' => $path,
        'format' => $extension,
        'status' => true,
    ]);

    return redirect()->route('admin.fonts.index')->with('success', 'Tải lên font thành công!');
}


    // Hiển thị chi tiết 1 font
    public function show($id){
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
    public function update(Request $request, $id){
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

        return redirect()->route('admin.fonts.index')->with('success', 'Font đã được cập nhật');
    }

    // Xoá font
    public function destroy($id){
        $font = Font::findOrFail($id);
        $font->delete();
        return redirect()->route('admin.fonts.index')->with('success', 'Font đã bị xoá');
    }
}
