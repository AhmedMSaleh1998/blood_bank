@extends('admin.layout.layout')
@section('content')
{{--  <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-dark">  --}}

<div class="container mt-5 w-25 p-3">
  <h2 class="text-center text-dark">category Edit</h2>
  <form method="post" action="{{ route('bloodTypes.update',$bloodType->id) }}">
    @csrf
    @method('put')

    <div class="mb-3 mt-3">
        @include('inc.errors')
      <label for="bloodType" class="text-dark">bloodType Name:</label>
      <input type="name" class="form-control" id="bloodType" placeholder="Enter bloodTypes Name" name="name" value= {{old('bloodType')?old('bloodType'):$bloodType->name}}>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</div>
</body>
</html>
@endsection
