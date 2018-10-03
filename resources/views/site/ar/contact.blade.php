@extends('layout.master')

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <img src="{{asset('site-asset/img/contact.jpg')}}" class="img-responsive">
            </div>
            
        </div>
    </div>
</div>

<div class="panel panel-default">
     <div class="panel-body">
		<div class="row content">
			<div class="col-md-6">
				
			</div>
			<div class="col-md-6">
				<h1 class="text-right">اتصل</h1>
			<p class="text1">
				
			الاتصال: 3999994-050 | 8383838-050
			</p>
			<p class="text1">
				البريدالإلكتروني: info@emiratesnumber.com
			</p>
			<p class="text1">
				موقع الويب: www.emiratesnumber.com
			</p>
			</div>
			
		</div>
		
 	</div>
</div>

<style type="text/css">
	p.text1{
		text-align: right;
		direction:rtl;
	}
</style>
@endsection