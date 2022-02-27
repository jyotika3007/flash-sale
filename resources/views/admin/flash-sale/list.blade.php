@extends('layouts/app')


@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	.card:hover{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}

	.jumbotron{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		background-color: #fff		
	}
</style>
@endsection


@section('content')


@include('admin.includes.navbar')

@include('layouts.errors-and-messages')




<!-- 

<div class="container mx-auto m-5">
		<a href="{{ url('flash-sale/create') }}" class="btn btn-primary">Add New </a>
</div>
 -->

<div class="container jumbotron text-center mx-auto m-3 ">
	<h3 class="p-3">Flash Sales List</h3>
</div>


<div class="container jumbotron mx-auto m-3 ">

	<div class="row">


		@foreach($sales as $sale)

		<div class="col-4 text-center mt-5 bootstrap-cards">

			<div class="card">
				<img class="card-img-top" src="{{ asset($sale->cover ?? '') }}" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">{{ $sale->title ?? '' }}</h5>
					<p class="card-text">{{ substr($sale->description,0,25) }}...</p>
					<div class="conatiner text-left">
						
					<p>Price:  <strong>Rs.{{ $sale->price ?? '0.00' }}</strong></p>
					<p>Discount: <strong>Rs.{{ $sale->discount ?? '0.00' }}</strong></p></p>
					<p>Original Quantiy: <strong>Rs.{{ $sale->quantity ?? '0.00' }}</strong></p></p>
					<p>Publish Date: <strong>{{ $sale->publish_date ?? '0.00' }}</strong></p></p>
					</div>
					<!-- <a class="btn btn-primary" title="Show Details"><i class="fa fa-eye"></i></a> -->


					<form action="{{ route('flash-sale.destroy', $sale->id) }}" method="post" class="form-horizontal">
						{{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
					<a href="{{ url('admin/flash-sale/'.$sale->id.'/edit') }}" class="btn btn-primary btn-sm" title="Edit Details"><i class="fa fa-pencil"></i> Edit </a>
					<button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete </button>
					
                    </form>
				</div>
			</div>
		</div>

		@endforeach



	</div>
</div>








@endsection