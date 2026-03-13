@include('layouts.components.header')
@include('admin.components.sidebar')
<div class="content-wrapper">
<div class="card">
    <div class="card-header">Thêm môn học</div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.courses.store') }}">
            @csrf
               @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

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
                <input type="number" name="capacity"
                        class="form-control mb-2">
                @error('capacity')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <label>Giảng viên</label>
                <select name="lecturer_id"
                        class="form-control mb-2">
                    <option value="">Chọn giảng viên</option>
                    @foreach($lecturers as $lecturer)
                        <option value="{{ $lecturer->id }}">{{ $lecturer->name }}</option>
                    @endforeach
                </select>
                @error('lecturer_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            <button class="btn btn-success">Lưu</button>
        </form>
    </div>
</div>
</div>
@include('layouts.components.footer')