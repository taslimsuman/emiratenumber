<div style="margin-top: 30px">

    <form action="{{url('/myprofile_update')}}" method="post" data-parsley-validate enctype="multipart/form-data">
        

        {{csrf_field()}}

        <div class="row">
            <div class="form-group col-md-4 col-md-offset-4">
                <div id="photo">
                    <img src="{{asset('public/profile')}}/{{Auth::user()->photo?Auth::user()->photo:'profile.png'}}" class="img-responsive img-circle">
                </div>
                <div id="photo_upload" style="display: none;">
                    <center>
                        <input type="file" name="photo">
                    </center>
                    
                </div>
                    
            <center>
                <button type="button" class="btn btn-default" id="change_photo">Change photo</button>
            </center>
                    
            </div>
        </div>

        
        <div class="row">
            <div class="form-group col-md-4">
                <label>Your Name</label>
                <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label>Profile ID</label>
                <input type="text" name="profile" class="form-control" value="{{Auth::user()->profile}}">
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}">

            </div>
            
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                 <label>Contact</label>
                <input type="text" name="contact" class="form-control" value="{{Auth::user()->contact}}">
            </div>
            
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label>Personal Hashtag</label>
                <input type="text" name="hashtag" class="form-control" value="{{Auth::user()->hashtag}}">
            </div>
            
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label>More Details</label>
                <input type="text" name="more_details" class="form-control" value="{{Auth::user()->more_details}}">
            </div>
            
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fab fa-instagram"></i></span>
                    <input id="instagram" type="text" class="form-control" name="instagram" value="{{Auth::user()->instagram}}">
                </div>
            </div>
            
        </div>
         <div class="row">
            <div class="form-group col-md-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fab fa-twitter"></i></span>
                    <input id="twitter" type="text" class="form-control" name="twitter" value="{{Auth::user()->twitter}}">
                </div>
            </div>
            
        </div>
         <div class="row">
            <div class="form-group col-md-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fab fa-facebook"></i></span>
                    <input id="facebook" type="text" class="form-control" name="facebook" value="{{Auth::user()->facebook}}">
                </div>
            </div>
            
        </div>
       
        <div class="row">
              <div class="form-group col-md-6">
                <label></label>
                <input type="submit" value="Update" class="btn btn-success">
            </div>

            
        </div>

    </form>
    
</div>


