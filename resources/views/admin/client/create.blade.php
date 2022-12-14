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

 @include('inc.errors')
<div class="container mt-5 w-25 p-3">
  <h2 class="text-center text-white">Dashboard Login</h2>
  <form method="post" action="{{ route('clients.store') }}">
    @csrf
    <div class="mb-3 mt-3">
      <label for="name" class="text-white">Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="mb-3 mt-3">
        <label for="phone" class="text-white">phone:</label>
        <input type="phone" class="form-control" id="phone" placeholder="Enter phone" name="phone">
      </div>
    <div class="mb-3">
      <label for="email" class="text-white">email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3 mt-3">
        <label for="password" class="text-white">Name:</label>
        <input type="password" class="form-control" id="password" placeholder="password" name="password">
      </div>
    <div class="mb-3">
        <label for="date_of_birth" class="text-white">Date Of Birth:</label>
        <input type="date" class="form-control" id="date_of_birth" placeholder="Enter date_of_birth Y-M-D" name="d_o_b">
    </div>
    <div class="mb-3">
        <label for="last_donnation_date" class="text-white">last Donnation Date:</label>
        <input type="date" class="form-control" id="last_donnation_date" placeholder="Enter last_donnation_date Y-M-D" name="last_donnation_date">
    </div>
    <div class="mb-3">
        <label for="bloodTypes" class="text-dark">bloodTypes:</label>
        <select id="bloodTypes" name="blood_type_id">
            <option value=""> Choose bloodType ...</option>
            @foreach ($bloodTypes as $bloodType )
            <option value="{{$bloodType->id}}"> {{$bloodType->name}}</option>
             @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="governorate" class="text-dark">governorate:</label>
        <select id="governorate" name="governorate">
            <option value=""> Choose governorate ...</option>
            @foreach ($governorates as $governorate )
            <option value="{{$governorate->id}}"> {{$governorate->name}}</option>
             @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="cities" class="text-dark">cities:</label>
        <select id="cities" name="city_id" >
            <option value=""> Choose city ...</option>
            @foreach ($cities as $city )
            <option data-governorate='{{$city->governorate_id}}' value='{{$city->id}}'>{{$city->name}}</option>
             @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>




{{--  </body>
</html>  --}}
@endsection

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
