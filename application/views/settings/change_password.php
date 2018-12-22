        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Change Password</h2>
                    
                    <div class="clearfix"></div>
                  </div>

<?php if($this->session->msg!=""){ ?>
<div class="alert alert-<?php echo $this->session->msg_type;?>">
  <strong><?php echo $this->session->msg;?></strong>
</div>
<?php } else echo "<br>";?>

                  <div class="x_content">

                    <form data-parsley-validate class="form-horizontal form-label-left" action="" method="post">

		      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Previous Password <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="password" name="previous" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
		      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">New Password <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="password" name="new" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
		      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Confirm Password <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="password" name="confirm" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<a href="<?php echo site_url('dashboard'); ?>"><button type="button" class="btn btn-default"> Back </button></a>
				<button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
</div>
</div>
