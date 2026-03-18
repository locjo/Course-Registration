@include('layouts.components.header')
@include('lecturer.components.sidebar')

<div class="content-wrapper">

    {{-- HEADER --}}
    <div class="content-header">
        <div class="container-fluid d-flex justify-content-between">
            <h4>Danh sách câu hỏi - {{ $exam->title ?? 'Exam' }}</h4>

            <a href="{{ route('lecturer.exams.questions.create',$exam->id) }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Thêm câu hỏi
            </a>
        </div>
    </div>

    {{-- CONTENT --}}
    <div class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Câu hỏi</th>
                                <th>Đáp án đúng</th>
                                <th width="180">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>

                        @forelse($questions as $index => $q)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $q->question }}</td>
                                <td><b>{{ $q->correct_answer }}</b></td>

                                <td>
                                    

                                    

                                    <form action="{{ route('lecturer.exams.questions.destroy', [$exam->id, $q->id]) }}"
                                          method="POST"
                                          style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Xoá câu hỏi này?')">
                                            Xoá
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Chưa có câu hỏi</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>

                    {{-- PAGINATION --}}
                    <div class="mt-3">
                        {{ $questions->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

@include('layouts.components.footer')