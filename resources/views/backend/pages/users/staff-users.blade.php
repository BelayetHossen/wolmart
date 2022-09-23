@extends('backend.layouts.app')




@section('main-content')

<div class="row px-3">
    <div class="main-title my-5 text-center">
        <h3 class="m-0">Admin/staff users<a href="{{ route('admin.user.view') }}" class="badge bg-success mx-3" style="font-size: 12px;">All users</a></h3>
     </div>




     @foreach ( $siteusers as $user )

     {{-- User photo show  --}}
     @php
        $img_name = $user->photo;
        if ($user->photo == ''){

            if ($user->gender == 'Male') {
                $img = asset('storage/gender_photo/male.jpg');
            } else {
                $img = asset('storage/gender_photo/female.jpg');
            }

        } else{
            $img = asset('storage/users').'/'.$img_name;
        }
    @endphp

    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 box-col-6">
       <div class="card custom-card">
          <div class="card-header"><img class="img-fluid" src="{{ asset('') }}backend/img/profilebox/1.jpg" alt="" data-original-title="" title=""></div>
          <div class="card-profile"><img class="rounded-circle" src="{{ $img }}" alt="" data-original-title="" title=""></div>
          <ul class="card-social">
             <li><a href="#" data-original-title="" title=""><i class="fab fa-facebook-f"></i></a></li>
             <li><a href="#" data-original-title="" title=""><i class="fab fa-google-plus-g"></i></a></li>
             <li><a href="#" data-original-title="" title=""><i class="fab fa-twitter"></i></a></li>
             <li><a href="#" data-original-title="" title=""><i class="fab fa-instagram"></i></a></li>
             <li><a href="#" data-original-title="" title=""><i class="fas fa-rss"></i></a></li>
          </ul>
          <div class="text-center profile-details">
             <h4>{{ $user->name }}</h4>
             <h6>{{ $user->role->name }}</h6>
          </div>
          <div class="card-footer row">
             <div class="col-4 col-sm-4">
                <h6>Follower</h6>
                <h3 class="counter">9564</h3>
             </div>
             <div class="col-4 col-sm-4">
                <h6>Following</h6>
                <h3><span class="counter">49</span>K</h3>
             </div>
             <div class="col-4 col-sm-4">
                <h6>Total Post</h6>
                <h3><span class="counter">96</span>M</h3>
             </div>
          </div>
       </div>
    </div>
    @endforeach




@endsection
