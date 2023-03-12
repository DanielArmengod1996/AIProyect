<!DOCTYPE html>
<?php require dirname(__FILE__).'/haarphp/examples/feature_detection.php'; ?>

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
        <?php if ($error) echo "<p id='error'>$error</p>"; ?>

        <form class="custom-file" method='POST' id='imgForm' enctype='multipart/form-data'>
            <label for='img_upload'>Image File: </label>
            <input type='file' name='img_upload' id='img_upload'>
            <input type='submit' value="Upload and Detect" name='upload_form_submitted'>
        </form>

        <h2>Original Image</h2>
        <?php echo $origImageHtml; ?>

        <h2>Detected Features ( <?php echo $numFeatures; ?> )</h2>
        <ul style="list-style-type:none">
        <?php foreach ($detectedImagesHtml as $img) { ?>
            <li><?php echo $img; ?></li>
        <?php } ?>
        </ul>
        
        <?php
		    if(isset($_POST['validarDiscord'])) {

            require_once 'confFile.php';
            
            include __DIR__.'vendor/autoload.php';

          // Import classes, install a LSP such as Intelephense to auto complete imports
          use Discord\Discord;
          use Discord\Parts\Channel\Message;
          use Discord\WebSockets\Intents;

          // Create a $discord BOT
          $discord = new Discord([
              'token' => $discordBotToken, // Put your Bot token here from https://discord.com/developers/applications/
              'intents' => Intents::getDefaultIntents() | Intents::MESSAGE_CONTENT // Required to get message content, enable it on https://discord.com/developers/applications/
          ]);

          // When the Bot is ready
          $discord->on('init', function (Discord $discord) {

              // Listen for messages
              $discord->on('message', function (Message $message, Discord $discord) {

                  // If message is from a bot
                  if ($message->author->bot) {
                      // Do nothing
                      return;
                  }

                  // If message is "ping"
                  if ($message->content == 'ping') {
                      // Reply with "pong"
                      $message->reply('pong');
                  }

              });

          });

          // Start the Bot (must be at the bottom)
          $discord->run();
      }
    ?>
      <form method="post" action="">
		    <input type="submit" name="validarDiscord" value="Ejecutar función">
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