<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>
      	Crie Sua Conta - Mangá SRC
      </title>
    </head>

    <body>
    	<div class="row">
    		<div class="col l12">
    			<div class="container">

			    	<div class="card ">	

			    		<div class="row">
			    			<div class="signin">
						        <div class="input-field col s11">
						          	<input id="userName" type="text" class="validate">
						          	<label for="userName">Insira seu Nome</label>
						        </div>
					        </div>
					    </div>

					    <div class="row">
					    	<div class="signin">
					    		<div class="input-field col s11">
					    			<input id="nickName" type="text" class="validate">
						          	<label for="nickName">Insira seu Nick</label>
					    		</div>
					    	</div>
					    </div>
					 	
					    <div class="row">
					    	<div class="signin">
						        <div class="input-field col s11">
						          <input id="emailUser" type="email" class="validate" required pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$">
						          <label for="emailUser">Insira um email válido</label>
						          <span class="helper-text" data-error="email inválido" data-success="email válido"></span>
						        </div>
					        </div>
					    </div>

					    <div class="row">
					    	<div class="signin">
						        <div class="input-field col s11">
						          <input id="userPassword" type="password" class="validate" required>
						          <label for="userPassword">Insira sua senha</label>
						        </div>
				        	</div>
				      	</div>

				      	<div class="row">
				      		<div class="right-align botao-enviar">
					      		<div class="col s11">
					      			<button class="btn waves-effect waves-light" type="submit" name="action">
					      				Cadastrar
									    <i class="material-icons right">send</i>
									</button>
					      		</div>
				      		</div>	
				      	</div>

		    	</div>

	    	</div>

		</div>

      <!--JavaScript at end of body for optimized loading-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    </body>
  </html>