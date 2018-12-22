        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Select Question Set</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

<?php $data = $this->a->id_view('phpuncle_quest_answers',$id,'userid'); if(empty($data)){?>
<b>No Question Set for this user.</b>
<br><br>
<?php } ?>

<?php foreach($data as $row){?>
		<a href="<?php echo site_url('Results/show/'.$row['id']); ?>"><button class="btn btn-primary" type="button"><?php echo $this->a->id_column('phpuncle_sets','nameofset',$row['setid']);?></button></a><br>
<?php }?>

                 
                  </div>
                </div>
              </div>
            </div>
</div></div>
<!-- /page content -->


