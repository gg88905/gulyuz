<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qidiruv natijalari</title>
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #f72585;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --success: #4bb543;
            --border: #dee2e6;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f0f2f5;
            color: var(--dark);
            line-height: 1.6;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        .header {
            display: flex;
            flex-direction: column;
            margin-bottom: 30px;
        }
        
        .page-title {
            font-size: 28px;
            margin-bottom: 20px;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .nav-links {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
        }
        
        .nav-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            text-decoration: none;
            color: var(--primary);
            font-weight: 500;
            padding: 8px 16px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-2px);
        }
        
        .mahsulotlar {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }
        
        .mahsulot {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none !important;
        }
        
        .mahsulot:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        
        .product-image {
            height: 200px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            border-bottom: 1px solid var(--border);
        }
        
        .product-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
        
        .product-details {
            padding: 20px;
        }
        
        .product-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 12px;
            color: var(--dark);
        }
        
        .product-meta {
            font-size: 14px;
            color: var(--gray);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .product-price {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary);
            margin: 15px 0;
        }
        
        .add-to-cart {
            width: 100%;
            padding: 10px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            font-size: 16px;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .add-to-cart:hover {
            background-color: var(--secondary);
        }
        
        .no-results {
            text-align: center;
            padding: 40px 20px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            font-size: 18px;
        }
        
        .search-term {
            font-weight: 700;
            color: var(--accent);
        }
        
        .badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: var(--accent);
            color: white;
            border-radius: 20px;
            padding: 2px 8px;
            font-size: 14px;
            font-weight: 500;
        }
        
        @media (max-width: 768px) {
            .mahsulotlar {
                grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            }
            
            .nav-links {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2 class="page-title">🔍 Qidiruv natijalari</h2>
            
            <div class="nav-links">
                <a href="index.php" class="nav-link">⬅ Bosh sahifaga qaytish</a>
                <a href="savat.php" class="nav-link">🛒 Savat <span class="badge"><?php echo isset($_SESSION['savat']) ? count($_SESSION['savat']) : 0; ?></span></a>
            </div>
        </div>

        <?php
        if (isset($_GET['qidiruv'])) {
            $qidiruv = $conn->real_escape_string($_GET['qidiruv']);

            $sql = "SELECT * FROM mahsulotlar 
                    WHERE nomi LIKE '%$qidiruv%' 
                    OR sotuvchi LIKE '%$qidiruv%' 
                    OR tip LIKE '%$qidiruv%'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<div class='mahsulotlar'>";
                while($row = $result->fetch_assoc()) {
                    echo "<div class='mahsulot'>";
                    echo "<div class='product-image'>";
                    if ($row['rasm'] && file_exists("images/" . $row['rasm'])) {
                        echo "<img src='images/" . htmlspecialchars($row['rasm']) . "' alt='Mahsulot rasmi'>";
                    } else {
                        echo "<img src='images/no-image.png' alt='Rasm mavjud emas'>";
                    }
                    echo "</div>";
                    echo "<div class='product-details'>";
                    echo "<h3 class='product-title'>" . htmlspecialchars($row['nomi']) . "</h3>";
                    echo "<p class='product-meta'><span>🛒</span> Sotuvchi: " . htmlspecialchars($row['sotuvchi']) . "</p>";
                    echo "<p class='product-meta'><span>📦</span> Tip: " . htmlspecialchars($row['tip']) . "</p>";
                    echo "<p class='product-price'>💰 " . number_format($row['narx'], 0, '.', ' ') . " so'm</p>";
                    echo "<form method='POST' action='savat.php'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' name='add' class='add-to-cart'>🛒 Savatga qo'shish</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                }
                echo "</div>";
            } else {
                echo "<div class='no-results'>";
                echo "😕 Hech qanday mahsulot topilmadi: <span class='search-term'>" . htmlspecialchars($qidiruv) . "</span>";
                echo "</div>";
            }
        } else {
            echo "<div class='no-results'>Qidiruv so'rovi yuborilmadi.</div>";
        }
        ?>
    </div>
</body>
</html>