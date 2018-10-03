@foreach($mydata['plates'] as $plate)
                       
  <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 numbers-list-minimized-padding homeplate">
  	<div class="thumbnail margin-bottom-5 text-center" style="min-height: 120px !important;">
  		 <img src="{{asset('public/uploads')}}/{{$plate->imgname}}" class="img-responsive">
  		  <p class="callforprice">       
           {{$plate->price > 0?number_format($plate->price)." AED":"Call For Price"}}
          </p>
          <a class="btn btn-default btn-width-full btn-xs margin-ver-5" href="{{url('plate')}}/{{$plate->slug}}">
               {{__('more-details')}}            
          </a>

  	</div>
                        
                       
                     
   </div>
               

@endforeach
