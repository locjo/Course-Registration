<form method="GET" class="mb-3">
    <select name="section_id" onchange="this.form.submit()" class="form-select">
        <option value="">-- Chọn học phần --</option>

        @foreach($sections as $sec)
            <option value="{{ $sec->id }}"
                {{ $sectionId == $sec->id ? 'selected' : '' }}>
                {{ $sec->name }}
            </option>
        @endforeach
    </select>
</form>
<form method="POST" action="#">
@csrf

<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên SV</th>
            <th>Điểm</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $index => $student)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $student->name }}</td>

            <td>
                <input type="number" step="0.1"
                    name="scores[{{ $student->id }}]"
                    class="form-control"
                    placeholder="Nhập điểm">
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<button class="btn btn-success">Lưu điểm</button>
</form>