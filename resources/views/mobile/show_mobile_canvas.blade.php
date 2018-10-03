@extends('layout.master')

@section('content')
<div class="panel panel-default">
     <div class="panel-body">
     	
		<div class="row">`
			<div class="col-md-12">
				<center>
					<img src="{{ asset($path) }}/{{$number->canvas}}" class="img-responsive">	
				</center>
				
			</div>
		</div>
		<div class="row">
			
			<div class="col-md-8 col-md-offset-2" style="margin-top:15px;padding-left:15px; padding-right: 15px; margin-bottom: 50px;">
				<table class="table table-bordered" style="width: 100%">
					
					<tbody>
						<tr>
							
							<td align="center">
								{{__('share')}}:
								<a href="https://wa.me/?text={{ asset($path) }}/{{$number->canvas}}" class="btn">
								<img src="{{asset('site-asset/img/whatsapp.png')}}" class="img-responsive" alt="emiratesnumber.com plate number">	
								</a>
							</td>
						</tr>
						<tr>
							<td align="center" style="padding-top: 30px">
								<a href="{{ asset($path) }}/{{$number->canvas}}" class="btn btn-success btn-block" download>{{__('download')}}</a>
							</td>
						</tr>
						<tr>
							<td align="center">
								{{__('seller')}} : <a href="#">{{$number->user->name}}</a>
							</td>

						</tr>
						
					</tbody>
				</table>

				
			</div>
			
		</div>


    </div>
</div>
@endsection