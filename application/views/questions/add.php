        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Task</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    <form class="form-horizontal form-label-left" action="" method="post">

			<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Question Set <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="set" required="required" class="form-control">
                          <option value=""> Select a Set </option>
<?php foreach($this->a->view('phpuncle_sets') as $row){?>
                        <option value = "<?php echo $row->id;?>"><?php echo $row->nameofset;?></option>
<?php }?>
                          </select>
                        </div>  
                    </div> 
                      
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Question</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" name="question" rows="4"></textarea>
                        </div>
                    </div>

			<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Option1 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" required="required" name="option1" class="form-control">
                        </div>
                      </div>

			<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Option2 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" required="required" name="option2" class="form-control">
                        </div>
                      </div>

			<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Option3 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" required="required" name="option3" class="form-control">
                        </div>
                      </div>

			<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Option4 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" required="required" name="option4" class="form-control">
                        </div>
                      </div>

			<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Correct Answer <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="correct" required="required" class="form-control">
                          <option value=""> Select Correct Answer </option>
                       	  <option value="1">Option1</option>
                       	  <option value="2">Option2</option>
                       	  <option value="3">Option3</option>
                       	  <option value="4">Option4</option>
                          </select>
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


