// Slider functionality
document.addEventListener("DOMContentLoaded", () => {
    const carrusel = document.getElementById("carrusel");
    if (carrusel) {
        const slides = carrusel.querySelectorAll('.slide');
        const slidesPerView = 3;
        const totalSlides = slides.length;
        let currentIndex = 0;

        // Organizar slides en grupos de 3
        const slideGroups = [];
        for (let i = 0; i < totalSlides; i += slidesPerView) {
            slideGroups.push(Array.from(slides).slice(i, i + slidesPerView));
        }

        // Crear contenedores para cada grupo
        carrusel.innerHTML = '';
        slideGroups.forEach((group, index) => {
            const groupContainer = document.createElement('div');
            groupContainer.className = 'slide-group';
            groupContainer.style.cssText = `
                flex: 0 0 100%;
                display: flex;
                width: 100%;
            `;
            group.forEach(slide => groupContainer.appendChild(slide.cloneNode(true)));
            carrusel.appendChild(groupContainer);
        });

        // Clonar el primer grupo para el efecto infinito
        const firstGroup = carrusel.firstElementChild.cloneNode(true);
        carrusel.appendChild(firstGroup);

        const updateCarrusel = () => {
            carrusel.style.transform = `translateX(-${currentIndex * 100}%)`;
        };

        const moveNext = () => {
            currentIndex++;
            updateCarrusel();

            // Si llegamos al final, volver al principio sin animación
            if (currentIndex >= slideGroups.length) {
                setTimeout(() => {
                    carrusel.style.transition = 'none';
                    currentIndex = 0;
                    updateCarrusel();
                    setTimeout(() => {
                        carrusel.style.transition = `transform ${getComputedStyle(carrusel).transitionDuration}`;
                    }, 50);
                }, 500);
            }
        };

        // Iniciar el carrusel
        setInterval(moveNext, 3000);
    }
});

// Product image carousel
let indiceImagen = 0;
const cambiarImagen = (direccion) => {
    const imagenes = document.querySelectorAll(".contenedor-carrusel .imagen-carrusel");
    if (!imagenes.length) return;
    
    indiceImagen = (indiceImagen + direccion + imagenes.length) % imagenes.length;
    imagenes.forEach((imagen, index) => {
        imagen.classList.toggle("mostrando", index === indiceImagen);
    });
};

// Shopping cart functionality
let carritoVisible = false;
const ready = () => {
    const addEventListeners = (elements, event, handler) => {
        Array.from(elements).forEach(element => element.addEventListener(event, handler));
    };

    addEventListeners(document.getElementsByClassName('btn-eliminar'), 'click', eliminarItemCarrito);
    addEventListeners(document.getElementsByClassName('sumar-cantidad'), 'click', sumarCantidad);
    addEventListeners(document.getElementsByClassName('restar-cantidad'), 'click', restarCantidad);
    addEventListeners(document.getElementsByClassName('boton-item'), 'click', agregarAlCarritoClicked);

    const botonPagar = document.getElementsByClassName('btn-pagar')[0];
    if (botonPagar) botonPagar.addEventListener('click', pagarClicked);
};

document.readyState === 'loading' ? document.addEventListener('DOMContentLoaded', ready) : ready();

const agregarAlCarritoClicked = (event) => {
    const item = event.target.parentElement;
    const titulo = item.getElementsByClassName('titulo-item')[0].innerText;
    const precio = item.getElementsByClassName('precio-item')[0].innerText;
    const imagenSrc = item.getElementsByClassName('img-item')[0].src;
    
    agregarItemAlCarrito(titulo, precio, imagenSrc);
    hacerVisibleCarrito();
};

const actualizarFormulario = () => {
    const carritoItems = document.getElementsByClassName('carrito-item');
    const datos = Array.from(carritoItems).map(item => ({
        titulo: item.getElementsByClassName('carrito-item-titulo')[0].innerText,
        cantidad: item.getElementsByClassName('carrito-item-cantidad')[0].value
    }));
    
    document.getElementById('titulosInput').value = JSON.stringify(datos.map(d => d.titulo));
    document.getElementById('cantidadesInput').value = JSON.stringify(datos.map(d => d.cantidad));
};

const pagarClicked = () => {
    actualizarFormulario();
    alert("Gracias, en breve recibirá un mail indicando el plazo de envío y las formas de pago disponibles.");
    const carritoItems = document.getElementsByClassName('carrito-items')[0];
    carritoItems.innerHTML = '';
    actualizarTotalCarrito();
    ocultarCarrito();
};

