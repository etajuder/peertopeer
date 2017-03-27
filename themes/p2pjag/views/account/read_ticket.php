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
                    <header class="panel-heading font-bold"><?=$ticket["title"]?></header>
                    <div class="panel-body">
                        <?=$ticket["message"]?>
                    </div>
                  </section>
                </div>
                <div class="messages_list" style="height: 345px; overflow: scroll;">
             <?php foreach($ticket["messages"] as $message):?>
              <div class="row m-b-15 update_message" id="messages" data-id="<?=$message["id"]?>" >
                    <div class="col-md-1"></div>
                    <div class="col-md-11 two">
                      <div class="message"><?=$message["message"]?> </div>
                      <?php if($message["is_me"]):?>
                      <div class="info text-right">
                        <span class="author"><?=$message["author"]?></span>
                        <span class="time"><?=$message["created_at"]?></span>
                      </div>
                      <?php else:?>
                      <div class="info text-left">
                        <span class="author"><?=$message["author"]?></span>
                        <span class="time"><?=$message["created_at"]?></span>
                      </div>
                      <?php endif;?>
                    </div>
                
                    <div class="col-md-1"></div>
                  </div> 
                      <?php endforeach ?>
              </div>
                  <div class="col-md-12">
                     <form method="post" action="<?=App::route("request/send_message")?>" class="send_message">
                <div class="form-group panel-border-top">
                  <label for="message" class="control-label">Message</label>
                  <textarea id="message" name="message" rows="5" required="" class="form-control"></textarea>
                  <input type="hidden" name="ticket_id" value="<?=$ticket["id"]?>" />
                  
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
            </div>
              </div>
      
    
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>