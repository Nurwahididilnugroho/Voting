<?php require 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hasil Voting</title>
    <link rel="stylesheet" href="style.css">

    <style>
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
    background-color: rgba(255, 0, 0, 0.7); /* Latar belakang merah semi-transparan */
    padding: 10px;
    border-radius: 10px;
}

/* Gaya untuk tabel */
table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: rgba(255, 255, 255, 0.9); /* Latar belakang putih semi-transparan */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    overflow: hidden;
}

th, td {
    padding: 15px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 1.2em;
}

th {
    background-color: #FF0000; /* Warna merah sesuai tema Indonesia */
    color: white;
}

td {
    background-color: white;
    color: #333;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

/* Gaya untuk tautan */
a {
    display: block;
    width: 200px;
    margin: 20px auto;
    padding: 10px;
    background-color: #D91656;
    color: white;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    font-size: 1.2em;
    transition: background-color 0.3s;
}

a:hover {
    background-color: #EE66A6;
}

    </style>
</head>
<body>
    <h1>Hasil Voting</h1>

    <table>
        <tr>
            <th>Opsi</th>
            <th>Jumlah Suara</th>
        </tr>

        <?php
        // Menampilkan hasil voting
        $stmt = $db->query("SELECT * FROM votes");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['option']) . "</td>";
            echo "<td>" . htmlspecialchars($row['votes']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <a href="index.php">Kembali ke Voting</a>
</body>
</html>
