@extends('layout.master')

@section('content')
@include('layout.banner')

<div class="panel panel-default">
     <div class="panel-body">
		<p>{{__('canvases')}}</p>
		<div class="row">
		@foreach($plates as $plate)
			<div class="col-md-4 col-sm-6 col-xs-6 col-lg-3" style="padding: 7px">
				<a href="{{url('show_plate_canvas')}}/{{$plate->slug}}">
					<img src="{{asset($path)}}/{{$plate->imgname}}" class="img-responsive">
				</a>
				<p class="minago">
					{{$plate->created_at->diffForHumans()}}
				</p>
			</div>
		@endforeach
		</div>
 	</div>
</div>
@endsection