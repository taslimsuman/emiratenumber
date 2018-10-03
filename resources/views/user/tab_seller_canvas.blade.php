  @foreach($mydata['canvases'] as $plate)
                       
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" style="padding:3px;border: 1px solid #e5e5e5;">
                        <a href="{{url('plate')}}/{{$plate->slug}}">
                            <img src="{{asset('public/uploads')}}/{{$plate->imgname}}" class="img-responsive">
                        </a>
                        <p class="callforprice">
                        
                            {{$plate->price > 0?number_format($plate->price)." AED":"Call For Price"}}

                        </p>
                       
                    </div>
               

@endforeach
