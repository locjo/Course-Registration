@include('layouts.components.header')
@include('student.components.sidebar')

<div class="content-wrapper">

    <div class="container mt-4">


    <!-- ===== Bộ lọc ===== -->
    <div class="card mb-3">
        <div class="card-body">
            <div class="content-header">
                <div class="container-fluid d-flex justify-content-between">
                    <h4 class="m-0">Danh sách học phần</h4>

                    
                </div>
            </div>

            <form method="GET" action="">
                <div class="row mb-3">

                    <!-- Tên lớp -->
                    <div class="col-md-3">
                        <select name="course_id" class="form-select">
                            <option value="">Chọn môn học</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">
                                    {{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                    <button class="btn btn-info text-white">
                        🔍 Tìm kiếm
                    </button>
                    </form>
                    <a href="{{route('student.enrollments.my')}}" class="btn btn-info">
                        Danh sach hoc phan
                    </a>
                </div>
            </div>
            
        </div>
    </div>

    <!-- ===== Bảng sinh viên ===== -->
    <div class="card">
        <div class="card-body p-0">

            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light text-center">
                    <tr>
                        <th>STT</th>
                        <th>Mã học phần</th>
                        <th>Tên môn học</th>
                        <th>Thời gian bắt đầu</th>
                        <th>Thời gian kết thúc</th>
                        <th>Giảng viên</th>
                        <th width="120">Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($section_classes as  $section_class)
                    <tr class="text-center">
                        <td>{{ $section_class->id }}</td>
                        <td><a href="{{ route('student.section.students', $section_class->id) }}">
                                {{  $section_class->section_code }}
                            </a></td>
                        <td>{{ $section_class->course->name }}</td>
                        <td>{{ $section_class->start_date }}</td>
                        <td>{{ $section_class->end_date }}</td>
                        <td>{{ $section_class->lecturer->name }}</td>
                        <td>
                            @if(in_array($section_class->id, $enrolledIds))
                                <form action="{{ route('student.enrollments.destroy', $section_class->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Hủy học phần
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('student.enrollments.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="section_class_id" value="{{ $section_class->id }}">
                                    
                                    <button type="submit" class="btn btn-info btn-sm">
                                        Đăng ký
                                    </button>
                                </form>
                            @endif
                           

                            
                            

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>


</div>
</div>
@include('layouts.components.footer')