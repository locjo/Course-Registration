@include('layouts.components.header')
@include('lecturer.components.sidebar')

<div class="content-wrapper">
    <div class="container">
        <h2>Attendance - {{ $session->course->name }}</h2>
        <p>Date: {{ $session->date }}</p>

        <form action="{{ route('lecturer.attendances.store') }}" method="POST">
            @csrf

            <input type="hidden" name="session_id" value="{{ $session->id }}">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student Code</th>
                        <th>Name</th>
                        <th>Attendance</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($students as $index => $student)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>{{ $student->student_code }}</td>

                        <td>{{ $student->name }}</td>

                        <td>
                            <select name="attendance[{{ $student->id }}]" class="form-control">
                                <option value="Có mặt">Có mặt</option>
                                <option value="Vắng">Vắng</option>
                                <option value="Có phép">Có phép</option>
                            </select>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

            <button type="submit" class="btn btn-primary">
                Lưu
            </button>

        </form>
    </div>
</div>
@include('layouts.components.footer')