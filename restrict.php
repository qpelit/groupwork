<?php

	//we need functions for dealing with session
	require_once("functions.php");
	require_once("header.php"); 
 global $topic_cat;
	
	//RESTRICTION - LOGGED IN
	if(!isset($_SESSION["user_id"])){
		//redirect not logged in user to login page
		header("Location: login.php");
	}
	
	
	//?logout is in the URL
	if(isset($_GET["logout"])){
		//delete the session
		session_destroy();
		
		header("Location: login.php");
	}
	
	//someone clicked the button "add"
	if(isset($_GET["add_new_interest"])){
		
		if(!empty($_GET["new_interest"])){
			
			saveInterest($_GET["new_interest"]);
			
		}else{
			echo "you left the interest field empty";
		}
		
	}
	
	//someone clicked the button "select"
	if(isset($_GET["select_interest"])){
		
		if(!empty($_GET["user_interest"])){
			
			saveUserInterest($_GET["user_interest"]);
			
		}else{
			echo "error";
		}
		
	}

   
	if(isset($_GET["php"])){
 
       $topic_cat=1;
        
	}
    else if (isset($_GET["ios"])){

        $topic_cat=2;

         
	}
     else if (isset($_GET["android"])){
   
        $topic_cat=3;
	}
      else if (isset($_GET["game"])){

       
        $topic_cat=4;
	}
   
    
        if(isset($_GET["topicid"])){

      
        $_SESSION["topic_id"] = $_GET["topicid"];
	
			
			header("Location: restrictTopic.php");
        
    }
    


    
if(isset($_GET["topic_submit"])  ){
		
		//login
	

		
		//the username and password are not empty
		if(!empty($_GET["topic_subject"]) && !empty($_GET["topic_content"])  ){
			
			//save to db
		
            addTopic($_GET["topic_subject"], $_GET["topic_content"], $_GET["topic_cat"] , $_SESSION["user_id"],$_SESSION["user_name"]);
    
			//$_POST["topic_cat"]
		}else{
			?>
			<div class="alert alert-danger" role="alert">"Oh snap! <b>Change a few things up </b> and try submitting again.</div>
			<?php
		}
}
?>
<style>

div.container {
 margin-left: 20px;
}



</style>

	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#">The Forum</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		
		  <ul class="nav navbar-nav">
			
			<li class="active">
			<h4> <?php echo $_SESSION["user_name"];?> (<?=$_SESSION["user_id"];?>) <p>   </p></h4>
			</li>
			
			
		<li class="active">
			<form>
   <input class="btn btn-danger" name="logout" id="logout" type="submit" value="Log out">
 </form> 
			</li>
			
		  </ul> 
		  
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
<div class="container">
    <div class="row">


<!-- <a href="?logout=1" >Log out</a> -->


        
   
		
     </div>
    
    
<?php if(isset($_GET["add_topic"]) ) {?> 
	<form method="GET">
                   <div class="row">
    <div class="col-md-5 col-sm-8">
        <h2>Subject</h2> 

	<input type="text" class="form-control" id="topic_subject" name="topic_subject"placeholder="Text input"> 
            </div> </div> <br>
            <div class="row">
        <div class="form-group col-md-4 col-sm-8">
  
  <select class="form-control" name="topic_cat" id="topic_cat">
    <option value="1">Php</option>
      <option value="2">Ios</option>
    <option value="3">Android</option>
     <option value="4">Game Development</option>
  </select>
</div></div>
        
        
        
        
        
    <div class="row">
     <div class="col-md-5 col-sm-8">

  
        <h2>Content</h2>
    <textarea class="form-control" id="topic_content" name="topic_content" rows="5"></textarea>
             <div class="row_b">
         	<input class="btn btn-success " name="topic_submit" id="topic_submit" type="submit" value="submit">
         </div></div></div>
        </form>
       
<?php
			
     }
		
	


	

?>
    


<!--
	<input type="text" name="new_interest">
	<input type="submit" name="add_new_interest" value="Add">

</form>

<h2>Select user interest</h2>
<form>
	

	<input type="submit" name="select_interest" value="Select">
-->
<html><body>
<title>The Forum</title>

<h3>Categories</h3>
<a href="?php=1">PHP <span class="badge"><?php showBadge(1)?></span></a><br>
<a href="?ios=1">IOS <span class="badge"><?php showBadge(2)?></span></a><br>
<a href="?android=1">ANDROID <span class="badge"><?php showBadge(3)?></span></a><br>
<a href="?game=1">GAME DEVELOPMENT <span class="badge"><?php  showBadge(4);?></span></a><br>

<form method="GET">   <input class="btn btn-success" name="add_topic" id="add_topic" type="submit" value="Add Topic"></form>
			
<?php 
    if($topic_cat!=NULL ) {
   
showTopics($topic_cat);} ?>

        </div>
    
</body></html>


