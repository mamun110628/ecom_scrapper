
@extends('layouts.app')
@section('breadcump')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Api Post Log</li>
</ol>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">{{ __('Api Post Log') }}
</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Post Time</th>
                                <th>Product ID</th>
                                <th>New Price</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($post_logs as $log)
                            <tr>
                                <td>{{$log->created_at->format('d/m/Y h:i A')}}</td>
                                <td>
                                    {{$log->product_id}}
                                </td>
                                <td>
                                    {{$log->post_price}}
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <ul class="pagination mg-t-10">
                    {{$post_logs->links('pagination.pagination')}}
                </ul> 
            </div>
        </div>


    </div>
</div>
@endsection


