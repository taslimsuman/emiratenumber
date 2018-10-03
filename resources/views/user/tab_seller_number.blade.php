  @foreach($mydata['numbers'] as $number)
                       
<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 numbers-list-minimized-padding homeplate">

	<div class="thumbnail margin-bottom-5 text-center" style="min-height: 120px !important;">
		<img src="{{asset('public/mobiles')}}/{{$number->imgname}}" class="img-responsive">
		 <p class="callforprice">
        	{{$number->price > 0?number_format($number->price)." AED":"Call For Price"}}
    	</p>
    	<a class="btn btn-default btn-width-full btn-xs margin-ver-5" href="{{url('number')}}/{{$number->slug}}">
        	{{__('more-details')}}  
    	</a>

	</div>

    
   
   
</div>
               

@endforeach
