@extends('layout.master')

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <img src="{{asset('site-asset/img/pricing.jpg')}}" class="img-responsive">
            </div>
            
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
		<div class="row content">
			<h3 class="text-center">Pricing Plan</h3><hr>

			<div class="col-md-5 col-md-offset-1">
				<div class="panel panel-primary">
					<div class="panel-heading">
						
						<h4>14 days</h4>
					</div>
     				<div class="panel-body">
     					<div class="price-tag">
	     					<h3>AED 150</h3>
	     					<p class="text1">
	     						Featured Ad for 14 days
	     					</p>
	     					<hr>
     					</div>
						<ul class="list-unstyled">
							<li><i class="fa fa-check blue-tick"></i> <span class="text1">Faster</span></li>
							<li><i class="fa fa-check blue-tick"></i> <span class="text1">More calls</span></li>
							<li><i class="fa fa-check blue-tick"></i><span class="text1"> Easy payment</span></li>
							<li><i class="fa fa-times red"></i><span class="text1"> Discount price</span></li>
							
						</ul>
     				</div>
     			</div>
				
			</div>
			<div class="col-md-5">

				<div class="panel panel-success">
				<div class="cnrflash">
                    <div class="cnrflash-inner">
                        <span class="cnrflash-label">35%
                            <br> Discount
                        </span>
                    </div>
                </div>
					<div class="panel-heading">
						<h4>30 days</h4>
					</div>
     				<div class="panel-body">
     					<h3><span style='text-decoration: line-through;font-style: italic;'>300 AED</span> <span>AED 195</span></h3>
	     					<p class="text1">
	     						Featured Ad for 30 days
	     					</p>
	     					<hr>
						<ul class="list-unstyled">
							<li><i class="fa fa-check green-tick"></i> <span class="text1">Quick Sell</span></li>
								<li><i class="fa fa-check green-tick"></i> <span class="text1">Faster</span></li>
							<li><i class="fa fa-check green-tick"></i> <span class="text1">More calls</span></li>
							<li><i class="fa fa-check green-tick"></i><span class="text1"> Easy payment</span></li>
							<li><i class="fa fa-check green-tick"></i><span class="text1"> Discount price</span></li>
						</ul>
     				</div>
     			</div>
				
			</div>
			
		</div>

		<div class="row">
				<div class="col-md-12">
					<center>
				<hr>
			<p><span class="red">*</span>The prices can be changed any time as per our pricing policy. The registered users will be notified before any change.</p>
			</center>
				</div>
		</div>

 	</div>
</div>
@endsection