@include('layouts.components.header')
@include('admin.components.sidebar')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v3</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
   <div class="row">

    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$lecturers}}</h3>
                <p>SỐ GIẢNG VIÊN</p>
            </div>
            <div class="icon">
                <i class="fas fa-university"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $courses }}</h3>
                <p>SỐ KHÓA HỌC</p>
            </div>
            <div class="icon">
                <i class="fas fa-book"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$departments}}</h3>
                <p>SỐ KHOA</p>
            </div>
            <div class="icon">
                <i class="fas fa-file"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$classes}}</h3>
                <p>SỐ LỚP HỌC</p>
            </div>
            <div class="icon">
                <i class="fas fa-pencil-alt"></i>
            </div>
        </div>
    </div>

</div>
<div class="row">

    <div class="col-lg-3 col-6">
        <div class="small-box bg-purple">
            <div class="inner">
                <h3>{{$students}}</h3>
                <p>TỔNG SINH VIÊN</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<canvas id="studentChart"></canvas>

<script>
const ctx = document.getElementById('studentChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($labels),
        datasets: [{
            label: 'Số lượng sinh viên',
            data: @json($values),
            backgroundColor: [
                '#7fb3d5',
                '#f1948a',
                '#f7dc6f',
                '#76d7c4',
                '#a78bdc'
            ],
            borderWidth: 1
        }]
    },
    options: {
        plugins:{
            title:{
                display:true,
                text:'Phân bố sinh viên theo bộ môn'
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
  </div>
@include('layouts.components.footer')
