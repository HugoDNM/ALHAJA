<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AlhajaJewerly - Colección Lilit</title>
    <link rel="shortcut icon" type="image/png" href="/githubalhaja/img/favicon.png" />
    <link rel="stylesheet" href="/githubalhaja/css/header.css" />
    <link rel="stylesheet" href="/githubalhaja/css/coleccionlilit.css" />
    <script src="/githubalhaja/js/app.js"></script>
    <script src="/githubalhaja/js/menu.js"></script>
</head>
<body>
<?php require('../layouts/header.php')?>

<link rel="stylesheet" href="../css/coleccionlilit.css" />
<script src="../js/app.js"></script>

<?php
// --- Definición de la colección de productos ---
$productos = [
    // --- Anillos ---
    [ 'file' => '../articulos/articulo1.php', 'nombre' => 'Anillo Edén', 'precio' => 25, 'categoria' => 'anillos', 'img' => '../img/Anillo ajustable en plata de ley con grabado de serpiente. Talla ajustable 11-17 aproximadamente 22.jpg' ],
    [ 'file' => '../articulos/articulo2.php', 'nombre' => 'Anillo Pecado', 'precio' => 35, 'categoria' => 'anillos', 'img' => '../img/Anillo doble en plata de ley, con labradorita y piedra luna. Talla ajustable 12-17 aproximadamente 2.HEIC11.jpg' ],
    [ 'file' => '../articulos/anillos1.php', 'nombre' => 'Anillo Charca', 'precio' => 0, 'categoria' => 'anillos', 'img' => '../img/nuevo stock/anillocharca (1).jpg' ],
    // --- Pendientes ---
    [ 'file' => '../articulos/articulo3.php', 'nombre' => 'Pendientes Luna', 'precio' => 40, 'categoria' => 'pendientes', 'img' => '../img/pendientes de plata 925 y piedra luna 55.jpg' ],
    [ 'file' => '../articulos/articulo4.php', 'nombre' => 'Pendientes Cosmos', 'precio' => 70, 'categoria' => 'pendientes', 'img' => '../img/Pendientes de plata, labradorita y aros de acero. Si eres alergicx podemos usar unos aros de titanio (+30€) 44.jpg' ],
    [ 'file' => '../articulos/pendientes1.php', 'nombre' => 'PENDIENTES ISIS', 'precio' => 70, 'categoria' => 'pendientes', 'img' => '../img/IMG_3432.jpg' ],
    // --- Colgantes ---
    [ 'file' => '../articulos/articulo5.php', 'nombre' => 'Colgante Aurora', 'precio' => 30, 'categoria' => 'colgantes', 'img' => '../img/Colgante de plata de ley con piedra luna. Calado de media luna en la parte posterior. Con cordón o con cadena de acero (+5€)_1.jpg' ],
    [ 'file' => '../articulos/articulo6.php', 'nombre' => 'COLGANTE TAROT', 'precio' => 23, 'categoria' => 'colgantes', 'img' => '../img/Stock/COLGANTE TAROT carta de tarot en latón y cadena de acero (precio por unidad) 1.jpg' ],
    [ 'file' => '../articulos/articulo7.php', 'nombre' => 'Colgante Dama del Cielo', 'precio' => 40, 'categoria' => 'colgantes', 'img' => '../img/Colgante de plata 925 y labradorita con detalle grabado. Con cordón o con cadena de acero (+5€) 33.jpg' ],
    [ 'file' => '../articulos/colgantes1.php', 'nombre' => 'Colgante Remanso', 'precio' => 35, 'categoria' => 'colgantes', 'img' => '../img/Stock/COLGANTE UTERO obsidiana dorada y granate 1.jpg' ],
    [ 'file' => '../articulos/colgantes2.php', 'nombre' => 'Colgante Cupido', 'precio' => 40, 'categoria' => 'colgantes', 'img' => '../img/Stock/COLGANTE PERLA perla cultivada natural y plata 1.jpg' ],
    [ 'file' => '../articulos/colgantes3.php', 'nombre' => 'Colgante Cielo', 'precio' => 45, 'categoria' => 'colgantes', 'img' => '../img/Stock/COLGANTE CIANITA plata y cianita, cadena de acero 1.jpg' ],
    [ 'file' => '../articulos/colgantes4.php', 'nombre' => 'Colgante Bruma Azul', 'precio' => 90, 'categoria' => 'colgantes', 'img' => '../img/Stock/COLGANTE OPALO doblete de opalo asutraliano y plata 1.jpg' ],
    [ 'file' => '../articulos/colgantes5.php', 'nombre' => 'Colgante Baiha', 'precio' => 40, 'categoria' => 'colgantes', 'img' => '../img/Stock/COLGANTE PERLA perla cultivada natural y plata 1.jpg' ],
    [ 'file' => '../articulos/colgantes6.php', 'nombre' => 'Colgante Tarot', 'precio' => 23, 'categoria' => 'colgantes', 'img' => '../img/Stock/COLGANTE TAROT carta de tarot en latón y cadena de acero (precio por unidad) 1.jpg' ],
    [ 'file' => '../articulos/colgantes7.php', 'nombre' => 'Colgante Caldero I', 'precio' => 70, 'categoria' => 'colgantes', 'img' => '../img/Stock/COLGANTE UTERO obsidiana dorada y granate 1.jpg' ],
    [ 'file' => '../articulos/colgantes8.php', 'nombre' => 'Colgantes Firmamento', 'precio' => 35, 'categoria' => 'colgantes', 'img' => '../img/Stock/COLLARES OCASO sol en laton con ojo de tigre y luna en plata con amatista (precio por unidad) 1.jpg' ],
    [ 'file' => '../articulos/colgantes9.php', 'nombre' => 'Colgante Caldero II', 'precio' => 65, 'categoria' => 'colgantes', 'img' => '../img/nuevo stock/colgante utero (1).jpg' ],
    [ 'file' => '../articulos/colgantes10.php', 'nombre' => 'Colgante Yoni', 'precio' => 50, 'categoria' => 'colgantes', 'img' => '../img/nuevo stock/amuleto serpiente cosmica (3).jpg' ],
    [ 'file' => '../articulos/colgantes11.php', 'nombre' => 'Colgante Morfeo', 'precio' => 50, 'categoria' => 'colgantes', 'img' => '../img/nuevo stock/colgante espejo (1).jpg' ],
    [ 'file' => '../articulos/colgantes12.php', 'nombre' => 'Colgante Ciclos', 'precio' => 70, 'categoria' => 'colgantes', 'img' => '../img/nuevo stock/Colgante fases lunares (2).jpg' ],
    [ 'file' => '../articulos/colgantes13.php', 'nombre' => 'Colgante Galaxia', 'precio' => 80, 'categoria' => 'colgantes', 'img' => '../img/nuevo stock/gargantilla galaxia (1).jpg' ],
];
?>

<section class="contenedor">
    <div class="contenedor-items">
        <div class="categoria-container">
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

</body>

</html>