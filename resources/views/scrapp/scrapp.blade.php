
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

                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add_ward">Add Product</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Amazon </th>
                                <th>Flipkart </th>
                                <th>Futureforward </th>
                                <th>Reliancedigital</th>
                                <th>Imastudent</th>
                                <th>..</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($scrap_list as $scrap)
                            <tr>
                                <td>{{$scrap->product_name}}</td>
                                <td>
                                    @if($scrap->amazon_link)
                                    <strong style="white-space: nowrap">₹ {{number_format(@$scrap->price_details->amazon_price,2)}}</strong>
                                    <p><a href="{{$scrap->amazon_link}}" target="__blank">Link</a><p>
                                        @endif

                                </td>
                                <td>
                                    @if($scrap->flipcart_link)
                                    <strong style="white-space: nowrap">₹ {{number_format(@$scrap->price_details->flipcart_price,2)}}</strong>
                                    <p><a href="{{$scrap->flipcart_link}}" target="__blank">Link</a></p>
                                    @endif

                                </td>
                                <td>
                                    @if($scrap->futureforward_link)
                                    <strong style="white-space: nowrap">₹ {{number_format(@$scrap->price_details->futureforward_price,2)}}</strong>
                                    <p><a href="{{$scrap->futureforward_link}}" target="__blank">Link</a></p>
                                    @endif

                                </td>
                                <td>
                                    @if($scrap->reliancedigital_link)
                                    <strong style="white-space: nowrap">₹ {{number_format(@$scrap->price_details->reliancedigital_price,2)}}</strong>
                                    <p><a href="{{$scrap->reliancedigital_link}}" target="__blank">Link</a></p>
                                    @endif

                                </td>
                                <td>
                                    @if($scrap->imastudent_link)
                                    <strong style="white-space: nowrap">₹ {{number_format(@$scrap->price_details->imastudent_price,2)}}</strong>
                                    <p><a href="{{$scrap->imastudent_link}}" target="__blank">Link</a></p>
                                    @endif

                                </td>
                                <td style="white-space: nowrap">
                                    <a href="{{route('scrapp.delete',$scrap->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                    <a href="javascript::void(0);"class="btn btn-primary" data-toggle="modal" data-target="#edit_ward{{$scrap->id}}">Edit</a>
                                    <a href="{{route('price.update',$scrap->id)}}" class="btn btn-primary">Update Price</a>
                                </td>

                            </tr>

                        <div class="modal fade" id="edit_ward{{$scrap->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <form class="form" id="edit_ward_form{{$scrap->id}}" method="post" action="{{route('scrapp.update',$scrap->id)}}">
                                    @csrf
                                    {{method_field('PUT')}}
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Product Name</label>
                                                        <input type="text" name="product_name" value="{{$scrap->product_name}}" class="form-control" required="">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Amazon Link </label>
                                                        <input type="url" name="amazon_link" value="{{$scrap->amazon_link}}" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Flipkart Link </label>
                                                        <input type="url" name="flipcart_link" value="{{$scrap->flipcart_link}}" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Futureforward Link </label>
                                                        <input type="url" name="futureforward_link" value="{{$scrap->futureforward_link}}" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Reliancedigital Link </label>
                                                        <input type="url" name="reliancedigital_link" value="{{$scrap->reliancedigital_link}}" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <label>Imastudent Link </label>
                                                        <input type="url" name="imastudent_link" value="{{$scrap->imastudent_link}}" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Product ID</label>
                                                        <input type="text" name="productid" value="{{$scrap->productid}}" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <ul class="pagination mg-t-10">
                    {{$scrap_list->links('pagination.pagination')}}
                </ul> 
            </div>
        </div>

        <div class="modal fade" id="add_ward" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" id="add_ward_form" method="post" action="{{route('scrapp.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="product_name" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Amazon Link </label>
                                        <input type="url" name="amazon_link" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Flipkart Link </label>
                                        <input type="url" name="flipcart_link" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Futureforward Link </label>
                                        <input type="url" name="futureforward_link" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Reliancedigital Link </label>
                                        <input type="url" name="reliancedigital_link" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Imastudent Link </label>
                                        <input type="url" name="imastudent_link" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Product ID</label>
                                        <input type="text" name="productid" class="form-control" >
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

