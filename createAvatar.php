<!DOCTYPE html>
<html>
<head>
	<title>Avatar creator</title>
	<!-- Incluir los archivos de CSS de Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style type="text/css">
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
			background: linear-gradient(to bottom, #888, #999);
		}
		h1 {
			font-size: 3rem;
			font-weight: 600;
			text-transform: uppercase;
			letter-spacing: 2px;
			color: #333;
			margin: 0;
			padding: 1rem 0;
			text-align: center;
			border-bottom: 2px solid #333;
		}
		#avatar-container {
			background-color: #fff;
			padding: 20px;
			border-radius: 20px;
			display: flex;
			flex-direction: column;
			align-items: center;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
			margin: 50px auto;
			max-width: 600px;
		}
		#avatar-form {
			display: flex;
			flex-direction: column;
			align-items: center;
			width: 100%;
			margin-top: 20px;
		}
		#avatar-image {
			width: 300px;
			height: 300px;
			object-fit: cover;
			margin-bottom: 20px;
		}
		#avatar-submit {
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<h1>Avatar creator. Create your avatar now!</h1>
	<div id="avatar-container">
		<form id="avatar-form" method="POST" enctype="multipart/form-data">
			<img id="avatar-image" >
			<div class="custom-file">
				<input type="file" class="custom-file-input" id="avatar-file" name="avatar-file" accept="image/*">
				<label class="custom-file-label" for="avatar-file">Choose file</label>
			</div>
			<button id="avatar-submit" type="submit" class="btn btn-primary">Create Avatar</button>
		</form>
	</div>

	<!-- Incluir los archivos de JavaScript de Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<script type="text/javascript">
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
</body>
</html>
