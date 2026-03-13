@include('layouts.components.header')
@include('lecturer.components.sidebar')

<div class="content-wrapper">

    {{-- CONTENT HEADER --}}
    <div class="content-header">
        <div class="container-fluid d-flex justify-content-between">
            <h4 class="m-0">Danh sách tiết học</h4>

            <a href="{{ route('lecturer.sessions.create') }}" class="btn btn-success">
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
                               placeholder="Chọn môn học">

                        <button class="btn btn-info">
                            <i class="fas fa-search"></i> Tìm kiếm
                        </button>

                    </form>

                    {{-- TABLE --}}
                    <table class="table table-bordered table-hover">

                        <thead class="bg-light">
                            <tr>
                                <th>ID</th>
                                <th>Lớp</th>
                                <th>Môn học</th>
                                <th>Ngày điểm danh</th>
                                <th>Số SV có mặt</th>
                                <th>Số SV vắng</th>
                                <th>Mã QR</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>

                        @foreach($sessions as $session)

                        @php
                            $present = $session->attendances->where('status','present')->count();
                            $total = $session->class->students->count() ?? 0;
                            $absent = $total - $present;
                        @endphp

                        <tr>

                            <td>{{ $session->id }}</td>

                            <td>{{ $session->class->name ?? '' }}</td>

                            <td>{{ $session->subject->name ?? '' }}</td>

                            <td>{{ $session->session_date }}</td>

                            <td>{{ $session->present_count  }}</td>
                            <td>{{ $session->absent_count }}</td>

                           <td>
                                <div id="qr-{{ $session->id }}"></div>

                                    <script>
                                    new QRCode(document.getElementById("qr-{{ $session->id }}"), {
                                        text: "{{ route('attendance.scan',$session->qr_token) }}",
                                        width: 90,
                                        height: 90
                                    });
                                    </script>
                            </td>

                            <td>

                                <a href="{{ route('lecturer.sessions.show',$session->id) }}" 
                                   class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('lecturer.sessions.edit',$session->id) }}" 
                                   class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('lecturer.sessions.destroy',$session->id) }}" 
                                      method="POST"
                                      style="display:inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Xóa tiết học này?')">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </form>

                            </td>

                        </tr>

                        @endforeach

                        </tbody>

                    </table>

                    {{-- PAGINATION --}}
                    <div class="mt-2">
                        {{ $sessions->appends(request()->all())->links() }}
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

@include('layouts.components.footer')