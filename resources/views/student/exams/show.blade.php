<div class="container">

    <h2 class="mb-3">{{ $exam->title }}</h2>

    <!-- ⏱ Timer -->
    <div class="alert alert-warning">
        Thời gian còn lại: <span id="timer"></span>
    </div>

    <form action="{{route('student.exams.submit', $exam->id)}}" method="POST">
        @csrf

        @foreach($exam->questions as $index => $question)
            <div class="card mb-3">
                <div class="card-body">
                    <strong>Câu {{ $index + 1 }}:</strong>
                    <p>{{ $question->content }}</p>

                    @php
                        $options = [
                            'A' => $question->option_a,
                            'B' => $question->option_b,
                            'C' => $question->option_c,
                            'D' => $question->option_d,
                        ];
                    @endphp

                    @foreach($options as $key => $value)
                        <div>
                            <input type="radio"
                                name="answers[{{ $question->id }}]"
                                value="{{ $key }}">
                            {{ $key }}. {{ $value }}
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
        
        <button type="submit" class="btn btn-primary">
            Nộp bài
        </button>
    </form>

</div>