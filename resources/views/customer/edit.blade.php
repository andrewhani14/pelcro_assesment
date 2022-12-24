@extends('customer.template')
@section('title')
Edit
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Customer</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('customer.index') }}">Back</a>
        </div>
    </div>
</div>

<form action="{{ route('customer.update',$customer->id) }}" method="POST">
    @csrf
    @method('PUT')

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" value="{{ $customer->first_name }}" name= "first_name" class="form-control" placeholder= "First Name">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" value="{{ $customer->last_name }}" name= "last_name" class="form-control" placeholder= "Last Name">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" value="{{ $customer->email }}" name= "email" class="form-control" placeholder= "Email">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Username:</strong>
                    <input type="text" value="{{ $customer->user_name }}" name= "user_name" class="form-control" placeholder= "Username">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Salary:</strong>
                    <input type="number" value="{{ $customer->salary }}" name= "salary" class="form-control" placeholder= "Salary">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Status:</strong>
                    <input type="text" value="{{ $customer->status }}" name= "status" class="form-control" placeholder= "Status">
                </div>
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection