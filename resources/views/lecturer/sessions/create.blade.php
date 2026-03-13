@include('layouts.components.header')
@include('lecturer.components.sidebar')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
        <h4>Thêm mới thông tin điểm danh</h4>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">

                    <form action="{{ route('lecturer.sessions.store') }}" method="POST">

                    @csrf

                    <div class="form-group">
                    <label>Lớp</label>

                    <select name="class_id" class="form-control">
                    <option value="">-- Chọn lớp --</option>

                    @foreach($classes as $class)

                    <option value="{{ $class->id }}">
                    {{ $class->name }}
                    </option>

                    @endforeach

                    </select>
                    </div>

                    <div class="form-group">
                    <label>Môn học *</label>

                    <select name="course_id" class="form-control">

                    <option value="">-- Chọn môn học --</option>

                    @foreach($courses as $course)

                    <option value="{{ $course->id }}">
                        {{ $course->name }}
                    </option>

                    @endforeach

                    </select>

                    </div>
                    

                    <div class="form-group">

                    <label>Ngày điểm danh *</label>

                    <input type="datetime-local" name="session_date" required>

                    </div>

                    <div class="mt-3">

                    <button class="btn btn-primary" type="submit">
                    <i class="fas fa-save"></i> Lưu thông tin
                    </button>

                    <a href="{{ route('lecturer.sessions.index') }}"
                    class="btn btn-danger">
                    Hủy bỏ
                    </a>

                    </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

@include('layouts.components.footer')