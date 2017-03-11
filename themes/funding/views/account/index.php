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
                <?=App::message("success", "<h3>Dont Earn Alone, Inform Your Close Nigerian Friends Too About This Platform</h3>");?>
               <?php if(count($user["confirmations"]) > 0):?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="fa fa-ban-circle"></i> Respond to all confirmation please
                  </div>
                
                <?php endif;?>
                  <div class="row">
                      <?php if($user["pay"]):?>
                      <?php if($user["been_paired"]):?>
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
                            <a href="<?=App::route($user["username"], "upgrade")?>" class="btn btn-success">UPGRADE</a>
                        </div>
                       
                      </div>
                    </div>
                  </section>
                </div>
                      <?php else:?>  
                      <?php if($user["awaiting_confirmation"]):?>
                      <div class="col-md-9">
                      <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <h3><i class="fa fa-thumbs-up"></i><strong>Well done!</strong> Please Wait for your payment to be confirmed </h3>
                  </div>
                          </div>
                      <?php else:?>
                      <div class="col-md-9">
                      <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <h3><i class="fa fa-thumbs-up"></i><strong>Well done!</strong> Please Wait to be paired </h3>
                  </div>
                          </div>
                      <?php endif;?>
                    <?php endif;?>
                      
                      <?php else:?>
                      <?php if($user["been_matched"]):?>
                        <div class="col-md-3">
                  <section class="panel panel-success">
                    <header class="panel-heading font-bold">Status</header>
                    
                    <div class="panel-body">
                      <div>
                        <span class="text-muted">Earning Expecting:</span>
                        <span class="h3 block">₦<?=$user["amount_expecting"]?></span>
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
                        
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $index = 1?>
                        <?php foreach ($user["users_paired"] as $pair):?>
                      <tr>
                        <td><?=$index?></td>
                        <td><?=$pair["fullname"]?></td>
                        <td><?=$pair["phone"]?></td>
                        
                        <td><?=$pair["amount"]?></td>
                        <td>
                          <?=$pair["paid"]?>
                        </td>
                        <td>
                            <?php if($pair["paid"] == "Requesting Confirmation"):?>
                            <a class="btn btn-success" href="<?=App::route("transaction", "activate_pay/".$pair["id"])?>">Activate</a>
                            <a class="btn btn-danger" href="<?=App::route("transaction", "deactivate_pay/".$pair["id"])?>">Deactivate</a>
                            <?php endif;?>
                        </td>
                      </tr>
                      <?php $index +=1;?>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
                
              </div>
                      </div>
                      <?php else:?>
                      <div class="col-md-9">
                      <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <h3><i class="fa fa-thumbs-up"></i><strong>Well done!</strong> People will soon be Match to Pay you </h3>
                  </div>
                          </div>
                      <?php endif;?>
                  <?php endif;?>
                      
                       
                  </div>
                <div  class="row">
                     <div class="col-md-4">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Total Earnings</header>
                    
                    <div class="panel-body">
                      <div>
                        <span class="text-muted">Total:</span>
                        <span class="h3 block">₦<?=$user["earning"]["money"]?>.00</span>
                      </div>
                      <div class="line pull-in"></div>
                      <div class="row m-t-sm">
                        
                        <div class="col-xs-4">
                          <small class="text-muted block">Level</small>
                          <?php if($user["pay"]):?>
                          <span><?=$user["current_level"]?></span>
                          <?php else:?>
                          
                          <span><?=$user["current_level"]+1?></span>
                          <?php endif;?>
                        </div>
                        <div class="col-xs-4">
                          <small class="text-muted block">Referral</small>
                          <span>₦0.00</span>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
                      <?php if($user["pay"]):?>
                     <div class="col-md-4">
                  <section class="panel b-light">
                    <header class="panel-heading bg-primary dker no-border"><strong>Calendar</strong></header>
                    <div id="calendar" class="bg-primary m-l-n-xxs m-r-n-xxs"></div>
                    
                  </section>                  
                </div>
                    <?php else:?>
                    <?php if(count($user["confirmations"]) > 0):?>
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
                    <?php endif;?>
                  <?php endif;?>
                </div>
            <section class="panel panel-default">
                <header class="panel-heading">
                  Levels
                </header>
                
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                        <th width="30">S/N</th>
                        <th class="th-sortable" data-toggle="class">Total Earnings
                        </th>
                        <th>Upgrade Amount</th>
                        <th width="30"></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $index = 1?>
                        <?php foreach ($site["site_levels"] as $level):?>
                      <tr>
                        <td><?=$index?></td>
                        <td><?=$level["earning"]?></td>
                        <td><?=$level["upgrade"]?></td>
                       
                        <td>
                            <?php if($user["level"] >= $level["id"]):?>
                          <a href="#" class="active" data-toggle="class"><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
                          <?php endif;?>
                          
                        </td>
                      </tr>
                      <?php $index+=1;?>
                    <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
                
              </section>
                
                <section class="panel panel-default">
                    <div class="col-md-2">
                        <script type="text/javascript">
  ( function() {
    if (window.CHITIKA === undefined) { window.CHITIKA = { 'units' : [] }; };
    var unit = {"calltype":"async[2]","publisher":"etajuder","width":320,"height":50,"sid":"Chitika Default"};
    var placement_id = window.CHITIKA.units.length;
    window.CHITIKA.units.push(unit);
    document.write('<div id="chitikaAdBlock-' + placement_id + '"></div>');
}());
</script>
<script type="text/javascript" src="//cdn.chitika.net/getads.js" async></script>
                    </div>
                    <div class="col-md-2">
                        <script type="text/javascript">
  ( function() {
    if (window.CHITIKA === undefined) { window.CHITIKA = { 'units' : [] }; };
    var unit = {"calltype":"async[2]","publisher":"etajuder","width":320,"height":50,"sid":"Chitika Default"};
    var placement_id = window.CHITIKA.units.length;
    window.CHITIKA.units.push(unit);
    document.write('<div id="chitikaAdBlock-' + placement_id + '"></div>');
}());
</script>
<script type="text/javascript" src="//cdn.chitika.net/getads.js" async></script>
                    </div>
                    <div class="col-md-2">
                        <script type="text/javascript">
  ( function() {
    if (window.CHITIKA === undefined) { window.CHITIKA = { 'units' : [] }; };
    var unit = {"calltype":"async[2]","publisher":"etajuder","width":320,"height":50,"sid":"Chitika Default"};
    var placement_id = window.CHITIKA.units.length;
    window.CHITIKA.units.push(unit);
    document.write('<div id="chitikaAdBlock-' + placement_id + '"></div>');
}());
</script>

