@extends('kasir.template')

@section('title', 'Data Barang')

@section('content')

@include('sweetalert::alert')


  <section class="content-header">
      <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
          <h1>Data Barang</h1>
          </div>
      </div>
      </div>
      <!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$totalStok}} item</h3>

              <p>Stok Barang hampir <br> habis !!</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('admin.infostok')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </div><!-- /.container-fluid -->

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Barang Bangunan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Harga</th>
              <th>aksi</th>
            </tr>
            </thead>
            <tbody>
              <?php $i = 0 ?>
              @foreach ($datas as $data)
              <?php $i++; ?>
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$data->nama}}</td>
                  <td>{{$data->harga}}</td>
                  <td>
                    <a href="{{route('admin.editdata',$data->id) }}" class="btn btn-warning ">Edit</a>
                    <a href="{{route('admin.lihatstokbarang', $data->id) }}" class="btn btn-success ">Lihat Stok</a>
                    {{-- <form action="{{route('admin.hapusbarang', $data->id) }}" method="post" id="delete" class="btn btn-danger btn-sm" >
                      @csrf
                      @method("DELETE") --}}
                      <a href="{{route('admin.hapusbarang', $data->id)}}">
                        <button type="button" onClick="return konfirmasi()" class="btn btn-danger btn-sm">
                          Hapus
                        </button>
                      </a>
                    {{-- </form> --}}
                    
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <script>
        function konfirmasi () {
          var pilihan = confirm('Apakah Anda Yakin?')
          if (pilihan) {
            return true
          } else{
            alert('Proses Dibatalkan')
            return false
          }
        }
      </script>

  </section>
  <!-- /.content -->

@endsection

@push('script')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('LTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('LTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{asset('LTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{asset('LTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{asset('LTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{asset('LTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{asset('LTE/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{asset('LTE/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{asset('LTE/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{asset('LTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{asset('LTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{asset('LTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    
    <!-- Page specific script -->
    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": []
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
    </script>

  {{-- <script>
    $('.delete').on('click', function(e){
      e.preventDefault();
      var href = $(this).attr('href');

          document.getElementById('deleteForm').action = href;
          document.getElementById('deleteForm').submit();
          
    })
  </script> --}}

  <script>
    $('.delete').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Are you sure?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });
  </script>

@endpush


