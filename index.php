<link rel="stylesheet" href="style.css">
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

<div class="container">

<main>
<br>
<form name="szukaj" action="" method="get">
	<label>Wprowadź tytuł lub reżysera filmu</label>
	<input type='text' name='szukaj'>
	<button type='submit'>Szukaj</button>
</form>

<form>
<label for="sort">Sortowanie:</label>
    <select name="sort" onchange="this.form.submit()">
        <option ></option>
        <option value="ocenaMal">Ocena malejąco</option>
        <option value="ocenaRos">Ocena rosnąco</option>
        <option value="komMal">Liczba komentarzy malejąco</option>
		<option value="komRos">Liczba komentarzy rosnąco</option>
    </select>
</form>


<?php
	require_once("database.php");

	if(isset($_GET['sort'])){
		$sortValue = $_GET['sort'];
	}

	if(isset($_GET['szukaj'])){
		$searchValue = $_GET['szukaj'];
	}

	if(isset($_GET['film'])){
		$filmValue = $_GET['film'];
	}

	if(isset($_GET['id'])){
		$filmId = $_GET['id'];
	}


	function wyswietlFilm($w){
		echo "<div>";
		echo "<h1><a href=index.php?film={$w['tytul_filmu']}&id={$w['ID']}>
					{$w['tytul_filmu']}</a></h1>";
		echo "<p><b>srednia_ocena:</b> {$w['srednia_ocena']}/10		<b>liczba_komentarzy:</b> {$w['liczba_komentarzy']}</p>";
		echo "</div>";
	}

	function wyswietlCalyFilm($w){
		echo "<div>";
		echo "<h1>{$w['tytul_filmu']}</h1>";
		echo "<img src={$w['okladka_filmu']} class='img-fluid' alt='{$w['okladka_filmu']}'>";
		echo "<p><b>autor_scenariusza:</b> {$w['autor_scenariusza']}</p>";
		echo "<p><b>rezyser:</b> {$w['rezyser']}</p>";
		echo "<p><b>krotki_opis:</b> {$w['krotki_opis']}</p>";
		echo "<p><b>data_premiery:</b> {$w['data_premiery']}</p>";
		echo "<p><b>kraj_pochodzenia:</b> {$w['kraj_pochodzenia']}</p>";
		echo "<p><b>wersje_jezykowe:</b> {$w['wersje_jezykowe']}</p>";
		echo "<p><b>liczba_widzow:</b> {$w['liczba_widzow']}</p>";
		echo "<p><b>aktorzy:</b> {$w['aktorzy']}</p>";
		echo "<p><b>srednia_ocena:</b> {$w['srednia_ocena']}/10</p>";
		echo "<p><b>liczba_komentarzy:</b> {$w['liczba_komentarzy']}</p>";
		echo "</div>";
	}

	if(!isset($sortValue) && !isset($searchValue) && !isset($filmValue)){
		$sql = "SELECT
					*,
					ROUND(AVG(k.ocena),1) AS srednia_ocena,
					COUNT(k.ocena) AS liczba_komentarzy
				FROM filmy1 AS f
				RIGHT JOIN KOMENTARZE k ON f.ID = k.id_filmu
				GROUP BY f.ID;";

		$result = mysqli_query($conn, $sql);
		while($w = mysqli_fetch_assoc($result)){
			wyswietlFilm($w);
		}
	}

	if(isset($searchValue)){
		$sql = "SELECT
					*,
					ROUND(AVG(k.ocena),1) AS srednia_ocena,
					COUNT(k.ocena) AS liczba_komentarzy
				FROM filmy1 AS f
				LEFT JOIN KOMENTARZE k ON f.ID = k.id_filmu
				WHERE f.tytul_filmu LIKE '%{$searchValue}%'
				GROUP BY f.ID;";

		$result = mysqli_query($conn, $sql);
		while($w = mysqli_fetch_assoc($result)){
			wyswietlFilm($w);
		}
	}



	function wyswietlSortowane($conn,$byWhat, $hotToSort){
		$sql = "SELECT
					*,
					ROUND(AVG(k.ocena),1) AS srednia_ocena,
					COUNT(k.ocena) AS liczba_komentarzy
				FROM filmy1 AS f
				LEFT JOIN KOMENTARZE k ON f.ID = k.id_filmu
				GROUP BY f.ID
				ORDER BY {$byWhat} {$hotToSort};";

		$result = mysqli_query($conn, $sql);
		while($w = mysqli_fetch_assoc($result)){
			wyswietlFilm($w);
		}
	}

	if(isset($sortValue)){
		if ($sortValue === "ocenaMal") {
			wyswietlSortowane($conn,"srednia_ocena","DESC");
		}
		if ($sortValue === "ocenaRos") {
			wyswietlSortowane($conn,"srednia_ocena","");
		}
		if ($sortValue === "komMal") {
			wyswietlSortowane($conn,"liczba_komentarzy","DESC");
		}
		if ($sortValue === "komRos") {
			wyswietlSortowane($conn,"liczba_komentarzy","");
		}
	}


	if(isset($filmValue)){
		$sql1 = "SELECT
					*,
					ROUND(AVG(k.ocena),1) AS srednia_ocena,
					COUNT(k.ocena) AS liczba_komentarzy
				FROM filmy1 AS f
				LEFT JOIN KOMENTARZE k ON f.ID = k.id_filmu
				WHERE f.tytul_filmu = '{$filmValue}'
				GROUP BY f.ID;";

		$result1 = mysqli_query($conn, $sql1);
		while($w = mysqli_fetch_assoc($result1)){
			wyswietlCalyFilm($w);
		}



		
		$sql2 = "SELECT
					*
				FROM KOMENTARZE
				WHERE id_filmu = '{$filmId}'";

		$result2 = mysqli_query($conn, $sql2);

		echo "<table class='table'>";

			echo "<thead>";
				echo "<tr>";
					echo "<th scope='col'>Nick</th>";
					echo "<th scope='col'>Ocena</th>";
					echo "<th scope='col'>Komentarz</th>";
					echo "<th scope='col'>data_komentarza</th>";
				echo "</tr>";
			echo "</thead>";

			echo "<tbody>";
				while($w = mysqli_fetch_assoc($result2)){
					echo "<tr>";
						echo "<th scope='row'>{$w['nick']}</th>";
						echo "<td> {$w['ocena']}</th>";
						echo "<td> {$w['komentarz']}</th>";
						echo "<td> {$w['data_komentarza']}</th>";
					echo "</tr>";
				}
			echo "</tbody>";
		echo "</table>";

	}
?>

</main>

</div>

	<footer class="footer bg-dark">
		<div class="container">
			<div class="text-center p-2">
				<b style="color:#ffffff;">Projekt na tworzenie aplikacje bazodanowych wykonał Kacper Tymicki </b>
			</div>
		</div>
	</footer>
</body>