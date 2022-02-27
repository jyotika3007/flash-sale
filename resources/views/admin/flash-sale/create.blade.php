@extends('layouts/app')


@section('content')


@include('admin.includes.navbar')


<div class="container  jumbotron text-center mx-auto m-3">
	<h4 class="p-3">Add New Sale</h4>
</div>


<div class="container jumbotron mx-auto m-3">

	<div class="container">
		<form class="form-group mx-auto p-5" id="form" action="{{ route('flash-sale.store') }}" method="POST" enctype="multipart/form-data">

			{{ csrf_field() }}

			<div class="row mb-3">
				<div class="offset-1 col-2">
					<label>Title</label>
				</div>
				<div class="col-8">
					<input type="text" name="title" class="form-control" required />
				</div>
			</div>

			<div class="row mb-3">
				<div class="offset-1 col-2">
					<label>Description</label>
				</div>
				<div class="col-8">
					<textarea type="text" name="description" class="form-control" required rows="8"></textarea>
				</div>
			</div>
			
			<div class="row mb-1">
				<div class="offset-1 col-2">
					<label>Price</label>
				</div>
				<div class="col-8">
					<input type="number" id="price" step="0.1" min="1" name="price" class="form-control" required />
					<p class="errorPrice"></p>
				</div>
			</div>
			
			<div class="row mb-1">
				<div class="offset-1 col-2">
					<label>Discount Price</label>
				</div>
				<div class="col-8">
					<input type="number" id="discount" step="0.1" name="discount" min="1" class="form-control" required />
					<p class="errorDiscount"></p>
				</div>
			</div>
			
			<div class="row mb-1">
				<div class="offset-1 col-2">
					<label>Quantity</label>
				</div>
				<div class="col-8">
					<input type="number" id="quantity" name="quantity" min="1" class="form-control" required />
					<p class="errorQuantity"></p>
				</div>
			</div>
			
			<div class="row mb-3">
				<div class="offset-1 col-2">
					<label>Publish Date</label>
				</div>
				<div class="col-8">
					<input type="date" id="date_picker"  name="publish_date" class="form-control" required />
				</div>
			</div>

			<div class="row mb-3">
				<div class="offset-1 col-2">
					<label>Status</label>
				</div>
				<div class="col-8">
					<select name="status" class="form-control">
						<option value="1"> Enable </option>
						<option value="0"> Disable </option>
					</select>
				</div>
			</div>
			
			<div class="row mb-1">
				<div class="offset-1 col-2">
					<label>Cover Image</label>
				</div>
				<div class="col-8">
					<input type="file" name="cover" class="form-control" required />
				</div>
			</div>	
			<p class="errorQuantity"></p>

			<div class="row m-5">
				<div class="offset-1 col-2">
					
				</div>
				<div class="col-8 ">
					<a href="{{ url('admin/flash-sale') }}" class="btn btn-secondary">Back</a>
					<button type="submit" class="btn btn-primary">Submit</button>

				</div>
			</div>
			
		</form>
	</div>


</div>


@endsection


@section('script')
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
@endsection