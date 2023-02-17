@extends('layouts.admin_layout')

@section('title', 'Редактирование поставщика')

@section('content')  


<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Редактирование поставщика</h3>
          </div>
          <!-- /.card-header -->
          <div class="create-post">
        
            <form action="" method="post">
                @csrf
                    <input type="string" class="form-control" value="{{$edit->supplier}}" placeholder="Введите поставщика" name="supplier">
                    <input type="string" class="form-control" value="{{$edit->country}}" placeholder="Введите страну" name="country">
                    <input type="string" class="form-control" value="{{$edit->city}}" placeholder="Введите город" name="city">
                    <input type="string" class="form-control" value="{{$edit->street}}" placeholder="Введите улицу" name="street">
                    <input type="text" class="form-control"   value="{{$edit->telephone}}" placeholder="Введите телефон" name="telephone">
                    <div class="input-group-append">
                    <button type="submit" class="btn btn-success">Изменить</button>
                </div>
            </form>
        </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->

<!-- /.content -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
       
       
@endsection