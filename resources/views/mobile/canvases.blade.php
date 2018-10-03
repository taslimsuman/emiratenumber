@extends('layout.master')
@section('content')
@include('layout.banner')

<div class="panel panel-default">
     <div class="panel-body" >
		<p>{{__('canvases')}}</p>
		<div class="row">
		@foreach($numbers as $number)
			<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 numbers-list-minimized-padding homeplate">
			<div class="thumbnail margin-bottom-5 text-center">
				<a href="{{url('/show_number_canvas')}}/{{$number->slug}}">
					<img src="{{asset($path)}}/{{$number->canvas}}"  class="img-responsive">
				</a>
				<p class="minago">
					{{$number->created_at->diffForHumans()}}
				</p>
			</div>
			</div>
		@endforeach
		</div>
		<center>
			{{$numbers->links()}}
		</center>
 	</div>
</div>

@endsection