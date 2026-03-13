@include('layouts.components.header')
@include('admin.components.sidebar')
<div class="content-wrapper">

<div class="card">
    <div class="card-header">Sửa môn học</div>

    <div class="card-body">
        <form method="POST"
              action="{{ route('admin.courses.update',$course->id) }}">
            @csrf
            @method('PUT')

            <label>Mã môn học</label>
            <input type="text" name="code"
                   value="{{ $course->code }}"
                   class="form-control mb-2">

            <label>Tên môn học</label>
            <input type="text" name="name"
                   value="{{ $course->name }}"
                   class="form-control mb-2">

            <button class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</div>
</div>
@include('layouts.components.footer')