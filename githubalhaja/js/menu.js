document.addEventListener("DOMContentLoaded", () => {
    const menuToggle = document.querySelector("header .menu-toggle");
    const menu = document.querySelector("header nav .menu");
    const submenuButtons = document.querySelectorAll("header .submenu-button");
    
    if (menu) menu.classList.remove("show");
    
    const toggleMenu = (e) => {
        if (e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        if (!menu) return;
        
        menu.classList.toggle("show");
        
        const imagengrande = document.querySelector(".imagengrande");
        const contenedor = document.querySelector(".contenedor");
        
        if (imagengrande) imagengrande.classList.toggle("show");
        if (contenedor) contenedor.classList.toggle("show");
        
        if (!menu.classList.contains("show")) {
            document.querySelectorAll(".submenu").forEach(submenu => {
                submenu.classList.remove("active");
            });
        }
    };

    if (menuToggle) menuToggle.addEventListener("click", toggleMenu);

    if (submenuButtons.length) {
        submenuButtons.forEach(button => {
            button.addEventListener("click", function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const submenu = this.closest(".submenu");
                if (!submenu) return;
                
                if (window.innerWidth <= 768) {
                    document.querySelectorAll(".submenu.active").forEach(activeSubmenu => {
                        if (activeSubmenu !== submenu) {
                            activeSubmenu.classList.remove("active");
                        }
                    });
                    
                    submenu.classList.toggle("active");
                }
            });
        });
    }

    document.addEventListener("click", (e) => {
        if (window.innerWidth <= 768) {
            const isClickInsideMenu = menu && menu.contains(e.target);
            const isClickOnToggle = menuToggle && menuToggle.contains(e.target);
            const isClickOnSubmenuButton = e.target.classList.contains("submenu-button");
            
            if (!isClickInsideMenu && !isClickOnToggle && !isClickOnSubmenuButton && menu?.classList.contains("show")) {
                menu.classList.remove("show");
                
                const imagengrande = document.querySelector(".imagengrande");
                const contenedor = document.querySelector(".contenedor");
                
                if (imagengrande) imagengrande.classList.remove("show");
                if (contenedor) contenedor.classList.remove("show");
                
                document.querySelectorAll(".submenu").forEach(submenu => {
                    submenu.classList.remove("active");
                });
            }
        }
    });

    window.addEventListener("resize", () => {
        if (window.innerWidth > 768) {
            if (menu) menu.classList.remove("show");
            
            const imagengrande = document.querySelector(".imagengrande");
            const contenedor = document.querySelector(".contenedor");
            
            if (imagengrande) imagengrande.classList.remove("show");
            if (contenedor) contenedor.classList.remove("show");
            
            document.querySelectorAll(".submenu").forEach(submenu => {
                submenu.classList.remove("active");
            });
        }
    });
}); 