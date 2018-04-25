		function checkdb(){
		 var name = document.getElementById("nickName").value;
		 var email = document.getElementById("emailUser").value;

		 if(name.length > 0) {
		      $.ajax({
		          type: 'post',
		          url: 'admin/verifica.php',
		          data: {
		           nickName:name, emailUser:email
		          },
		          success: function (response) {
		               $('#nick').html(response);
		               if(response == "OK")   
		               {
		                return true;
		               }
		               else
		               {
		                return false;
		               }
		          }
		      });
		 }
		 else{
			  $('#nick').html("");
			  return false;
		 }

		}
			
		// Mantém os inputs em cache:
			var inputs = $('input');

			// Chama a função de verificação quando as entradas forem modificadas
			// Usei o 'change', mas 'keyup' ou 'keydown' são também eventos úteis aqui
			inputs.on('keyup', verificarInputs);

			function verificarInputs() {
			    var preenchidos = true;  // assumir que estão preenchidos
			    inputs.each(function () {
			        // verificar um a um e passar a false se algum falhar
			        // no lugar do if pode-se usar alguma função de validação, regex ou outros
			        if (!this.value) {
			          preenchidos = false;
			          // parar o loop, evitando que mais inputs sejam verificados sem necessidade
			          return false;
			        }
			    });
			    // Habilite, ou não, o <button>, dependendo da variável:
			    $('button').prop('disabled', !preenchidos);
			}