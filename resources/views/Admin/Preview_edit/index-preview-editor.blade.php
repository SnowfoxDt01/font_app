@extends('Admin.layout.app')

@section('title', 'Xem trước và chỉnh sửa')

@section('content')

<main class="main">
    
<div class="page-title">Xem trước & Trình chỉnh sửa</div>
<div style="display:flex;gap:20px">
  <div style="width:260px">
    <div class="card">
      <div class="small-muted">Màu tiêu chuẩn:</div>
      <div class="color-picker" style="margin-top:10px">Màu</div>
      <div style="margin-top:12px">
        <div class="small-muted">Hình nền:</div>
        <button class="btn ghost" style="margin-top:8px">Chọn hình ảnh</button>
      </div>
      <div style="margin-top:12px">
        <div class="small-muted">Phông chữ Google:</div>
        <label class="form-check form-switch" style="display:flex;align-items:center;gap:8px;margin-top:8px">
          <input class="form-check-input" type="checkbox" checked>
          <span>Hiển thị Phông chữ Google</span>
        </label>
      </div>
    </div>
  </div>
  <div style="flex:1">
    <div class="card" style="margin-bottom:12px">
      <textarea class="search" rows="2" placeholder="Nhập gì đó ở đây"></textarea>
      <div style="margin-top:12px;display:flex;align-items:center;gap:12px">
        <div class="tab">Aa</div>
        <div class="tab">AA</div>
        <div style="margin-left:auto">Kích thước: <input type="range" min="10" max="80" value="30"></div>
      </div>
    </div>

    <div class="card" style="margin-bottom:12px">
      <div style="padding:12px;background:#fff;border-radius:8px">
        <div style="font-size:24px;font-weight:600;margin-bottom:8px">Roboto</div>
        <div class="preview-grid">
          <div class="preview-card">Nhập gì đó ở đây</div>
          <div class="preview-card">Nhập gì đó ở đây</div>
          <div class="preview-card">Nhập gì đó ở đây</div>
          <div class="preview-card">Nhập gì đó ở đây</div>
          <div class="preview-card">Nhập gì đó ở đây</div>
          <div class="preview-card">Nhập gì đó ở đây</div>
          <div class="preview-card">Nhập gì đó ở đây</div>
          <div class="preview-card">Nhập gì đó ở đây</div>
        </div>
      </div>
    </div>

  </div>
</div>

  </main>



@endsection

@section('styles')
    <style>

    </style>
@endsection