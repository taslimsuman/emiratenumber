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
			<h3 class="text-center">خطة التسعير</h3><hr>

			<div class="col-md-5 col-md-offset-1">
				<div class="panel panel-primary">
					<div class="panel-heading">
						
						<h4>أيام 14 </h4>
					</div>
     				<div class="panel-body">
     					<div class="price-tag">
	     					<h3>AED 150</h3>
	     					<p class="text1 text-right">
	     						اعلان مميز لمدة 14 يوم
	     					</p>
	     					<hr>
     					</div>
						<ul class="list-unstyled">
							<li><i class="fa fa-check blue-tick"></i> <span class="text1">بسرعة</span></li>
							<li><i class="fa fa-check blue-tick"></i> <span class="text1">المزيد من المكالمات الهاتفية</span></li>
							<li><i class="fa fa-check blue-tick"></i><span class="text1"> دفع سهل </span></li>
							<li><i class="fa fa-times red"></i><span class="text1">سعر الخصم</span></li>
							
						</ul>
     				</div>
     			</div>
				
			</div>
			<div class="col-md-5">

				<div class="panel panel-success">
				<div class="cnrflash">
                    <div class="cnrflash-inner">
                        <span class="cnrflash-label">35%
                            <br> خصم
                        </span>
                    </div>
                </div>
					<div class="panel-heading">
						<h4> يام  30</h4>
					</div>
     				<div class="panel-body">
     					<h3><span style='text-decoration: line-through;font-style: italic;'>300 AED</span> <span>AED 195</span></h3>
	     					<p class="text1">
	     						إعلان مميز لمدة 30 يومًا
	     					</p>
	     					<hr>
						<ul class="list-unstyled">
							<li><i class="fa fa-check green-tick"></i> <span class="text1">بيع سريع</span></li>
								<li><i class="fa fa-check blue-tick"></i> <span class="text1">بسرعة</span></li>
								<li><i class="fa fa-check blue-tick"></i> <span class="text1">المزيد من المكالمات الهاتفية</span></li>
								<li><i class="fa fa-check blue-tick"></i><span class="text1"> دفع سهل </span></li>
								<li><i class="fa fa-times red"></i><span class="text1">سعر الخصم</span></li>
							</ul>
     				</div>
     			</div>
				
			</div>
			
		</div>

		<div class="row">
				<div class="col-md-12">
					<center>
				<hr>
			<p>يمكن تغيير الأسعار في أي وقت وفقًا لسياسة الأسعار الخاصة بنا. سيتم إخطار المستخدمين المسجلين قبل أي تغيير. <span class="red">*</span></p>
			</center>
				</div>
		</div>

 	</div>
</div>
@endsection