document.addEventListener('DOMContentLoaded',function(){
    EventListeners();
    darkMode();
});

function EventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', NavegacionResponsive)

    //Muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]')
    
    metodoContacto.forEach(input => input.addEventListener('click',MostrarMetodosContacto))
};

function NavegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');

    /*
    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar');
    }else{
        navegacion.classList.add('mostrar');
    }
    */

    navegacion.classList.toggle('mostrar');
}

function darkMode(){
    const prefiereDarkMode = window.matchMedia('(prefers-color-schema: dark)');

    // console.log(prefiereDarkMode.matches);

    if(prefiereDarkMode.matches){
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode'); 
        
    }

    prefiereDarkMode.addEventListener('change', function() {
        if(prefiereDarkMode.matches){
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode'); 
            
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click',() =>{
        document.body.classList.toggle('dark-mode')
    });
}

function MostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');
    if(e.target.value === 'telefono'){
        contactoDiv.innerHTML = `
                <label for="telefono">Numero de télefono</label>
                <input id="telefono" type="tel" placeholder="Tu telefono" name="contacto[telefono]">

                
                <p>Elija la fecha y la hora para la llamada</p>
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="contacto[fecha]">

                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="9:00" max="18:00" name="contacto[hora]">
        `;
    }else{
        contactoDiv.innerHTML = `
            <label for="email">E-mail</label>
            <input id="email" type="email" placeholder="Tu email" name="contacto[email]">
        `
    }
    
}