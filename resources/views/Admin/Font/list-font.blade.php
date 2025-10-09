@extends('Admin.layout.app')

@section('title', 'Danh sách Font')

@section('content')
<div class="container">
    <h1 class="mb-3">Danh sách Font</h1>

    <a href="{{ route('admin.fonts.create') }}" class="btn btn-primary mb-3">➕ Thêm font mới</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên font</th>
                <th>Slug</th>
                <th>Xem trước</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fonts as $font)
                <tr>
                    <td>{{ $font->id }}</td>
                    <td>{{ $font->name }}</td>
                    <td>{{ $font->slug }}</td>
                    <td style="font-family: '{{ $font->name }}';">
                        Ví dụ chữ: <span style="font-size:18px;">Hello World</span>
                    </td>
                    <td>
                        <a href="{{ route('admin.fonts.show', $font->id) }}" class="btn btn-info btn-sm">👁 Xem</a>
                        <a href="{{ route('admin.fonts.edit', $font->id) }}" class="btn btn-warning btn-sm">✏ Sửa</a>
                        <form action="{{ route('admin.fonts.destroy', $font->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Bạn có chắc muốn xóa?')">🗑 Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- phân trang --}}
    <div class="mt-3">
        {{ $fonts->links() }}
    </div>
</div>
@endsection
