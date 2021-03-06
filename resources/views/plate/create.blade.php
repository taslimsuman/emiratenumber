@extends('layout.master')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Print Plate</h3>
    </div>
     <div class="panel-body">
        @include('layout.error_msg')
            
        <form action="{{url('/makeplate')}}" method="post" data-parsley-validate enctype="multipart/form-data">
            

            {{csrf_field()}}

            <div class="row">
                <div class="form-group col-md-4">
                    <label> {{__('plate')}}</label>
                    <input type="text" name="plate" class="form-control"  required>
                </div>
                <div class="form-group col-md-4">
                    <label> {{__('city')}}</label>
                    <select class="form-control" name="city" required>
                        <option value="">Select</option>
                        <option value="Abu Dhabi">Abu Dhabi</option>
                        <option value="Dubai">Dubai</option>
                        <option value="Sharjah">Sharjah</option>
                        <option value="Ajman">Ajman</option>
                        <option value="Fujairah">Fujairah</option>
                        <option value="Ras-Al-Khaimah">Ras-Al-Khaimah</option>
                        <option value="Umm Al Quwain">Umm Al Quwain</option>
                        
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label> {{__('code')}}</label>

                    <select class="form-control" name="code" required>
                        <option value="?">?</option>
                       @php
                            foreach(range('A','Z') as $char){
                                
                        
                                echo "<option value='$char'>$char</option>";

                                }

                            for($x = 1; $x <=25; $x++){
                                    echo "<option value='$x'>$x</option>";
                                }
                        @endphp
                            <option value="50">50</option>
                        
                    </select>
                </div>

            </div>
            <div class="row">
                 <div class="form-group col-md-3">
                    <label> {{__('mobile')}}</label>
                    <input type="text" name="mobile" class="form-control" required value="{{Auth::user()->contact}}" readonly>
                    <p class="mobilenote">You can update mobile number from settings</p>
                </div>

                <div class="form-group col-md-3">
                    <label> {{__('price')}}</label>
                    <input type="num" name="price" class="form-control" value="0" min="0" max="9999999" required>
                </div>

                <div class="form-group col-md-6" style="padding-top: 25px;">
                    
                    <label class="checkbox-inline">
                      <input type="checkbox" name="sold" data-on="Yes" data-off="No" data-toggle="toggle"> {{__('print-sold')}}
                    </label>
                    <label class="checkbox-inline">
                      <input type="checkbox" name="new_old" data-on="Old" data-off="New" data-toggle="toggle"> {{__('new-old')}}</label>
                    
                </div>
              
                
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label> {{__('more-details')}}</label>
                    <input type="text" name="more_details" class="form-control" value="{{Auth::user()->more_details}}">
                </div>
                <div class="form-group col-md-6">
                    <label> {{__('hashtag')}}</label>
                    <input type="text" name="hashtag" id="hashtag" class="form-control" autocomplete="off" value="{{Auth::user()->hashtag}}">
                </div>
                
            </div>
           @include('layout.tag')
            <div class="row">
                  <div class="form-group col-md-6">
                    <label></label>
                    <input type="submit" value=" {{__('print')}}" class="btn btn-success">
                </div>

                
            </div>

        </form>

    </div>
</div>


    
<!-- endpanel -->
@endsection

@section('script')

<script src="{{asset('site-asset/js/tag.js')}}"></script>

@endsection