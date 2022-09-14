@extends('layouts.template')
@section('sidemenu')
  @include('layouts.sidemenu')
@endsection
@section('content')
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
          </div>

          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No. Pelayanan</th>
                  <th>Nama Wajib Pajak</th>
                  <th>No. Hp</th>
                  <th>Alamat Pemohon</th>
                  <th>Alamat O.P.</th>
                  <th>LT</th>
                  <th>LB</th>
                  <th>Jenis Pelayanan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>SDGHJ123456</td>
                  <td>Internet Explorer 4.0</td>
                  <td>089776116717</td>
                  <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                  <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>Objek Pajak Baru</td>
                  <td>X</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>
@endsection

@section('data-tables')
  @include('layouts.javascript')
@endsection 
@section('custom-table')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection