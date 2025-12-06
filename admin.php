<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $nomi = $conn->real_escape_string($_POST['nomi']);
    $sotuvchi = $conn->real_escape_string($_POST['sotuvchi']);
    $tip = $conn->real_escape_string($_POST['tip']);
    $narx = floatval($_POST['narx']);

   
    $rasm = null;
    if (!empty($_FILES['rasm']['name'])) {
        $rasm_nomi = uniqid() . "-" . basename($_FILES['rasm']['name']);
        $upload_path = "images/" . $rasm_nomi;

        if (move_uploaded_file($_FILES['rasm']['tmp_name'], $upload_path)) {
            $rasm = $rasm_nomi;
        }
    }

   
    $sql = "INSERT INTO mahsulotlar (nomi, sotuvchi, tip, narx, rasm) 
            VALUES ('$nomi', '$sotuvchi', '$tip', $narx, '$rasm')";
    $conn->query($sql);
    
    
    $success_message = "✅ Mahsulot muvaffaqiyatli qo'shildi!";
}


if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM mahsulotlar WHERE id = $id");
    
    // Redirect to avoid resubmission on refresh
    header("Location: admin.php?deleted=true");
    exit;
}
?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Onlayn Do'kon</title>
   <link rel="stylesheet" href="css/style4.css">
</head>
<body>
    <div class="header">
        <div class="container header-content">
            <h2 class="page-title">🔧 Admin Panel – Onlayn Do'kon</h2>
            <a href="index.php" class="back-link">⬅ Bosh sahifa</a>
        </div>
    </div>

    <div class="container">
        <?php if(isset($success_message)): ?>
            <div class="alert alert-success">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>
        
        <?php if(isset($_GET['deleted']) && $_GET['deleted'] == 'true'): ?>
            <div class="alert alert-success">
                ✅ Mahsulot muvaffaqiyatli o'chirildi!
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">➕ Yangi mahsulot qo'shish</h3>
            </div>
            <div class="card-body">
                <form action="admin.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="form-label">Mahsulot nomi</label>
                        <input type="text" name="nomi" class="form-control" placeholder="Mahsulot nomini kiriting" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Sotuvchi</label>
                        <input type="text" name="sotuvchi" class="form-control" placeholder="Sotuvchi nomini kiriting" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Kategoriya/Tip</label>
                        <input type="text" name="tip" class="form-control" placeholder="Mahsulot kategoriyasini kiriting" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Narxi (so'm)</label>
                        <input type="number" step="0.01" name="narx" class="form-control" placeholder="Mahsulot narxini kiriting" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Mahsulot rasmi</label>
                        <input type="file" name="rasm" class="file-upload">
                    </div>
                    
                    <button type="submit" name="add" class="btn btn-primary">Mahsulotni qo'shish</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">📦 Mavjud mahsulotlar</h3>
            </div>
            <div class="card-body">
                <?php
                $result = $conn->query("SELECT * FROM mahsulotlar ORDER BY id DESC");
                if ($result->num_rows > 0) {
                    echo "<ul class='product-list'>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class='product-item'>";
                        
                        echo "<div class='product-image'>";
                        if (!empty($row['rasm']) && file_exists("images/" . $row['rasm'])) {
                            echo "<img src='images/" . htmlspecialchars($row['rasm']) . "' alt='Mahsulot rasmi'>";
                        } else {
                            echo "<img src='images/no-image.png' alt='Rasm mavjud emas'>";
                        }
                        echo "</div>";
                        
                        echo "<div class='product-details'>";
                        echo "<div class='product-name'>" . htmlspecialchars($row['nomi']) . "</div>";
                        echo "<div class='product-meta'>";
                        echo "<span>🛒 Sotuvchi: " . htmlspecialchars($row['sotuvchi']) . "</span>";
                        echo "<span>📦 Tip: " . htmlspecialchars($row['tip']) . "</span>";
                        echo "</div>";
                        echo "<div class='product-price'>" . number_format($row['narx'], 0, '.', ' ') . " so'm</div>";
                        echo "</div>";
                        
                        echo "<div class='product-actions'>";
                        echo "<a href='admin.php?delete=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Mahsulotni o'chirmoqchimisiz?\")'>❌ O'chirish</a>";
                        echo "</div>";
                        
                        echo "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<div class='empty-message'>Mahsulotlar hozircha mavjud emas.</div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>