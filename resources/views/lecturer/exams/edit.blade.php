@include('layouts.components.header')
@include('lecturer.components.sidebar')

<div class="content-wrapper">
    <div class="container-fluid">

        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">CẬP NHẬT BÀI KIỂM TRA</h5>
            </div>

            <div class="card-body">

                <form action="{{ route('lecturer.exams.update', $exam->id) }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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
                    <div class="text-end">
                        <button class="btn btn-success">Cập nhật</button>
                        <a href="{{ route('lecturer.exams.index') }}"
                           class="btn btn-secondary">
                            Quay lại
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@include('layouts.components.footer')