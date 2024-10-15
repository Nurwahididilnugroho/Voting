<?php require 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Voting App</title>
    <!-- <link rel="stylesheet" href="style.css"> -->

    <style>
        /* Reset dasar */
/* Reset dasar */
body {
    margin: 0;
    font-family: 'Arial', sans-serif;
    background-image: url('gambar/indonesia.jpeg'); /* Ganti dengan path gambar bendera */
    background-size: cover; /* Memastikan gambar menutupi seluruh halaman */
    background-position: center;
    background-repeat: no-repeat; 
    color: #333;
}

/* Gaya untuk header */
h1 {
    text-align: center;
    margin: 20px;
    font-size: 3em;
    color: #ffffff;
    background-color: rgba(255, 0, 0, 0.7); /* Warna latar belakang merah semi-transparan */
    padding: 10px;
    border-radius: 10px;
}

/* Gaya untuk tulisan "Hanya Simulasi" */
.simulasi {
    text-align: center;
    font-size: 1.5em;
    color: #FFD700; /* Warna kuning emas */
    margin: 10px 0;
    background-color: rgba(0, 0, 0, 0.5); /* Latar belakang gelap semi-transparan */
    padding: 10px;
    border-radius: 5px;
}

/* Gaya untuk form */
form {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background: rgba(255, 255, 255, 0.85); /* Putih semi-transparan */
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

/* Kontainer untuk kandidat */
.container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    margin: 20px 0;
    background-image: url('gambar/siluet.jpeg'); /* Ganti dengan path gambar lambang Garuda */
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    padding: 20px;
    border-radius: 10px;
}

/* Gaya untuk setiap kandidat */
.container div {
    background: #ffffff;
    border-radius: 8px;
    padding: 20px;
    margin: 10px;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    transition: transform 0.3s;
}

.container div:hover {
    transform: scale(1.1);
}

/* Gaya untuk gambar kandidat */
.container img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
    margin-bottom: 15px;
}

/* Gaya untuk label dan input */
label {
    display: block;
    font-size: 1.2em;
    margin: 10px 0;
    color: #333;
}

input[type="radio"] {
    margin-right: 8px;
}

/* Gaya untuk tombol */
button {
    display: block;
    width: 100%;
    padding: 15px;
    background-color: #FF0000; /* Warna merah */
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #CC0000; /* Warna merah lebih gelap */
}

/* Gaya untuk tautan */
a {
    display: inline-block;
    margin: 10px 0;
    color: #FF0000;
    text-decoration: none;
    text-align: center;
    font-size: 1.2em;
}

a:hover {
    text-decoration: underline;
    color: #CC0000;
}


    </style>
</head>
<body>
    <h1>Pilih Presiden Anda</h1>

    <form action="index.php" method="POST">
        <div class="container">
            <div >
                <img src="gambar/genjer.jpeg" alt=""><br>
                <label>
                    <input type="radio" name="vote" value="Ganjar Pranowo" required> Ganjar Pranowo
                </label><br>
            </div>
            <div>
                <img src="gambar/prabowo.jpeg" alt=""><br>
                <label>
                    <input type="radio" name="vote" value="Prabowo Subianto" required> Prabowo Subianto
                </label><br>
            </div>
            <div>
                <img src="gambar/anies].jpeg" alt=""><br>
                <label>
                    <input type="radio" name="vote" value="Anies Baswedan" required> Anies Baswedan
                </label><br><br>
            </div>
        </div>
        <button type="submit" name="submit">Vote</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $vote = $_POST['vote'];

        // Update jumlah vote untuk opsi yang dipilih
        $stmt = $db->prepare("UPDATE votes SET votes = votes + 1 WHERE option = ?");
        $stmt->execute([$vote]);

        echo "<p>Terima kasih telah memberikan suara!</p>";
    }
    ?>

    <a href="results.php">Lihat Hasil Voting</a>
</body>
</html> 
