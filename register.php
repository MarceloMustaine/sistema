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
    	<form action="admin/add.php" method="post" enctype="multipart/form-data">

    	<div class="row">
    		
    		<div class="col l12">

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
					    			<input id="nickName" name="nickName" type="text" class="validate">
						          	<label for="nickName">Insira seu Nick</label>
						          	<span class="helper-text nick" data-error="Nick já cadastrado" data-success="Nick Disponível"></span>
					    		</div>
					    	</div>
					    </div>
					 	
					    <div class="row">
					    	<div class="signin">
						        <div class="input-field col s11">
						          <input id="emailUser" name="emailUser" type="email" class="validate" required pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$">
						          <label for="emailUser">Insira um email válido</label>
						          <span class="helper-text" data-error="Email já cadastrado" data-success="Email nunca usado"></span>
						        </div>
					        </div>
					    </div>

					    <div class="row">
					    	<div class="signin">
						        <div class="input-field col s11">
						          <input id="userPassword" name="userPass"type="password" class="validate" required>
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

		</div>

	</form>
      <!--JavaScript at end of body for optimized loading-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	  <script type="text/javascript">

	        $(function(){ // declaro o início do jquery

	        	$("#nickName").blur( function(){  

	                        var nickName = $("input[name='nickName']").val();
	                        //alert(nomeUsuario);

	                        $.post('admin/verifica.php', {nickName: nickName}, function(data){
	                                $('.helper-text').html(data);//onde vou escrever o resultado
	                                if(nickName == null){
	                                	 $('.helper-text').html(data);//onde vou escrever o resultado
	                                }
	                                else {
	                                	$('.helper-text').html(data);//onde vou escrever o resultado
	                                }
	                        });

	                        var email = $("input[name='emailUser']").val();
	                        //alert(nomeUsuario);

	                        $.post('admin/verifica.php', {email: email}, function(data){
	                                $('.helper-text').html(data);//onde vou escrever o resultado
	                                if(email == null){
	                                	 $('.helper-text').html(data);//onde vou escrever o resultado
	                                }
	                                else {
	                                	$('.helper-text').html(data);//onde vou escrever o resultado
	                                }
	                        });
	                });

	        });// fim do jquery
				
	</script>
    </body>
  </html>