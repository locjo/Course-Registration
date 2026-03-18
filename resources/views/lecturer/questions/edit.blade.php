@include('layouts.components.header')
@include('lecturer.components.sidebar')

<div class="content-wrapper">
    

    @foreach($questions as $i => $q)
        <div class="border p-3 mb-3">
            <form action="{{ route('lecturer.exams.questions.update', [$exam->id, $q->id]) }}"
                method="POST">
                @csrf
                @method('PUT')
            <label><b>Câu {{ $i + 1 }}</b></label>

            {{-- ID ẩn --}}
            <input type="hidden" name="questions[{{ $i }}][id]" value="{{ $q->id }}">

            <input type="text"
                   name="questions[{{ $i }}][question]"
                   value="{{ $q->question }}"
                   class="form-control mb-2">

            <div class="row">

                <div class="col-md-2">
                    <input type="text"
                           name="questions[{{ $i }}][option_a]"
                           value="{{ $q->option_a }}"
                           class="form-control">
                </div>

                <div class="col-md-2">
                    <input type="text"
                           name="questions[{{ $i }}][option_b]"
                           value="{{ $q->option_b }}"
                           class="form-control">
                </div>

                <div class="col-md-2">
                    <input type="text"
                           name="questions[{{ $i }}][option_c]"
                           value="{{ $q->option_c }}"
                           class="form-control">
                </div>

                <div class="col-md-2">
                    <input type="text"
                           name="questions[{{ $i }}][option_d]"
                           value="{{ $q->option_d }}"
                           class="form-control">
                </div>

                <div class="col-md-2">
                    <select name="questions[{{ $i }}][correct_answer]" class="form-control">
                        <option value="A" {{ $q->correct_answer == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ $q->correct_answer == 'B' ? 'selected' : '' }}>B</option>
                        <option value="C" {{ $q->correct_answer == 'C' ? 'selected' : '' }}>C</option>
                        <option value="D" {{ $q->correct_answer == 'D' ? 'selected' : '' }}>D</option>
                    </select>
                </div>

            </div>

        </div>
    

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    @endforeach
</form>
</div>
@include('layouts.components.footer')