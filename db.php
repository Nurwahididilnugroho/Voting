<?php
$dsn = 'sqlite:' . __DIR__ . '/voting.db'; // Membuat atau menghubungkan ke database SQLite
try {
    $db = new PDO($dsn);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Membuat tabel votes jika belum ada
    $db->exec("CREATE TABLE IF NOT EXISTS votes (
        id INTEGER PRIMARY KEY,
        option TEXT,
        votes INTEGER
    )");

    // Menambahkan opsi voting jika belum ada
    $stmt = $db->query("SELECT COUNT(*) FROM votes");
    if ($stmt->fetchColumn() == 0) {
        $db->exec("INSERT INTO votes (option, votes) VALUES
            ('Ganjar Pranowo', 0),
            ('Prabowo Subianto', 0),
            ('Anies Baswedan', 0)");
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
