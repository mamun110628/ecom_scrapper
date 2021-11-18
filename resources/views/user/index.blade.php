@extends('layouts.app')
@section('breadcump')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">User</li>
</ol>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">{{ __('User List') }}

                <a  href="{{route('user.create')}}" class="btn btn-primary pull-right">Add User</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email </th>
                                <th>Created Date </th>
                                
                                <th>..</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at->format('d/m/Y')}}</td>
                                
                                <td style="white-space: nowrap">
                                    <a  href="{{route('user.edit',$user->id)}}" class="btn btn-primary" >Edit </a>
                                    <a  href="" class="btn btn-danger" >Delete</a>
                                </td>

                            </tr>

                       

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <ul class="pagination mg-t-10">
                    {{$users->links('pagination.pagination')}}
                </ul> 
            </div>
        </div>

        

    </div>
</div>
@endsection


