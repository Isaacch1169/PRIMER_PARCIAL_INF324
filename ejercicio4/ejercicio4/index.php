<?
session_start();
if (isset($_SESSION["rol"]))
{
	header("Location: index.php");
}
else
	$_SESSION["rol"]=-1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <link rel="stylesheet" href="css/mdb.min.css" />
</head>
<body>

  <header>
    <style>
      #intro {
        background-image: url(https://mdbootstrap.com/img/new/fluid/city/008.jpg);
        height: 100vh;
        color: #ffff;
      }

        @media (min-width: 992px) {
        #intro {
          margin-top: -58.59px;
        }
      }

    </style>
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 text-center mb-5 " class = intro>
              <h2 class="heading-section" >Ingreso  al sistema</h2>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">
              <form action = "valida.php" method ="POST" class="bg-white rounded shadow-5-strong p-5">

                <div class="form-group">
		      			<input type="text" name="nombre" class="form-control" placeholder="Username" required>
		      		</div>

                <div class="form-group d-flex">
	              <input type="password" name="contrasenia" class="form-control" placeholder="Password" required>
	            </div>


                <div class="row mb-4">
                  <div class="col d-flex justify-content-center">

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                      <label class="form-check-label" for="form1Example3">
                        Recordar contraseña
                      </label>
                    </div>
                  </div>

                  <div class="col text-center">
   
                    <a href="#!">Olvido la contraseña?</a>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block" data-mdb-ripple-init>Sign in</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </header>
 


  <footer class="bg-light text-lg-start">
    
  </footer>

  
    <script type="text/javascript" src="js/mdb.umd.min.js"></script>
</body>
</html>