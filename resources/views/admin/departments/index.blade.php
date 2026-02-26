@include('layouts.components.header')
@include('layouts.components.sidebar')

<div class="content-wrapper">

    {{-- CONTENT HEADER --}}
    <div class="content-header">
        <div class="container-fluid d-flex justify-content-between">
            <h4 class="m-0">Danh sách khoa</h4>

            <a href="{{ route('admin.departments.create') }}" class="btn btn-success">
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
                            <th>Mã khoa</th>
                            <th>Tên khoa</th>
                            <th width="120">Thao tác</th>
                        </tr>
                        </thead>

                        <tbody>

                        @forelse($departments as $department)
                            <tr>
                                <td>{{ $department->id }}</td>
                                <td>{{ $department->code }}</td>
                                <td>{{ $department->name }}</td>

                                <td>

                                    <a href="{{ route('admin.departments.edit',$department->id) }}"
                                       class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.departments.destroy',$department->id) }}"
                                          method="POST"
                                          style="display:inline-block">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Xóa khoa này?')">
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
                        {{ $departments->appends(request()->all())->links() }}
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

@include('layouts.components.footer')