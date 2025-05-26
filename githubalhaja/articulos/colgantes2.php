<?php require('../layouts/header.php')?>

<link rel="stylesheet" href="../css/coleccionlilit.css" />
<script src="../js/app.js"></script>

<?php require('../layouts/articulos.php')?>


<img src="../img/Stock/COLGANTE CORAZON plata y granate con cadena de acero 1.jpg" alt="Imagen 1"
    class="imagen-carrusel mostrando" />
<img src="../img/Stock/COLGANTE CORAZON plata y granate con cadena de acero 2.jpg" alt="Imagen 2"
    class="imagen-carrusel" />
<img src="../img/Stock/COLGANTE CORAZON plata y granate con cadena de acero 3.jpg" alt="Imagen 3"
    class="imagen-carrusel" />
<img src="../img/Stock/COLGANTE CORAZON plata y granate con cadena de acero 4.jpg" alt="Imagen 4"
    class="imagen-carrusel" />
</div>

<h1>
    COLGANTE CORAZON 
</h1>

<h2>plata y granate con cadena de acero</h2>

<p id="text">
    ❤️ Enciende la llama del amor con nuestro colgante de plata y granate almandino 🔥💖

    <?php require('../layouts/footer.php')?>


    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuToggle = document.querySelector(".menu-toggle");
        const menu = document.querySelector(".menu");

        menuToggle.addEventListener("click", function() {
            menu.classList.toggle("show");
        });
    });

    let indiceImagen = 0;

    function cambiarImagen(direccion) {
        const imagenes = document.querySelectorAll(
            ".contenedor-carrusel .imagen-carrusel"
        );
        indiceImagen += direccion;

        if (indiceImagen < 0) {
            indiceImagen = imagenes.length - 1;
        } else if (indiceImagen >= imagenes.length) {
            indiceImagen = 0;
        }

        imagenes.forEach((imagen, index) => {
            imagen.classList.remove("mostrando");
            if (index === indiceImagen) {
                imagen.classList.add("mostrando");
            }
        });
    }
    </script>
    </body>

    </html>