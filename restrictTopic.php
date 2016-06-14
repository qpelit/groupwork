<?php

	//we need functions for dealing with session
	require_once("functions.php");
	require_once("header.php"); 
 
	if(isset($_GET["logout"])){
		//delete the session
		session_destroy();
		
		header("Location: login.php");
	}

if(isset($_GET["reply_submit"])  ){
		

			
submitReply($_SESSION["user_id"],$_SESSION["user_name"],$_GET["reply_content"],$_SESSION["topic_id"]);


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
  
<a href="?direct=1">PHP <span class="badge"><?php showBadge(1)?></span></a><br>
<a href="?direct=1">IOS <span class="badge"><?php showBadge(2)?></span></a><br>
<a href="?direct=1">ANDROID <span class="badge"><?php showBadge(3)?></span></a><br>
<a href="?direct=1">GAME DEVELOPMENT <span class="badge"><?php  showBadge(4);?></span></a><br>

<br>
 
      <?php showContent($_SESSION["topic_id"]);?>

<?php
    
    if(isset($_GET["direct"])){
        			header("Location: restrict.php");
                                
                            }

    
    
    ?>			
               </div></div>
      <?php showReplies($_SESSION["topic_id"]);?>
        <form method="GET">   <input class="btn btn-success" name="add_reply" id="add_reply" type="submit" value="Add Reply">
			
<?php if(isset($_GET["add_reply"]) ) {?> 


        <h2>Content</h2>
    <textarea class="form-control" id="reply_content" name="reply_content" rows="4"></textarea>
             <div class="row_b">
         	<input class="btn btn-success " name="reply_submit" id="reply_submit" type="submit" value="submit">
         </div></div>
        </form>
       
<?php
			
     }
		
	


	

?>


 
    
</body></html>


