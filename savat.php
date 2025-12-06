<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $id = intval($_POST['id']);
    if (!isset($_SESSION['savat'])) {
        $_SESSION['savat'] = [];
    }
    if (!in_array($id, $_SESSION['savat'])) {
        $_SESSION['savat'][] = $id;
    }
    header("Location: savat.php");
    exit;
}


if (isset($_GET['remove'])) {
    $removeId = intval($_GET['remove']);
    if (($key = array_search($removeId, $_SESSION['savat'])) !== false) {
        unset($_SESSION['savat'][$key]);
    }
    header("Location: savat.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Savat</title>
    <style>
        :root {
            --primary: #ee43bbff;
            --secondary: #c9379dff;
            --accent: #f72585;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --border: #dee2e6;
            --success: #4bb543;
            --danger: #dc3545;
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
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        .header {
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
        
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 30px;
            text-decoration: none;
            color: var(--primary);
            font-weight: 500;
            padding: 10px 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .back-link:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        .cart-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }
        
        .cart-header {
            display: grid;
            grid-template-columns: minmax(100px, 1fr) 3fr 1fr 1fr;
            align-items: center;
            padding: 15px 20px;
            background-color: #f8f9fa;
            border-bottom: 1px solid var(--border);
            font-weight: 600;
        }
        
        .cart-item {
            display: grid;
            grid-template-columns: minmax(100px, 1fr) 3fr 1fr 1fr;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid var(--border);
            transition: background-color 0.3s ease;
        }
        
        .cart-item:hover {
            background-color: #f8f9fa;
        }
        
        .cart-item:last-child {
            border-bottom: none;
        }
        
        .product-image {
            width: 80px;
            height: 80px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            border-radius: 8px;
            border: 1px solid var(--border);
        }
        
        .product-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
        
        .product-info {
            padding-left: 15px;
        }
        
        .product-name {
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--dark);
        }
        
        .product-meta {
            font-size: 14px;
            color: var(--gray);
        }
        
        .product-price {
            font-weight: 600;
            color: var(--primary);
        }
        
        .remove-btn {
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--danger);
            background-color: #ffeeee;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        
        .remove-btn:hover {
            background-color: var(--danger);
            color: white;
        }
        
        .empty-cart {
            text-align: center;
            padding: 60px 20px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            font-size: 18px;
            color: var(--gray);
        }
        
        .cart-summary {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            padding: 25px;
            margin-top: 30px;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid var(--border);
        }
        
        .summary-row:last-child {
            border-bottom: none;
            font-size: 22px;
            font-weight: 700;
            color: var(--primary);
            padding-top: 20px;
        }
        
        .checkout-btn {
            display: block;
            width: 100%;
            padding: 15px;
            margin-top: 20px;
            background-color: var(--success);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        
        .checkout-btn:hover {
            background-color: #903549ff;
        }
        
        @media (max-width: 768px) {
            .cart-header {
                display: none;
            }
            
            .cart-item {
                grid-template-columns: 80px 1fr;
                grid-template-rows: auto auto auto;
                gap: 10px;
                padding: 15px;
            }
            
            .product-image {
                grid-row: span 3;
            }
            
            .product-info {
                grid-column: 2;
                padding-left: 0;
            }
            
            .product-price {
                grid-column: 2;
            }
            
            .remove-btn {
                grid-column: 2;
                justify-self: start;
            }
            
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 class="page-title">🛒 Savatdagi mahsulotlar</h2>
            <a href="index.php" class="back-link">⬅ Do'konga qaytish</a>
        </div>

        <?php
        if (!empty($_SESSION['savat'])) {
            $ids = implode(',', array_map('intval', $_SESSION['savat']));
            $sql = "SELECT * FROM mahsulotlar WHERE id IN ($ids)";
            $result = $conn->query($sql);

            $jami = 0;
            echo "<div class='cart-container'>";
            
            echo "<div class='cart-header'>";
            echo "<div>Rasm</div>";
            echo "<div>Mahsulot</div>";
            echo "<div>Narx</div>";
            echo "<div>Amallar</div>";
            echo "</div>";
            
            while ($row = $result->fetch_assoc()) {
                echo "<div class='cart-item'>";
                
                
                echo "<div class='product-image'>";
                if (!empty($row['rasm']) && file_exists("images/" . $row['rasm'])) {
                    echo "<img src='images/" . htmlspecialchars($row['rasm']) . "' alt='Rasm'>";
                } else {
                    echo "<img src='images/no-image.png' alt='Yo'q'>";
                }
                echo "</div>";
                
                
                echo "<div class='product-info'>";
                echo "<div class='product-name'>" . htmlspecialchars($row['nomi']) . "</div>";
                if(isset($row['sotuvchi'])) {
                    echo "<div class='product-meta'>🛒 Sotuvchi: " . htmlspecialchars($row['sotuvchi']) . "</div>";
                }
                if(isset($row['tip'])) {
                    echo "<div class='product-meta'>📦 Tip: " . htmlspecialchars($row['tip']) . "</div>";
                }
                echo "</div>";
                
                
                echo "<div class='product-price'>" . number_format($row['narx'], 0, '.', ' ') . " so'm</div>";
                
                
                echo "<div>";
                echo "<a href='savat.php?remove=" . $row['id'] . "' class='remove-btn' title='O'chirish'>❌</a>";
                echo "</div>";
                
                echo "</div>";
                $jami += $row['narx'];
            }
            echo "</div>";
            
            
            echo "<div class='cart-summary'>";
            echo "<div class='summary-row'>";
            echo "<div>Mahsulotlar:</div>";
            echo "<div>" . count($_SESSION['savat']) . " ta</div>";
            echo "</div>";
            
            echo "<div class='summary-row'>";
            echo "<div>Jami:</div>";
            echo "<div>" . number_format($jami, 0, '.', ' ') . " so'm</div>";
            echo "</div>";
            
            echo "<a href='#' class='checkout-btn'>✅ Buyurtma berish</a>";
            echo "</div>";
            

        

            
        } else {
            echo "<div class='empty-cart'>";
            echo "🧐 Savat bo'sh. Mahsulotlarni do'kondan tanlab olishingiz mumkin.";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>