
@extends('layouts.app')

@section('content')

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form action="{{route('send.email')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Email Id</label>
                            <input type="email" name="email" class="form-control" required>
                           
                        </div>
                        <button type="submit" class="btn btn-primary">Test</button>
                    </form>
                </div>
            </div>
        </div>
    
@endsection
