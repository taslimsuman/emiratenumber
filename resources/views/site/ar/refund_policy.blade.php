@extends('layout.master')

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <img src="{{asset('site-asset/img/refund.jpg')}}" class="img-responsive">
            </div>
            
        </div>
    </div>
</div>
<div class="panel panel-default">
     <div class="panel-body">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 content">
				<h2 class="text-right">سياسة استرجاع المال </h2>
				<ul>
					<li>
						جميع الخدمات المدفوعة المقدمة رقميا غير قابلة للاسترداد بمجرد بدء استخدامها.
					</li>

					<li>
						يمكن إزالة القوائم المميزة قبل انتهاء الفترة المدفوعة عن طريق حذف الإدراج في لوحة بيانات المستخدم.
					</li>

					<li>
						في حالة حدوث خطأ أثناء الدفع ، أو عدم تسليم الخدمات على النحو المنشود ، يمكن للمستخدم الاتصال info@emiratesnumbers.ae
					</li>

				</ul>
				
			</div>
		</div>
 	</div>
</div>

<style type="text/css">
	ul li{
		text-align: right;
		direction:rtl;
	}
</style>
@endsection