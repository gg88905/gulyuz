<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>katolog</title>
    <link rel="stylesheet" href="style.css">
  
</head>
<body>
    <h2>📖 Kitoblar ro‘yxati</h2>
    <a href="index.php">⬅ Bosh sahifaga qaytish</a><br><br>

    <?php
    $sql = "SELECT * FROM kitoblar";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='kitoblar'>";
        while($row = $result->fetch_assoc()) {
            echo "<div class='kitob'>";
            if ($row['rasm']) {
                echo "<img src='images/" . $row['rasm'] . "' alt='Kitob rasmi' width='100'>";
            }
            echo "<h3>" . htmlspecialchars($row['nomi']) . "</h3>";
            echo "<p>Muallif: " . htmlspecialchars($row['muallif']) . "</p>";
            echo "<p>Narxi: " . $row['narx'] . " so'm</p>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "Hozircha hech qanday kitob mavjud emas.";
    }
    ?>
</body>
</html>
