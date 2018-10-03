@extends('layout.master')

@section('content')
<div class="panel panel-default">
     <div class="panel-body">
     	
		<div class="row">`
			<div class="col-md-12">
				<center>
					<img src="{{ asset($path) }}/{{$plate->imgname}}" class="img-responsive">	
				</center>
				
			</div>
		</div>
		<div class="row">
			
			<div class="col-md-8 col-md-offset-2" style="margin-top:15px;padding-left:30px; padding-right: 30px">
				<table class="table table-bordered" style="width: 100%">
					
					<tbody>
						<tr>
							
							<td align="center" colspan="2">
								{{__('share')}}:
								<a href="https://wa.me/?text={{ asset($path) }}/{{$plate->imgname}}" class="btn">
								<img src="{{asset('site-asset/img/whatsapp.png')}}" class="img-responsive" alt="emiratesnumber.com plate number">	
								</a>
							</td>
						</tr>
						<tr>
							<td align="center" style="padding-top: 5px" colspan="2">
								<a href="{{ asset($path) }}/{{$plate->imgname}}" class="btn btn-success btn-block" download >{{__('download')}}</a>
							</td>
						</tr>
						<tr>
							<td align="right">{{__('seller')}}</td>
							<td align="center">
								<a href="{{url('/seller')}}/{{$plate->user->profile}}">{{$plate->user->name}}</a>
							</td>

						</tr>
						<tr>
							<td align="right"> Price</td>
							<td align="center">
								<span style="font-size: 16px;color:#333;font-style: italic;font-weight: bold;">
									{{$plate->price > 0?number_format($plate->price)." AED":"CALL FOR PRICE"}}

								</span>
								</td>

						</tr>
						<tr>
							<td align="right">
								{{__('canvas')}}
							</td>

							<td align="center">
							<button class="btn btn-info" data-toggle="modal" data-target="#canvas">{{__('show')}}</button>
							</td>
						
						</tr>
					
						
					</tbody>
				</table>

				
			</div>
			
		</div>


    </div>
</div>

<!-- new view modal start -->
<div class="modal fade" id="canvas" role="dialog">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times</button>
            <h4 class="modal-title">{{__('canvas')}}</h4>
        </div>

        <div class="modal-body">
        	<div class="row">
        		<div class="col-md-12">
        			<center>
						<img src="{{ asset($path) }}/{{$plate->canvas}}" class="img-responsive">
					</center>
        		</div>
        	</div>
        	
            
        </div>

        <div class="modal-footer">
        	<div class="row">
        		<div class="col-md-5 col-md-offset-1">
        		
        			<a href="{{ asset($path) }}/{{$plate->canvas}}" class="btn btn-success btn-block" download >{{__('download')}}</a>
        		</div>
        		<div class="col-md-5">
        			<button class="btn btn-danger btn-block" data-dismiss="modal">{{__('close')}}</button>
        		</div>
        	</div>

        </div>

    </div>
</div>
</div>

@endsection