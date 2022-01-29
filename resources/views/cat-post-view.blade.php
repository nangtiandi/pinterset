@extends('user.app')
@section('content')
    <section class="mt-4 mb-5">
        <div class="container mb-4">
            <h1 class="font-weight-bold title">Gallery Memory</h1>
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light bg-white pl-2 pr-2">
                    <button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExplore" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarsExplore">
                        <ul class="navbar-nav">
                            @foreach(\App\Models\Category::paginate(5) as $category)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('cat.post')}}">{{$category->name}}</a>
                                </li>
                            @endforeach
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
                                <div class="dropdown-menu shadow-lg" aria-labelledby="dropdown01">
                                    @foreach(\App\Models\Category::all() as $category)
                                        <a href="{{route('cat.post')}}" class="dropdown-item">{{$category->name}}</a>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="card-columns">
                    @foreach($posts as $post)
                        <div class="card card-pin">
                            <img class="card-img" src="{{asset('storage/product/'.$post->photo)}}" alt="Card image">
                            <div class="overlay">
                                <h2 class="card-title title">{{$post->title}}</h2>
                                <div class="more">
                                    <a href="{{route('user.post',$post->id)}}">
                                        <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> More </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
