<?php session_start(); ?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
      <link rel="stylesheet" type="text/css" href="admin/css/style.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>
      	Crie Sua Conta - Mangá SRC
      </title>
    </head>

    <body>
    	<form action="admin/add.php" method="post" enctype="multipart/form-data">

    	<div class="row">
    		
    		<div class="col l12 m12 s10">

    			<div class="container">

			    	<div class="card">	

			    		<div class="row">
			    			<div class="signin">
						        <div class="input-field col s11">
						          	<input id="userName" name="userName" type="text" class="validate">
						          	<label for="userName">Insira seu Nome</label>
						        </div>
					        </div>
					    </div>

					    <div class="row">
					    	<div class="signin">
					    		<div class="input-field col s11">
					    			<input type="text" name="nickName" id="nickName" onkeyup="checkdb();" class="validate">
						          	<label for="nickName">Insira seu Nick</label>
						          	<span id="nick" class="helper-text"></span>
					    		</div>
					    	</div>
					    </div>
					 	
					    <div class="row">
					    	<div class="signin">
						        <div class="input-field col s11">
						          <input id="emailUser" name="emailUser" type="email" class="validate" required pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$">
						          <label for="emailUser">Insira um email válido</label>
						          <span id="email" class="helper-text"></span>
						        </div>
					        </div>
					    </div>

					    <div class="row">
					    	<div class="signin">
						        <div class="input-field col s11">
						          <input id="userPassword" name="userPass" type="password" class="validate" required>
						          <label for="userPassword">Insira sua senha</label>
						        </div>
				        	</div>
				      	</div>

				      	<div class="row">
				      		<div class="right-align botao-enviar">
					      		<div class="col s11">
					      			<button class="btn waves-effect waves-light" type="submit" name="btn-envia" disabled>
					      				Cadastrar
									    <i class="material-icons right">send</i>
									</button>
					      		</div>
				      		</div>	
				      	</div>

		    		</div>

	    		</div>

	    	</div>
	    	<div class="row">
	    		<div class="container">
	      			<div class="col l12">
	      				<?php echo @$_SESSION['message']; session_destroy(); ?>
	      			</div>
	      		</div>
	      	</div>

		</div>


	</form>
      <!--JavaScript at end of body for optimized loading-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      <script type="text/javascript" src="admin/js/functions.js"></script>
	 
    </body>
  </html>