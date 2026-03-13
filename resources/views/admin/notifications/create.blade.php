@include('layouts.components.header')
@include('admin.components.sidebar')
<div class="content-wrapper">
<div class="card">
    <div class="card-header">Tạo thông báo mới</div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.notifications.store') }} " enctype="multipart/form-data">
            @csrf
               @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif
            
            <div class="mb-3">
                <label>Ảnh sinh viên</label>
                <input type="file" name="photo" accept="image/*"  class="form-control">
            </div>
                @error('photo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            <label>Tiêu đề</label>
            <input type="text" name="title"
                   class="form-control mb-2">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <label>Nội dung</label>
            <textarea name="content" class="form-control mb-2"></textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <button class="btn btn-success">Lưu</button>
        </form>
    </div>
</div>
</div>
@include('layouts.components.footer')