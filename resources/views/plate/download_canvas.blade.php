@extends('layout.master')

@section('content')
<div class="panel panel-default">
     <div class="panel-body">
     	
		<div class="row">`
			<div class="col-md-12">
				<center>
					<img src="{{ asset($path) }}/{{$file_name}}" class="img-responsive">	
				</center>
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-md-offset-3" style="padding-top:25px">
				<a href="{{ asset($path) }}/{{$file_name}}" class="btn btn-success" download>{{__('download')}}</a>
			</div>
			<div class="col-md-4">
				

				<a href="https://wa.me/?text={{ asset($path) }}/{{$file_name}}" class="btn">
					<img src="{{asset('site-asset/img/whatsapp.png')}}" class="img-responsive">	
				</a>
			</div>
			
		</div>


    </div>
</div>
@endsection