@include('layouts.components.header')
@include('layouts.components.sidebar')
<div class="content-wrapper">
<div class="card">
    <div class="card-header">Thêm lớp học</div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.classes.store') }}">
            @csrf

            <label>Mã lớp học</label>
            <input type="text" name="code"
                   class="form-control mb-2">

            <label>Tên lớp học</label>
            <input type="text" name="name"
                   class="form-control mb-2">

            <button class="btn btn-success">Lưu</button>
        </form>
    </div>
</div>
</div>
@include('layouts.components.footer')