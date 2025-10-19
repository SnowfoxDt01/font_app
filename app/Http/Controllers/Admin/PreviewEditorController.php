<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PreviewEditorController extends Controller
{
    // 📄 Trang xem trước và chỉnh sửa
    public function index()
    {
        return view('Admin.Preview_edit.index-preview-editor');
    }
}
