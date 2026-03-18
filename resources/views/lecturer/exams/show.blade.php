@include('layouts.components.header')
@include('lecturer.components.sidebar')

<div class="content-wrapper">

<div class="container">
    <h2>Danh sách câu hỏi</h2>
    
    @foreach($exam->questions as $q)

    <div class="card mb-3">
        <div class="card-body">

            <h5>Câu hỏi:</h5>
            <p>{{ $q->question }}</p>

            <ul>
                <li>A. {{ $q->option_a }}</li>
                <li>B. {{ $q->option_b }}</li>
                <li>C. {{ $q->option_c }}</li>
                <li>D. {{ $q->option_d }}</li>
                   
            </ul>

            <p>
                <strong>Đáp án đúng:</strong>
                {{ strtoupper($q->correct_answer) }}
            </p>

            
            <a href="{{ route('lecturer.exams.questions.edit', [$exam->id, $q->id]) }}">
                Sửa
            </a>
            

        </div>
    </div>

    @endforeach

    {{ $questions->links() }}

</div>
</div>
@include('layouts.components.footer')