<section id="content">
          <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                  <li><a href="<?=App::route("")?>"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Referral System</li>
              </ul>
              <div class="m-b-md">
                <h3 class="m-b-none">Referral System</h3>
                <small>Welcome, <?=  ucfirst($user["username"])?></small>
              </div>
               
            <section class="panel panel-default">
                <header class="panel-heading">
                  Referral Packages
                </header>
                
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                        <th width="30">S/N</th>
                        <th class="th-sortable" data-toggle="class">Refer
                        </th>
                        <th>Earnings</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        <?php $index = 1?>
                        <?php foreach ($site["referrals"] as $level):?>
                      <tr>
                        <td><?=$index?></td>
                        <td><?=$level["total"]?></td>
                        <td><?=$level["earning"]?></td>
                      
                      </tr>
                      <?php $index+=1;?>
                    <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
                
              </section>
                <h2>Your Active Contest</h2>
                <?php foreach ($user["contests"] as $contest):?>
                 <section class="panel panel-default">
                <header class="panel-heading">
                 <?=$contest["name"]?>
                </header>
                
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                        <th width="30">S/N</th>
                        <th class="th-sortable" data-toggle="class">Name
                        </th>
                        <th>Phone</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $index = 1?>
                        <?php foreach ($contest["users"] as $refer):?>
                      <tr>
                        <td><?=$index?></td>
                        <td><?=$refer["fullname"]?></td>
                        <td><?=$refer["phone"]?></td>
                        <td><?php if($refer["level"] > 0):?>Confirmed<?php else:?>Not Activated<?php endif;?></td>
                      </tr>
                      <?php $index+=1;?>
                    <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
                
              </section>
                <?php endforeach;?>
                
                <div class="m-b-md">
                <h3 class="m-b-none">Enter Referring Contest</h3>
                
              </div>
              <div class="row">
                  <?=$form["message"]?>
                <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Select Type</header>
                    <div class="panel-body">
                        <form role="form" method="post" action="" >
                        <div class="form-group">
                          <label>Package Type</label>
                          <select name="type" class="form-control">
                              <?php foreach ($site["referrals"] as $package):?>
                              <option value="<?=$package["id"]?>"> Refer <?=$package["total"]?> People and Earn <?=$package["earning"]?></option>
                              <?php endforeach;?>
                          </select>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success">Contest</button>
                      </form>
                         <h2>Referral Url: <?=$user["referral_url"]?></h2>
                    </div>
                  </section>
                </div>
                 
              </div>
            </section>
              
          </section>
         
        </section>
