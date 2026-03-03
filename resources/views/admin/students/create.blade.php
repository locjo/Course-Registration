@include('layouts.components.header')
@include('layouts.components.sidebar')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">THÔNG TIN SINH VIÊN</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.students.store') }}" 
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
                                <label>Ảnh sinh viên</label>
                                <input type="file" name="photo" accept="image/*" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Niên khóa *</label>
                                <input type="text" name="academic_year"
                                    placeholder="2012-2017"
                                    class="form-control">
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
                                <label>Lớp *</label>
                                <select name="class_id" class="form-control">
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">
                                            {{ $class->name }}
                                        </option>
                                    @endforeach
                                </select>
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
                                <label>Mã sinh viên *</label>
                                <input type="text" name="student_code"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Họ và tên *</label>
                                <input type="text" name="name"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Giới tính *</label>
                                <select name="gender" class="form-control">
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                    <option value="Khác">Khác</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Ngày sinh *</label>
                                <input type="date" name="birthday"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Quê quán</label>
                                <input type="text" name="place_of_birth"
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
                        <button class="btn btn-success">Lưu sinh viên</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.components.footer')