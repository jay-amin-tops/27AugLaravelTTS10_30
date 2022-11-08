<!---->
<style>
    

.global-container{
	height:100%;
	display: flex;
	align-items: center;
	justify-content: center;
	background-color: #f5f5f5;
}

form{
	padding-top: 10px;
	font-size: 14px;
	margin-top: 30px;
}

.card-title{ font-weight:300; }

.btn{
	font-size: 14px;
	margin-top:20px;
}


.login-form{ 
	width:330px;
	margin:20px;
}

.sign-up{
	text-align:center;
	padding:20px 0 0;
}

.alert{
	margin-bottom:-30px;
	font-size: 13px;
	margin-top:20px;
}
</style>
<!--content-->
<div class="content-top ">
    <div class="container ">
    <div class="global-container">
	<div class="card login-form">
	<div class="card-body">
		<h3 class="card-title text-center">Registration</h3>
		<div class="card-text">
			<!--
			<div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
			<form method="post">
				<!-- to error: add class "has-danger" -->
				<div class="form-group">
					<label for="username">User Name</label>
					<input type="text" placeholder="Enter User Name" class="form-control form-control-sm" name="username" id="username" title="tops?123">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" placeholder="xxxxx@xxx.xxxx" class="form-control form-control-sm" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" name="password" class="form-control form-control-sm" id="exampleInputPassword1">
				</div>
				<button type="submit" name="btn-regist" class="btn btn-primary btn-block">Sign in</button>
			</form>
		</div>
	</div>
</div>
</div>
     
    </div>
</div>
</div>
