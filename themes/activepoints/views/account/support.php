<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                  <li><a href="<?=App::route("")?>"><i class="fa fa-home"></i> Home</a></li>
                  <li><a href="#">Account upgrade</a></li>
              </ul>
                <div class="m-b-md">
                <h3 class="m-b-none">Support Ticket</h3>
              </div>
                
                
                
              
              <div class="row">
                  <?=$form["message"]?>
                <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Open Ticket</header>
                    <div class="panel-body">
                        <form role="form" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                          <label>Subject</label>
                          <input class="form-control" name="title" placeholder="" value="" type="text" required="">
                        </div>
                        <div class="form-group">
                          <label>Message</label>
                          <textarea class="form-control" name="message" required=""></textarea>
                        </div>
                        
                            <input type="hidden" name="user_id" value="<?=$user["id"]?>" />
                        <button type="submit" class="btn btn-sm btn-success">Create</button>
                      </form>
                    </div>
                  </section>
                </div>
                
              </div>
      <div class="center-big-content-block">
        <div class="table-full">
          <div class="table-responsive">
            <table class="table table-border-with-radius">
              <thead>
                <tr>
                  <th width="5%"></th>
                  <th>Subject</th>
                  <th width="13%">Status</th>
                  <th width="20%">Last update</th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach ($user["tickets"] as $ticket):?>
                                  <tr>
                    <td><?=$ticket["id"]?></td>
                    <td><a href="<?=App::route($user["username"],"ticket/".$ticket["id"])?>"><?=$ticket["title"]?></a></td>
                                        <td><?=$ticket["status"]?></td>
                    <td><?=$ticket["updated_at"]?></td>
                  </tr>
                  <?php endforeach;?>
                              </tbody>
            </table>
          </div>
        </div>
      </div>
    
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>