  @foreach($plates as $plate)
                       
<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 numbers-list-minimized-padding homeplate">
    <div class="thumbnail margin-bottom-5 text-center" style="min-height: 140px !important;">
        <img src="{{asset('public/uploads')}}/{{$plate->imgname}}" class="img-responsive">
         <p class="callforprice">
           {{$plate->price > 0?number_format($plate->price)." AED":"Call For Price"}}
         </p>
        <a class="btn btn-default btn-width-full btn-xs margin-ver-5" href="{{url('plate')}}/{{$plate->slug}}">
            {{__('more-details')}}
        </a>

         <p align="center">
            <a class="btn btn-danger btn-width-full btn-xs margin-ver-5" href="{{url('/plate_delete')}}/{{$plate->slug}}" onclick="return confirm('Are you sure want to delete?');">Delete</a>
        </p>

    </div>
    
   
   
</div>
               

@endforeach
