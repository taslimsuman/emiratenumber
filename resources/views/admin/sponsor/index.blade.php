@extends('layout.master')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Sponsor Manager</h3>
    </div>
     <div class="panel-body">
        @include('layout.error_msg')
        @include('layout.message')
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('/sponsor')}}" method="post" data-parsley-validate enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="row" style="padding: 20px">
                        <div class="form-group col-md-4">
                            <label>Ad Image 1</label>
                            <input type="file" name="img_1" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Ad Link 1</label>
                            <input type="text" name="link_1" class="form-control" value="{{$sponsor->link_1}}">
                        </div>
                         <div class="form-group col-md-4">
                           <label>Preview</label>
                           @if($sponsor->img_1!=null)
                            <img src="{{asset('public/sponsor')}}/{{$sponsor->img_1}}" class="img-responsive">
                            @endif
                        </div>

                    </div>

                    <div class="row" style="padding: 20px;background-color: #eee;">
                        <div class="form-group col-md-4">
                            <label>Ad Image 2</label>
                            <input type="file" name="img_2" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Ad Link 2</label>
                            <input type="text" name="link_2" class="form-control" value="{{$sponsor->link_2}}">
                        </div>
                         <div class="form-group col-md-4">
                           <label>Preview</label>
                           @if($sponsor->img_2!=null)
                            <img src="{{asset('public/sponsor')}}/{{$sponsor->img_2}}" class="img-responsive">
                           @endif
                        </div>

                    </div>

                    <div class="row" style="padding: 20px;">
                        <div class="form-group col-md-4">
                            <label>Ad Image 3</label>
                            <input type="file" name="img_3" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Ad Link 3</label>
                            <input type="text" name="link_3" class="form-control" value="{{$sponsor->link_1}}">
                        </div>
                         <div class="form-group col-md-4">
                           <label>Preview</label>
                           @if($sponsor->img_3!=null)
                            <img src="{{asset('public/sponsor')}}/{{$sponsor->img_3}}" class="img-responsive">
                           @endif
                        </div>

                    </div>
               
                   
                    <div class="row">
                          <div class="form-group col-md-6">
                            <label></label>
                            <input type="submit" value="Save" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>    
    </div>
</div>




<!-- endpanel -->
@endsection

@section('script')

<script src="{{asset('site-asset/js/tag.js')}}"></script>

@endsection