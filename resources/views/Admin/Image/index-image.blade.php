@extends('Admin.layout.app')

@section('title', 'Ảnh font')

@section('content')
    <main class="main">
    
        <div class="page-title">Thư viện ảnh</div>
        <div class="card">
        <div class="uploader">Kéo & thả hình ảnh vào đây<br><small class="small-muted">Tối đa 5 MB mỗi tệp - JPEG, PNG</small></div>
        </div>
        <div class="card">
        <table class="table">
            <thead><tr><th>Hình ảnh</th><th>Tên tệp</th><th>Cách sử dụng</th><th>Trưng bày</th></tr></thead>
            <tbody>
            <tr><td><img src="https://placekitten.com/80/80" style="border-radius:6px"></td><td>cao_tuyet.jpg</td><td>Biểu trưng</td><td>Xem</td></tr>
            </tbody>
        </table>
        </div>

    </main>




@endsection

@section('styles')
    <style>

    </style>
@endsection