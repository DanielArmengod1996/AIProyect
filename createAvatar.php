<!DOCTYPE html>
<!-- saved from url=(0052)https://getbootstrap.com/docs/4.0/examples/product/# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/product/">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="product.css" rel="stylesheet">
  </head>

  <body>

    <nav class="site-header sticky-top py-1">
      <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="https://yonuncajuego.com">
          📸
        </a>
        <a class="py-2 d-none d-md-inline-block" href="https://yonuncajuego.com/main.php">Home</a>
        <a class="py-2 d-none d-md-inline-block" href="https://yonuncajuego.com">Create Avatar</a>
        <a class="py-2 d-none d-md-inline-block" href="https://yonuncajuego.com">About Us</a>
        <a class="py-2 d-none d-md-inline-block" href="https://yonuncajuego.com">Login</a>
        <a class="py-2 d-none d-md-inline-block" href="https://yonuncajuego.com">Register</a>
      </div>
    </nav>

    <div class="position-relative overflow-hidden p-5 p-md-5 m-md-3 text-center bg-light">
	<div id="avatar-container">
		<form id="avatar-form" method="POST" enctype="multipart/form-data">
			<img id="avatar-image" class="img-thumbnail rounded float-left">

      <?php
          // Carga la librería Haar PHP Image Feature Detection
          require_once('haarphp/src/HaarDetector.php');

          // Ruta del archivo XML de cascada de Haar para la detección de rostros
          $cascadeFilePath = 'haarphp/cascades/haarcascade_frontalface_alt.xml';

          // Carga la imagen que deseas procesar
          $imagePath = 'haarphp/examples/modelface.jpg';
          $image = imagecreatefromjpeg($imagePath);

          // Crea un objeto HaarDetector
          $detector = new HaarDetector($cascadeFilePath);

          // Detecta la cara en la imagen
          $faces = $detector->detect($image);

          // Verifica si se detectó una cara
          if (!empty($faces)) {
              echo "La imagen contiene una cara";
          } else {
              echo "La imagen no contiene una cara";
          }


      ?>
			<div class="custom-file">
				<input type="file" class="custom-file-input" id="avatar-file" name="avatar-file" accept="image/*">
				<label class="custom-file-label" for="avatar-file">Choose file</label>
			</div>
			<button id="avatar-submit" type="submit" class="btn btn-primary">Create Avatar</button>
		</form>
	</div>
    </div>

    <footer class="container py-5">
      <div class="row">
        <div class="col-12 col-md">
          📸
          <small class="d-block mb-3 text-muted">© 2022-2023</small>
        </div>
        <div class="col-6 col-md">
          <h5>Features</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="https://getbootstrap.com/docs/4.0/examples/product/#">1. something</a></li>
            <li><a class="text-muted" href="https://getbootstrap.com/docs/4.0/examples/product/#">2. something</a></li>
            <li><a class="text-muted" href="https://getbootstrap.com/docs/4.0/examples/product/#">3. somtething</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Resources</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="https://getbootstrap.com/docs/4.0/examples/product/#">1. something</a></li>
            <li><a class="text-muted" href="https://getbootstrap.com/docs/4.0/examples/product/#">2. something</a></li>
            <li><a class="text-muted" href="https://getbootstrap.com/docs/4.0/examples/product/#">3. somtething</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Resources</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="https://getbootstrap.com/docs/4.0/examples/product/#">1. something</a></li>
            <li><a class="text-muted" href="https://getbootstrap.com/docs/4.0/examples/product/#">2. something</a></li>
            <li><a class="text-muted" href="https://getbootstrap.com/docs/4.0/examples/product/#">3. somtething</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>About</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="https://getbootstrap.com/docs/4.0/examples/product/#">1. something</a></li>
            <li><a class="text-muted" href="https://getbootstrap.com/docs/4.0/examples/product/#">2. something</a></li>
            <li><a class="text-muted" href="https://getbootstrap.com/docs/4.0/examples/product/#">3. somtething</a></li>
          </ul>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="popper.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });

	  		// Previsualización de la imagen seleccionada
		var avatarImage = document.getElementById('avatar-image');
		var avatarFileInput = document.getElementById('avatar-file');
		avatarFileInput.addEventListener('change', function() {
			var file = avatarFileInput.files[0];
			var reader = new FileReader();
			reader.onload = function(e) {
				avatarImage.src = e.target.result;
			}
			reader.readAsDataURL(file);
		});
    </script>
  	<!-- Incluir los archivos de JavaScript de Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body></html>