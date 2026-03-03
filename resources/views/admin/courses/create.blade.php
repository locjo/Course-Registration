@include('layouts.components.header')
@include('layouts.components.sidebar')
<div class="content-wrapper">
<div class="card">
    <div class="card-header">Thêm môn học</div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.courses.store') }}">
            @csrf

            <label>Mã môn học</label>
            <input type="text" name="code"
                   class="form-control mb-2">
            @error('code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <label>Tên môn học</label>
            <input type="text" name="name"
                   class="form-control mb-2">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
                <label>Số tín</label>
                <input type="number" name="credits"
                       class="form-control mb-2">
                @error('credits')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <label>Slot</label>
                <input type="number" name="slot"
                        class="form-control mb-2">
                @error('slot')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <label>Giảng viên</label>
                <input type="text" name="instructor"
                        class="form-control mb-2">
                @error('instructor')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            <button class="btn btn-success">Lưu</button>
        </form>
    </div>
</div>
</div>
@include('layouts.components.footer')