@include('layouts.components.header')
@include('layouts.components.sidebar')

<div class="content-wrapper">
    <div class="container-fluid">

        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">CẬP NHẬT THÔNG TIN GIẢNG VIÊN</h5>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.lecturers.update', $lecturer->id) }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- LEFT --}}
                        <div class="col-md-6">

                            {{-- Ảnh --}}
                            <div class="mb-3 text-center">
                                @if($lecturer->photo)
                                    <img src="{{ asset('storage/'.$lecturer->photo) }}"
                                         class="img-fluid rounded mb-2"
                                         style="max-height:200px">
                                @endif

                                <input type="file"
                                       name="avatar"
                                       class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Niên khóa *</label>
                                <input type="text"
                                       name="academic_year"
                                       value="{{ old('academic_year', $lecturer->academic_year) }}"
                                       class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Số CMND *</label>
                                <input type="text"
                                       name="identity_number"
                                       value="{{ old('identity_number', $lecturer->identity_number) }}"
                                       class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Số điện thoại *</label>
                                <input type="text"
                                       name="phone"
                                       value="{{ old('phone', $lecturer->phone) }}"
                                       class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Email *</label>
                                <input type="email"
                                       name="email"
                                       value="{{ old('email', $lecturer->user->email) }}"
                                       class="form-control">
                            </div>
                            
                            <div class="mb-3">
                                <label>Lớp *</label>
                                <select name="class_id" class="form-control">
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}"
                                            {{ $lecturer->class_id == $class->id ? 'selected' : '' }}>
                                            {{ $class->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Khoa *</label>
                                <select name="department_id" class="form-control">
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}"
                                            {{ $lecturer->department_id == $department->id ? 'selected' : '' }}>
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
                                <input type="text"
                                       name="lecturer_code"
                                       value="{{ old('lecturer_code', $lecturer->lecturer_code) }}"
                                       class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Họ và tên *</label>
                                <input type="text"
                                       name="name"
                                       value="{{ old('name', $lecturer->name) }}"
                                       class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Giới tính *</label>
                                <select name="gender" class="form-control">
                                    <option value="male"
                                        {{ $lecturer->gender == 'male' ? 'selected' : '' }}>
                                        Nam
                                    </option>
                                    <option value="female"
                                        {{ $lecturer->gender == 'female' ? 'selected' : '' }}>
                                        Nữ
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Ngày sinh *</label>
                                <input type="date"
                                       name="birthday"
                                       value="{{ old('birthday', $lecturer->birthday) }}"
                                       class="form-control">
                            </div>

                            

                            <div class="mb-3">
                                <label>Quê quán</label>
                                <input type="text"
                                       name="hometown"
                                       value="{{ old('hometown', $lecturer->hometown) }}"
                                       class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Nơi đăng ký thường trú</label>
                                <input type="text"
                                       name="permanent_address"
                                       value="{{ old('permanent_address', $lecturer->permanent_address) }}"
                                       class="form-control">
                            </div>

                        </div>

                    </div>

                    <div class="text-end">
                        <button class="btn btn-success">Cập nhật</button>
                        <a href="{{ route('admin.lecturers.index') }}"
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