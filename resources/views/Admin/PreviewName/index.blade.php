@extends('Admin.layout.app')

@section('title', 'xem trước tên')

@section('content')
    <main class="main">
        
        <div class="page-title">Xem trước tên</div>
        <div class="card">
        <div class="toolbar">
            <div><a class="btn" href="#">+ Tạo mới</a> <a class="btn ghost" href="#">Xóa mục đã chọn</a></div>
            <div style="width:320px"><input class="search" placeholder="Tìm kiếm"></div>
        </div>

        <table class="table">
            <thead><tr><th></th><th>Tên</th><th>Sên</th><th>Trạng thái</th><th>Nhúng</th><th>Hành động</th></tr></thead>
            <tbody>
            <tr>
                <td><input type="checkbox"></td>
                <td>Xem trước tên tôi</td>
                <td>my-name-preview1</td>
                <td><span class="badge-green">Tích cực</span></td>
                <td><button class="btn ghost">Khung nội tuyến</button></td>
                <td><a class="btn ghost" href="#">Chỉnh sửa</a></td>
            </tr>
            </tbody>
        </table>
        </div>

    </main>




@endsection

@section('styles')
    <style>

    </style>
@endsection