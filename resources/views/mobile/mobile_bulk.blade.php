@extends('layout.master')

@section('content')
<div class="panel panel-default">
     <div class="panel-body">
        @include('layout.error_msg')
            
        <form action="{{url('/mobile_bulk')}}" method="post" data-parsley-validate enctype="multipart/form-data">
            

            {{csrf_field()}}

            <div class="row">
                <h2 class="text-center">{{__('batch-up')}}</h2><hr>
                
                <div class="col-md-4">
                    <label>{{__('contact')}}</label>
                    <input type="text" class="form-control" name="mobile" value="{{Auth::user()->contact}}" readonly>
                    <p class="mobilenote">You can update mobile number from settings</p>
                </div>
                <div class="col-md-6">
                    <label>{{__('more-details')}}</label>

                    <input type="text" name="more_details" class="form-control">
                </div>
            </div>
                       

            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{__('provider')}}</th>
                            <th>{{__('code')}}</th>
                            <th>{{__('number')}}</th>
                            <th>{{__('price')}}</th>
                            <th>{{__('sold')}}</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                         @for($i=0;$i<10;$i++)
                        <tr>
                            <td>
                                  <select class="form-control carrier" name="carrier[]">
                                    <option value="">Select</option>
                                    <option value="etisalat">Etisalat</option>
                                    <option value="du">Du</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control code" name="code[]">
                                    <option value="">Select</option>
                                    <option value="050">050</option>
                                    <option value="056">056</option>
                                    <option value="055">055</option>
                                    <option value="052">052</option>
                                    <option value="054">054</option>
                                    <option value="058">058</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="number[]" class="form-control number">
                            </td>
                            <td>
                                 <input type="text" name="price[]" class="form-control" placeholder="Optional">
                            </td>
                            <td>
                                <select class="form-control" name="sold[]">
                                    <option value="no" selected>No</option>
                                    <option value="on">Yes</option>
                                </select>
                            </td>
                        </tr>
                         @endfor
                    </tbody>
                </table>
              
                
                </div>
             
           <div class="row">
               <div class="col-md-12">
                <label>{{__('hashtag')}}</label>
                   <input type="text" name="hashtag" id="hashtag" class="form-control" autocomplete="off">

               </div>
           </div>
             @include('layout.mobile_tag')
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
    
    $('.carrier').eq(0).attr('required','true');
    $('.code').eq(0).attr('required','true');
    $('.number').eq(0).attr('required','true');

</script>

@endsection