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

    $filmy = [
        [
            "Mroczny_Rycerz", "Christopher Nolan, David S. Goyer", "Christopher Nolan", "Batman staje w obliczu Jokera, psychopatycznego geniusza zagrażającego Gotham City.", 
            "2008-07-18", "Warner Bros.", "USA", "angielski, polski (dubbing)", 100000000, "Christian Bale, Heath Ledger, Michael Caine", 
            "https://fwcdn.pl/fpo/63/51/236351/7198307_2.6.jpg"
        ],
        [
            "Kiler", "Krzysztof Krauze, Piotr Trzaskowski", "Krzysztof Krauze", "Historia o płatnym zabójcy, który zostaje wplątany w aferę polityczną.", "1997-09-12", 
            "Studio Filmowe Zebra", "Polska", "polski", 3000000, "Jerzy Stuhr, Cezary Pazura, Tomasz Konieczny", 
            "https://fwcdn.pl/fpo/05/29/529/6900785_1.6.jpg"
        ],
        [
            "Interstellar", "Jonathan Nolan, Christopher Nolan", "Christopher Nolan", "Grupa astronautów wyrusza w kosmos w poszukiwaniu nowego domu dla ludzkości.", 
            "2014-11-07", "Warner Bros., Legendary Pictures, Syncopy Films", "USA, Wielka Brytania", "angielski, polski (dubbing)", 1000000000, "Matthew McConaughey, Anne Hathaway, Jessica Chastain", 
            "https://fwcdn.pl/fpo/56/29/375629/7670122_2.6.jpg"       
        ],
        [
            "Sami_swoi", "Sylwester Chęciński", "Sylwester Chęciński", "Komedia przedstawiająca perypetie dwóch skłóconych rodzin: Kargulów i Pawlaków.", 
            "1967-10-02", "Wytwórnia Filmów Fabularnych", "Polska", "polski", 15000000, "Roman Sykała, Wacław Kowalik, Kazimierz Wójt.", 
            "https://fwcdn.pl/fpo/11/13/1113/7886201_1.6.jpg"
        ],
        [
            "Szybcy_i_wściekli", "Chris Morgan, Derek Haas", "Justin Lin", "Dom Toretto staje w obliczu nowego zagrożenia ze strony swojego dawnego wroga.", 
            "2001-05-22", "Universal Pictures", "USA", "angielski, polski (dubbing)", 1300000000, "Vin Diesel, Michelle Rodriguez, Charlize Theron", 
            "https://fwcdn.pl/fpo/05/88/30588/7145648_1.6.jpg"
        ]
    ];

    $komentarze = [
        [
            1, 'Jan Kowalski', 7, 'Swietny film', '2024-06-11'
        ],
        [
            1, 'Anna Kowalska', 4, 'Sciek', '2024-06-10'
        ],
        [
            1, 'Tomasz Nowak', 3, 'Nie polecam', '2024-06-09'
        ],
        [
            2, 'Krzysztof Wiśniewski', 7, 'Ujdzie na wsi', '2024-06-08'
        ],
        [
            2, 'Marta Zielińska', 4, 'Trochę przewidywalny', '2024-06-07'
        ],
        [
            2, 'Piotr Kowalski', 8, 'W pyte', '2024-06-06'
        ],
        [
            3, 'Katarzyna Nowak', 5, 'Gniot', '2024-06-05'
        ],
        [
            3, 'Andrzej Kowalski', 6, 'Dobry Gniot', '2024-06-04'
        ],
        [
            3, 'Zuzanna Wiśniewska', 3, 'Moze byc', '2024-06-03'
        ],
        [
            4, 'Mateusz Wiśniewski', 9, 'Giga chad', '2024-06-02'
        ],
        [
            4, 'Beata Nowak', 4, 'Wzruszająca historia ale słaba', '2024-06-01'
        ],
        [
            5, 'Jakub Kowalski', 2, 'Film, ale dzieci', '2024-05-31'
        ]
    ];

    $filmySelect = "SELECT ID FROM filmy1";
    $filmyWynik = mysqli_query($conn, $filmySelect);
    
    if(empty($filmyWynik)) {
        $filmyStworz = 
            "CREATE TABLE filmy1 (
            ID int(11) AUTO_INCREMENT PRIMARY KEY,
            tytul_filmu varchar(255) ,
            autor_scenariusza varchar(255) ,
            rezyser varchar(255) ,
            krotki_opis varchar(1020) ,
            data_premiery date ,
            producent varchar(255) ,
            kraj_pochodzenia varchar(255) ,
            wersje_jezykowe varchar(255) ,
            liczba_widzow int(16) ,
            aktorzy varchar(255) ,
            okladka_filmu varchar(1020) 
            )";
        $filmyWynik = mysqli_query($conn, $filmyStworz);

        foreach ($filmy as $film) {
            $sql = "INSERT INTO filmy1 (tytul_filmu, autor_scenariusza, rezyser, krotki_opis, data_premiery, producent, kraj_pochodzenia, wersje_jezykowe, liczba_widzow, aktorzy, okladka_filmu) 
                    VALUES ('" . $film[0] . "', '" . $film[1] . "', '" . $film[2] . "', '" . $film[3] . "', '" . $film[4] . "', '" . $film[5] . "', '" . $film[6] . "', '" . $film[7] . "', " . $film[8] . ", '" . $film[9] . "', '" . $film[10] . "')";
        
            if (mysqli_query($conn, $sql)) {
                echo "Rekord filmu " . $film[0] . " został dodany pomyślnie.<br>";
            }
            else {
                echo "Błąd podczas dodawania rekordu: " . mysqli_error($conn) ;
            }
        }
    }

    $komentarzeSelect = "SELECT * FROM KOMENTARZE";
    $komentarzeWynik = mysqli_query($conn, $komentarzeSelect);

    if(empty($komentarzeWynik)) {
        $komentarzeStworz = 
            "CREATE TABLE KOMENTARZE (
            ID_komentarz int(11) AUTO_INCREMENT PRIMARY KEY,
            id_filmu int(11) ,
            nick varchar(255) ,
            ocena int(2) ,
            komentarz varchar(1020) ,
            data_komentarza date 
            )";
        $komentarzeWynik = mysqli_query($conn, $komentarzeStworz);

        foreach ($komentarze as $komentarz) {
            $sql = "INSERT INTO KOMENTARZE (id_filmu, nick, ocena, komentarz, data_komentarza) 
                    VALUES (" . $komentarz[0] . ", '" . $komentarz[1] . "', " . $komentarz[2] . ", '" . $komentarz[3] . "', '" . $komentarz[4] . "')";
        
            if (mysqli_query($conn, $sql)) {
                echo "Komentarz użytkownika " . $komentarz[1] . " został dodany pomyślnie.<br>";
            } else {
                echo "Błąd podczas dodawania komentarza: " . mysqli_error($conn) . "<br>";
            }
        }
    }
?>



    <footer class="footer bg-dark">
		<div class="container">
			<div class="text-center p-2">
				<b style="color:#ffffff;">Projekt na tworzenie aplikacje bazodanowych wykonał Kacper Tymicki </b>
			</div>
		</div>
	</footer>
    
</body>