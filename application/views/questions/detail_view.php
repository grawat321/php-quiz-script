        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Question</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

			<table class="table table-striped">
                      <thead>
                        
                      </thead>
                      <tbody>
                        <tr>
                          <th width="20%"scope="row"></th>
                          <td width="20%">Question Set :</td>
                          <td width="60%"><b><?php echo $this->a->id_column('phpuncle_sets','nameofset',$set_id);?></b></td>
                        </tr>
			<tr>
                          <th scope="row"></th>
                          <td>Question :</td>
                          <td><b><?php echo $question;?></b></td>
                        </tr>
			<tr>
                          <th scope="row"></th>
                          <td>Option 1 :</td>
                          <td><b><?php echo $option1;?></b></td>
                        </tr>
			<tr>
                          <th scope="row"></th>
                          <td>Option 2 :</td>
                          <td><b><?php echo $option2;?></b></td>
                        </tr>
			<tr>
                          <th scope="row"></th>
                          <td>Option 3 :</td>
                          <td><b><?php echo $option3;?></b></td>
                        </tr>
			<tr>
                          <th scope="row"></th>
                          <td>Option 4 :</td>
                          <td><b><?php echo $option4;?></b></td>
                        </tr>
                        <tr>
                          <th scope="row"></th>
                          <td>Correct Option :</td>
                          <td><b><?php echo $correct;?></b></td>
                        </tr>
			<tr>
                          <th scope="row"></th>
                          <td>Create Date :</td>
                          <td><b><?php echo $Createddate;?></b></td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
	</div>
</div>

<!-- /page content -->

