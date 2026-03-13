@include('layouts.components.header')
@include('admin.components.sidebar')

<div class="content-wrapper">

    <div class="container mt-4">


    <!-- ===== Bộ lọc ===== -->
    <div class="card mb-3">
        <div class="card-body">
            <div class="content-header">
                <div class="container-fluid d-flex justify-content-between">
                    <h4 class="m-0">Danh sách giảng viên</h4>

                    <a href="{{ route('admin.lecturers.create') }}" class="btn btn-success">
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
                     <div class="col-md-3">
                        <button class="btn btn-info w-100">
                            Import Excel
                        </button>
                    </div>

                </div>

                <div class="row">

                    <!-- Mã sinh viên -->
                    <div class="col-md-3">
                        <input type="text"
                               name="lecturer_code"
                               class="form-control"
                               placeholder="Tìm mã giảng viên...">
                    </div>

                    <!-- Tên sinh viên -->
                    <div class="col-md-3">
                        <input type="text"
                               name="lecturer_name"
                               class="form-control"
                               placeholder="Tìm tên giảng viên...">
                    </div>

                    <!-- Đến ngày -->
                    <div class="col-md-3">
                        <input type="date" name="to_date" class="form-control">
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
                        <th>Mã giảng viên</th>
                        <th>Tên giảng viên</th>
                        <th>Khoa</th>
                        <th width="120">Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($lecturers as  $lecturer)
                    <tr class="text-center">
                        <td>{{ $lecturer->id }}</td>
                        <td>{{ $lecturer->lecturer_code }}</td>
                        <td>{{ $lecturer->name }}</td>
                        <td>{{ $lecturer->department->name }}</td>
                        <td>
                            <a href="{{ route('admin.lecturers.show',$lecturer->id) }}"
                                class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.lecturers.edit',$lecturer->id) }}"
                                class="btn btn-info btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('admin.lecturers.destroy',$lecturer->id) }}"
                                    method="POST"
                                    style="display:inline-block">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Xóa giảng viên này?')">
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