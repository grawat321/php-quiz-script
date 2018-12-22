        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View Results</h2>
                    <div class="nav navbar-right panel_toolbox">
                      
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

<?php if($this->session->msg!=""): ?>
<script>
$(function(){
new PNotify({
               title: 'Success',
               text: "<?php echo $_SESSION['msg'];?>",
               type: "<?php echo $_SESSION['msg_type'];?>",
               styling: 'bootstrap3'
            });
});
</script>
<?php endif; ?>

                    <div class="table-responsive">
                    <table id="datatable-responsive" class="table table-striped jambo_table table-bordered bulk_action" cellspacing="0" width="100%">
                      <thead>
							<tr> 
								<th>Serial</th>
								<th>Username</th>
								<th>Email</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

		  		<?php $i=1; ?>
				<?php	foreach($this->a->view('phpuncle_user') as $row){  ?>

				<tr>
				<td width="5%"><?php echo $i++;?></td>
				<td><?php echo $row->username;?></td>
				<td><?php echo $row->emailid;?></td>

<td> 
<a href="<?php echo site_url('Results/view/'.$row->id); ?>"><button class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> view </button></a> 
<a href="<?php echo site_url('Results/send/'.$row->id); ?>"><button class="btn btn-success btn-xs"><i class="glyphicon glyphicon-send"></i> send </button></a> 
<button class="btn btn-danger btn-xs" onclick="delete_this(<?php echo $row->id;?>)"><i class="glyphicon glyphicon-remove"></i> delete </button></a> 
</td>
								</tr>
				<?php } ?>
						</tbody>
                    </table>
					
					
                  </div>
                  </div>
                </div>
              </div>
            </div>
	</div>
</div>

<script>

function delete_this(id)
{
	if (confirm("Are you sure, you want to delete this result?") == true) {
    window.location.href = "<?php echo site_url('Results/delete/'); ?>"+id;
	} 
}
</script>

<!-- /page content -->

