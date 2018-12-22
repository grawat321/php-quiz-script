<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Quiz</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script>
    <?php
              $start=$_SESSION['begin_time'];
              $end=date('Y-m-d H:i:s', strtotime( $_SESSION['begin_time'] . ' +30 minutes' ) );
                echo "
                    var date_quiz_start='$start';
                    var date_quiz_end='$end';
                    var time_quiz_end=new Date('$end').getTime();";
      ?>
    var f = new Date();
    var t = new Date(date_quiz_start);
    var x = setInterval(function() {

    t.setSeconds(t.getSeconds() + 1);
    // Get todays date and time
    var now = t.getTime();
    
    // Find the distance between now and the count down date
    var distance = time_quiz_end - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    document.getElementById("starttime").innerHTML = "Start Time: " + f.getHours() + ":" + f.getMinutes();

    // Output the result in an element with id="demo"
    document.getElementById("showtime").innerHTML = "Time Left: " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
	alert("Your time is finished! ");
        document.getElementById("myForm").submit();
	document.getElementById("showtime").innerHTML = "EXPIRED";
    }
}, 1000);
    </script>
<style type="text/css">
	body{
		color: #fff;
		background: #63738a;
		font-family: 'Roboto', sans-serif;
	}
    .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #5cb85c;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 700px;
		margin: 0 auto;
		padding: 30px 0;
	}
	.signup-form h2{
		color: #636363;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: 2px;
		width: 30%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #5cb85c;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	}  
	.fixed-header{
        width: 100%;
        position: fixed;        
        background: #333;
        color: #fff;
    }
    .fixed-header{
        top: 0;
    }
</style>
</head>
<body>
<div class="fixed-header">
	    <h3 id="starttime" style="width:20%;float:left;"></h3>
            <h3 id="showtime" style="width:20%;float:right;"></h3>
    </div>
<div class="signup-form">
    <form id="myForm" class="form-horizontal form-label-left" action="" method="post">
		<center><h1>Online Exam</h1></center>
<hr>
		<h5 style="color:blue;">Welcome <?php echo $this->session->username;?></h5><br>

<?php $data = $this->a->id_rand_view('phpuncle_question',$this->session->set,'set_id'); 
if(!empty($data)){ ?>

<b>Choose correct option for the following questions:</b><br><hr>

<?php $i=1; foreach($data as $row){?>
<p>

<input type="hidden" name="questions[]" value="<?php echo $row['id'];?>">

	<b>Question <?php echo $i++.": </b>".$row['question'];?><br>

	<? if($row['option1']!=''){?>
        <input type="radio" name="answers[<?php echo $row['id'];?>]" value="1">
	<?php echo $row['option1'];?><br>
	<? }?>
	
	<? if($row['option2']!=''){?>
	<input type="radio" name="answers[<?php echo $row['id'];?>]" value="2">
	<?php echo $row['option2'];?><br>
	<? }?>

	<? if($row['option3']!=''){?>
	<input type="radio" name="answers[<?php echo $row['id'];?>]" value="3">
	<?php echo $row['option3'];?><br>
	<? }?>

	<? if($row['option4']!=''){?>
	<input type="radio" name="answers[<?php echo $row['id'];?>]" value="4">
	<?php echo $row['option4'];?><br>
	<? }?>

<input type="hidden" name="correct[<?php echo $row['id'];?>]" value="<?php echo $row['correct'];?>">

</p><hr>
<?php } ?>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <center><button type="submit" class="btn btn-success">Submit</button></center>
                        </div>
                      </div>

<?php }else{ ?> 
<p><strong>Sorry No question set avilable in this category</strong></p><hr>
<p><center><a href="<?php echo site_url('Front');?>">Go back and choose another set</a></center>
<?php } ?>

    </form>

</div>
</body>
</html>                            
