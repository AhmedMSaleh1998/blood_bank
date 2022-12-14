@extends('admin.layout.layout')
@section('content')
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Client Name</th>
                      <th>Phone</th>
                      <th>email</th>
                      <th>Date Of Birth</th>
                      <th>Last Donnation Date</th>
                      <th>Blood_type</th>
                      <th>governorate</th>
                      <th>city</th>
                      <th colspan="2">actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($clients as $key => $client )
                    <tr>
                      <td>{{ $client->name }}</td>
                      <td>{{ $client->phone }}</td>
                      <td>{{ $client->email }}</td>
                      <td>{{ $client->d_o_b }}</td>
                      <td>{{ $client->last_donnation_date }}</td>
                      <td>{{ $client->bloodType->name}}</td>
                      <td>{{ $client->city->governorate->name}}</td>
                      <td>{{ $client->city->name }}</td>
                      <td class="text text-center"><a href="{{ route('clients.edit',$client->id) }}" class="btn btn-success">Edit</a></td>
                    <form action="{{ route('clients.destroy',$client->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                    <td class="text text-center"><button type="submit" class="btn btn-danger">Delete</button></td>
                    </form>
                    </tr>
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
