@extends('layouts.admin_layout')

@section('title', 'Таблица товаров')

@section('content') 

  <!-- Main content -->

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Таблица товаров</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <td>#</td>
                  <th>Товар</th>
                  <th>Цена</th>
                  <th>Новая цена</th>
                  <th>Наличие</th>
                  <th>Описание</th>
                  <th>Категория</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                 
                    <tr>
                      <td>{{$product->id}}</td>
                      <td>{{$product->title}}</td>
                      <td>{{$product->price}}</td>
                      <td>{{$product->new_price}}</td>
                      <td>{{$product->in_stock}}</td>
                      <td>{{$product->description}}</td>
                      <th>{{$product->category_id}}</th>
                      <td><a href = '{{route('admin_productTable')}}' class="animated-button">Назад</a></td>
                    </tr>
                  
                </tfoot>
              </table>
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