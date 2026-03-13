@include('layouts.components.header')
@include('admin.components.sidebar')

<div class="content-wrapper">
    <div class="container-fluid">

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">THÔNG TIN GIẢNG VIÊN</h5>
            </div>

            <div class="card-body">
                <div class="row">

                    {{-- Ảnh --}}
                    <div class="col-md-3 text-center">
                        @if($lecturer->photo)
                            <img src="{{ asset('storage/'.$lecturer->photo) }}"
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
                                <th>Mã giảng viên</th>
                                <td>{{ $lecturer->lecturer_code }}</td>
                            </tr>

                            <tr>
                                <th>Họ và tên</th>
                                <td>{{ $lecturer->name }}</td>
                            </tr>

                            <tr>
                                <th>Giới tính</th>
                                <td>
                                    {{ $lecturer->gender == 'male' ? 'Nam' : 'Nữ' }}
                                </td>
                            </tr>

                            <tr>
                                <th>Ngày sinh</th>
                                <td>{{ $lecturer->birthday }}</td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td>{{ $lecturer->user->email ?? '' }}</td>
                            </tr>

                            <tr>
                                <th>Số điện thoại</th>
                                <td>{{ $lecturer->phone }}</td>
                            </tr>

                            <tr>
                                <th>Số CMND</th>
                                <td>{{ $lecturer->identity_number }}</td>
                            </tr>

                            <tr>
                                <th>Bằng cấp</th>
                                <td>{{ $lecturer->degree }}</td>
                            </tr>

                            <tr>
                                <th>Chức vụ</th>
                                <td>{{ $lecturer->academic_title }}</td>
                            </tr>

                            <tr>
                                <th>Khoa</th>
                                <td>{{ $lecturer->department->name ?? '' }}</td>
                            </tr>

                            <tr>
                                <th>Quê quán</th>
                                <td>{{ $lecturer->hometown }}</td>
                            </tr>

                            <tr>
                                <th>Nơi đăng ký thường trú</th>
                                <td>{{ $lecturer->permanent_address }}</td>
                            </tr>

                        </table>

                        <a href="{{ route('admin.lecturers.index') }}"
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