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
				<h2 class="text-right">
					لشروط والأحكام 
				</h2>
				<ul>
					<li>
						هذا الموقع ليس دار" للمزادات ولا يقدم خدمة مزادات. الموقع عبارة عن منصة على الإنترنت تسمح للمستخدم ببيع وشراء المواد بين البائعين والمشترين النهائيين.

					</li>
					<li>
						أي نزاع أو مطالبة تنشأ عن أو فيما يتعلق بهذا الموقع تخضع وتفسر وفقا لقوانين دولة الإمارات العربية المتحدة.
					</li>
					
					<li>
						إذا كان عمرك أقل من 18 عامًا ، يُحظر عليك التسجيل كمستخدم لهذا الموقع الإلكتروني ولا يُسمح لك بالتعامل أو استخدام الموقع.
					</li>

					<li>
						إذا قمت بالدفع مقابل أي خدمات على موقعنا الإلكتروني ، فسيتم تقديم التفاصيل التي سيُطلب منك إرسالها مباشرةً إلى موفر الدفع الخاص بنا عبر اتصال آمن.
					</li>

					<li>
						يجب على حامل البطاقة الاحتفاظ بنسخة من سجلات المعاملات وسياسات وقواعد التاجر.

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