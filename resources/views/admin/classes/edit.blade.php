@include('layouts.components.header')
@include('layouts.components.sidebar')
<div class="content-wrapper">

<div class="card">
    <div class="card-header">Sửa lớp học</div>

    <div class="card-body">
        <form method="POST"
              action="{{ route('admin.classes.update',$class->id) }}">
            @csrf
            @method('PUT')

            <label>Mã lớp học</label>
            <input type="text" name="code"
                   value="{{ $class->code }}"
                   class="form-control mb-2">

            <label>Tên lớp học</label>
            <input type="text" name="name"
                   value="{{ $class->name }}"
                   class="form-control mb-2">

            <button class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</div>
</div>
@include('layouts.components.footer')