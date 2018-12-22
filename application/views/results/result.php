        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Result</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

			<table class="table table-striped">
                      <thead>
                        
                      </thead>
                      <tbody>
                        <tr>
                          <th width="20%"scope="row"></th>
                          <td width="20%">User :</td>
                          <td width="60%"><b><?php echo $this->a->id_column('phpuncle_user','username',$userid);?></b></td>
                        </tr>
			<tr>
                          <th scope="row"></th>
                          <td>Question Set:</td>
                          <td><b><?php echo $this->a->id_column('phpuncle_sets','nameofset',$setid);?></b></td>
                        </tr>
			<tr>
                          <th scope="row"></th>
                          <td>Time Start :</td>
                          <td><b><?php echo date('m-d-Y, h:i:s', $timestart);?></b></td>
                        </tr>
			<tr>
                          <th scope="row"></th>
                          <td>Time End :</td>
                          <td><b><?php echo date('m-d-Y, h:i:s', $timend);?></b></td>
                        </tr>
			<tr>
                          <th scope="row"></th>
                          <td>Score :</td>
                          <td><b><?php echo $totalscore.' / 30';?></b></td>
                        </tr>
			<tr>
                          <th scope="row"></th>
                          <td>Percentage :</td>
                          <td><b><?php if($totalquestions!=0) echo round($totalscore*100/30,2)." %"; else echo " - ";?></b></td>
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

