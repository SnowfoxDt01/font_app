@extends('Admin.layout.app')

@section('title', 'Trưng bày')

@section('content')
    <main class="main">
        
        <div class="page-title">Trưng bày</div>
        <div class="card">
        <div class="toolbar">
            <div><span class="small-muted">Tổng cộng: 1</span></div>
            <div><a class="btn" href="#">+ Tạo showcase</a></div>
        </div>

        <table class="table">
            <thead><tr><th>Tiêu đề</th><th>Chữ</th><th>Phông chữ</th><th>Hình ảnh</th><th>Hành động</th></tr></thead>
            <tbody>
            <tr>
                <td>Xem trước phông chữ</td>
                <td>Nhập gì đó ở đây</td>
                <td>Roboto</td>
                <td><img src="https://placekitten.com/64/64" style="border-radius:6px"></td>
                <td><a class="btn ghost" href="#">Sao chép mã</a></td>
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