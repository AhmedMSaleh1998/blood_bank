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
                    <th>Title</th>
                    <th>Client Name</th>
                    <th>message</th>
                    <th>delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($contacts as $key=>$contact )
                  <tr>
                    <td>{{ $key +1 }}</td>
                    <td>{{ $contact->title }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>{{ $contact->client->name }}</td>
                    <td>
                      <form action="{{ route('contacts.destroy',$contact->id) }}" method="post">
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
