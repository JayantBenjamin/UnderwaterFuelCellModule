<!DOCTYPE html>
<html>
<head>
	<title></title>

	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>

<div class="container">

    	<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-4">
								
							</div>
							<div class="col-xs-4">
								<h3 id="title">Login</h3>
							</div>
							<div class="col-xs-4">
								
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form"  method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-md-6 ">
												<input type="button" name="login-submit" id="login-submit" onclick="Login()" tabindex="4" class="form-control btn btn-success" value="Log In">
											</div>
											<div class="col-md-6 ">
												<input type="button" name="contactTmrt" id="contactTmrt" tabindex="4" class="form-control btn btn-primary" value="Contact Us" onclick="sendEmail()">
											</div>
										</div>
									</div>
									<!-- <div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div> -->
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	

	<script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
	<script>
	  // Initialize Firebase
	  var config = {
	    apiKey: "AIzaSyAEvViQ3Iu1MuYaUmtar2_FL_3bQmCSrYA",
	    authDomain: "tmrt-de19a.firebaseapp.com",
	    databaseURL: "https://tmrt-de19a.firebaseio.com",
	    projectId: "tmrt-de19a",
	    storageBucket: "",
	    messagingSenderId: "383420827766"
	  };
	  firebase.initializeApp(config);
	</script>
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script>



		function Login(){
			var username= document.getElementById("username").value;
			var password= document.getElementById("password").value;
			
			
			firebase.auth().signInWithEmailAndPassword(username, password).catch(function(error) {
			  // Handle Errors here.
			  var errorCode = error.code;
			  var errorMessage = error.message;
			  console.log(errorMessage);
			 // window.alert(errorMessage);
			  // ...
			});
		}

		function sendEmail() {
				window.open('mailto:hardik9719@gmail.com?subject=temp&body=helloWorld');
		}


		firebase.auth().onAuthStateChanged(function(user) {
		  if (user) {
		    // User is signed in.
		    var displayName = user.displayName;
		    var email = user.email;
		    var emailVerified = user.emailVerified;
		    var photoURL = user.photoURL;
		    var isAnonymous = user.isAnonymous;
		    var uid = user.uid;
		    var providerData = user.providerData;
		    console.log("logged...........")



		  




		    window.location="interface.php";
		    // ...
		  } else {
		    // User is signed out.
		    // ...
		    console.log("not logged");
		  }
		});
	</script>

</body>
</html>