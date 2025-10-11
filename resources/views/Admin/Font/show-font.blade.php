@extends('Admin.layout.app')

@section('title', 'Chi tiết Font')

@section('content')
<div class="container">
    <h1 class="mb-3">Chi tiết Font: {{ $font->name }}</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $font->id }}</p>
            <p><strong>Tên font:</strong> {{ $font->name }}</p>
            <p><strong>Slug:</strong> {{ $font->slug }}</p>
            <p><strong>Đường dẫn file:</strong> {{ $font->file_path }}</p>
            <p><strong>Format:</strong> {{ strtoupper($font->format) }}</p>
            <p><strong>Preview text:</strong> {{ $font->preview_text ?? 'Không có' }}</p>
            <p><strong>Danh mục:</strong> {{ $font->category->name ?? 'Không có' }}</p>
            <p><strong>Tags:</strong>
                @forelse($font->tags as $tag)
                    <span class="badge bg-primary">{{ $tag->name }}</span>
                @empty
                    <span class="text-muted">Không có tag</span>
                @endforelse
            </p>
            <p><strong>Trạng thái:</strong> 
                @if($font->status)
                    <span class="badge bg-success">Hiển thị</span>
                @else
                    <span class="badge bg-secondary">Ẩn</span>
                @endif
            </p>
            <p><strong>Ngày tạo:</strong> {{ $font->created_at ? $font->created_at->format('d/m/Y H:i') : 'Chưa có' }}</p>
            <p><strong>Cập nhật lần cuối:</strong> {{ $font->updated_at ? $font->updated_at->format('d/m/Y H:i') : 'Chưa có'     }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('admin.fonts.index') }}" class="btn btn-secondary">⬅ Quay lại danh sách</a>
        <a href="{{ route('admin.fonts.edit', $font->id) }}" class="btn btn-warning">✏ Sửa</a>
        <form action="{{ route('admin.fonts.destroy', $font->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Bạn có chắc muốn xóa font này?')">🗑 Xóa</button>
        </form>
    </div>
</div>
@endsection
