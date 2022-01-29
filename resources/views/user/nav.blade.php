<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <a class="navbar-brand font-weight-bolder mr-3" href="{{url('/')}}"><img src="{{asset('img/logo.svg')}}" style="width: 40px;height: auto;border-radius: 50%"></a>
    <button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsDefault">
        <ul class="navbar-nav mr-auto align-items-center mb-0">
            <form action="" class="bd-search hidden-sm-down">
                <div class="input-group mb-3">
                    <input type="text" class="form-control bg-graylight border-0 font-weight-bold" placeholder="Search Post Title..." name="search">
                </div>
            </form>
        </ul>
        <ul class="navbar-nav ml-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link active" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('post.owner')}}">Post</a>
            </li>
            @auth()
            <li class="nav-item">
                <a href="{{route('user.profile')}}" class="nav-link">
                    <img class="rounded-circle mr-2" src="{{asset('storage/profile/'.auth()->user()->avatar)}}" style="width: 30px;height: 30px"><span class="align-middle">{{auth()->user()->name}}</span>
                </a>
            </li>
            @endauth
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg style="margin-top:10px;" class="_3DJPT" version="1.1" viewbox="0 0 32 32" width="21" height="21" aria-hidden="false" data-reactid="71"><path d="M7 15.5c0 1.9-1.6 3.5-3.5 3.5s-3.5-1.6-3.5-3.5 1.6-3.5 3.5-3.5 3.5 1.6 3.5 3.5zm21.5-3.5c-1.9 0-3.5 1.6-3.5 3.5s1.6 3.5 3.5 3.5 3.5-1.6 3.5-3.5-1.6-3.5-3.5-3.5zm-12.5 0c-1.9 0-3.5 1.6-3.5 3.5s1.6 3.5 3.5 3.5 3.5-1.6 3.5-3.5-1.6-3.5-3.5-3.5z" data-reactid="22"></path></svg>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow-lg" aria-labelledby="dropdown02">
                    @guest
                    <span class="dropdown-item">
                        <a href="{{route('login')}}" class="btn btn-primary d-block">Sign in / Sign Up</a>
                    </span>
                    @endguest
                        @auth()
                            @if(auth()->user()->role == 1)
                                <span class="dropdown-item">
                                    <a href="{{route('home')}}" class="w-100 btn btn-secondary d-block">Dashboard</a>
                                </span>
                            @endif
                                <div class="dropdown-divider"></div>
                            <span class="dropdown-item">
                                <a class="w-100 btn btn-primary" href="#" onclick="document.getElementById('userLogout').submit()">Logout</a>
                                <form action="{{route('logout')}}" method="post" class="d-none" id="userLogout">
                                    @csrf
                                    <button></button>
                                </form>
                            </span>
                        @endauth
                </div>
            </li>
        </ul>
    </div>
</nav>
