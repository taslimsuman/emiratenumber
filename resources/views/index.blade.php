@extends('layout.master')



@section('content')
@include('layout.banner')
<input type="hidden" id="lan" value="{{App::getLocale()}}">
<div class="panel panel-default">
     <div class="panel-body">
     	<div class="row">
     		<div class="col-md-12">
     			<p><i>
     				<span class="callforprice">{{$sold_plate}}</span> <span>
     					{{__('plate-sold')}}
     				</span> www.emiratesnumber.com | <span class="callforprice">{{$sold_mobile}}</span> <span>{{__('number-sold')}}</span> www.emiratesnumber.ae
					</i>
     			</p>
     			<p>
     				<i>
     					
     				</i>
     			</p>
     		</div>
     	</div>
     	<h1 class="text-center">{{__('Our Services')}}</h1>
		<div class="row">
			<div class="col-md-5">

				<img src="{{asset('site-asset/img/plate.png')}}" class="img-responsive">
			</div>
			<div class="col-md-7">
				<h3>{{__('sellorbuy')}}</h3>

				<p class="text1"> {{__('sellorbuy-txt')}}</p>
				<a href="{{url('/plates')}}" class="btn btn-danger round-red">{{__('buynum')}}</a>
				<a href="{{url('/bulkplate')}}" class="btn btn-info round-blue">{{__('sellnum')}}</a>
			</div>
		</div>

		<div class="row rowspace" style="background-image: url('site-asset/img/number-canvas.jpg');background-repeat: no-repeat; padding: 20px;color: #fff;">
			<div class="col-md-4">
				<img src="{{asset('site-asset/img/car-number.png')}}" class="img-responsive">
			</div>
			<div class="col-md-8">
				<h3>{{__('Features-License-Plates')}}</h3>
				<p class="text1">
					{{__('Features-License-Plates-txt')}}
				</p>
			</div>
			
		</div>

		<div class="row rowspace">
			
			<div class="col-md-7">
				<h3>{{__('print-color-plate')}}</h3>
				<p class="text1">
					{{__('print-color-plate-txt')}}
					
				</p>
				<a href="{{url('/color_plate')}}" class="btn btn-danger round-red">{{__('printNumber')}}</a>
			
			</div>
			<div class="col-md-5">
				<img src="{{asset('site-asset/img/color-number-plate.png')}}" class="img-responsive">
			</div>
		</div>

		<div class="row rowspace" style="background-image: url('site-asset/img/emirates-number.jpg');background-repeat: no-repeat; padding: 20px;color: #fff;">
			<div class="col-md-5">
				<img src="{{asset('site-asset/img/print-on-car.png')}}" class="img-responsive">
			</div>
			<div class="col-md-7">
				<h3>{{__('print-on-car')}}</h3>
				<p class="text1">
					{{__('print-on-car-txt')}} 
				</p>

				<a href="#" class="btn btn-danger round-red pull-right">{{__('printNumber')}}</a>
			</div>
		</div>

		<div class="row rowspace">
			
			
			<div class="col-md-7">
				<h3>{{__('fancy-mob-num')}} </h3>
				<p class="text1">
					{{__('fancy-mob-num-txt')}}
				</p>
				<a href="{{url('/numbers')}}" class="btn btn-danger round-red">{{__('buynumber')}}</a>
				<a href="{{url('/mobile_bulk')}}" class="btn btn-info round-blue">{{__('sellnum')}}</a>
			</div>

			<div class="col-md-5">
				<img src="{{asset('site-asset/img/etisalat_du.png')}}" class="img-responsive">
			</div>

		</div>
		<div class="row rowspace">
			<div class="col-md-12">
				<h2 class="text-center">{{__('useful-link')}}</h2> <hr>
			</div>
			<div class="col-md-4">
				<a href="https://www.adpolice.gov.ae/" target="_blank">
				<img src="{{asset('site-asset/img/ad-police-logo.png')}}" class="img-responsive">
				</a>
			</div>
			<div class="col-md-4">
				<a href="https://www.dubaipolice.gov.ae" target="_blank">
				<img src="{{asset('site-asset/img/dxb-police-logo.png')}}" class="img-responsive">
				</a>
			</div>
			<div class="col-md-4">
				<a href="https://www.rta.ae" target="_blank">
				<img src="{{asset('site-asset/img/rta-logo.png')}}" class="img-responsive">
				</a>
			</div>
			
		</div>


		
 	</div>
</div>
@include('layout.sponsor')
@endsection

@section('script')

<script>
$(function(){
	
	var lan = $('#lan').val();

	if(lan=='ar'){

		$("h3").addClass('text-right');
		$("a.btn").addClass('pull-right');
		$("a.btn").css('margin-left','10px');
	}

})

</script>
@endsection