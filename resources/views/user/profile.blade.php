@extends('layout.master')
@section('content')
<div class="panel panel-default">
     <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
               <h2>{{__('profile')}}</h2>
            </div>
        </div>
        @include('layout.error_msg')
        @include('layout.message')
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#profile" data-toggle="tab">{{__('profile')}}</a></li>
                    <li ><a href="#plate" data-toggle="tab">{{__('plate')}}</a></li>
                    <li ><a href="#canvas" data-toggle="tab">{{__('canvas')}}</a></li>
                    <li><a href="#number" data-toggle="tab">{{__('number')}}</a></li>
                    
                    <li><a href="#featuread" data-toggle="tab">{{__('feature-ad')}}</a></li>

                </ul>
                <div class="tab-content">
                    <div id="profile" class="tab-pane fade in active">
                        @include('user.tab_profile')
                    </div>
                    <div id="plate" class="tab-pane fade">
                        @include('user.tab_plate')
                    </div>
                    <div id="canvas" class="tab-pane fade">
                        @include('user.tab_canvas')
                    </div>
                    <div id="number" class="tab-pane fade">
                        @include('user.tab_number')
                    </div>
                    <div id="featuread" class="tab-pane fade">
                        @include('user.tab_featuread')
                    </div>
                    
                </div>
              
            </div>
        </div>
       
    </div>
</div>
<!-- endpanel -->
@endsection

@section('script')

<script>

$(function(){

    $('#change_photo',function(){
        
        $('#change_photo').click(function(){

            $('#photo_upload').show();
            $(this).hide();

        });


    })
})


    
</script>
@endsection