@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('user.update',$user->id)}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Role Permission</label>
                            <input type="number" name="role" class="form-control" value="{{$user->role}}" min="0" max="1">
                        </div>
                        <button class="btn btn-primary">Update Permission</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
