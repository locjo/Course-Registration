@include('layouts.components.header')
@include('lecturer.components.sidebar')

<div class="content-wrapper">

    {{-- CONTENT HEADER --}}
    <div class="content-header">
        <div class="container-fluid d-flex justify-content-between">
            <h4 class="m-0">
                Thêm cau hoi moi
            </h4>

            <a href="{{ route('lecturer.exams.questions.index', $exam->id) }}"
               class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>
    </div>

    {{-- MAIN CONTENT --}}
    <div class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">

                    <form action="{{ route('lecturer.exams.questions.store', $exam->id) }}" method="POST">
                        @csrf
                        

                        @for($i = 0; $i < 15; $i++)
                            <div class="border p-3 mb-3">

                                <label><b>Câu {{ $i + 1 }}</b></label>
                                <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                                <input type="text"
                                    name="questions[{{ $i }}][question]"
                                    class="form-control mb-2">

                                <div class="row">

                                    <div class="col-md-2">
                                        <input type="text"
                                            name="questions[{{ $i }}][option_a]"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-2">
                                        <input type="text"
                                            name="questions[{{ $i }}][option_b]"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-2">
                                        <input type="text"
                                            name="questions[{{ $i }}][option_c]"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-2">
                                        <input type="text"
                                            name="questions[{{ $i }}][option_d]"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-2">
                                        <select name="questions[{{ $i }}][correct_answer]" class="form-control">
                                            <option value="">Đáp án</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        @endfor

                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Lưu 15 câu hỏi
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@include('layouts.components.footer')