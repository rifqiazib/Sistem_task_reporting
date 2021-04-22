<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ESTEH CREATIVE</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('dashboard/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dashboard/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('tim/header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('tim/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
          @if(session('sukses'))
          <div class="alert alert-success" role="alert">
          {{session('sukses')}}
          </div>
          @endif
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
           
              <div class="card-header">
                <h3 class="card-title">Report Task</h3>
              </div>
              <!-- /.card-header -->
              

              

              <div class="card-body">
              
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Task Description</th>
                    <th>Created Date</th>
                    <th> </th>
                    
                   </tr>
                  </thead>
                  <tbody>
                  @foreach($report_task as $report)
                  <tr>
                    <td>{{ $report->task_desc }}</td>
                    <td>{{ $report->created_date->format('l, d F Y') }} </td>
                    <td> 
                    
                    <a href="/tim/{{$report->id}}/edit"><button class="btn btn-warning btn-sm"><i class="nav-icon fas fa-edit"></i></button></a>
                    <a href="/tim/{{$report->id}}/delete"><button class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash"></i></button></a>
                   
                    </td>
                    
                  </tr>
                  @endforeach
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div>
                  <a href="form"><button type="submit" class="btn btn-primary btn-sm">Add New</button></a>
              </div>
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
               
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
                
  </div>
  <!-- /.content-wrapper -->
  
 

  <!-- Main Footer -->
 @include('tim/footer')
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('dashboard/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dashboard/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
