@include('layouts.components.header')
@include('admin.components.sidebar')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">THÔNG TIN GIẢNG VIÊN</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.lecturers.store') }}" 
                    method="POST" 
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        {{-- LEFT --}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Ảnh giảng viên</label>
                                <input type="file" name="photo" accept="image/*" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Số CMND *</label>
                                <input type="text" name="identity_number"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Số điện thoại *</label>
                                <input type="text" name="phone"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Email *</label>
                                <input type="email" name="email"
                                    class="form-control">
                            </div>
                            

                            <div class="mb-3">
                                <label>Khoa *</label>
                                <select name="department_id" class="form-control">
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">
                                            {{ $department->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        

                        {{-- RIGHT --}}
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label>Mã giảng viên *</label>
                                <input type="text" name="lecturer_code"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Họ và tên *</label>
                                <input type="text" name="name"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Bằng cấp</label>
                                <select name="degree"
                                    class="form-control">
                                    <option value="Cu nhan">Cử nhân</option>
                                    <option value="Thac si">Thạc sĩ</option>
                                    <option value="Tien si">Tiến sĩ</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Chức vụ</label>
                                <select name="academic_title" class="form-control">
                                    <option value="Giang vien">Giảng viên</option>
                                    <option value="Tro giang">Trợ giảng</option>
                                    <option value="Pho giao su">Phó giáo sư</option>
                                    <option value="Giao su">Giáo sư</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Giới tính *</label>
                                <select name="gender" class="form-control">
                                    <option value="nam">Nam</option>
                                    <option value="nữ">Nữ</option>
                                    <option value="khác">Khác</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Ngày sinh *</label>
                                <input type="date" name="birthday"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Quê quán</label>
                                <input type="text" name="hometown"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Nơi đăng ký thường trú</label>
                                <input type="text" name="permanent_address"
                                    class="form-control">
                            </div>

                        </div>

                    </div>

                    <div class="text-end">
                        <button class="btn btn-success">Lưu giảng viên</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.components.footer')