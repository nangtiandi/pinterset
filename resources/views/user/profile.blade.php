@extends('user.app')
@section('content')
    <div class="border-round-0 min-50vh d-md-block d-sm-none" style="position: relative">
        <img src="{{asset('img/a.jpg')}}" alt="...background-image" style="width: 100%;max-height: 400px">
    </div>
    <div class="container mb-4 mt-md-0 mt-sm-6" style="position: relative">
        <img src="{{asset('storage/profile/'.auth()->user()->avatar)}}" class="rounded-circle" width="128" style="height:128px;position:absolute;top:-70px">
        <form action="{{route('user.photo')}}" method="post" enctype="multipart/form-data" id="photoForm" >
            @csrf
            <button type="button" class="btn btn-outline-secondary btn-sm" id="photoUpload" style="position: absolute;left: 130px;top: -8px;z-index: 1000">
                <i class="fa fa-plus"></i>
            </button>
            <input type="file" name="photo" id="photoInput" class="d-none">
        </form>
        <div class="position-relative" style="top: 50px">
            <h1 class="font-weight-bold title">{{auth()->user()->name}}</h1>
            <strong style="top: 10px;position: relative;z-index: 1000">
                Bio : <span class="text-muted">{{auth()->user()->bio}}</span>
            </strong>
        </div>
    </div>
    <div class="container mb-5">
        <div class="row my-5">
            <div class="col-md-6 col-xs-12 my-2">
                <div class="card">
                    <div class="card-body">
                        <table class="table align-middle">
                            <div class="d-flex align-items-center">
                                <h4>Please Fill Your Information!</h4>
                            </div>
                            <tr>
                                <td>Name</td>
                                <td>{{Auth::user()->name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{Auth::user()->email}}</td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td>{{Auth::user()->phone}}</td>
                            </tr>
                            <tr>
                                <td>Your Bio</td>
                                <td>{{Auth::user()->bio}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12 my-2">
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('user.profile')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Your Phone Number</label>
                                <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">What is your Bio</label>
                                <textarea name="bio" cols="30" rows="5" class="form-control @error('bio') is-invalid @enderror">{{old('bio')}}</textarea>
                                @error('bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button class="btn btn-outline-secondary">Upload Your Profile <i class="fas fa-upload"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
