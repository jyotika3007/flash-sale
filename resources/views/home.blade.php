@extends('layouts/app')

@section('content')



@include('layouts.errors-and-messages')





@if($message == '' && $sale == '')

<div class="container jumbotron mx-auto m-5">
  <div class="container  text-center d-flex flex-column p-5">
   <h1>Welcome To Flash Sale.</h1>

   <h3>To see deals, first need to Login</h3>

   <div class="offset-2 col-8">
    <a class="btn btn-primary"> Click here to Login </a>
  </div>
</div>
</div>

@else

  @if($message!= '')

  <div class="container jumbotron mx-auto m-5">
    <div class="container  text-center d-flex flex-column p-5">
      <h3 class="m-5"> {{$message ?? ''}} </h3>
    </div>
  </div>

  @else


  <div class="container  mx-auto m-5">

    <div class="row">

      <div class=" offset-1 col-10 text-center">

        <div class="row justify-content-center jumbotron">  
           @if( $sale->quantity > $sale->stock_left)
               
          <h1>Deal of the day</h1>
              @else
                <h1>Deal expired. Please come tomorrow for new deal.</h1>
              @endif
        </div>

        <div class="card">
          <img class="card-img-top" src="{{ asset($sale->cover) ?? '' }}" alt="Card image cap" style="max-height: 250px; object-fit: contain; margin-top: 15px;">
          <div class="card-body">
            <h4 class="card-title p-3" style="background-color: lightgray">{{ ucfirst($sale->title ?? '') }}</h4>
            <div class="container text-left p-3">
              <div class="row mt-3">
                <div class="col-3"><strong>Description</strong></div>
                <div class="col-8"><p style="text-align: justify;">{{ $sale->description ?? '' }}</p></div>
              </div>

              <div class="row mt-3">
                <div class="col-3"><strong>M.R.P.</strong></div>
                <div class="col-8"><strong>Rs.{{ $sale->price ?? '0' }}</strong></div>
              </div>

              <div class="row mt-3">
                <div class="col-3"><strong>Discount</strong></div>
                <div class="col-8"><strong>-Rs.{{ $sale->discount ?? '0' }}</strong></div>
              </div>
              
              <div class="row mt-3">
                <div class="col-3"><strong>Quantity Left</strong></div>
                <div class="col-8"><strong>{{ $sale->quantity - $sale->stock_left }}</strong></div>
              </div>
              
              @if(($orderCount>1  && $orderCount<6 ) && $sale->quantity != $sale->stock_left)
                <div class="row mt-3">
                  <div class="col-3"><strong>Additional Discount</strong></div>
                  <div class="col-8">{{ $orderCount-1 }}% 
                    (-Rs. {{ (($sale->price-$sale->discount)*($orderCount-1))/($sale->price*100) }} )</div>
                </div>
              @endif
              </div>

              @if( $sale->quantity > $sale->stock_left && $alreadyPurchased==0)
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Buy Now</a>
              @else
                @if($alreadyPurchased>0)
                  <h2>Already purchased. Thank you.</h2>
                @else
                  <h2>Deal expired. Please come tomorrow for new deal.</h2>
                @endif
              @endif
            </div>
          </div>
        </div>

      </div>
    </div>


<style type="text/css">
  .label{
    display: inline-block;
    margin-bottom: 0.5rem;
    width: 50%;
  }

  #exampleModal input{
    overflow: visible;
    width: 20%;
    border: #ffffff0f;
  }
</style>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
            <form action="{{ url('place-order/'.$uid) }}" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Summary</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <img class="card-img-top" src="{{ asset($sale->cover) ?? '' }}" alt="Card image cap" style="height: 120px; object-fit: contain; margin-top: 15px; margin: auto;">
          </div>
          <div class="col-12">
            <center class="jumbotron mt-3"><h2>{{ ucfirst($sale->title ?? '') }}</h2></center>
              {{ csrf_field() }}
                <input type="text" name="sales_id" hidden  value="{{ $sale->id ?? '' }}" /> 
                <input type="text" name="title" hidden value="{{ $sale->title ?? '' }}" /> 
             

              <div class="row offset-1">
                <label class="label">Price (M.R.P.)</label>
                Rs.<input type="text" name="price"  value="{{ $sale->price ?? '' }}" /> 
              </div>

              <div class="row offset-1">
                <label class="label">Discount</label>
                -Rs.<input type="text" name="discount"  value="{{ $sale->discount ?? '' }}" /> 
              </div>

              <div class="row offset-1">
                <label class="label">Quantity</label>
                <input type="text" name="quantity"  value="1" /> 
              </div>

              @if(($orderCount>1  && $orderCount<6 ) && $sale->quantity != $sale->stock_left)
             
              <div class="row offset-1">
                <label class="label">Additional discount</label>
                {{ $orderCount-1  }} (-Rs.<input type="text" name="additional_discount"  value="{{ (($sale->price-$sale->discount)*($orderCount-1))/($sale->price*100) }}" /> )
              </div>
              
              <hr />
              <div class="row offset-1">
                <label class="label">Total Amount to be paid</label>
                Rs.<input type="text" name="total_amount"  value="{{ $sale->price - $sale->discount - (($sale->price-$sale->discount)*($orderCount-1))/($sale->price*100) }}" /> 
              </div>
              
              @else
              <hr />
               <div class="row offset-1">
                <label class="label">Total Amount to be paid</label>
                Rs.<input type="text" name="total_amount"  value="{{ $sale->price - $sale->discount }}" /> 
              </div>
              @endif




          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         @if($alreadyPurchased==0)
                  <!-- <h2>Already purchased. Thank you.</h2> -->
        <button type="submit" class="btn btn-primary">Confirm</button>
                @endif
      </div>
            </form>
    </div>
  </div>
</div>


    @endif

@endif






@endsection