<?php
include ("head.php");

?>
<body>
	<div id="wrapper">
		<div class="row">
 			<div class="col-xs-12 col-sm-6 col-md-8">
				<div class="jumbotron">
				  <h1>Blogi</h1>
				  <p>Blog test</p>
				  <p><a class="btn btn-primary btn-lg" href="#" role="button" disabled="disabled">Wejdz</a></p>
				</div>
			</div>
  			<div class="col-xs-6 col-md-4">
				<div class="jumbotron">
				<h3>Zaloguj się</h3>
				<form method="post" class="form-horizontal" action="login.php" >
					<input type="text" name="login" placeholder="login" class="form-control"/>
					<input type="password" name="password" placeholder="hasło" class="form-control"/>
					<input type="submit" class="btn btn-primary" value="zaloguj się" />
					<input type="button" class="btn btn-primary" value="zarejestruj się" id="register" />
					</form>
				</div>
			</div>
		</div>
	</div>
		
	
	<div id="register_dialog" title="załóż konto" >
		<form method="post" action="register.php">
			<input type="text" name="login" placeholder="login" class="form-control"/>
			<input type="password" name="password" placeholder="hasło" class="form-control"/>
			<input type="submit" class="btn btn-primary" value="załóż konto" />
		</form>
	</div>
</body>
</html>