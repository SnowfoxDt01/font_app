@extends('Admin.layout.app')

@section('content')
<div class="container">
    <h1>Thêm Font mới</h1>

    <form action="{{ route('admin.fonts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Tên font</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control">
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">File font (.ttf, .otf)</label>
            <input type="file" name="file_path" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('admin.fonts.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