const ocultarCarrito = () => {
    const carritoItems = document.getElementsByClassName('carrito-items')[0];
    if (!carritoItems.childElementCount) {
        const carrito = document.getElementsByClassName('carrito')[0];
        carrito.style.marginRight = '0';
        carrito.style.opacity = '0';
        carritoVisible = false;
        document.getElementsByClassName('contenedor-items')[0].style.width = '100%';
    }
};

const actualizarTotalCarrito = () => {
    const carritoItems = document.getElementsByClassName('carrito-item');
    const total = Array.from(carritoItems).reduce((sum, item) => {
        const precio = parseFloat(item.getElementsByClassName('carrito-item-precio')[0].innerText.replace('€','').trim());
        const cantidad = parseInt(item.getElementsByClassName('carrito-item-cantidad')[0].value);
        return sum + (precio * cantidad);
    }, 0);
    
    document.getElementsByClassName('carrito-precio-total')[0].innerText = `€${total.toFixed(2).replace('.', ',')}`;
};

const hacerVisibleCarrito = () => {
    carritoVisible = true;
    const carrito = document.getElementsByClassName('carrito')[0];
    Object.assign(carrito.style, {
        display: 'block',
        opacity: '1',
        visibility: 'visible',
        position: 'relative',
        zIndex: '1000'
    });
};

const agregarItemAlCarrito = (titulo, precio, imagenSrc) => {
    const itemsCarrito = document.getElementsByClassName('carrito-items')[0];
    
    if (Array.from(itemsCarrito.getElementsByClassName('carrito-item-titulo'))
        .some(el => el.innerText === titulo)) {
        alert("El item ya se encuentra en el carrito");
        return;
    }

    const itemCarritoContenido = `
        <div class="carrito-item">
            <img src="${imagenSrc}" width="80px" alt="">
            <div class="carrito-item-detalles">
                <span class="carrito-item-titulo">${titulo}</span>
                <div class="selector-cantidad">
                    <i class="fa-solid fa-minus restar-cantidad">-</i>
                    <input type="text" value="1" class="carrito-item-cantidad" disabled>
                    <i class="fa-solid fa-plus sumar-cantidad">+</i>
                </div>
                <span class="carrito-item-precio">${precio}</span>
            </div>
            <button class="btn-eliminar">
                <i class="fa-solid fa-trash">X</i>
            </button>
        </div>
    `;
    
    itemsCarrito.insertAdjacentHTML('beforeend', itemCarritoContenido);
    
    const nuevoItem = itemsCarrito.lastElementChild;
    nuevoItem.getElementsByClassName('btn-eliminar')[0].addEventListener('click', eliminarItemCarrito);
    nuevoItem.getElementsByClassName('restar-cantidad')[0].addEventListener('click', restarCantidad);
    nuevoItem.getElementsByClassName('sumar-cantidad')[0].addEventListener('click', sumarCantidad);
    
    actualizarTotalCarrito();
};

const sumarCantidad = (event) => {
    const selector = event.target.parentElement;
    const cantidadInput = selector.getElementsByClassName('carrito-item-cantidad')[0];
    cantidadInput.value = parseInt(cantidadInput.value) + 1;
    actualizarTotalCarrito();
};

const restarCantidad = (event) => {
    const selector = event.target.parentElement;
    const cantidadInput = selector.getElementsByClassName('carrito-item-cantidad')[0];
    const nuevaCantidad = parseInt(cantidadInput.value) - 1;
    if (nuevaCantidad >= 1) {
        cantidadInput.value = nuevaCantidad;
        actualizarTotalCarrito();
    }
};

const eliminarItemCarrito = (event) => {
    const buttonClicked = event.target;
    buttonClicked.closest('.carrito-item').remove();
    actualizarTotalCarrito();
    ocultarCarrito();
};

// Filter products by category based on URL anchor
const filterProductsByCategory = () => {
    const urlHash = window.location.hash;
    const categoriaContainers = document.querySelectorAll('.categoria-container');

    // Hide all category containers initially
    categoriaContainers.forEach(container => {
        container.style.display = 'none';
    });

    if (urlHash) {
        // Show the container that matches the hash
        const targetCategoryId = urlHash.substring(1); // Remove the #
        const targetCategoryContainer = document.getElementById(targetCategoryId); // Corrected selection

        if (targetCategoryContainer) {
            targetCategoryContainer.style.display = 'contents'; // Use contents to maintain grid layout
        }
    } else {
        // If no hash, show all categories
        categoriaContainers.forEach(container => {
            container.style.display = 'contents';
        });
    }
};

// Run the filter when the page loads and when the hash changes
window.addEventListener('load', filterProductsByCategory);
window.addEventListener('hashchange', filterProductsByCategory);



