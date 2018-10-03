@extends('layout.master')

@section('content')
<div class="panel panel-default">
    
     <div class="panel-body">
        @include('layout.error_msg')
            
        <form action="{{url('/bulkplate')}}" method="post" data-parsley-validate enctype="multipart/form-data">
            
            
            {{csrf_field()}}

            <div class="row">
                <h2 class="text-center">{{__('batch-up')}}</h2><hr>
                
                <div class="col-md-6">
                    <label>{{__('contact')}}</label>
                    <input type="text" class="form-control" name="mobile" value="{{Auth::user()->contact}}" readonly>
                    <p class="mobilenote">You can update mobile number from profile</p>
                </div>
                <div class="col-md-6">
                    <label>{{__('more-details')}}</label>
                    <input type="text" name="more_details" class="form-control" value="{{Auth::user()->more_details}}">
                </div>
            </div>
            <br>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{__('city')}}</th>
                            <th>{{__('plate')}}</th>
                            <th>{{__('code')}}</th>
                            <th>{{__('price')}}</th>
                            <th>{{__('sold')}}</th>
                            <th>{{__('new-old')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i=0;$i<10;$i++)
                        <tr>
                            <td>
                                 <select class="form-control city" name="city[]">
                                    <option value="">Select</option>
                                    <option value="Abu Dhabi">Abu Dhabi</option>
                                   
                                    <option value="Dubai">Dubai</option>
                                   
                                    <option value="Sharjah">Sharjah</option>
                                    <option value="Ajman">Ajman</option>
                                    <option value="Fujairah">Fujairah</option>
                                    <option value="Ras-Al-Khaimah">Ras-Al-Khaimah</option>
                                    <option value="Umm Al Quwain">Umm Al Quwain</option>
                                    
                                </select>
                            </td>
                            <td>
                                <input type="text" name="plate[]"  class="form-control plate">
                            </td>
                            <td>
                                <select class="form-control code" name="code[]">
                                    <option value="">Select</option>
                                    <option value="?">?</option>
                                   @php
                                        foreach(range('A','Z') as $char){
                                            
                                    
                                            echo "<option value='$char'>$char</option>";

                                            }

                                        for($x = 1; $x < 26; $x++){
                                                echo "<option value='$x'>$x</option>";
                                            }
                                    @endphp
                                    <option value="50">50</option>
                                    
                                </select>
                            </td>
                            <td>
                                <input type="text" name="price[]" class="form-control">
                            </td>
                            <td>
                                <select class="form-control" name="sold[]">
                                    <option value="no" selected>No</option>
                                    <option value="on">Yes</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="isold[]">
                                    <option value="no" selected>New</option>
                                    <option value="on">Old</option>
                                </select>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                    
                </table>
            </div>
            <div class="row">
                <div class="col-md-12" id="tags">
                     <label>{{__('hashtag')}}</label>
                    <input type="text" name="hashtag" id="hashtag" class="form-control" autocomplete="off" value="{{Auth::user()->hashtag}}">
                </div>
            </div>
            @include('layout.tag')
            <div class="row">
                  <div class="form-group col-md-6">
                    <br>
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
    
    $('.city').eq(0).attr('required','true');
    $('.plate').eq(0).attr('required','true');
    $('.code').eq(0).attr('required','true');

</script>

@endsection