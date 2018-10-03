@extends('layout.master')

@section('content')
<div class="panel panel-default">
     <div class="panel-body">
     <div class="row">
         <div class="col-md-12">
             @include('layout.message')
             
             @if(Auth::user()->email_verify!='on')
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <p>Your account is not active.</p>
                            
                        </div>
                        <a href="{{url('/user_email_confirm')}}" class="btn btn-primary">Activate Now</a>
                    </div>
                </div>
             @else
             <p>Welcome {{Auth::user()->name}}</p>
             @endif
         </div>
     </div>

    </div>
</div>
@endsection
