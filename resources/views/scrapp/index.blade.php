
@extends('layouts.app')
@section('breadcump')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Scrapp</li>
</ol>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">{{ __('Product Scrapp List') }}

                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add_ward">Scrapp Product</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Price </th>
                                <th>Link </th>
                                
                                <th>..</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>
                                    <img style="max-width: 50px" src="{{$product->image_link}}"
                                </td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->link}}</td>
                                <td style="white-space: nowrap">
                                    <a href="{{route('scrap_product.delete',$product->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                    
                                </td>

                            </tr>

                        

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <ul class="pagination mg-t-10">
                    {{$products->links('pagination.pagination')}}
                </ul> 
            </div>
        </div>

        <div class="modal fade" id="add_ward" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Link</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" id="add_ward_form" method="post" action="{{route('scrap_product.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        
                                        <input type="text" name="link" class="form-control" required="">
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="$('#add_ward_form').submit();">Scrapp</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection


