/** CODIGO JAVASCRIPT */

(function () {
    "use strict";
    document.addEventListener('DOMContentLoaded', function () {


        /**Mapa */
        var mapa = document.querySelector('#mapa');//si no se hace deja de funcionar el registro
        if (mapa) {
            var map = L.map('mapa').setView([4.334857, -74.366117], 17);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([4.334857, -74.366117]).addTo(map)
                .bindPopup('Vive Travel Tours 2019 <br> Viajamos con tus sueños')
                .openPopup()
                .bindTooltip('vivetraveltour@gmail.com')
                .openTooltip();
        }


        //Campos Datos Usuario
        //var nombre = document.getElementById('nombre');
        // var apellido = document.getElementById('apellido');
        // var email = document.getElementById('email');

        //Botones y Divs
        var errorDiv = document.getElementById('error');
        //var registrar = document.getElementById('registrar');
        // var botonRegistro = document.getElementById('btnRegistro');




        /* if (document.getElementById('btnRegistro')) {
             botonRegistro.addEventListener('click', validarVacios);
             botonRegistro.addEventListener('click', botonRegistro);
      
             nombre.addEventListener('blur', validarCampos);
             apellido.addEventListener('blur', validarCampos);
             email.addEventListener('blur', validarCampos);
             email.addEventListener('blur', validarEmail);
 
       
 
             function validarCampos() {
                 if (this.value == '') {
                     //alert("Este campo es Obligatorio");
                     errorDiv.style.display = 'block';
                     errorDiv.innerHTML = "Este campo es Obligatorio";
                     this.style.border = '1px solid red';
                     errorDiv.style.border = '1px solid red';
                 } else {
                     errorDiv.style.display = 'none';
                     this.style.border = '1px solid #cccccc';
                 }
             }/** Funcion validarCampos*/
        /* function validarEmail() {
             if (this.value.indexOf("@") > -1) {
                 errorDiv.style.display = 'none';
                 this.style.border = '1px solid #cccccc';
             } else {
                 //alert("Este campo debe tener @");
                 errorDiv.style.display = 'block';
                 errorDiv.innerHTML = "Este campo debe tener @";
                 this.style.border = '1px solid red';
                 errorDiv.style.border = '1px solid red';
             }
         }

         function validarVacios() {
             if (nombre.value === '' || apellido.value === '' || email.value === '') {
                 alert("Debes llenar todos los campos");
                 nombre.focus();
             }
         }
   
     }*/
    });//DOM CONTENT LOADED
})();

/** CODIGO JQUERY */

$(function () {

    //Lettering
    $('.nombre-sitio').lettering();

    //Agregar Clase a Menu para saber en que pagina estamos
    $('body.servicios .navegacion-principal a:contains("Servicios")').addClass('activo');
    $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
    $('body.galeria .navegacion-principal a:contains("Galería")').addClass('activo');
    $('body.nosotros .navegacion-principal a:contains("Nosotros")').addClass('activo');

    //Menú Fijo

    var windowHeight = $(window).height();
    var barraAltura = $('.barra').innerHeight();

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll > windowHeight) {
            $('.barra').addClass('fixed');
            $('body').css({ 'margin-top': barraAltura + 'px' });
        } else {
            $('.barra').removeClass('fixed');
            $('body').css({ 'margin-top': '0px' });
        }
    });


    //Menú Responsive
    $('.menu-movil').on('click', function () {
        $('.navegacion-principal').slideToggle();
    });


    //Programa de Eventos
    $('.programa-evento .info-curso:first').show();
    $('.menu-programa a:first').addClass('activo');
    $('.menu-programa a').on('click', function () {
        $('.menu-programa a').removeClass('activo');
        $(this).addClass('activo');
        $('.ocultar').hide();
        var enlace = $(this).attr('href');
        $(enlace).fadeIn(1000);
        return false;
    });

    // Animaciones para los numeros Opcion 2
    var resumenLista = jQuery('.resumen-evento');
    $('.resumen-evento li p').append('0');
    if (resumenLista.length > 0) {
        $('.resumen-evento').waypoint(function () {
            $('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6 }, 1200);
            $('.resumen-evento li:nth-child(2) p').animateNumber({ number: 15 }, 1200);
            $('.resumen-evento li:nth-child(3) p').animateNumber({ number: 3 }, 1500);
            $('.resumen-evento li:nth-child(4) p').animateNumber({ number: 9 }, 1500);
        }, {
                offset: '60%'
            });
    }

    //Animacion para Cuenta Regresiva
    $('.cuenta-regresiva').countdown('2019/07/26 07:00:00', function (event) {
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
    });

    // ColorBox

    var test = jQuery('.empleado-info');
    if (test.length > 0) {
        $('.empleado-info').colorbox({ inline: true, width: "50%" });
    }

    $('.boton_newsletter').colorbox({ inline: true, width: "50%" });
});


/** CODIGO PARA REGISTRADOS */
const formularioRegistrados = document.querySelector('#registrado');

eventListeners();

function eventListeners() {
    // Cuando el formulario de crear o editar se ejecuta
    formularioRegistrados.addEventListener('submit', leerFormulario);
}

function leerFormulario(e) {
    e.preventDefault();

    //leer los datos de los inputs
    const nombre = document.querySelector('#nombre_registrado').value,
        apellido = document.querySelector('#apellido_registrado').value,
        email = document.querySelector('#email_registrado').value,
        accion = document.querySelector('#accion').value;
        fecha = document.querySelector('#fecha_registro').value;
    if (nombre === '' || apellido === '' || email === '') {
        //2 parametros: texto y clase
        mostrarNotificacion('Todos los campos son obligatorios', 'error');
    } else {
        // Pasa la validación, crear llamado a Ajax
        const infoRegistrado = new FormData();
        infoRegistrado.append('nombre_registrado', nombre);
        infoRegistrado.append('apellido_registrado', apellido);
        infoRegistrado.append('email_registrado', email);
        infoRegistrado.append('fecha_registro', fecha);
        infoRegistrado.append('accion', accion);

        //console.log(...infoRegistrado);

        if (accion === 'crear') {
            //Crearemos un nuevo Registrado
            insertarBD(infoRegistrado);
        } else {
            //Editar el Registrado
            //Leer el id
            const idRegistro = document.querySelector('#id_registrado').value;
            infoRegistrado.append('id_registrado', idRegistro);
            actualizarRegistro(infoRegistrado);
        }
    }
}

/** Inserta en la BD via Ajax */
function insertarBD(datos) {
    //Llamado a Ajax

    //Crear el Objeto
    const xhr = new XMLHttpRequest();

    //Abrir la conexion
    xhr.open('POST', 'includes/modelos/modelo-registro.php', true);

    // Pasar los datos
    xhr.onload = function () {
        if (this.status === 200) {
            console.log(JSON.parse(xhr.responseText));
            // Leemos la respuesta de PHP
            const respuesta = JSON.parse(xhr.responseText);

                        //Resetear el formulario
            document.querySelector('form').reset();

            //Mostrar la Notificacion
            mostrarNotificacion('Registro Creado Correctamente', 'correcto');


        }
    }
    // Enviar los Datos
    xhr.send(datos)

    //Leer los errores
}



//Notificación en Pantalla
function mostrarNotificacion(mensaje, clase) {
    const notificacion = document.createElement('div');
    notificacion.classList.add(clase, 'notificacion', 'sombra');
    notificacion.textContent = mensaje;

    //formulario
    formularioRegistrados.insertBefore(notificacion, document.querySelector('form legend'));

    //Ocultar y mostrar la notificación
    setTimeout(() => {
        notificacion.classList.add('visible');
        setTimeout(() => {
            notificacion.classList.remove('visible');
            setTimeout(() => {
                notificacion.remove();
            }, 500);
        }, 3000);
    }, 100);
}

