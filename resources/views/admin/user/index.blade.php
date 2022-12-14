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
                    <th>Client Name</th>
                    <th>Phone</th>
                    <th>email</th>
                    <th>Date Of Birth</th>
                    <th>Last Donnation Date</th>
                    <th>Blood_type</th>
                    <th>governorate</th>
                    <th>city</th>
                    <th>edit</th>
                    <th>delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($clients as $client )
                  <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->d_o_b }}</td>
                    <td>{{ $client->last_donnation_date }}</td>
                    <td>{{ $client->bloodType->name}}</td>
                    <td>{{ $client->city->governorate->name}}</td>
                    <td>{{ $client->city->name }}</td>
                    <td><a href="{{ route('client.edit',$client->id) }}" class="btn btn-success">Edit</a></td>
                    <td><a href="{{ route('client.delete',$client->id) }}" class="btn btn-danger">Delete</a></td>
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
      @push('scripts')
    {{--  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  --}}
<script>
   $(document).ready(function() {

    $('#governorate').change(function() {
      //  consol.log(123);

        $('#cities option[data-governorate!="' + $(this).val() + '"]').hide().attr('disabled',
                      'disabled');
                  $('#cities option[data-governorate="' + $(this).val() + '"]').map(function() {
                      $(this).show().removeAttr('disabled');
                      });
    });
  });

</script>
@endpush
@endsection
