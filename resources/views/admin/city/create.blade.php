
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
  <h2 class="text-center text-dark">city Create</h2>
  <form method="post" action="{{ route('cities.store') }}">
    @csrf
    <div class="mb-3 mt-3">
        @include('inc.errors')
      <label for="name" class="text-dark">city Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter city Name" name="name">
    </div>
    <div class="mb-3">
        <label for="governorate" class="text-dark">governorate:</label>
        <select id="governorate" name="governorate_id">
            <option value=""> Choose governorate ...</option>
            @foreach ($governorates as $governorate )
            <option value="{{$governorate->id}}"> {{$governorate->name}}</option>
             @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</div>
</body>
</html>
@endsection
