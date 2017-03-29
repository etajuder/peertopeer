<div class="row">
    <div class="col-lg-6">
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<h2 class="pull-left">Referral Package</h2>

</header>
<div class="main-box-body clearfix">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th><a href="#"><span>S/N</span></a></th>
<th><a href="#"><span>Refer</span></a></th>
<th><a href="#"><span>Earning</span></a></th>
<th>&nbsp;</th>
</tr>
</thead>
<tbody>
    <?php $index = 1; ?>
    <?php foreach ($site["referrals"] as $cate):?>
     <tr>
  <td>
<?=$index?>
</td>
<td>
<?=$cate["total"]?>
</td>
<td>
<?=$cate["earning"]?>
</td>
<td style="width: 15%;">
    <a href="<?=App::route("requests/deletereferral?action=".$cate["id"])?>" class="table-link">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
</span>
</a>
</td>
</tr>        
        <?php $index +=1;?>
    <?php endforeach; ?>


</tbody>
</table>
</div>

</div>
</div>
</div>
    
    
    <div class="col-lg-6">
<div class="main-box">
<header class="main-box-header clearfix">
<h2>New PAckage</h2>
</header>
<div class="main-box-body clearfix">
    <form class="" role="form" action="<?=App::route("requests/add_referral")?>" method="post">
<div class="form-group">
<label for="exampleInputEmail2">Amount to invite</label>
<input class="form-control" id="exampleInputEmail2" placeholder="Amount to invite" required="" type="text" name="invites">
</div>
 <div class="form-group">
<label class="sr-only" for="exampleInputEmail2">Earning</label>
<input class="form-control" id="exampleInputEmail2" placeholder="What to expect" required="" type="text" name="earning">
</div>
<button type="submit" class="btn btn-success">Add Level</button>
</form>
</div>
</div>
</div>
     
</div>