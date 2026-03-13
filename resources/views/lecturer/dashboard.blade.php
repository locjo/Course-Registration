@include('layouts.components.header')
@include('lecturer.components.sidebar')

<div class="content-wrapper p-4">

<div class="card shadow-sm border-primary">
    
    <div class="card-header bg-white border-bottom">
        <h5 class="mb-0">
            <i class="fa fa-user text-primary"></i>
            Thông tin giảng viên
        </h5>
    </div>

    <div class="card-body">
        <div class="row">

            <!-- Avatar -->
            <div class="col-md-2 text-center">
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

            <!-- Column 1 -->
            <div class="col-md-3">
                <p><strong>Mã GV:</strong>{{$lecturer->lecturer_code}}</p>
                <p><strong>Tên giảng viên:</strong> {{$lecturer->name}}</p>
                <p><strong>Ngày sinh:</strong> {{$lecturer->birthday}}</p>
                <p><strong>Giới tính:</strong> {{$lecturer->gender}}</p>
                                <p><strong>Bằng cấp:</strong>{{$lecturer->degree}}</p>
                <p><strong>Chức vụ:</strong>{{$lecturer->academic_title}}</p>
            </div>

            <!-- Divider -->
            <div class="col-md-1 border-start"></div>

            <!-- Column 2 -->
            <div class="col-md-3">
                <p><strong>Email:</strong>{{$lecturer->user->email}}</p>
                <p><strong>Số điện thoại:</strong>{{$lecturer->phone}}</p>
                <p><strong>Số CMND / CCCD:</strong>{{$lecturer->identify_number}}</p>
                <p><strong>Nơi sinh:</strong>{{$lecturer->hometown}}</p>
                <p><strong>Thường trú:</strong>{{$lecturer->permanent_address}}</p>
            </div>

        </div>
    </div>

</div>

</div>

@include('layouts.components.footer')