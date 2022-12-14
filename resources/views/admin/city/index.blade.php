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
                    <th>ID</th>
                    <th>City Name</th>
                    <th>Governorate Name</th>
                    <th colspan="2"> action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($cities as $key => $city )
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->governorate->name }}</td>
                    <td class="text text-center"><a href="{{ route('cities.edit',$city->id) }}" class="btn btn-success">Edit</a></td>
                    <form action="{{ route('cities.destroy',$city->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                    <td class="text text-center"><button type="submit" class="btn btn-danger">Delete</button></td>
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
