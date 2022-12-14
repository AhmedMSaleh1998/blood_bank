@extends('admin.layout.layout')
@section('content')
    <div class="container mt-5 w-50 p-3">
    <h2 class="text-center text-dark">Dashboard Login</h2>
    <form method="post" action="{{ route('settings.update',$setting->id) }}">
        @csrf
        @if(session()->has('sucess'))
        <div class="alert alert-success">
            <p>{{ session('sucess') }}</p>
        </div>
        @endif
        <div class="mb-3 mt-3">
            @include('inc.errors')
        <label for="about_app" class="text-dark">about_app:</label>
        <input type="about_app" class="form-control" id="about_app" name="about_app" value= {{old('about_app')?old('about_app'):$setting->about_app}}>
        </div>
        <div class="mb-3 mt-3">
            <label for="phone" class="text-dark">phone:</label>
            <input type="phone" class="form-control" id="phone" placeholder="Enter phone" name="phone" value= {{old('phone')?old('phone'):$setting->phone}}>
        </div>
        <div class="mb-3">
        <label for="email" class="text-dark">email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value= {{old('email')?old('email'):$setting->email}}>
        </div>
        <div class="mb-3">
            <label for="facebook_link" class="text-dark">facebook Link:</label>
            <input type="facebook_link" class="form-control" id="facebook_link" placeholder="Enter Face Link" name="facebook_link" value= {{old('facebook_link')?old('facebook_link'):$setting->facebook_link}}>
        </div>
        <div class="mb-3">
            <label for="twitter_link" class="text-dark">twitter Link:</label>
            <input type="twitter_link" class="form-control" id="twitter_link" placeholder="Enter twitter Link" name="twitter_link" value= {{old('twitter_link')?old('twitter_link'):$setting->twitter_link}}>
        </div>
        <div class="mb-3">
            <label for="instagram_link" class="text-dark">twitter Link:</label>
            <input type="instagram_link" class="form-control" id="instagram_link" placeholder="Enter instagram Link" name="instagram_link" value= {{old('instagram_link')?old('instagram_link'):$setting->instagram_link}}>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
@endsection

