@extends('layout.master')



@section('content')
@include('layout.banner')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">{{__('search-num')}}</h3>
  </div>
  <div class="panel-body">
	<form action="" method="get">
		<div class="row">
			<div class="from-group col-md-2">
				<label>{{__('digit')}}</label>
				<select class="form-control" name="digits">
					<option value="" selected>{{__('all-num')}}</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</div>
			<div class="from-group col-md-2">
				<label>{{__('similar')}}</label>
				<input type="text" name="similar" class="form-control">
			</div>

			<div class="from-group col-md-2">
				<label>{{__('min-price')}}</label>
				<input type="text" name="minprice" class="form-control">
			</div>
			<div class="from-group col-md-2">
				<label>{{__('max-price')}}</label>
				<input type="text" name="maxprice" class="form-control">
			</div>

			<div class="from-group col-md-2">
				<label>{{__('code')}}</label>
				<select class="form-control" name="code">
                    <option value="" selected>{{__('code')}}</option>
                   @php
                        foreach(range('A','Z') as $char){
                            
                    
                            echo "<option value='$char'>$char</option>";

                            }

                        for($x = 1; $x <=25; $x++){
                                echo "<option value='$x'>$x</option>";
                            }
                    @endphp
                        <option value="50">50</option>
                    
                </select>
			</div>

			<div class="from-group col-md-2">
				<label>{{__('city')}}</label>
				<select class="form-control" name="city">
                    <option value="">All City</option>
                    <option value="Abu Dhabi">Abu Dhabi</option>
                    <option value="Dubai">Dubai</option>
                    <option value="Sharjah">Sharjah</option>
                    <option value="Ajman">Ajman</option>
                    <option value="Fujairah">Fujairah</option>
                    <option value="Ras-Al-Khaimah">Ras-Al-Khaimah</option>
                    <option value="Umm Al Quwain">Umm Al Quwain</option>
                    
                </select>
			</div>

		</div>

		<div class="row">
			<div class="col-md-12" id="pattern">
				<h4>{{__('pattern')}}</h4>
					
					<div class="btn btn-default">
						<label class="checkbox-inline">
							<input type="checkbox" name="enclosed"> Enclosed
							(ex:<span class="red">X</span>456<span class="red">X</span>)
						</label>
						
					</div>
					
					<div class="btn btn-default">
						<label class="checkbox-inline">
							<input type="checkbox" name="superEnclosed">Super Enclosed
						(ex:<span class="red">XY</span>5<span class="red">YX</span>)
						</label>
					</div>
					<div class="btn btn-default">
						<label class="checkbox-inline">
							<input type="checkbox" name="doubleEnclosed">Double Enclosed
						(ex:<span class="red">XX</span>5<span class="red">XX</span>)
						</label>
					</div>
					<div class="btn btn-default">
						<label class="checkbox-inline">
							<input type="checkbox" name="middleTriple">Middle Triple
						Ex: 2<span class="red">XXX</span>3
						</label>
					</div>

			</div>
		</div>
		<div class="row" style="margin-top: 20px">
			<div class="col-md-6 col-md-offset-3">			
				<input type="submit" class="btn btn-success btn-block" value="Search">
			</div>
		</div>
	</form>
  </div>
</div>


<div class="panel panel-default">
     <div class="panel-body">				
		<div class="row">
		@foreach($plates as $plate)
			<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 numbers-list-minimized-padding homeplate">
				<div class="thumbnail margin-bottom-5 text-center" style="min-height: 140px !important;">
					<img src="{{asset($path)}}/{{$plate->imgname}}" alt="Number Plate">
						<p class="callforprice">
						{{$plate->price > 0?number_format($plate->price)." AED":"Call For Price"}}
						</p>
						<p class="minago">
							{{$plate->created_at->diffForHumans()}}
						</p>
					<a class="btn btn-default btn-width-full btn-xs margin-ver-5" href="{{url('plate')}}/{{$plate->slug}}">{{__('more-details')}}</a>

				</div>
			</div>

		@endforeach
		</div>
		<center>
			{{$plates->links()}}
		</center>
 	</div>
</div>


@endsection