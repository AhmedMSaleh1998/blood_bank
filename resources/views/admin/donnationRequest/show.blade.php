@extends('admin.layout.layout')
@section('content')
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <a></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>patient Name</th>
                    <th>Phone</th>
                    <th>hospital Name</th>
                    <th>Blood type</th>
                    <th>Bags Num</th>
                    <th>Details</th>
                    <th>longitude</th>
                    <th>lattitude</th>
                    <th>created_by</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>{{ $donnationRequest->patient_name }}</td>
                    <td>{{ $donnationRequest->patient_phone }}</td>
                    <td>{{ $donnationRequest->hospital_name }}</td>
                    <td>{{ $donnationRequest->bloodType->name }}</td>
                    <td>{{ $donnationRequest->bags_num }}</td>
                    <td>{{ $donnationRequest->details}}</td>
                    <td>{{ $donnationRequest->longitude}}</td>
                    <td>{{ $donnationRequest->lattitude }}</td>
                    <td>{{ $donnationRequest->client->name }}</td>
                  </tr
                  </tbody>
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
@endsection
