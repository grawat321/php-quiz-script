        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Set</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    <form class="form-horizontal form-label-left" action="" method="post">

			<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Category <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="category" required="required" class="form-control">
                          <option value=""> Select a Category </option>
<?php foreach($this->a->view('phpuncle_category') as $row){?>
                        <option value = "<?php echo $row->id;?>" <?php if($category==$row->id) echo "selected";?>><?php echo $row->name;?></option>
<?php }?>
                          </select>
                        </div>  
                    </div> 

			<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Set Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" required="required" name="set" value="<?php echo $nameofset;?>" class="form-control">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<a href="<?php echo site_url('Home'); ?>"><button class="btn btn-default" type="button">Back</button></a>
				<button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
</div></div>
<!-- /page content -->

