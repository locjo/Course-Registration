@include('layouts.components.header')
@include('student.components.sidebar')

<div class="content-wrapper">
<div class="container py-4">

    <!-- Title -->
    <div class="bg-success text-white text-center py-3 rounded mb-4 shadow">
        <h3 class="mb-0">{{ $exam->title }}</h3>
    </div>

    <!-- Timer -->
    <div class="alert alert-warning text-center">
        ⏱ Thời gian còn lại: <strong id="timer"></strong>
    </div>

    <!-- Form -->
    <form action="{{ route('student.exams.submit', $exam->id) }}" method="POST">
        @csrf

        @foreach($exam->questions as $index => $question)
            <div class="card mb-4 shadow-sm">
                <div class="card-body">

                    <!-- Question -->
                    <h5 class="fw-bold">
                        Câu {{ $index + 1 }}: {{ $question->content }}
                    </h5>

                    @php
                        $options = [
                            'A' => $question->option_a,
                            'B' => $question->option_b,
                            'C' => $question->option_c,
                            'D' => $question->option_d,
                        ];
                    @endphp

                    <!-- Answers -->
                    @foreach($options as $key => $value)
                        <label class="d-block border rounded p-2 mb-2 option-item">
                            <input type="radio"
                                   name="answers[{{ $question->id }}]"
                                   value="{{ $key }}"
                                   class="me-2">
                            {{ $value }}
                        </label>
                    @endforeach

                </div>
            </div>
        @endforeach

        <!-- Submit -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary px-5 py-2">
                Nộp bài
            </button>
        </div>

    </form>
</div>
</div>
<!-- TIMER -->
<script>
    let time = {{ $exam->time_limit }} * 60;

    function updateTimer() {
        let minutes = Math.floor(time / 60);
        let seconds = time % 60;

        document.getElementById('timer').innerText =
            minutes + ":" + (seconds < 10 ? "0" : "") + seconds;

        if (time <= 0) {
            alert("Hết thời gian!");
            document.querySelector("form").submit();
        }

        time--;
    }

    setInterval(updateTimer, 1000);
</script>

@include('layouts.components.footer')