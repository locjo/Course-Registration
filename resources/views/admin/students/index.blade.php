@include('layouts.components.header')
@include('layouts.components.sidebar')

<div class="content-wrapper">

    <div class="container mt-4">

    <!-- ===== Bộ lọc ===== -->
    <div class="card mb-3">
        <div class="card-body">

            <form method="GET" action="">
                <div class="row mb-3">

                    <!-- Từ ngày -->
                    <div class="col-md-3">
                        <input type="date" name="from_date" class="form-control">
                    </div>

                    <!-- Tên lớp -->
                    <div class="col-md-3">
                        <select name="class_id" class="form-select">
                            <option value="">Chọn lớp</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">
                                    {{ $class->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Khoa -->
                    <div class="col-md-3">
                        <select name="department_id" class="form-select">
                            <option value="">Chọn khoa</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->code }}">
                                    {{ $dept->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <button class="btn btn-success w-100">
                            Export Excel
                        </button>
                    </div>
                </div>

                <div class="row">

                    <!-- Mã sinh viên -->
                    <div class="col-md-3">
                        <input type="text"
                               name="student_code"
                               class="form-control"
                               placeholder="Tìm mã sinh viên...">
                    </div>

                    <!-- Tên sinh viên -->
                    <div class="col-md-3">
                        <input type="text"
                               name="student_name"
                               class="form-control"
                               placeholder="Tìm tên sinh viên...">
                    </div>

                    <!-- Đến ngày -->
                    <div class="col-md-3">
                        <input type="date" name="to_date" class="form-control">
                    </div>

                    <!-- Chọn lớp -->
                    <div class="col-md-3">
                        <select name="class_id" class="form-select">
                            <option value="">Chọn lớp</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">
                                    {{ $class->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="mt-3">
                    <button class="btn btn-info text-white">
                        🔍 Tìm kiếm
                    </button>
                    <a href="" class="btn btn-danger">
                        Reset
                    </a>
                </div>
            </form>

        </div>
    </div>

    <!-- ===== Bảng sinh viên ===== -->
    <div class="card">
        <div class="card-body p-0">

            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light text-center">
                    <tr>
                        <th>STT</th>
                        <th>Mã sinh viên</th>
                        <th>Tên sinh viên</th>
                        <th>Ngày sinh</th>
                        <th>Lớp</th>
                        <th>Khoa</th>
                        <th width="120">Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($students as $key => $student)
                    <tr class="text-center">
                        <td>{{ $key+1 }}</td>
                        <td>{{ $student->code }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->birthday }}</td>
                        <td>{{ $student->class->name }}</td>
                        <td>{{ $student->department->name }}</td>
                        <td>
                            <a href="" class="btn btn-sm btn-info">👁</a>
                            <a href="" class="btn btn-sm btn-warning">✏</a>
                            <a href="" class="btn btn-sm btn-danger">🗑</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>


</div>

@include('layouts.components.footer')