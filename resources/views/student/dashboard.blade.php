
@include('layouts.components.header')
@include('student.components.sidebar')

<div class="content-wrapper p-4">

<div class="card shadow-sm border-primary">
    
    <div class="card-header bg-white border-bottom">
        <h5 class="mb-0">
            <i class="fa fa-user text-primary"></i>
            Thông tin sinh viên
        </h5>
    </div>

    <div class="card-body">
        <div class="row">

            <!-- Avatar -->
            <div class="col-md-2 text-center">
                @if($student->photo)
                    <img src="{{ asset('storage/'.$student) }}"
                        class="img-fluid rounded"
                        style="max-height:250px">
                @else
                    <img src="{{ asset('images/no-avatar.png') }}"
                        class="img-fluid rounded"
                        style="max-height:250px">
                @endif
            </div>

            <!-- Column 1 -->
            <div class="col-md-3">
                <p><strong>Mã SV:</strong>{{$student->student_code}}</p>
                <p><strong>Tên SV:</strong> {{$student->name}}</p>
                <p><strong>Ngày sinh:</strong> {{$student->birthday}}</p>
                <p><strong>Giới tính:</strong> {{$student->gender}}</p>
                <p><strong>Lớp:</strong>{{$student->class->name}}</p>
                <p><strong>Khoa:</strong>{{$student->department->name}}</p>
                <p><strong>Niên khóa:</strong>{{$student->academic_year}}</p>
            </div>

            <!-- Divider -->
            <div class="col-md-1 border-start"></div>

            <!-- Column 2 -->
            <div class="col-md-3">
                <p><strong>Email:</strong>{{$student->user->email}}</p>
                <p><strong>Số điện thoại:</strong>{{$student->phone}}</p>
                <p><strong>Số CMND / CCCD:</strong>{{$student->identity_number}}</p>
                <p><strong>Nơi sinh:</strong>{{$student->place_of_birth}}</p>
                <p><strong>Thường trú:</strong>{{$student->permanent_address}}</p>
            </div>

        </div>
    </div>

</div>

</div>

@include('layouts.components.footer')