@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Sửa khoa</div>

    <div class="card-body">
        <form method="POST"
              action="{{ route('admin.departments.update',$department->id) }}">
            @csrf
            @method('PUT')

            <label>Mã khoa</label>
            <input type="text" name="code"
                   value="{{ $department->code }}"
                   class="form-control mb-2">

            <label>Tên khoa</label>
            <input type="text" name="name"
                   value="{{ $department->name }}"
                   class="form-control mb-2">

            <button class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</div>

@endsection