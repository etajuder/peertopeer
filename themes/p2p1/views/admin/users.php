<div class="row">
<div class="col-lg-8">
<div class="main-box no-header clearfix">
<div class="main-box-body clearfix">
<div class="table-responsive">
<table class="table user-list table-hover">
<thead>
<tr>
<th><span>Fullname</span></th>
<th><span>Status</span></th>
<th><span>Email</span></th>
<th>&nbsp;</th>
</tr>
</thead>
<tbody>
    <?php $index = 1 ?>
    <?php foreach ($site["users"] as $us):?>
    <?php if($index != 1):?>
<tr>
<td>
<a  class="user-link"><?=$us["fullname"]?></a>
</td>
<td>
<?=$us["status"]==1?"Active":"Blocked"?>
</td>

<td>
<a href="#"><?=$us["email"]?><script cf-hash="f9e31" type="text/javascript">
/* <![CDATA[ */!function(){try{var t="currentScript"in document?document.currentScript:function(){for(var t=document.getElementsByTagName("script"),e=t.length;e--;)if(t[e].getAttribute("cf-hash"))return t[e]}();if(t&&t.previousSibling){var e,r,n,i,c=t.previousSibling,a=c.getAttribute("data-cfemail");if(a){for(e="",r=parseInt(a.substr(0,2),16),n=2;a.length-n;n+=2)i=parseInt(a.substr(n,2),16)^r,e+=String.fromCharCode(i);e=document.createTextNode(e),c.parentNode.replaceChild(e,c)}}}catch(u){}}();/* ]]> */</script></a>
</td>
<td style="width: 20%;">
    <a href="<?=App::route("requests", "delete_user?action=".$us["id"])?>" class="table-link danger">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
</span>
</a>
</td>
</tr>
  <?php endif;?>
<?php $index +=1?>
   <?php endforeach;?>
</tbody>
</table>
</div>
</div>
</div>
</div>
    <div class="col-md-4">
        <div class="main-box no-header clearfix">
            
            <div class="main-box-body">
                <h1>Add Admin</h1>
                <form action="<?=App::route("requests/add_admin_user")?>" id="login-validation" class="col-md-12 col-sm-5 col-xs-11 col-lg-12 center-margin" method="post">
            
            <div id="login-form" class="content-box bg-default">
                <div class="content-box-wrapper pad20A">
                    
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-edit"></i>
                            </span>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Fullname" value="<?=@$form["fullname"]?>" type="text" name="fullname" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-edit"></i>
                            </span>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?=@$form["email"]?>" type="email" name="email" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-edit"></i>
                            </span>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Username" value="<?=@$form["username"]?>" type="text" name="username" required="">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-edit"></i>
                            </span>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Password" type="password" name="password" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-edit"></i>
                            </span>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Bank" value="<?=@$form["bank"]?>" type="text" name="bank" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-edit"></i>
                            </span>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Account Name" value="<?=@$form["account_name"]?>" type="text" name="account_name" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-edit"></i>
                            </span>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Account Number" type="text" value="<?=@$form["account_number"]?>" name="account_number" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-edit"></i>
                            </span>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Phone Number" type="text" value="<?=@$form["phone"]?>" name="phone" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="register" value="register" class="btn btn-block btn-primary">Register</button>
                    </div>
                    
                </div>
            </div>

            <div id="login-forgot" class="content-box bg-default hide">
                <div class="content-box-wrapper pad20A">

                    <div class="form-group">
                        <label for="exampleInputEmail2">Email address:</label>
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-envelope-o"></i>
                            </span>
                            <input class="form-control" id="exampleInputEmail2" placeholder="Enter email" name="forget_password" type="email">
                        </div>
                    </div>
                </div>
                <div class="button-pane text-center">
                    <button type="submit" value="forget" name="forget" class="btn btn-md btn-primary">Recover Password</button>
                    <a href="#" class="btn btn-md btn-link switch-button" switch-target="#login-form" switch-parent="#login-forgot" title="Cancel">Cancel</a>
                </div>
            </div>
           
        </form> 
            </div>
        </div>
      
    </div>
</div>