<link rel="stylesheet" href="css.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a href="index.php" class="navbar-brand">Strona głowna</a>
					</li>
					<li class="nav-item">
						<a href="admin.php" class="navbar-brand">Dodaj dane</a>
					</li>
					<li class="nav-item">
						<a href="drop.php" class="navbar-brand">Usun dane</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<?php
		require_once("database.php");
		$sql1 = "DROP TABLE filmy1";
		mysqli_query($conn, $sql1);
		$sql2 = "DROP TABLE KOMENTARZE";
		mysqli_query($conn, $sql2);
	?>

	<footer class="footer bg-dark">
		<div class="container">
			<div class="text-center p-2">
				<b style="color:#ffffff;">Projekt na tworzenie aplikacje bazodanowych wykonał Kacper Tymicki </b>
			</div>
		</div>
	</footer>
</body>
