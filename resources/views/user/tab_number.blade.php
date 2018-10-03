  @foreach($numbers as $number)
                       
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6" style="padding:3px;border: 1px solid #e5e5e5;">
                        <a href="{{url('number')}}/{{$number->slug}}">
                            <img src="{{asset('public/mobiles')}}/{{$number->imgname}}" class="img-responsive">
                        </a>
                        <p class="callforprice">
                        
                            {{$number->price > 0?number_format($number->price)." AED":"Call For Price"}}

                        </p>
                        <p align="center">
							<a href="{{url('/mobile_delete')}}/{{$number->slug}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?');">Delete</a>
						</p>
                    </div>
               

@endforeach
