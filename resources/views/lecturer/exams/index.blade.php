@include('layouts.components.header')
@include('lecturer.components.sidebar')

<div class="content-wrapper">

    {{-- CONTENT HEADER --}}
    <div class="content-header">
        <div class="container-fluid d-flex justify-content-between">
            <h4 class="m-0">Danh sách bài kiểm tra</h4>

            <a href="{{ route('lecturer.exams.create') }}" class="btn btn-success">
                <i class="fas fa-plus-circle"></i> Thêm mới
            </a>
        </div>
    </div>

    {{-- MAIN CONTENT --}}
    <div class="content">
        <div class="container-fluid">

            <div class="card">

                <div class="card-body">

                    {{-- SEARCH --}}
                    <form method="GET" class="d-flex mb-3">

                        <input type="text"
                               name="keyword"
                               value="{{ request('keyword') }}"
                               class="form-control mr-2"
                               placeholder="Tìm tên khoa hoặc mã...">

                        <button class="btn btn-info">
                            <i class="fas fa-search"></i> Tìm kiếm
                        </button>

                    </form>

                    {{-- TABLE --}}
                    <table class="table table-bordered table-hover">

                        <thead class="bg-light">
                        <tr>
                            <th width="80">ID</th>
                            <th>Bài kiểm tra</th>
                            <th>Thời gian</th>
                            <th>Lớp học phần</th>
                            <th width="180">Thao tác</th>
                        </tr>
                        </thead>

                        <tbody>

                        @forelse($exams as $exam)
                            <tr>
                                <td>{{ $exam->id }}</td>
                                <td><a href="{{ route('lecturer.exams.questions.index',$exam->id) }}">{{ $exam->exam_title }}</a></td>
                                <td>{{ $exam->time_limit }}</td>
                                <td>{{ $exam->section_class->section_code }}</td>
                                <td>
                                    <a href="{{ route('lecturer.exams.questions.create',$exam->id) }}"
                                        class="btn btn-info btn-sm">
                                        <i class="fas fa-plus"></i>
                                    </a>

                                    <a href="{{ route('lecturer.exams.show',$exam->id) }}"
                                        class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a href="{{ route('lecturer.exams.edit',$exam->id) }}"
                                       class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('lecturer.exams.destroy',$exam->id) }}"
                                          method="POST"
                                          style="display:inline-block">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Xóa bài kiểm tra này?')">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    Không có dữ liệu
                                </td>
                            </tr>
                        @endforelse

                        </tbody>

                    </table>

                    {{-- PAGINATION --}}
                    <div class="mt-2">
                        {{ $exams->appends(request()->all())->links() }}
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

@include('layouts.components.footer')