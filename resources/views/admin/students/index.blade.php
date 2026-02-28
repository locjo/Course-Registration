@include('layouts.components.header')
@include('layouts.components.sidebar')

<div class="content-wrapper">

    <div class="container mt-4">


    <!-- ===== Bộ lọc ===== -->
    <div class="card mb-3">
        <div class="card-body">
            <div class="content-header">
                <div class="container-fluid d-flex justify-content-between">
                    <h4 class="m-0">Danh sách sinh viên</h4>

                    <a href="{{ route('admin.students.create') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Thêm mới
                    </a>
                </div>
            </div>

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
                    <div class="col-md-3">
                        <button class="btn btn-info w-100">
                            Import Excel
                        </button>
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
                        <th>Lớp</th>
                        <th>Khoa</th>
                        <th width="120">Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($students as  $student)
                    <tr class="text-center">
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->code }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->class->name }}</td>
                        <td>{{ $student->department->name }}</td>
                        <td>
                            <a href="{{ route('admin.students.show',$student->id) }}"
                                class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.students.edit',$student->id) }}"
                                class="btn btn-info btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('admin.students.destroy',$student->id) }}"
                                    method="POST"
                                    style="display:inline-block">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Xóa sinh viên này?')">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>


</div>

@include('layouts.components.footer')