@include('layouts.components.header')
@include('lecturer.components.sidebar')

<div class="content-wrapper">

<div class="content-header">
<div class="container-fluid">
<h4>QR Code Điểm Danh</h4>
</div>
</div>

<div class="content">
<div class="container-fluid">

<div class="card">
<div class="card-body text-center">

<h5>Lớp: {{ $session->class->name ?? '' }}</h5>

<h6>Môn học: {{ $session->subject->name ?? '' }}</h6>

<p>Ngày học: {{ $session->session_date }}</p>

<hr>

<img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data={{ urlencode($url) }}">

<p class="mt-3">
Link điểm danh:
</p>

<a href="{{ $url }}" target="_blank">
{{ $url }}
</a>

<br><br>

<a href="{{ route('lecturer.sessions.index') }}"
class="btn btn-primary">
Quay lại
</a>

</div>
</div>

</div>
</div>

</div>

@include('layouts.components.footer')