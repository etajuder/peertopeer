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
               
                <?php if(!$user["have_phed"] && !$user["have_ghed"]):?>
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
                <?php if($user["have_phed"]):?>
                <section class="panel panel-default">
                        <header class="panel-heading bg-danger lt no-border">
                          <div class="clearfix">
                              <h2>Status</h2>             
                          </div>
                        </header>
                        <div class="list-group no-radius alt">
                          <a class="list-group-item" href="#">
                            <span class="badge bg-success">Tycoon</span>
                            <i class="fa fa-briefcase icon-muted"></i> 
                           Package
                          </a>
                          <a class="list-group-item" href="#">
                            <span class="badge bg-info">To pay</span>
                            <i class="fa fa-question icon-muted"></i> 
                          Expecting 
                          </a>
                          <a class="list-group-item" href="#">
                            <span class="badge bg-light">100000</span>
                            <i class="fa fa-money icon-muted"></i> 
                            Amount
                          </a>
                        </div>
                      </section>
                
                <?php endif;?>
                
            </section>
              
          </section>
         
        </section>
