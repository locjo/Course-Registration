<h4>Danh sách sinh viên</h4>

<table class="table">
    <thead>
        <tr>
            <th>Mã SV</th>
            <th>Tên</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $enrollment)
            <tr>
               
                <td>{{ $enrollment->student->name }}</td>
                <td>{{ $enrollment->student->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>