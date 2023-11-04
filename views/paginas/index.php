<main class="contenedor seccion">
        <h1>Más sobre nosotros</h1>
        <?php include 'iconos.php'?>
    </main>

    <section class="secion contenedor">
        <h2>Productos Estrellas</h2>
        <?php   
            include 'listado.php';
        ?>

        <div class="alinear-derecha">
            <a href="/productos" class="boton-verde">Ver Todos los Productos</a>
        </div>
    </section>
    

    <section class="imagen-contacto">
        <h2>Consulta acerca de nuestros servicios de proveedor</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="/contacto" class="boton-amarillo">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Acerca de nuestros procesos de cultivación</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto entrada blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Técnicas de Cultivo</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                        
                        <p>
                        En la agricultura moderna, las técnicas de cultivo avanzadas, como la hidroponía y la agricultura vertical, están transformando la forma en que se cultivan los alimentos. Estas metodologías eficientes optimizan el uso de recursos y espacio, permitiendo un cultivo más sostenible y productivo.
                        </p>
                    </a>
                </div>
            </article>
        </section>
    </div>
