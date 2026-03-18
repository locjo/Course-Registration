@include('layouts.components.header')
@include('lecturer.components.sidebar')
<div class="content-wrapper">
<div class="card">
    <div class="card-header">Thêm bài kiểm tra</div>

    <div class="card-body">
        <form method="POST" action="{{ route('lecturer.exams.store') }}">
            @csrf

            <label>Bài kiểm tra</label>
            <input type="text" name="exam_title"
                   class="form-control mb-2">
            @error('exam_title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <label>Thời gian</label>
            <input type="text" name="time_limit"
                   class="form-control mb-2">
            @error('time_limit')
                <div class="text-danger">{{ $message }}</div>
            @enderror
             <label>Lớp học phần</label>
            <select name="section_class_id" class="form-control mb-2">
                <option value="">-- Chọn lớp học phần --</option>
                @foreach($section_classes as $section_class)
                    <option value="{{ $section_class->id }}">
                        {{ $section_class->section_code }}
                    </option>
                @endforeach
            </select>
            @error('lecturer_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-success">Lưu</button>
        </form>
    </div>
</div>
</div>
@include('layouts.components.footer')