@extends('layouts.master')
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>provider_id</th>
                        <th>avatar</th>
                        <th>role</th>
                        <th>Created At</th>
                        <th>Manage</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>provider_id</th>
                        <th>avatar</th>
                        <th>role</th>
                        <th>Created At</th>
                        <th>Manage</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->phone === null)
                                    <p class="text-danger">Empty Phone!</p>
                                @else
                                    {{$user->phone}}
                                @endif
                            </td>
                            <td>
                                @if($user->provider_id === null)
                                    <p class="text-danger">Not By social login</p>
                                @else
                                    {{$user->provider_id}}
                                @endif
                            </td>
                            <td>
                                <img src="{{asset('storage/profile/'.Auth::user()->avatar)}}" alt="" style="width: 50px;height: 50px;border-radius: 8px;object-fit: cover">
                            </td>
                            <td>
                                @if($user->role != 1)
                                    <p class="text-white badge bg-danger">User</p>
                                @else
                                    <p class="text-white badge bg-info">Admin</p>
                                @endif
                            </td>
                            <td>{{$user->created_at->format('d/m/y')}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-pen-alt"></i></a>
                                    <form action="{{route('user.destroy',$user->id)}}" method="post">
                                        @csrf
                                        @method('put')
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
