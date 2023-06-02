<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Document</title>
</head>
<body>
  
</body>
</html>
<script src="sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">


<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="../images/login.jpg" 
        class="img-fluid" alt="">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form method="POST" action="login.php?action=login">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form1Example13">Correo Electronico</label>
            <input type="email" name="correo" id="form1Example13" placeholder="Correo Electronico" class="form-control form-control-lg" />
            
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form1Example23">Contraseña</label>
            <input type="password" name="contrasena" id="form1Example23" placeholder="Contraseña" class="form-control form-control-lg" />
            
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <a href="login.php?action=forgot">¿Olvidaste tu contraseña?</a>
          </div>

          <!-- Submit button -->
          <input type="submit" name="enviar" value="Ingresar" class="btn btn-primary btn-lg btn-block" >
          
       

        </form>
      </div>
    </div>
  </div>
</section>



   