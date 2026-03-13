@include('layouts.components.header')
@include('admin.components.sidebar')

<div class="content-wrapper">
    <div class="container-fluid">

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">THÔNG TIN SINH VIÊN</h5>
            </div>

            <div class="card-body">
                <div class="row">

                    {{-- Ảnh --}}
                    <div class="col-md-3 text-center">
                        @if($student->photo)
                            <img src="{{ asset('storage/'.$student->photo) }}"
                                 class="img-fluid rounded"
                                 style="max-height:250px">
                        @else
                            <img src="{{ asset('images/no-avatar.png') }}"
                                 class="img-fluid rounded"
                                 style="max-height:250px">
                        @endif
                    </div>

                    {{-- Thông tin --}}
                    <div class="col-md-9">

                        <table class="table table-bordered">
                            <tr>
                                <th>Mã sinh viên</th>
                                <td>{{ $student->student_code }}</td>
                            </tr>

                            <tr>
                                <th>Họ và tên</th>
                                <td>{{ $student->name }}</td>
                            </tr>

                            <tr>
                                <th>Giới tính</th>
                                <td>
                                    {{ $student->gender == 'male' ? 'Nam' : 'Nữ' }}
                                </td>
                            </tr>

                            <tr>
                                <th>Ngày sinh</th>
                                <td>{{ $student->birthday }}</td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td>{{ $student->user->email ?? '' }}</td>
                            </tr>

                            <tr>
                                <th>Số điện thoại</th>
                                <td>{{ $student->phone }}</td>
                            </tr>

                            <tr>
                                <th>Số CMND</th>
                                <td>{{ $student->identity_number }}</td>
                            </tr>

                            <tr>
                                <th>Niên khóa</th>
                                <td>{{ $student->academic_year }}</td>
                            </tr>

                            <tr>
                                <th>Lớp</th>
                                <td>{{ $student->class->name ?? '' }}</td>
                            </tr>

                            <tr>
                                <th>Khoa</th>
                                <td>{{ $student->department->name ?? '' }}</td>
                            </tr>

                            <tr>
                                <th>Quê quán</th>
                                <td>{{ $student->hometown }}</td>
                            </tr>

                            <tr>
                                <th>Nơi đăng ký thường trú</th>
                                <td>{{ $student->permanent_address }}</td>
                            </tr>

                        </table>

                        <a href="{{ route('admin.students.index') }}"
                           class="btn btn-secondary">
                            Quay lại
                        </a>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@include('layouts.components.footer')