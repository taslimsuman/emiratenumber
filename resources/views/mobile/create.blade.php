@extends('layout.master')

@section('content')

@include('layout.error_msg')
<div class="panel panel-default">
     <div class="panel-body">
        
        <form action="{{url('/mobile_create')}}" method="post" data-parsley-validate enctype="multipart/form-data">
            
            {{csrf_field()}}

            <div class="row">
                <h3 class="text-center">{{__('create-canvas')}}</h3>
                <div class="form-group col-md-4">
                    <label>{{__('provider')}}</label>
                    <select class="form-control" name="provider" required>
                        <option value="">Select</option>
                        <option value="etisalat">Etisalat</option>
                        <option value="du">Du</option>
                        
                        
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>{{__('code')}}</label>
                    <select class="form-control" name="code" required>
                        <option value="">Select</option>
                        <option value="050">050</option>
                        <option value="055">055</option>
                        <option value="052">052</option>
                        <option value="054">054</option>
                        <option value="056">056</option>
                       
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>{{__('number')}}</label>
                    <input type="text" name="number" class="form-control" required>
                </div>

            </div>
            <div class="row">
                 <div class="form-group col-md-3">
                    <label>{{__('mobile')}}</label>
                    <input type="text" name="mobile" class="form-control" required value="{{Auth::user()->contact}}" readonly>
                    <p class="mobilenote">You can update mobile number from settings</p>
                </div>

                <div class="form-group col-md-3">
                    <label>{{__('price')}}</label>
                    <input type="num" name="price" class="form-control" value="0" min="0" max="9999999" required>
                </div>

                <div class="form-group col-md-6" style="padding-top: 25px;">
                    <label class="checkbox-inline">
                      <input type="checkbox" name="vip" data-on="Yes" data-off="No" data-toggle="toggle">VIP
                    </label>
                    
                    <label class="checkbox-inline">
                      <input type="checkbox" name="sold" data-on="Yes" data-off="No" data-toggle="toggle">{{__('print-sold')}}
                    </label>
                    

                </div>
              
                
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>{{__('more-details')}}</label>
                    <input type="text" name="more_details" class="form-control">
                </div>
                <div class="col-md-8" id="tags">
                     <label>{{__('hashtag')}}</label>
                    <input type="text" name="hashtag" id="hashtag" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="row">
              
            </div>
            @include('layout.mobile_tag')
            <div class="row" style="margin-top: 20px;">
              <div class="col-md-12">
                  <input type="submit" value="{{__('print')}}" class="btn btn-success">
              </div>
                  
            </div>

        </form>

    </div>
</div>
@endsection

@section('script')

<script src="{{asset('site-asset/js/tag.js')}}"></script>


@endsection