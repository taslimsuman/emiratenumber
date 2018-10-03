<!DOCTYPE html>
<html lang="{{Config::get('app.locale')}}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Emerates Number</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('site-asset/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('site-asset/img/icon.png')}}" />
    <!-- Custom CSS -->
    <link href="{{asset('site-asset/css/2-col-portfolio.css')}}" rel="stylesheet">
    <link href="{{asset('site-asset/css/parsley.css')}}" rel="stylesheet">

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    
    

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <link href="{{asset('site-asset/css/emiratesnumber.css')}}" rel="stylesheet">
    

</head>

<body>


<div class="container">
 <div class="row">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" >
        <div class="container" style="padding-bottom:  20px">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('site-asset/img/logo.png')}}" class="img-responsive" width="250px">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding-top:10px">
                <ul class="nav navbar-nav navbar-right">
                    @if(!Auth::user())
                    <li>
                        <a href="{{url('/login')}}">{{__('login')}}</a>
                    </li>
                   
                    <li>
                        <a href="{{url('/register')}}">{{__('register')}}</a>
                    </li>
                    @endif

                    @if(Auth::user())
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{__('welcome')}} {{ Auth::user()->name}} <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="{{url('/myprofile')}}">{{__('profile')}}</a></li>
                            <li><a href="{{url('/change_password')}}">{{__('changepass')}}</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="btn btn-default">{{__('logout')}}</a></li>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                          </ul>
                    </li>
                    @endif
                    <li>
                        <div style="padding-top: 16px;padding-right: 10px;padding-left: 10px">                       
                            <select name="lang" class="" onchange="javascript:handleSelect(this)">
                                  <option @if(session('locale')=='en') selected="{{Config::get('app.locale')}}" @endif value="{{route('lang.switch',['lang'=>'en'])}}"> English</option>

                                    <option @if(session('locale')=='ar') selected="selected" @endif value="{{route('lang.switch',['lang'=>'ar'])}}" >Arabic</option>
                            </select>
                         </div>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    </div>
</div>


<!-- Page Content -->
<div class="" id="bs-example-navbar-collapse-2" style="padding-top:10px">

    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-3" id="menu2">
                <div class="panel-group" id="accordion">
                    
                    <div class="panel panel-default">
                       
                        <div id="#" class="panel">
                            <div class="panel-body">
                                <center>
                                    <img src="{{asset('site-asset/img/em-logo.jpg')}}" id="profile_img" class="img-responsive" width="100px">
                                </center>
                                
                            </div>
                        </div>
                    </div>
                    <!-- admin menu -->
                    @if(Auth::user() && Auth::user()->role_id==1)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseAdmin"><span class="glyphicon glyphicon-folder-close">
                                </span>{{__('adminMenu')}}</a>
                            </h4>
                        </div>
                        <div id="collapseAdmin" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                  <tr>
                                        <td>
                                            <i class="fa fa-user"></i> <a href="{{url('/members')}}">{{__('members')}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-user"></i> <a href="{{url('/sponsors')}}">{{__('sponsors')}}</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                      @endif
                    <!-- end admin menu -->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                                </span>{{__('licensePlate')}}</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    @if(Auth::user())
                                 
                                    <tr>
                                        <td>
                                            <i class="fa fa-print"></i> <a href="{{url('/CreatePlate')}}">{{__('printNumber')}}</a>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <i class="fa fa-list-alt"></i> <a href="{{url('/bulkplate')}}">{{__('multiNumber')}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                           <i class="fa fa-palette"></i> <a href="{{url('/color_plate')}}">{{__('colorDigit')}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-car"></i> <a href="{{url('/car_plate')}}">{{__('plateOnCar')}}</a>
                                            
                                        </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td>
                                            <i class="fa fa-eye"></i> <a href="{{url('/plates')}}">{{__('buynumber')}}</a>
                                        </td>
                                    </tr>
                                    
                                    

                                    <tr>
                                        <td>
                                            <i class="fa fa-image"></i> <a href="{{url('/all_plate_canvas')}}">{{__('showCanvas')}}</a>
                                            
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th">
                                </span>{{__('mobnum')}}</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    @if(Auth::user())
                                    <tr>
                                        <td>
                                           <i class="fa fa-print"></i> <a href="{{url('/mobile_create')}}">{{__('sellnum')}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                           <i class="fa fa-list-alt"></i> <a href="{{url('/mobile_bulk')}}">{{__('multinum')}}</a>
                                        </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td>
                                           <i class="fa fa-eye"></i> <a href="{{url('/numbers')}}">{{__('buynum')}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-image"></i> <a href="{{url('/number_canvas')}}">{{__('showmobcan')}}</a>
                                        </td>
                                    </tr>
                                  
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">
                                </span>{{__('morelinks')}}</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                           <i class="fa fa-info"></i> <a href="{{url('/about')}}">{{__('about')}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                           <i class="fas fa-balance-scale"></i> <a href="{{url('/terms_condition')}}">{{__('termcon')}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                           <i class="fas fa-user-secret"></i> <a href="{{url('/privacy')}}">{{__('privacy')}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                           <i class="fas fa-money-bill-alt"></i> <a href="{{url('/pricing')}}">{{__('pricing')}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                           <i class="fas fa-undo"></i> <a href="{{url('/refund_policy')}}">{{__('refund')}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                           <i class="fas fa-envelope-square"></i> <a href="{{url('/contact')}}">{{__('contact')}}</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="col-sm-9 col-md-9" >
                <div class="row">
                    <div class="col-md-12">
                        @yield('banner') 
                    </div>
                    
                </div>
               
                 
                <div class="row">
                    <div class="col-md-12">
                        @yield('content') 
                    </div>
                    
                </div>
                        
            </div>
    </div>
    
</div>

</div>
<!-- /.container -->
<div class="footer">
   <p class="footertxt">&copy; All rights reservied www.emiratesnumber.ae</p>
</div>

    <!-- jQuery -->
    <script src="{{asset('site-asset/js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('site-asset/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('site-asset/js/parsley.min.js')}}"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


 @yield('script')
 <script>
$(function(){

    $('.navbar-toggle').on('click',function(){

        $('#menu2').toggle();
    })

})
 </script>

<script type="text/javascript">
function handleSelect(elm)
{
window.location = elm.value;
}
</script>

</body>

</html>
