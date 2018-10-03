@extends('layout.master')

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <img src="{{asset('site-asset/img/terms_and_conditions.jpg')}}" class="img-responsive">
            </div>
            
        </div>
    </div>
</div>
<div class="panel panel-default">
     <div class="panel-body">
		<div class="row">			
			<div class="col-md-10 col-md-offset-1 content">
				
				<ul>
					<li>www.emiratesnumber.ae is not an auction house and does not offer auction service. The website is an online platform allowing user the sale and purchase of items between end-user sellers and buyers.</li>
					<li>Any dispute or claim arising out of or in connection with this website shall be governed and construed in accordance with the laws of UAE.</li>
					
					<li>If you are under the age of 18, you are prohibited to register as a User of this website and are not allowed to transact or use the website.</li>
					<li>If you make a payment for any services on our website, the details you are asked to submit will be provided directly to our payment provider via a secured connection.</li>
					<li>The cardholder must retain a copy of transaction records and Merchant policies and rules.</li>

				</ul>
			</div>
		</div>
 	</div>
</div>
@endsection