<script type="text/javascript" src="//cdn.chitika.net/getads.js" async></script>
                    </div>
                    <div class="col-md-2">
                        <script type="text/javascript">
  ( function() {
    if (window.CHITIKA === undefined) { window.CHITIKA = { 'units' : [] }; };
    var unit = {"calltype":"async[2]","publisher":"etajuder","width":320,"height":50,"sid":"Chitika Default"};
    var placement_id = window.CHITIKA.units.length;
    window.CHITIKA.units.push(unit);
    document.write('<div id="chitikaAdBlock-' + placement_id + '"></div>');
}());
</script>
<script type="text/javascript" src="//cdn.chitika.net/getads.js" async></script>
                    </div>
                    <div class="col-md-4">
                        <script type="text/javascript">
  ( function() {
    if (window.CHITIKA === undefined) { window.CHITIKA = { 'units' : [] }; };
    var unit = {"calltype":"async[2]","publisher":"etajuder","width":320,"height":50,"sid":"Chitika Default"};
    var placement_id = window.CHITIKA.units.length;
    window.CHITIKA.units.push(unit);
    document.write('<div id="chitikaAdBlock-' + placement_id + '"></div>');
}());
</script>
<script type="text/javascript" src="//cdn.chitika.net/getads.js" async></script>
                    </div>
                </section>
            </section>
              
          </section>
         
        </section>
