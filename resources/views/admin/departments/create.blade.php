@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Thêm khoa</div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.departments.store') }}">
            @csrf

            <label>Mã khoa</label>
            <input type="text" name="code"
                   class="form-control mb-2">

            <label>Tên khoa</label>
            <input type="text" name="name"
                   class="form-control mb-2">

            <button class="btn btn-success">Lưu</button>
        </form>
    </div>
</div>

@endsection