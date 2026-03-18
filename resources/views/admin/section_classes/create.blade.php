@include('layouts.components.header')
@include('admin.components.sidebar')

<div class="content-wrapper">
<div class="card">
    <div class="card-header">Thêm học phần</div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.section_classes.store') }}">
            @csrf

            <label>Mã học phần</label>
            <input type="text" name="section_code"
                   class="form-control mb-2">
            @error('section_code')
                <div class="text-danger">{{ $message }}</div>
            @enderror


            <label> </label>
            <select name="course_id" class="form-control mb-2">
                <option value="">-- Chọn môn học --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
            @error('course_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror


            <label>Giảng viên</label>
            <select name="lecturer_id" class="form-control mb-2">
                <option value="">-- Chọn giảng viên --</option>
                @foreach($lecturers as $lecturer)
                    <option value="{{ $lecturer->id }}">
                        {{ $lecturer->name }}
                    </option>
                @endforeach
            </select>
            @error('lecturer_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror


            <label>Ngày bắt đầu</label>
            <input type="date" name="start_date"
                   class="form-control mb-2">
            @error('start_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror


            <label>Ngày kết thúc</label>
            <input type="date" name="end_date"
                   class="form-control mb-2">
            @error('end_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror


            <label>Slot</label>
            <input type="number" name="capacity"
                   class="form-control mb-3">
            @error('capacity')
                <div class="text-danger">{{ $message }}</div>
            @enderror


            <button class="btn btn-success">Lưu</button>

        </form>
    </div>
</div>
</div>

@include('layouts.components.footer')