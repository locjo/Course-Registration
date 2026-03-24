@include('layouts.components.header')
@include('student.components.sidebar')

<div class="content-wrapper">
<div class="container py-5">
    <div class="row g-4">
        @foreach($exams as $exam)
            <div class="col-md-4">
                <div class="card exam-card shadow-sm h-100">

                    <div class="card-body">

                        {{-- Icon + trạng thái --}}
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            

                             @if(isset($results[$exam->id]))
                                <span class="text-success fw-bold">
                                    ✅ Đã làm - Điểm: {{ $results[$exam->id] }}
                                </span>
                            @else
                                <span class="text-danger">
                                    ❌ Chưa làm
                                </span>
                            @endif
                            @if(now()->lt($exam->start_time))
                                <span class="badge bg-warning text-dark">Sắp diễn ra</span>
                            @elseif(now()->between($exam->start_time, $exam->end_time))
                                <span class="badge bg-success">Đang diễn ra</span>
                            @else
                                <span class="badge bg-secondary">Hết hạn</span>
                            @endif
                        </div>

                        {{-- Tiêu đề --}}
                        <h5 class="fw-bold mb-3">
                            {{ $exam->exam_title }}
                        </h5>

                        {{-- Thời gian --}}
                        <div class="exam-time p-3 rounded">
                            <div>
                                <strong>Bắt đầu:</strong>
                                {{ $exam->start_time }}
                            </div>
                            <div>
                                <strong>Kết thúc:</strong>
                                {{ $exam->end_time }}
                            </div>
                        </div>

                        {{-- Button --}}
                        @if(now()->lt($exam->start_time))
                                <div class="mt-3 text-end">
                            <a href="#" 
                               class="btn btn-success btn-sm rounded-pill px-3" @disabled(true)>
                                Xem chi tiết
                            </a>
                        </div>
                            @elseif(now()->between($exam->start_time, $exam->end_time))
                                <div class="mt-3 text-end">
                                    <a href="{{route('student.exams.show',$exam->id)}}" 
                                    class="btn btn-success btn-sm rounded-pill px-3">
                                        Xem chi tiết
                                    </a>
                                </div>
                            @else
                                <div class="mt-3 text-end">
                                    <a href="#" 
                                    class="btn btn-success btn-sm rounded-pill px-3" style="opacity: 1">
                                        Xem chi tiết
                                    </a>
                                </div>
                            @endif
                        

                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
</div>

@include('layouts.components.footer')