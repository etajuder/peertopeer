<section id="content">
          <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                  <li><a href="<?=App::route("")?>"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Dashboard</li>
              </ul>
              <div class="m-b-md">
                <h3 class="m-b-none">Dashboard</h3>
                <small>Welcome, <?=  ucfirst($user["username"])?></small>
              </div>
               
                <?php if((!$user["have_phed"] && !$user["been_paired"] && !$user["awaiting_confirmation"]) && (!$user["have_ghed"] && !$user["been_matched"]) ):?>
                 <?=App::message("success", "<h3>Once Activated Please Pay within 10hr not to get deleted</h3>");?>
                <div class="row m-b-xl">
          <div class="col-sm-3 animated fadeInRightBig">
            <section class="panel b-light text-center m-t">
              <header class="panel-heading bg-white b-light">
                <h3 class="m-t-sm">Starter</h3>
                <p>Earn unbelievably 100%</p>
              </header>
              <ul class="list-group">
                <li class="list-group-item text-center bg-light lt">
                  <span class="text-danger font-bold h1">₦10,000</span>
                </li>
                <li class="list-group-item">
                  Fast Matching
                </li>
                <li class="list-group-item">
                  Removing UnSerious Member
                </li>
                <li class="list-group-item">
                  Fast Replacement
                </li>
                <li class="list-group-item">
                  7*24 free support
                </li>
                 <li class="list-group-item text-center bg-light lt">
                  <span class="text-danger font-bold h1">₦20,000</span>
                </li>
              </ul>
              <footer class="panel-footer">
                <a href="<?=App::route("request/activate_package/1")?>" class="btn btn-primary m-t m-b">Activate</a>
              </footer>
            </section>
          </div>
           <div class="col-sm-3 animated fadeInRightBig">
            <section class="panel b-light text-center m-t">
              <header class="panel-heading bg-white b-light">
                <h3 class="m-t-sm">Super</h3>
                <p>Earn unbelievably 100%</p>
              </header>
              <ul class="list-group">
                <li class="list-group-item text-center bg-light lt">
                  <span class="text-danger font-bold h1">₦20,000</span>
                </li>
                <li class="list-group-item">
                  Fast Matching
                </li>
                <li class="list-group-item">
                  Removing UnSerious Member
                </li>
                <li class="list-group-item">
                  Fast Replacement
                </li>
                <li class="list-group-item">
                  7*24 free support
                </li>
                 <li class="list-group-item text-center bg-light lt">
                  <span class="text-danger font-bold h1">₦40,000</span>
                </li>
              </ul>
              <footer class="panel-footer">
                <a href="<?=App::route("request/activate_package/2")?>" class="btn btn-primary m-t m-b">Activate</a>
              </footer>
            </section>
          </div>
           <div class="col-sm-3 animated fadeInRightBig">
            <section class="panel b-light text-center m-t">
              <header class="panel-heading bg-white b-light">
                <h3 class="m-t-sm">Master</h3>
                <p>Earn unbelievably 100%</p>
              </header>
              <ul class="list-group">
                <li class="list-group-item text-center bg-light lt">
                  <span class="text-danger font-bold h1">₦40,000</span>
                </li>
                <li class="list-group-item">
                  Fast Matching
                </li>
                <li class="list-group-item">
                  Removing UnSerious Member
                </li>
                <li class="list-group-item">
                  Fast Replacement
                </li>
                <li class="list-group-item">
                  7*24 free support
                </li>
                 <li class="list-group-item text-center bg-light lt">
                  <span class="text-danger font-bold h1">₦80,000</span>
                </li>
              </ul>
              <footer class="panel-footer">
                <a href="<?=App::route("request/activate_package/3")?>" class="btn btn-primary m-t m-b">Activate</a>
              </footer>
            </section>
          </div>
          <div class="col-sm-3 animated fadeInRightBig">
            <section class="panel b-light text-center m-t">
              <header class="panel-heading bg-white b-light">
                <h3 class="m-t-sm">Tycoon</h3>
                <p>Earn unbelievably 100%</p>
              </header>
              <ul class="list-group">
                <li class="list-group-item text-center bg-light lt">
                  <span class="text-danger font-bold h1">₦50,000</span>
                </li>
                <li class="list-group-item">
                  Fast Matching
                </li>
                <li class="list-group-item">
                  Removing UnSerious Member
                </li>
                <li class="list-group-item">
                  Fast Replacement
                </li>
                <li class="list-group-item">
                  7*24 free support
                </li>
                 <li class="list-group-item text-center bg-light lt">
                  <span class="text-danger font-bold h1">₦100,000</span>
                </li>
              </ul>
              <footer class="panel-footer">
                  <a href="<?=App::route("request/activate_package/4")?>" class="btn btn-primary m-t m-b">Activate</a>
              </footer>
            </section>
          </div>
        </div>
                
                <?php endif;?>
                <?php if($user["been_paired"] || $user["awaiting_confirmation"]):?>
                <?php if($user["awaiting_confirmation"]):?>
                  <?=App::message("success", "<h1>Waiting for your payment to be confirmed</h1>")?>
                                  
                
                          <section class="panel panel-default">
                        <header class="panel-heading bg-danger lt no-border">
                          <div class="clearfix">
                              <h2>Status</h2>             
                          </div>
                        </header>
                        <div class="list-group no-radius alt">
                          
                          <a class="list-group-item" href="#">
                              <span class="badge bg-info"><b>Confirmation</b></span>
                            <i class="fa fa-question icon-muted"></i> 
                          Expecting 
                          </a>
                          <a class="list-group-item" href="#">
                            <span class="badge bg-light"><?=$user["amount_to_pay"]?></span>
                            <i class="fa fa-money icon-muted"></i> 
                            Amount
                          </a>
                             <a class="list-group-item" href="#">
                            <span class="badge bg-light"><?=$user["amount_to_pay"]*2?></span>
                            <i class="fa fa-money icon-muted"></i> 
                            Amount In Return
                          </a>
                        </div>
                      </section>
                      <?php else:?>                 
                <section class="panel panel-default">
                        <header class="panel-heading bg-danger lt no-border">
                          <div class="clearfix">
                              <h2>Status</h2>             
                          </div>
                        </header>
                        <div class="list-group no-radius alt">
                          
                          <a class="list-group-item" href="#">
                              <span class="badge bg-info"><b>To pay</b></span>
                            <i class="fa fa-question icon-muted"></i> 
                          Expecting 
                          </a>
                          <a class="list-group-item" href="#">
                            <span class="badge bg-light"><?=$user["amount_to_pay"]?></span>
                            <i class="fa fa-money icon-muted"></i> 
                            Amount
                          </a>
                             <a class="list-group-item" href="#">
                            <span class="badge bg-light"><?=$user["amount_to_pay"]*2?></span>
                            <i class="fa fa-money icon-muted"></i> 
                            Amount In Return
                          </a>
                        </div>
                      </section>
                
                <?=App::message("success", "<h1>You Have been Paired!!! Hurry</h1>") ?>
                <div class="col-md-9">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Next Upgrade</header>
                    <div class="panel-body">
                      <div>
                        <div class="h3 block clock"></div>
                      </div>
                    </div>
                  </section>
                </div>
                <div class="col-md-3">
                  <section class="panel panel-success">
                    <header class="panel-heading font-bold">Action</header>
                    
                    <div class="panel-body">
                      <div>
                        <span class="text-muted">Amount To Pay:</span>
                        <span class="h3 block">₦<?=$user["amount_to_pay"]?></span>
                      </div>
                      <div class="line pull-in"></div>
                       <div class="row m-t-sm">
                        <div class="col-xs-4">
                            <a href="<?=App::route($user["username"], "upgrade")?>" class="btn btn-success">PH</a>
                        </div>
                       
                      </div>
                    </div>
                  </section>
                </div>
                
                <?php endif;?>
                <?php else:?>
                 <section class="panel panel-default">
                        <header class="panel-heading bg-danger lt no-border">
                          <div class="clearfix">
                              <h2>Status</h2>             
                          </div>
                        </header>
                        <div class="list-group no-radius alt">
                          
                          <a class="list-group-item" href="#">
                              <span class="badge bg-info"><b>On Hold</b></span>
                            <i class="fa fa-question icon-muted"></i> 
                          Status 
                          </a>
                          <a class="list-group-item" href="#">
                            <span class="badge bg-light"><?=$user["amount"]?></span>
                            <i class="fa fa-money icon-muted"></i> 
                            Amount
                          </a>
                        </div>
                      </section>
                
               
                <?php if($user["been_matched"]):?>
                 <div class="col-md-3">
                  <section class="panel panel-success">
                    <header class="panel-heading font-bold">Status</header>
                    
                    <div class="panel-body">
                      <div>
                        <span class="text-muted">Earning Expecting:</span>
                        <span class="h3 block">₦<?=$user["amount_to_earn"]?></span>
                      </div>
                      <div class="line pull-in"></div>
                      
                    </div>
                  </section>
                </div>
                <div class="col-md-9">
                      <div class="panel panel-default">
                <header class="panel-heading">
                  Matched To Me
                </header>
               
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                        <th width="20">S/N</th>
                        
                        <th>Name</th>
                        <th>Phone</th>
                        <th>email</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $index = 1?>
                        <?php foreach ($user["users_paired"] as $pairs):?>
                        <?php foreach ($pairs as $pair):?>
                      <tr>
                        <td><?=$index?></td>
                        <td><?=$pair["fullname"]?></td>
                        <td><?=$pair["phone"]?></td>
                        <td><?=$pair["email"]?></td>
                        <td><?=$pair["amount"]?></td>
                        <td>
                          <?=$pair["paid"]?>
                        </td>
                        <td>
                            <?php if($pair["paid"] == "Requesting Confirmation"):?>
                            <a class="btn btn-success" href="<?=App::route("transaction", "activate_pay/".$pair["id"]."?tran_id=".$pair["tran_id"])?>">Activate</a>
                            <a class="btn btn-danger" href="<?=App::route("transaction", "deactivate_pay/".$pair["id"])?>">Deactivate</a>
                            <?php endif;?>
                        </td>
                      </tr>
                      <?php endforeach;?>
                      <?php $index +=1;?>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
                
              </div>
                      </div>
                  <div class="col-md-8">
                        <section class="panel panel-default portlet-item">
                <header class="panel-heading">
                  <ul class="nav nav-pills pull-right">
                    <li>
                      <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                    </li>
                  </ul>
                    <b>Payment Confirmation requests   </b>                  
                </header>
                <section class="panel-body">
                    <?php foreach ($user["confirmations"] as $confirm):?>
                  <article class="media">
                    
                    <div class="media-body">                        
                      <a href="#" class="h4">Confirmation from <?=$confirm["name"]?></a>
                      <small class="block m-t-xs"><?=  nl2br($confirm["details"])?></small>
                      <em class="text">Picture <a href="<?=(App::route($confirm["upload"]))?>" class="text-danger">Click to view</a></em>
                    </div>
                  </article>
                  <div class="line pull-in"></div>
                  <?php endforeach;?>
                </section>
              </section>
                    </div>
                   <?php elseif($user["have_ghed"]):?>
                        <?=App::message("success", "<h1>Good Job!!! You will soon get help automatically</h1>")?>  
                  
                   <?php elseif($user["have_phed"]):?>
                    <?=App::message("success", "<h1>Good Job!! You will sooon be matched to provide help<h1/>")?>
                            <?php endif;?>
                <?php endif;?>
                
            </section>
              
          </section>
         
        </section>
