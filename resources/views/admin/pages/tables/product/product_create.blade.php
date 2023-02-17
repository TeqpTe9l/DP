@extends('layouts.admin_layout')

@section('title', 'Добавление товара')

@section('content')  


<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Добавление нового товара</h3>
          </div>
          <!-- /.card-header -->
          <div class="create-post">
        
            <form action="" method="post">
                @csrf
                    <input type="string" class="form-control" placeholder="Введите продукт" name="title">
                    <input type="string" class="form-control" placeholder="Введите цену" name="price">
                    <input type="string" class="form-control" placeholder="Введите новую цену" name="new_price">
                    <input type="string" class="form-control" placeholder="Введите наличие" name="in_stock">
                    <input type="text" class="form-control"   placeholder="Введите описание" name="description">
                    <input type="string" class="form-control" placeholder="Введите категорию" name="category_id">
                    <div class="input-group-append">
                    <button type="submit" class="btn btn-success">Добавить</button>
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