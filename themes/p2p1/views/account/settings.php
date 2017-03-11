<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                  <li><a href="<?=App::route("")?>"><i class="fa fa-home"></i> Home</a></li>
                  <li><a href="#">Account upgrade</a></li>
              </ul>
                <div class="m-b-md">
                <h3 class="m-b-none">Account Settings</h3>
              </div>
                
                
                
              
              <div class="row">
                  <?=$form["message"]?>
                <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Account Settings</header>
                    <div class="panel-body">
                        <form role="form" method="post" action="" enctype="multipart/form-data">
                        
                        <div class="form-group">
                          <label>Fullname</label>
                          <input class="form-control" name="fullname" placeholder="" value="<?=$user["fullname"]?>" type="text" required="">
                        </div>
                       <div class="form-group">
                          <label>Username</label>
                          <input class="form-control" placeholder="" value="<?=$user["username"]?>" type="text" readonly="">
                        </div>
                       <div class="form-group">
                          <label>Email</label>
                          <input class="form-control" placeholder="" value="<?=$user["email"]?>" type="text" readonly="">
                        </div>
                        <div class="form-group">
                          <label>Phone</label>
                          <input class="form-control" placeholder="" value="<?=$user["phone"]?>" type="text" name="phone" required="" >
                        </div>
                            <div class="form-group">
                          <label>Account Number</label>
                          <input class="form-control" placeholder="" value="<?=$user["account_number"]?>" type="text" readonly="">
                        </div>
                        <div class="form-group">
                          <label>Account Name</label>
                          <input class="form-control" placeholder="" value="<?=$user["account_name"]?>" type="text" readonly="">
                        </div>
                            <hr>
                            <h3>Change password</h3>
                         <div class="form-group">
                          <label>Old Password</label>
                          <input class="form-control" placeholder="" value="" name="old_password" type="text" >
                        </div>
                            <div class="form-group">
                          <label>New Password</label>
                          <input class="form-control" placeholder="New Password" value="" type="text" name="new_password" >
                        </div>
 
                        <button type="submit" class="btn btn-sm btn-success">Save</button>
                      </form>
                    </div>
                  </section>
                </div>
                
              </div>
      
    
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>