<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Font;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use FontLib\Font as FontLibFont;

class FontController extends Controller
{
    // 📄 Danh sách font
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

    // 📤 Lưu font mới
    public function store(Request $request)
    {
        $data = $request->validate([
            'file_path' => 'required|file|mimetypes:font/ttf,font/sfnt,application/x-font-ttf,application/octet-stream',
        ]);

        $file = $request->file('file_path');
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

        // Lưu file vào storage/app/public/fonts
        $path = $file->storeAs('fonts', $filename, 'public');

        // Giá trị mặc định
        $slug = Str::slug($originalName);
        $weight = 400;
        $style = 'normal';
        $fullName = null;
        $postscript = null;
        $familyName = null;

        // 🧠 Đọc metadata từ file font
        try {
            $fontPath = storage_path('app/public/' . $path);
            $font = FontLibFont::load($fontPath);
            $font->parse();

            // Kiểm tra class thực tế
            $className = get_class($font);

            // Một số class có hỗ trợ getFontNames
            if (method_exists($font, 'getFontNames')) {
                $nameTable = $font->getFontNames();

                $fullName = $nameTable['fullName'] ?? null;
                $postscript = $nameTable['postscriptName'] ?? $nameTable['postScriptName'] ?? null;
                $styleName = $nameTable['subfamily'] ?? ($nameTable['style'] ?? null);
                $familyName = $nameTable['family'] ?? $nameTable['fontFamily'] ?? null;

                if ($familyName) {
                    $slug = Str::slug($familyName);
                }

                if (!empty($styleName)) {
                    $s = strtolower($styleName);
                    $style = strpos($s, 'italic') !== false ? 'italic' : 'normal';

                    if (strpos($s, 'thin') !== false) $weight = 100;
                    elseif (strpos($s, 'extralight') !== false || strpos($s, 'ultralight') !== false) $weight = 200;
                    elseif (strpos($s, 'light') !== false) $weight = 300;
                    elseif (strpos($s, 'regular') !== false || strpos($s, 'book') !== false) $weight = 400;
                    elseif (strpos($s, 'medium') !== false) $weight = 500;
                    elseif (strpos($s, 'semibold') !== false || strpos($s, 'demibold') !== false) $weight = 600;
                    elseif (strpos($s, 'bold') !== false) $weight = 700;
                    elseif (strpos($s, 'extrabold') !== false || strpos($s, 'ultrabold') !== false || strpos($s, 'heavy') !== false) $weight = 800;
                    elseif (strpos($s, 'black') !== false) $weight = 900;
                }
            } else {
                // WOFF có thể không hỗ trợ getFontNames
                // Bạn có thể fallback hoặc convert WOFF sang TTF nếu muốn extract metadata
                throw new \Exception("Font format not supported for metadata extraction: " . $className);
            }

        } catch (\Exception $e) {
            // ⚠️ fallback theo tên file
            $nameLower = strtolower($originalName);

            if (strpos($nameLower, 'italic') !== false) $style = 'italic';
            if (strpos($nameLower, 'thin') !== false) $weight = 100;
            elseif (strpos($nameLower, 'extralight') !== false || strpos($nameLower, 'ultralight') !== false) $weight = 200;
            elseif (strpos($nameLower, 'light') !== false) $weight = 300;
            elseif (strpos($nameLower, 'regular') !== false) $weight = 400;
            elseif (strpos($nameLower, 'medium') !== false) $weight = 500;
            elseif (strpos($nameLower, 'semibold') !== false || strpos($nameLower, 'demibold') !== false) $weight = 600;
            elseif (strpos($nameLower, 'bold') !== false) $weight = 700;
            elseif (strpos($nameLower, 'extrabold') !== false || strpos($nameLower, 'ultrabold') !== false || strpos($nameLower, 'heavy') !== false) $weight = 800;
            elseif (strpos($nameLower, 'black') !== false) $weight = 900;
        }


        // 🗃️ Lưu vào database
        $font = Font::create([
            'family_name' => $familyName ?? $fullName ?? $originalName,
            'slug'        => $slug,
            'file_path'   => $path,
            'format'      => $extension,
            'status'      => true,
            'weight'      => $weight,
            'style'       => $style,
        ]);


        return redirect()->route('admin.fonts.index')->with('success', 'Tải lên font thành công!');
    }

    // 🗑️ Xóa font
    public function destroy($id)
    {
        $font = Font::findOrFail($id);
        $font->delete();
        return redirect()->route('admin.fonts.index')->with('success', 'Font đã bị xoá');
    }
}
