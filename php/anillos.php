<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AlhajaJewerly - Anillos</title>
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
// --- Definición de todos los anillos ---
$productos = [
    // --- Anillos de la colección Lilit ---
    [ 'file' => '../articulos/articulo1.php', 'nombre' => 'Anillo Edén', 'precio' => 25, 'categoria' => 'anillos', 'img' => '../img/Anillo ajustable en plata de ley con grabado de serpiente. Talla ajustable 11-17 aproximadamente 22.jpg' ],
    [ 'file' => '../articulos/articulo2.php', 'nombre' => 'Anillo Pecado', 'precio' => 35, 'categoria' => 'anillos', 'img' => '../img/Anillo doble en plata de ley, con labradorita y piedra luna. Talla ajustable 12-17 aproximadamente 2.HEIC11.jpg' ],
    [ 'file' => '../articulos/anillos1.php', 'nombre' => 'Anillo Charca', 'precio' => 0, 'categoria' => 'anillos', 'img' => '../img/nuevo stock/anillocharca (1).jpg' ],
    // Aquí se pueden añadir más anillos de otras colecciones
];
?>

<section class="contenedor">
    <div class="contenedor-items">
        <div class="categoria-container" id="anillos">
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