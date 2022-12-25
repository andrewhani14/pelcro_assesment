@extends('customer.template')
@section('title')
Edit
@endsection

@section('content')
<div class="container">
	<header class="header">
		<h1 id="title" class="text-center">Edit Customer</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('customer.index') }}">Back</a>
        </div>
	</header>
	<div class="form-wrap">	
        <form action="{{ route('customer.update',$customer->id) }}" method="POST">
            @csrf
            @method('PUT')
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="first_name">First Name</label>
						<input type="text" value="{{ $customer->first_name }}" name="first_name" placeholder="Enter your first name" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="last_name">Last Name</label>
						<input type="text" value="{{ $customer->last_name }}" name="last_name" placeholder="Enter your last name" class="form-control">
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="email">Email <small>(Must be a valid email)</small></label>
						<input type="email" value="{{ $customer->email }}" name="email" class="form-control" placeholder="Enter your email" >
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="user_name">Username <small>(Must be unique)</small></label>
						<input type="text" value="{{ $customer->user_name }}" name="user_name" class="form-control" placeholder="Enter your username" >
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Salary</label>
                        <input type="number" value="{{ $customer->salary }}" name= "salary" class="form-control" placeholder= "Enter your salary">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Status</label>
                        <input type="tinyint" value="{{ $customer->status }}" name= "status" name= "status" class="form-control" placeholder= "Enter your status">
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-4 ">
					<button type="submit" class="btn btn-primary btn-block">Submit</button>
				</div>
			</div>

		</form>
	</div>	
</div>

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