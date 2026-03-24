@include('layouts.components.header')
@include('student.components.sidebar')

<div class="content-wrapper">
<div class="result-bg">
    <div class="overlay"></div>

    <div class="d-flex justify-content-center align-items-center vh-100 position-relative">

        <div class="card text-center shadow-lg p-5 result-box">
            
            <h3 class="mb-3">🎯 Kết quả bài thi</h3>

            <h1 class="display-4 text-success">
                {{$result->score}}
            </h1>

            <p class="mt-3 text-muted">
                Bạn đã hoàn thành bài kiểm tra
            </p>

            <a href="{{ route('student.exams.index') }}" class="btn btn-primary mt-3">
                Quay về danh sách
            </a>

        </div>

    </div>
</div>
</div>
@include('layouts.components.footer')
