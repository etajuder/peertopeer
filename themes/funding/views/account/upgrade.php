<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                  <li><a href="<?=App::route("")?>"><i class="fa fa-home"></i> Home</a></li>
                  <li><a href="#">Account upgrade</a></li>
              </ul>
                <div class="m-b-md">
                <h3 class="m-b-none">Pay To</h3>
              </div>
                
                <section class="panel panel-default">
                        <header class="panel-heading bg-danger lt no-border">
                          <div class="clearfix">
                            
                            <div class="clear">
                              <div class="h3 m-t-xs m-b-xs text-white">
                                <?=$user["user_matched"]["fullname"]?>
                                <i class="fa fa-circle text-white pull-right text-xs m-t-sm"></i>
                              </div>
                              <small class="text-muted"><?=$user["user_matched"]["username"]?></small>
                            </div>                
                          </div>
                        </header>
                        <div class="list-group no-radius alt">
                          <a class="list-group-item" href="#">
                              <span class="badge " style="background: #fff; color:#000; "><?=$user["user_matched"]["account_number"]?></span>
                            <i class="fa fa-user"></i> 
                            Account Number
                          </a>
                            <a class="list-group-item" href="#">
                              <span class="badge " style="background: #fff; color:#000; "><?=$user["user_matched"]["account_name"]?></span>
                            <i class="fa fa-user"></i> 
                            Account Name
                          </a>
                          <a class="list-group-item" href="#">
                              <span class="badge " style="background: #fff; color:#000; "><?=$user["user_matched"]["bank"]?></span>
                            <i class="fa fa-archive"></i> 
                            Bank
                          </a>
                          <a class="list-group-item" href="#">
                              <span class="badge " style="background: #fff; color:#000; "><?=$user["user_matched"]["phone"]?></span>
                            <i class="fa fa-phone"></i> 
                            Phone
                          </a>
                            
                          
                          
                          
                        </div>
                      </section>
                
              <div class="m-b-md">
                <h3 class="m-b-none">Confirm</h3>
                <?=App::message("error", "<h2>Please make sure you have paid first before confirming to prevent you from getting kicked out or banned from this money making site</h2>")?>
              </div>
              <div class="row">
                  <?=$form["message"]?>
                <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Payment Details</header>
                    <div class="panel-body">
                        <form role="form" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                          <label>Name</label>
                          <input class="form-control" name="name" placeholder="Your Name" value="<?=$user["fullname"]?>" type="text" required="">
                        </div>
                        <div class="form-group">
                          <label>Details</label>
                          <textarea class="form-control" name="details" required=""></textarea>
                        </div>
                        <div class="form-group">
                            <label>Snapshot</label>
                            <input type="file" name="file" >
                          
                        </div>
                            <input type="hidden" name="transaction_id" value="<?=$user["transaction_id"]?>" />
                        <button type="submit" class="btn btn-sm btn-success">Confirm</button>
                      </form>
                    </div>
                  </section>
                </div>
                
              </div>
            
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>