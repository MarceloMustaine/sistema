<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <style type="text/css">
        .dropdown-content li>a, .dropdown-content li>span {
          color:#333;
        }
      </style>
    </head>

    <body>

      <div class="container">
        <form>
        <div class="row">

             <div class="input-field col s4">
              <select>
                <option value="">Escolha o Mangá</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
              </select>
              <label><b>Qual mangá você irá excluir?</b></label>
            </div>

	        </div>
	        <div class="snd-btn right-align row">
	          <div class="col s4">
	          <button class="btn waves-effect waves-light" type="submit" name="action">
	              Excluir
	          </button>
	          </div>
	        </div>

        </form>
        
      </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {
          $('select').material_select();
        });
      </script>
    </body>
  </html>