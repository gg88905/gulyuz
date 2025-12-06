<?php
session_start();
include 'db.php';
$sql = "SELECT * FROM mahsulotlar";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Do'kon - Mahsulotlar</title>
    <link rel="stylesheet" href="css/style3.css">
</head>
<body>
    <header>
    <div class=" ">
            <a href="index.php" class="logo">    Online Do'kon </a> 
            <form class="search-form" action="search.php" method="get">
                <div > 
                 <input type="text" name="qidiruv" placeholder="Mahsulot qidiring..." required>
                 <button class="savat" type="submit">🔍</button>
                </div>
            </form>
        <div style="text-align: center;">
            <a href="admin.php" class="admin-link"> Admin </a>
            <a href="admin.php" class="admin-link"> Mahsulot </a>
            <a href="admin.php" class="admin-link">Mahsulot</a>
            <a href="savat.php" class="savat" >🛒 Savat</a> 
        </div>
        </div>
    </header>
    
    <div class="container">
        <div class="welcome">
            <h1>Online do'koniga Xush Kelibsiz!</h1>
            <p>Sifatli va hamyonbop mahsulotlar faqat bizda</p>
        </div>
        
        <h2 class="section-title"> Barcha mahsulotlar</h2>
        
        <?php
        if ($result && $result->num_rows > 0) {
            echo "<div class='products'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='product'>";

                // Rasm
                echo "<div class='product-img'>";
                if (!empty($row['rasm']) && file_exists("images/" . $row['rasm'])) {
                    echo "<img src='images/" . htmlspecialchars($row['rasm']) . "' alt='" . htmlspecialchars($row['nomi']) . "'>";
                } else {
                    echo "<img src='images/no-image.png' alt='Rasm yo‘q'>";
                }
                echo "</div>";

                
                echo "<div class='product-info'>";
                echo "<h3 class='product-title'>" . htmlspecialchars($row['nomi']) . "</h3>";
                echo "<div class='product-meta'>";
                echo "<span>📦 Tip: " . htmlspecialchars($row['tip']) . "</span><br>";
                echo "<span>🛒 Sotuvchi: " . htmlspecialchars($row['sotuvchi']) . "</span>";
                echo "</div>";
                echo "<div class='price'>" . number_format($row['narx'], 0, '.', ' ') . " so'm</div>";

                echo "<form method='POST' action='savat.php'>";
                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                echo "<button type='submit' name='add' class='btn'>🛒 Savatga qo‘shish</button>";
                echo "</form>";

                echo "</div>"; 
                echo "</div>"; 
            }
            echo "</div>";
        } else {
            echo "<p> Mahsulot topilmadi.</p>";
        }
        ?>

       
    </div>
    
    <footer>
        <div class="container">
            <p>&copy; 2025 Online Do'kon. Barcha huquqlar himoyalangan.</p>
        </div>
    </footer>
</body>
</html>
