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
                    <th>post title</th>
                    <th>content</th>
                    <th>category</th>
                    <th>image</th>
                    <th colspan="2" class="text text-center">action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($posts as $post )
                  <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->image }}</td>
                    <td class="text text-center"><a href="{{ route('posts.edit',$post->id) }}" class="btn btn-success">Edit</a></td>
                    <form action="{{ route('posts.destroy',$post->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                    <td class="text text-center"><button type="submit" class="btn btn-danger">Delete</button></td>
                    </form>
                  </tr>
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
