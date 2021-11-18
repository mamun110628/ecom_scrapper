@extends('layouts.app')
@section('breadcump')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Brand Name</li>
</ol>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">{{ __('Website') }}
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add_ward">Add Website</button>
</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Website</th>
                                <th>Node</th>
                                <th>..</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($settings as $setting)
                            <tr>
                                <td>{{$setting->domain}}</td>
                                <td>{{$setting->node}}</td>
                                
                                <td style="white-space: nowrap">
                                    <a class="btn btn-primary" href="javascript:void(0;)" data-toggle="modal" data-target="#edit_brand{{$setting->id}}">Edit</a>
                                    <a class="btn btn-danger" href="{{route('node_setting.delete',$setting->id)}}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                </td>
                            </tr>

                            <div class="modal fade" id="edit_brand{{$setting->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" id="edit_ward_form{{$setting->id}}" method="post" action="{{route('node_setting.update',$setting->id)}}">
                            @csrf
                            {{method_field('PUT')}} 
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Domain</label>
                                        <input type="text" name="domain" value="{{$setting->domain}}" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-12">
                                     <div class="form-group">
                                        <label>Node</label>
                                        <input type="text" name="node" value="{{$setting->node}}" class="form-control" required="">
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="$('#edit_ward_form{{$setting->id}}').submit();">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
                            
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <ul class="pagination mg-t-10">
                    {{$settings->links('pagination.pagination')}}
                </ul> 
            </div>
        </div>
        
        <div class="modal fade" id="add_ward" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Website</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" id="add_ward_form" method="post" action="{{route('node_setting.store')}}">
                            @csrf
                             
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Domain Name</label>
                                        <input type="text" name="domain" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Node</label>
                                        <input type="text" name="node" class="form-control" required="">
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="$('#add_ward_form').submit();">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection



