@extends('layout.master')



@section('content')
@include('layout.banner')
<input type="hidden" id="lan" value="{{App::getLocale()}}">
<div class="panel panel-default">
     <div class="panel-body">
     	<div class="row">
     		<div class="col-md-12">
     			<p><i>
     				<span class="callforprice">{{$sold_plate}}</span> <span>
     					لوحات سيارات  من خلال موقع  www.emiratesnumber.ae
     				</span> www.emiratesnumber.com | <span class="callforprice">{{$sold_mobile}}</span> <span>رقم جوال من خلال موقع www.emiratesnumber.ae</span>
					</i>
     			</p>
     			<p>
     				<i>
     					
     				</i>
     			</p>
     		</div>
     	</div>
     	<h1 class="text-center">خدماتنا</h1>
		<div class="row">
			<div class="col-md-5">

				<img src="{{asset('site-asset/img/plate.png')}}" class="img-responsive">
			</div>
			<div class="col-md-7">
				<h3>بيع أو شراءأرقام  لوحات سيارات مميزة </h3>

				<p class="text1">
					Emiratesnumber.ae هوالموقع الإلكتروني الأكثرشعبية على الإنترنت ،ولديه مجموعة من لوحات أرقام سيارات الإمارات للبييع. أعرض لوحة سيارتك للبيع من خلال موقعنا  .
				</p>
				<a href="{{url('/plates')}}" class="btn btn-danger round-red">شراء أرقام لوحات </a>
				<a href="{{url('/bulkplate')}}" class="btn btn-info round-blue">بيع أرقام لوحات </a>
			</div>
		</div>

		<div class="row rowspace" style="background-image: url('site-asset/img/number-canvas.jpg');background-repeat: no-repeat; padding: 20px;color: #fff;">
			<div class="col-md-4">
				<img src="{{asset('site-asset/img/car-number.png')}}" class="img-responsive">
			</div>
			<div class="col-md-8">
				<h3>صمم لوحة سيارتك وأعرضها من خلال موقعنا  </h3>
				<p class="text1">
					لدينا ميزة جديدة تسمح لك بتصميم  أرقام اللوحات الخاصة بك وعرضها في أعلى الصفحة مما يزيد من إمكانية بيع رقم اللوحة الخاص بك في وقت قصير جدًا.
				</p>
			</div>
			
		</div>

		<div class="row rowspace">
			
			<div class="col-md-7">
				<h3>طباعة رقم لوحتك بلالوان </h3>
				<p class="text1">
					يمتلك موقع Emiratesnumber.ae خاصية  طباعة رقم الوحة بالألوان. اطبع لوحة الألوان الخاصة بك اليوم وقم ببيعها.
					
				</p>
				<a href="{{url('/color_plate')}}" class="btn btn-danger round-red">
					طبع اللوحة 
				</a>
			
			</div>
			<div class="col-md-5">
				<img src="{{asset('site-asset/img/color-number-plate.png')}}" class="img-responsive">
			</div>
		</div>

		<div class="row rowspace" style="background-image: url('site-asset/img/emirates-number.jpg');background-repeat: no-repeat; padding: 20px;color: #fff;">
			<div class="col-md-5">
				<img src="{{asset('site-asset/img/print-on-car.png')}}" class="img-responsive">
			</div>
			<div class="col-md-7">
				<h3>اطبع رقم لوحتك على سيارتك المفضلة </h3>
				<p class="text1">
					يتميز موقع Emiratesnumber.ae بخاصية معاينة رقم اللوحة  على سيارتك المفضلة. يمكنك رؤية السيارة مع رقم اللوحة الخاص بك.
				</p>

				<a href="#" class="btn btn-danger round-red pull-right">أطبع اللوحة </a>
			</div>
		</div>

		<div class="row rowspace">
			
			
			<div class="col-md-7">
				<h3>محبي أرقام الهواتف المميزة </h3>

				<p class="text1">
					يعتبر موقع Emiratesnumber.ae أكبر موقع إلكتروني حيث يمكنك شراء أو بيع أرقام الهواتف النقالة الخاصة بك من مشغل الخدمة المتنقلة في دولة الإمارات العربية المتحدة. يمكنك طباعة أرقام جوال متعددة على لوحة واحدة وترويجها.
				</p>
				<a href="{{url('/numbers')}}" class="btn btn-danger round-red">شتري اللوحة"</a>
				<a href="{{url('/mobile_bulk')}}" class="btn btn-info round-blue">يع أرقام</a>
			</div>

			<div class="col-md-5">
				<img src="{{asset('site-asset/img/etisalat_du.png')}}" class="img-responsive">
			</div>

		</div>
		<div class="row rowspace">
			<div class="col-md-12">
				<h2 class="text-center">روابط مفيدة</h2> <hr>
			</div>
			<div class="col-md-4">
				<a href="https://www.adpolice.gov.ae/" target="_blank">
				<img src="{{asset('site-asset/img/ad-police-logo.png')}}" class="img-responsive">
				</a>
			</div>
			<div class="col-md-4">
				<a href="https://www.dubaipolice.gov.ae" target="_blank">
				<img src="{{asset('site-asset/img/dxb-police-logo.png')}}" class="img-responsive">
				</a>
			</div>
			<div class="col-md-4">
				<a href="https://www.rta.ae" target="_blank">
				<img src="{{asset('site-asset/img/rta-logo.png')}}" class="img-responsive">
				</a>
			</div>
			
		</div>


		
 	</div>
</div>
@include('layout.sponsor')
@endsection

@section('script')

<script>
$(function(){
	
	var lan = $('#lan').val();

	if(lan=='ar'){

		$("h3").addClass('text-right');
		$("a.btn").addClass('pull-right');
		$("a.btn").css('margin-left','10px');
	}

})

</script>
@endsection