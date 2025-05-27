<?php
// Determinar la ruta base según la ubicación del archivo
$is_in_php_folder = strpos($_SERVER['PHP_SELF'], '/php/') !== false;
$is_in_articulos_folder = strpos($_SERVER['PHP_SELF'], '/articulos/') !== false;
$base_path = $is_in_php_folder || $is_in_articulos_folder ? '../' : '';
?>
<link rel="stylesheet" href="<?php echo $base_path; ?>css/header.css" />
<!-- Header component -->
<header>
    <div class="menu-container">
        <button class="menu-toggle" aria-label="Toggle menu">&#9776;</button>
    </div>
    <div>
        <nav>
            <ul class="menu">
                <li><a href="<?php echo $base_path; ?>index.php">Inicio</a></li>
                <li class="submenu">
                    <button class="submenu-button">Tienda</button>
                    <div class="submenu-content">
                        <a href="<?php echo $base_path; ?>php/coleccionlilit.php">Colección Lilit</a>
                        <a href="<?php echo $base_path; ?>php/anillos.php">Anillos</a>
                        <a href="<?php echo $base_path; ?>php/pendientes.php">Pendientes</a>
                        <a href="<?php echo $base_path; ?>php/colgantes.php">Colgantes</a>
                        <a href="<?php echo $base_path; ?>php/materiales.php">Materiales</a>
                    </div>
                </li>
                <li>
                    <a href="<?php echo $base_path; ?>php/sobrenosotros.php">Sobre mi</a>
                </li>
            </ul>
        </nav>
        <div>
            <a href="<?php echo $base_path; ?>index.php"><img src="<?php echo $base_path; ?>img/unnamed.png" alt="Logo" /></a>
        </div>
    </div>
</header>
<script src="<?php echo $base_path; ?>js/menu.js"></script>