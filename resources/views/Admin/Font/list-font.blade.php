@extends('Admin.layout.app')

@section('title', 'Danh sách Font')

@section('content')
<main class="main">

    {{-- Tiêu đề trang --}}
    <div class="page-title">Quản lý phông chữ</div>

    {{-- Thông tin dung lượng (tùy chỉnh sau nếu có dữ liệu thực tế) --}}
    <div class="card">
        <div class="badge-green">Lưu trữ của bạn</div>
        <div class="small-muted" style="margin-top:8px">
            Đã sử dụng 0.0000 GB trong tổng số 50 GB
        </div>
    </div>

    {{-- Thanh công cụ --}}
    <div class="card">
        <div class="toolbar">
            <div class="card mt-3 p-3">
                <form action="{{ route('admin.fonts.store') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center gap-2">
                    @csrf
                    <input type="file" name="file_path" class="form-control" required>
                    <button type="submit" class="btn btn-success">Tải lên</button>
                </form>

                @if ($errors->any())
                    <div class="alert alert-danger mt-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success mt-2">{{ session('success') }}</div>
                @endif
            </div>

            
        </div>

        {{-- Hiển thị thông báo --}}
        @if(session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif
        <hr>
        {{-- Bảng danh sách --}}
        <table class="table mt-3">
            <div >
                <form action="{{ route('admin.fonts.index') }}" method="GET">
                    <input class="search" name="search" placeholder="Tìm kiếm phông chữ" value="{{ request('search') }}">
                </form>
            </div>
            <thead>
                <tr>
                    <th style="width: 30%;">Họ phông chữ</th>
                    <th style="width: 30%;">Slug</th>
                    <th style="width: 20%;">Xem trước</th>
                    <th style="width: 20%;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($fonts as $font)
                    <tr>
                        <td>{{ $font->name }}</td>
                        <td>{{ $font->slug }}</td>
                        <td style="font-family: '{{ $font->name }}', sans-serif; font-size: 18px;">
                            Hello world
                        </td>

                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.fonts.show', $font->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('admin.fonts.edit', $font->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen"></i></a>
                                <form action="{{ route('admin.fonts.destroy', $font->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Không có phông chữ nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Phân trang --}}
        <div class="mt-3">
            {{ $fonts->links() }}
        </div>
    </div>

</main>
@endsection

@section('styles')
    <style>
        .search {
            padding: 8px;
            width: 100%;
            max-width: 300px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .action-buttons {
            display: flex;
            gap: 4px;               /* khoảng cách giữa các nút */
            flex-wrap: nowrap;      /* không cho xuống dòng */
        }
        .action-buttons .btn {
            padding: 2px 6px;
            font-size: 12px;
        }
    </style>
@endsection