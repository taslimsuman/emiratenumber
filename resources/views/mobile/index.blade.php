@extends('layout.master')
@section('content')
@include('layout.banner')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">{{__('search-num')}}</h3>
  </div>
  <div class="panel-body">
	<form action="" method="get">
		<div class="row">
			
			<div class="from-group col-md-2">
				<label>{{__('similar')}}</label>
				<input type="text" name="similar" class="form-control">
			</div>

			<div class="from-group col-md-2">
				<label>{{__('min-price')}}</label>
				<input type="text" name="minprice" class="form-control">
			</div>
			<div class="from-group col-md-2">
				<label>{{__('max-price')}}</label>
				<input type="text" name="maxprice" class="form-control">
			</div>

			<div class="from-group col-md-2">
				<label>{{__('code')}}</label>
				<select class="form-control" name="code">
                    <option value="" selected>All Code</option>
                   	    <option value="050">050</option>
                        <option value="055">055</option>
                        <option value="052">052</option>
                        <option value="054">054</option>
                        <option value="056">056</option>
                </select>
			</div>

			<div class="from-group col-md-2">
				<label>{{__('provider')}}</label>
				<select class="form-control" name="carrier">
                    <option value="">All Carrier</option>
                    <option value="etisalat">Etisalat</option>
                    <option value="du">Du</option>
                </select>
			</div>

		</div>

		<div class="row">
			<div class="col-md-12" id="pattern">
				<h4>{{__('pattern')}}</h4>
				
					<div class="btn btn-default">
						<label class="checkbox-inline">
							<input type="checkbox" name="repeat_three">Repeated(Min 3)
							(ex:<span class="red">XXX</span>4567)
					</label>
					</div>
					<div class="btn btn-default">
						<label class="checkbox-inline">
							<input type="checkbox" name="repeat_four"> Repeated(Min 4)
							(ex:<span class="red">XXXX</span>567)
						</label>
					</div>
			
					<div class="btn btn-default">
						<label class="checkbox-inline">
							<input type="checkbox" name="enclosed"> Enclosed
							(ex:<span class="red">X</span>23456<span class="red">X</span>)
						</label>
					</div>
					
					<div class="btn btn-default">
						<label class="checkbox-inline">
							<input type="checkbox" name="superEnclosed">Super Enclosed
							(ex:<span class="red">XY</span>345<span class="red">YX</span>)
						</label>
					</div>
					
					<div class="btn btn-default">
						<label class="checkbox-inline">
							<input type="checkbox" name="doubleEnclosed">Double Enclosed
							(ex:<span class="red">XX</span>567<span class="red">XX</span>)
						</label>
					</div>
					<div class="btn btn-default">
						<label class="checkbox-inline">
							<input type="checkbox" name="bothside">Readable from both sides
							(ex: <span class="red">XYZ</span>3<span class="red">XYZ</span>)
						</label>
					</div>
			</div>
		</div>
		<div class="row" style="margin-top: 20px">
			<div class="col-md-6 col-md-offset-3">			
				<input type="submit" class="btn btn-success btn-block" value="Search">
			</div>
		</div>
	</form>
  </div>
</div>


<!-- end search -->
<div class="panel panel-default">
     <div class="panel-body">
		<p>{{__('all-num')}}</p>
		<div class="row">
		@foreach($numbers as $number)
			<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 numbers-list-minimized-padding homeplate">
				<div class="thumbnail margin-bottom-5 text-center">
					<img src="{{asset($path)}}/{{$number->imgname}}"  class="img-responsive">
					
					<p class="callforprice">
						{{$number->price > 0?number_format($number->price)." AED":"Call For Price"}}
					</p>
					<p class="minago">
							{{$number->created_at->diffForHumans()}}
					</p>

					<a class="btn btn-default btn-width-full btn-xs margin-ver-5" href="{{url('number')}}/{{$number->slug}}">
						{{__('more-details')}}
					</a>
					
					
				</div>
			</div>
		@endforeach
		</div>
		<center>
			{{$numbers->links()}}
		</center>
 	</div>
</div>
@endsection