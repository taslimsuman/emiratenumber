@extends('layout.master')

@section('content')
<div class="panel panel-default">
     <div class="panel-body">
        @include('layout.error_msg')
        @include('layout.message')
        
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    <p>Please enter the code which already sent to your email address</p>
                </div>
            </div>
        </div>
        <form action="{{url('/user_activate')}}" method="post" data-parsley-validate enctype="multipart/form-data">
            {{csrf_field()}}
          
            <div class="row">              
                <div class="form-group col-md-4">
                    <label>Code</label>
                    <input type="text" name="email_token" class="form-control"  required minlength="5">
                    
                </div>

            </div>
           
            <div class="row">
                  <div class="form-group col-md-6">
                    <label></label>
                    <input type="submit" value="Submit" class="btn btn-success">
                </div>

                
            </div>

        </form>

    </div>
</div>
<!-- endpanel -->
@endsection