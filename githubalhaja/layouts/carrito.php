 <!-- Carrito de Compras -->




 <div class="carrito" id="carrito">
            <div class="header-carrito">
                <h2>Tu Cesta</h2>
            </div>

            <div class="carrito-items">
                <!-- 
                <div class="carrito-item">
                    <img src="img/boxengasse.png" width="80px" alt="">
                    <div class="carrito-item-detalles">
                        <span class="carrito-item-titulo">Box Engasse</span>
                        <div class="selector-cantidad">
                            <i class="fa-solid fa-minus restar-cantidad">-</i>
                            <input type="text" value="1" class="carrito-item-cantidad" disabled>
                            <i class="fa-solid fa-plus sumar-cantidad">+</i>
                        </div>
                        <span class="carrito-item-precio">€15.000,00</span>
                    </div>
                   <span class="btn-eliminar">
                        <i class="fa-solid fa-trash">X</i>
                   </span>
                </div>
                <div class="carrito-item">
                    <img src="img/skinglam.png" width="80px" alt="">
                    <div class="carrito-item-detalles">
                        <span class="carrito-item-titulo">Skin Glam</span>
                        <div class="selector-cantidad">
                            <i class="fa-solid fa-minus restar-cantidad">-</i>
                            <input type="text" value="3" class="carrito-item-cantidad" disabled>
                            <i class="fa-solid fa-plus sumar-cantidad">+</i>
                        </div>
                        <span class="carrito-item-precio">€18.000,00</span>
                    </div>
                   <button class="btn-eliminar">
                        <i class="fa-solid fa-trash">X</i>
                   </button>
                </div>
                 -->
            </div>
            <div class="carrito-total">
                <div class="fila">
                    <strong>Total</strong>
                    <span class="carrito-precio-total">
                    0.000,00€
                    </span>
                </div>

                <!-- Formulario para completar información de pedido -->
<form id="formulario-pedido" action="send_email.php" method="post">
    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" placeholder="Ingrese su correo electrónico" class="email" required>
    <input type="hidden" name="titulos" id="titulosInput">
    <input type="hidden" name="cantidades" id="cantidadesInput">
    <button type="submit" class="btn-pagar">Enviar pedido<i class="fa-solid fa-bag-shopping"></i> </button>
</form>

        <br>


                
            </div>
        </div>