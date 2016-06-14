<?php
	require_once("functions.php");
require_once("header.php"); 
	//RESTRICTION - NOT LOGGED IN
	if(isset($_SESSION["user_id"])){
		//redirect user to restricted page
		header("Location: restrict.php");
	}
	
	//login button clicked
	if(isset($_POST["login"])){
		
		//login
		
		echo "logging in ...";
		
		//the username and password are not empty
		if(!empty($_POST["username"]) && !empty($_POST["password"])){
			
			//save to db
			
			login($_POST["username"], $_POST["password"]);
			
		}else{
			
			echo "both fields are required!";
			
		}
		
	
	//signup button clicked
	}else if(isset($_POST["signup"])){
		
		//signup
		
		echo "signing up ...";
		
		//the username and password are not empty
		if(!empty($_POST["username"]) && !empty($_POST["password"])){
			
			//save to db
		
			signup($_POST["username"], $_POST["mail"], $_POST["gender"],$_POST["phone"], $_POST["password"]);
		
		}else{
			
			echo "both sign fields are rquired!";
			
		}
		
		
	}


?>


<style>

#container {
  width : 800px;
}

.holder {
width : 400px;
height : 300px;


float : left;
}

</style>


	<html>

<head>
<title>Forum Page</title>
</head>
<body>


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
				<a href="app_b.php">
					Home
				</a>
			</li>
			
			
			<li>
				<a href="table_b.php">
					Users
				</a>
			</li>
			
		  </ul> 
		  
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
 

	<div class="container">

        <div class = "holder">
		<h1> Register</h1>
		
		<form method="POST">
			<div class="row">
				<div class="col-md-8 col-sm-8">
                                    <div class="input-group">
                  <span class="input-group-addon" id="username">@</span>
                  <input type="text" name="username"  id="username" class="form-control" placeholder="Username" aria-describedby="username">
                </div>
				</div>
			</div>
            
			<div class="row">
			<div class="col-md-8 col-sm-8">
                                    <div class="input-group">
                  <span class="input-group-addon" id="mail">Mail</span>
                  <input type="text" name="mail"  id="mail" class="form-control" placeholder="name@example.com" aria-describedby="mail">
                </div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-8 col-sm-6">
                                    <div class="input-group">
                  <span class="input-group-addon" id="password">Password</span>
                  <input type="password" name="password"  id="password" class="form-control" placeholder=" " aria-describedby="password">
                </div>
				</div>
			</div>
       
           <div class="radio">
  <label><input type="radio" name="gender" id="gender" value="male">Male</label>


  <label><input type="radio" name="gender" id="gender" value="female">Female</label>
</div>
          
               <div class="row">
<div class="form-group col-md-8 col-sm-8">
  
  <select class="form-control" name="phone" id="phone">
    <optionvalue="iphone">M-Phone Brand</option>
      <option value="iphone">Iphone</option>
    <option value="samsung">Samsung</option>
     <option value="other">Other</option>
  </select>
</div></div>
            <div class="row">
				<div class="col-md-8 col-sm-8">
					<input class="btn btn-success hidden-xs" name="signup" type="submit" value="Register">
					<input class="btn btn-success btn-block visible-xs-block" name="signup" type="submit" value="Register">
				</div>
			</div>
		</form>
		


        </div>
        <div class = "holder">
		<h1> Log In</h1>
	
		<form method="POST">
			<div class="row">
				<div class="col-md-8 col-sm-8">
                                    <div class="input-group">
                  <span class="input-group-addon" id="username">@</span>
                  <input type="text" name="username"  id="username" class="form-control" placeholder="Username" aria-describedby="username">
                </div>
				</div>
			</div>
            
			
            <div class="row">
				<div class="col-md-8 col-sm-8">
                                    <div class="input-group">
                  <span class="input-group-addon" id="password">Password</span>
                  <input type="password" name="password"  id="password" class="form-control" placeholder=" " aria-describedby="password">
                </div>
				</div>
			</div>
       
          <br>
            <div class="row">
				<div class="col-md-8 col-sm-6">
					<input class="btn btn-success hidden-xs" name="login" type="submit" value="Log In">
					<input class="btn btn-success btn-block visible-xs-block" name="login" type="submit" value="login">
				</div>
			</div>
		</form>
		


        </div>
	</div>
  
  </body>
</html>
