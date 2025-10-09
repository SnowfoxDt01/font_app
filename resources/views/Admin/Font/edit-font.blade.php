@extends('Admin.layout.app')
@section('content')
<div class="container">
    <h1>Sửa Font: {{ $font->name }}</h1>

    <form action="{{ route('admin.fonts.update', $font->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Tên font</label>
            <input type="text" name="name" class="form-control" value="{{ $font->name }}" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ $font->slug }}">
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">File font (nếu muốn thay)</label>
            <input type="file" name="file_path" class="form-control">
            @if($font->file_path)
                <p>File hiện tại: <a href="{{ asset('storage/'.$font->file_path) }}" target="_blank">{{ $font->file_path }}</a></p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.fonts.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
