@include('layouts.components.header')
@include('admin.components.sidebar')
<div class="content-wrapper">

<div class="card">
    <div class="card-header">Sửa thông báo</div>
    
    <div class="card-body">
        <form method="POST"
              action="{{ route('admin.notifications.update', $notification->id) }}">
            @csrf
            @method('PUT')

            <label>Tiêu đề</label>
            <input type="text" name="title"
                   value="{{ $notification->title }}"
                   class="form-control mb-2">

            <label>Nội dung</label>
            <textarea name="content" class="form-control mb-2">{{ $notification->content }}</textarea>
                <label>Ảnh</label>
                <input type="file" name="photo"
                       class="form-control mb-2">
            <button class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</div>
</div>
@include('layouts.components.footer')