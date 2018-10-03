@extends('layout.master')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>{{__('print-color-num')}}</h3>
    </div>
     <div class="panel-body">
        @include('layout.error_msg')
            <h3 class="text-center"> {{__('enter-plate-num')}}</h3>
            <hr>
        <form action="{{url('/color_plate')}}" method="post" data-parsley-validate enctype="multipart/form-data">
            
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-1 col-md-offset-2">
                    
                </div>    
                @for($i=0;$i < 5;$i++)
                <div class="col-md-1">
                    <input type="text" class="form-control plate" name="numbers[]" maxlength="1">
                </div>
                @endfor
                
            </div>
            <div class="row">
                <div class="col-md-1 col-md-offset-2">
                </div>
                @for($i=0;$i < 5;$i++)
                 <div class="col-md-1">
                    <select class="form-control colorid" name="colorid[]" onchange="makecolor({{$i}})">
                        <option value="B">B</option>
                        <option value="R">R</option>
                    </select>
                </div>
                @endfor
                
                
            </div>
            <hr>
            <div class="row" style="margin-top: 20px;">
               
                <div class="form-group col-md-4">
                    <label>{{__('city')}}</label>
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
                <div class="form-group col-md-2">
                    <label>{{__('code')}}</label>

                    <select class="form-control" name="code" required>
                        <option value="?">?</option>
                       @php
                            foreach(range('A','Z') as $char){
                                
                        
                                echo "<option value='$char'>$char</option>";

                                }

                            for($x = 1; $x <=20; $x++){
                                    echo "<option value='$x'>$x</option>";
                                }
                        @endphp
                        
                        
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label>{{__('price')}}</label>
                    <input type="num" name="price" class="form-control" value="0" min="0" max="9999999" required>
                </div>

            </div>
            <div class="row">
                 <div class="form-group col-md-3">
                    <label>{{__('mobile')}}</label>
                    <input type="text" name="mobile" class="form-control" required value="{{Auth::user()->contact}}" readonly>
                    <p class="mobilenote">You can update mobile number from settings</p>
                </div>

                

                <div class="form-group col-md-6" style="padding-top: 25px;">
                    
                    <label class="checkbox-inline">
                      <input type="checkbox" name="sold" data-on="Yes" data-off="No" data-toggle="toggle">{{__('print-sold')}}
                    </label>
                    <label class="checkbox-inline">
                      <input type="checkbox" name="new_old" data-on="Old" data-off="New" data-toggle="toggle">{{__('new-old')}}
                    </label>
                    
                </div>
              
                
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>{{__('more-details')}}</label>
                    <input type="text" name="more_details" class="form-control">
                </div>
                <div class="form-group col-md-8">
                    <label>{{__('hashtag')}}</label>
                    <input type="text" name="hashtag" id="hashtag" class="form-control" autocomplete="off">
                </div>
                
            </div>

            @include('layout.tag')
            <div class="row" style="margin-bottom: 50px">
                  <div class="form-group col-md-6">
                    <label></label>
                    <input type="submit" value="{{__('print')}}" class="btn btn-success">
                </div>

                
            </div>

        </form>
        

    </div>
</div>
<!-- endpanel -->
@endsection

@section('script')

<script src="{{asset('site-asset/js/tag.js')}}"></script>

<script>
    
    $('.plate').height(80);
    $('.plate').width(35);

    $('.colorid').width(35);

    $('.plate').css("font-size","36px");

    function makecolor(x){

        var clr = $('.colorid').eq(x).val();

            if(clr=='R'){

                $('.plate').eq(x).css("color","red");

            }else{

                $('.plate').eq(x).css("color","black");
            }
        
    }



</script>



@endsection