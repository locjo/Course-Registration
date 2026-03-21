@include('layouts.components.header')
@include('student.components.sidebar')

<div class="content-wrapper">
    <div class="container mt-4">

        <h4 class="mb-3">Học phần đã đăng ký</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body p-0">

                <table class="table table-bordered text-center mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Mã học phần</th>
                            <th>Tên môn</th>
                            <th>Giảng viên</th>
                            <th>Bắt đầu</th>
                            <th>Kết thúc</th>
                            <th>Điểm</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($enrollments as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('student.section.students', $item->section_class->id) }}">
                                {{  $item->section_class->section_code }}
                                </a></td>
                                <td>{{ $item->section_class->course->name }}</td>
                                <td>{{ $item->section_class->lecturer->name }}</td>
                                <td>{{ $item->section_class->start_date }}</td>
                                <td>{{ $item->section_class->end_date }}</td>
                                <td>
                                    {{ $item->score ?? 'Chưa có' }}
                                </td>
                                <td>
                                    <form action="{{ route('student.enrollments.destroy', $item->section_class_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Hủy học phần này?')">
                                            Hủy
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">Bạn chưa đăng ký học phần nào</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>
        </div>

    </div>
</div>

@include('layouts.components.footer')