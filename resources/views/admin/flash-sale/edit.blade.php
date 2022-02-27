@extends('layouts/app')


@section('content')


@include('admin.includes.navbar')


<div class="container  jumbotron text-center mx-auto m-3">
	<!-- <h4 class="p-3">Add New Sale</h4> -->
		<h4 class="p-3">Edit Flash Sale's Detail</h4>
</div>


<div class="container jumbotron mx-auto m-3">
	
	<div class="container">
		<form class="form-group mx-auto p-5 " action="{{ route('flash-sale.update', $sale) }}" method="POST" enctype="multipart/form-data">

			{{ csrf_field() }}

			<div class="row mb-3">
				<div class="offset-1 col-2">
					<label>Title</label>
				</div>
				<div class="o0ffset-2 col-8">
					<input type="text" name="title" value="{{ $sale->title ?? '' }}" class="form-control" required />
				</div>
			</div>

			<div class="row mb-3">
				<div class="offset-1 col-2">
					<label>Description</label>
				</div>
				<div class="o0ffset-2 col-8">
					<textarea type="text" name="description" class="form-control" required rows="8" >{{ $sale->description ?? '' }}</textarea>
				</div>
			</div>
			
			<div class="row mb-3">
				<div class="offset-1 col-2">
					<label>Price</label>
				</div>
				<div class="o0ffset-2 col-8">
					<input type="number" step="0.1" name="price" id="price" value="{{ $sale->price ?? '0' }}"  class="form-control" required />
				</div>
			</div>
			
			<div class="row mb-3">
				<div class="offset-1 col-2">
					<label>Discount Price</label>
				</div>
				<div class="o0ffset-2 col-8">
					<input type="number" step="0.1" name="discount" id="discount" value="{{ $sale->discount ?? '0' }}"  class="form-control" required />
				</div>
			</div>
			
			<div class="row mb-3">
				<div class="offset-1 col-2">
					<label>Quantity</label>
				</div>
				<div class="o0ffset-2 col-8">
					<input type="number" name="quantity" id="quantity" value="{{ $sale->quantity }}"  class="form-control" required />
				</div>
			</div>
			
			<div class="row mb-3">
				<div class="offset-1 col-2">
					<label>Publish Date</label>
				</div>
				<div class="o0ffset-2 col-8">
					<input type="date" name="publish_date"  id="date_picker" value="{{ $sale->publish_date }}"  class="form-control" required />
				</div>
			</div>
			
			<div class="row mb-3">
				<div class="offset-1 col-2">
					<label>Cover Image</label>
				</div>
				<div class="o0ffset-2 col-3">
					<input type="file" name="cover" class="form-control" />
				</div>
				<div class="o0ffset-2 col-3">
					<img src="{{ asset($sale->cover ?? '') }}" style="width: 100%" />
				</div>
			</div>	

			<div class="row m-5">
				<div class="offset-1 col-2">
					
				</div>
				<div class="o0ffset-2 col-8 ">
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