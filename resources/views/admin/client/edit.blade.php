@extends('admin.layout.layout')
@section('content')
    <div class="container mt-5 w-50 p-3">
    <h2 class="text-center text-dark">Dashboard Login</h2>
    <form method="post" action="{{ route('clients.update',$client->id) }}">
        @csrf
        @method('put')
        <div class="mb-3 mt-3">
            @include('inc.errors')
        <label for="name" class="text-dark">Name:</label>
        <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" value= {{old('name')?old('name'):$client->name}}>
        </div>
        <div class="mb-3 mt-3">
            <label for="phone" class="text-dark">phone:</label>
            <input type="phone" class="form-control" id="phone" placeholder="Enter phone" name="phone" value= {{old('phone')?old('phone'):$client->phone}}>
        </div>
        <div class="mb-3">
        <label for="email" class="text-dark">email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value= {{old('email')?old('email'):$client->email}}>
        </div>
        <div class="mb-3">
            <label for="date_of_birth" class="text-dark">Date Of Birth:</label>
            <input type="date" class="form-control" id="date_of_birth" placeholder="Enter date_of_birth Y-M-D" name="d_o_b" value= {{old('d_o_b')?old('d_o_b'):$client->d_o_b}}>
        </div>
        <div class="mb-3">
            <label for="last_donnation_date" class="text-dark">last Donnation Date:</label>
            <input type="date" class="form-control" id="last_donnation_date" placeholder="Enter last_donnation_date Y-M-D" name="last_donnation_date" value= {{old('last_donnation_date')?old('last_donnation_date'):$client->last_donnation_date}}>
        </div>
        <div class="mb-3">
            <label for="bloodTypes" class="text-dark">bloodTypes:</label>
            @if(old('blood_type_id'))
            <select id="bloodTypes" name="blood_type_id">
                <option value=""> Choose bloodType ...</option>
                @foreach ($bloodTypes as $bloodType )
                <option  value="{{$bloodType->id}}" @if(old('blood_type_id') == $bloodType->id )  selected @endif >{{ $bloodType->name }}</option>
                @endforeach
            </select>
            @else
            <select id="bloodTypes" name="blood_type_id">
                <option value=""> Choose bloodType ...</option>
                @foreach ($bloodTypes as $bloodType )
                <option  value="{{$bloodType->id}}" @if( $bloodType->id  == $client->blood_type_id)  selected @endif >{{ $bloodType->name }}</option>
                @endforeach
            </select>
            @endif
        </div>
        <div class="mb-3">
            <label for="governorate" class="text-dark">governorate:</label>
            @if(old('governorate_id '))
            <select id="governorate" name="governorate_id">
                <option value=""> Choose bloodType ...</option>
                @foreach ($governorates as $governorate )
                <option  value="{{$governorate->id}}" @if(old('governorate_id') == $governorate->id )  selected @endif >{{ $governorate->name }}</option>
                @endforeach
            </select>
            @else
            <select id="governorate" name="governorate_id">
                <option value=""> Choose bloodType ...</option>
                @foreach ($governorates as $governorate )
                <option  value="{{$governorate->id}}" @if( $governorate->id  == $client->city->governorate_id )  selected @endif >{{ $governorate->name }}</option>
                @endforeach
            </select>
            @endif
        </div>
        <div class="mb-3">
            <label for="cities" class="text-dark">cities:</label>
            <select id="cities" name="city_id" >
                <option value=""> Choose city ...</option>
                @foreach ($cities as $city )
                <option data-governorate='{{$city->governorate_id}}' @if( $city->id == $client->city_id ) selected @endif
                    value='{{$city->id}}'>{{$city->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
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
