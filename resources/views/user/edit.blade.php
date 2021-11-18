
@extends('layouts.app')
@section('breadcump')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Profile</li>
</ol>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">{{ __('Profile Edit') }}
            </div>
            <div class="card-body">
                <form class="form" id="add_ward_form" method="post" action="{{route('user.update',$user->id)}}">
                    @csrf
                    {{method_field('PUT')}}
                    <input type="hidden" name="category" value="2">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{$user->email}}" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" autocomplete="off" class="form-control" >
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="confirm_password" autocomplete="off" class="form-control" >
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        

    </div>
</div>
@endsection



