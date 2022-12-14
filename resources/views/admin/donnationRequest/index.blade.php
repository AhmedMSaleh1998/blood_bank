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
                    <th>Blood type</th>
                    <th>Bags Num</th>
                    <th>created_by</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($donnationRequests as $donnationRequest )
                  <tr>
                    <td>{{ $donnationRequest->patient_name }}</td>
                    <td>{{ $donnationRequest->bloodType->name }}</td>
                    <td>{{ $donnationRequest->bags_num }}</td>
                    <td>{{ $donnationRequest->client->name }}</td>
                    <td><a href="{{ route('donnationRequests.show',$donnationRequest->id) }}" class="btn btn-success">Show</a>
                      <form action="{{ route('donnationRequests.destroy',$donnationRequest->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</a></td>
                    </form>
                  </tr
                  @endforeach
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
    </div>
@endsection
