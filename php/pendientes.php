<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AlhajaJewerly - Pendientes</title>
    <link rel="shortcut icon" type="image/png" href="../img/favicon.png" />
    <!-- Header CSS must be loaded first -->
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/coleccionlilit.css" />
    <script src="../js/app.js"></script>
    <script src="../js/menu.js"></script>
</head>
<body>
<?php require('../layouts/header.php')?>

<link rel="stylesheet" href="../css/coleccionlilit.css" />
<script src="../js/app.js"></script>

<?php
// --- Definición de todos los pendientes ---
$productos = [
    // --- Pendientes de la colección Lilit ---
    [ 'file' => '../articulos/articulo3.php', 'nombre' => 'Pendientes Luna', 'precio' => 40, 'categoria' => 'pendientes', 'img' => '../img/pendientes de plata 925 y piedra luna 55.jpg' ],
    [ 'file' => '../articulos/articulo4.php', 'nombre' => 'Pendientes Cosmos', 'precio' => 70, 'categoria' => 'pendientes', 'img' => '../img/Pendientes de plata, labradorita y aros de acero. Si eres alergicx podemos usar unos aros de titanio (+30€) 44.jpg' ],
    [ 'file' => '../articulos/pendientes1.php', 'nombre' => 'PENDIENTES ISIS', 'precio' => 70, 'categoria' => 'pendientes', 'img' => '../img/IMG_3432.jpg' ],
    // Aquí se pueden añadir más pendientes de otras colecciones
];
?>

<section class="contenedor">
    <div class="contenedor-items">
        <div class="categoria-container" id="pendientes">
            <?php foreach ($productos as $prod) { ?>
                <div class="item">
                    <a href="<?php echo $prod['file']; ?>">
                        <img src="<?php echo $prod['img']; ?>" alt="<?php echo htmlspecialchars($prod['nombre']); ?>" class="img-item">
                    </a>
                    <span class="titulo-item"><?php echo htmlspecialchars($prod['nombre']); ?></span>
                    <span class="precio-item"><?php echo ( $prod['precio'] > 0 ) ? $prod['precio'] . '€' : 'Precio pendiente'; ?></span>
                    <button class="boton-item" data-nombre="<?php echo htmlspecialchars($prod['nombre']); ?>" data-precio="<?php echo $prod['precio']; ?>">Agregar al Carrito</button>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php require('../layouts/carrito.php')?>
</section>

<?php require('../layouts/footer.php')?> 