@extends('layout.master')

@section('content')
<div class="panel panel-default">
     <div class="panel-body">
     	
		<div class="row">`
			<div class="col-md-8 col-md-offset-2">
				<center>
					<img src="{{ asset($path) }}/{{$plate->imgname}}" class="img-responsive">	
				</center>
				
			</div>
		</div>
		<div class="row" style="margin-bottom: 30px;">
			
			<div class="col-md-10 col-md-offset-1" style="margin-top:15px;padding-left:15px; padding-right: 15px">
				<table class="table table-bordered" style="width: 100%">
					
					<tbody>
						<tr>
							
							<td align="center">
								{{__('share')}}
								<a href="https://wa.me/?text={{ asset($path) }}/{{$plate->imgname}}" class="btn">
								<img src="{{asset('site-asset/img/whatsapp.png')}}" class="img-responsive" alt="emiratesnumber.com plate number">	
								</a>
							</td>
						</tr>
						<tr>
							<td align="center" style="padding-top: 30px">
								<a href="{{ asset($path) }}/{{$plate->imgname}}" class="btn btn-success btn-block" download >{{__('download')}}</a>
							</td>
						</tr>
						<tr>
							<td align="center">
								{{__('seller')}} : <a href="{{url('/seller')}}/{{$plate->user->profile}}">{{$plate->user->name}}</a>
							</td>

						</tr>
						
					</tbody>
				</table>

				
			</div>
			
		</div>


    </div>
</div>
@endsection