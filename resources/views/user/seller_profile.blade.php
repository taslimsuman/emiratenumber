@extends('layout.master')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
         <h3>Seller Profile</h3>
        
    </div>
     <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
               <p>Seller Profile: {{$mydata['profile']->name}}</p>
               <p>Seller Contact: {{$mydata['profile']->contact}}</p>
               <p>Seller Instagram: {{$mydata['profile']->instagram}}</p>
            </div>
            <div class="col-md-6">
                <img src="{{asset('public/profile')}}/{{$mydata['profile']->photo}}" class="img-responsive img-rounded">
            </div>
        </div>
            
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li ><a href="#plate" data-toggle="tab">Plate</a></li>
                    <li ><a href="#canvas" data-toggle="tab">Canvas</a></li>
                    <li><a href="#number" data-toggle="tab">Number</a></li>
                    
                    <li><a href="#featuread" data-toggle="tab">Feature Ad</a></li>

                </ul>
                <div class="tab-content">
                    <div id="plate" class="tab-pane fade in active">
                        @include('user.tab_seller_plate')
                    </div>
                    <div id="canvas" class="tab-pane fade">
                        @include('user.tab_seller_canvas')
                    </div>
                    <div id="number" class="tab-pane fade">
                        @include('user.tab_seller_number')
                    </div>
                    <div id="featuread" class="tab-pane fade">
                        @include('user.tab_seller_featuread')
                    </div>
                    
                </div>
              
            </div>
        </div>
       
    </div>
</div>
<!-- endpanel -->
@endsection
