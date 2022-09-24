<!-- Essential javascripts for application to work-->
<script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
<script src="<?= media(); ?>/js/jquery-ui.min.js"></script>
<script src="<?= media(); ?>/js/popper.min.js"></script>
<script src="<?= media(); ?>/js/bootstrap.min.js"></script>
<script src="<?= media(); ?>/js/main.js"></script>
<link href='<?= media(); ?>/js/plugins/fullcalendar.css' rel='stylesheet' />
<script src='<?= media(); ?>/js/plugins/fullcalendar.js'></script>

<script>
    /**** CALENDARIO */

    var calendar;
    var fechas;
    let fechaSelected;
    document.addEventListener('DOMContentLoaded', function() {
        getFechas();
        var calendarEl = document.getElementById('calendar');
        calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next,today,nuevoHorario',
                center: 'title',
                right: 'timeGridDay,dayGridMonth'
            },
            buttonText: {
                today: 'Hoy',
                day: 'Día',
                week: 'Semana',
                month: 'Mes'
            },
            events: "fecha/verfechas",
            locale: 'es',
            dateClick: function(info) {
                /***ESTA PARTE DETECTA EL CLICK */
                let hoy = new Date();
                let dateClicked = new Date(info.date);
                if (dateClicked.toJSON().substring(0, 10) >= hoy.toJSON().substring(0, 10)) { //ESTE IF REVISA SI ES UNA FECHA PASADA, PARA NO HABILITAR TURNOS EN EL PASADO,
                    //                                                                            SE HACE UN SUBSTRING PARA QUITAR LA HORA, PORQUE SOLO NOS INTERESA LA FECHA ACA
                    if (info.dateStr.length < 11) { // ESTE IF PARA SABER SI SE HIZO CLICK EN LA HORA O EN LA FECHA
                        fechaSelected = info.dateStr;
                        let existeFecha = fechas.find(o => o.start === info.dateStr); //REVISA EN LA LISTA DE FECHAS SI EXISTE LA FECHA EN LA QUE SE HIZO CLICK
                        if (existeFecha) {
                            calendar.changeView('timeGridDay', info.dateStr); //SI EXISTE SE CAMBIA LA VISTA A DIA PARA VER LAS HORAS
                            checkToDisablenuevoHorarioButton();
                        } else {
                            document.getElementById('hiddenIdFechaNueva').value = info.dateStr; //SE ASIGNA LA FECHA A UN CAMPO OCULTO PARA DESPUES REGISTRAR
                            $('#modalFormFechaNueva').modal('show'); //SI NO EXISTE, SE ABRE UNA VENTANA EMERGENTE PARA REGISTRAR UNA NUEVA FECHA
                        }
                    } else {
                        console.log('clic en hora');
                    }
                }
            },
            eventClick: function(info) {
                if (info.event.startStr.length < 11) {
                    calendar.changeView('timeGridDay', info.event.startStr);
                    checkToDisablenuevoHorarioButton()
                    let hoy = new Date();
                    let dateClicked = new Date(info.event.startStr);
                    dateClicked.toJSON().substring(0, 10) >= hoy.toJSON().substring(0, 10) ? deshabilitarnuevoHorarioButton(false) : deshabilitarnuevoHorarioButton(true);
                }
            },
            customButtons: {
                nuevoHorario: {
                    text: 'Nuevo Horario',
                    click: function() {
                        document.getElementById('hiddenIdHorarioNuevo').value = fechaSelected;
                        $('#modalFormHorarioNuevo').modal('show');
                    }
                }
            },
        });
        calendar.render();
        checkToDisablenuevoHorarioButton();
        clickButtonDiaMes();
    });

    $("#formFechaNueva").submit(function(event) {
        event.preventDefault();
        nuevaFecha();
    });

    function nuevaFecha() {
        var datos = $("#formFechaNueva").serialize();
        var tmpFecha = document.getElementById("hiddenIdFechaNueva").value;
        $.ajax({
            type: "post",
            url: "fecha/insertar",
            data: datos,
            success: function(resultado) {
                $('#modalFormFechaNueva').modal('hide');
                calendar.changeView('timeGridDay', fechaSelected);
                checkToDisablenuevoHorarioButton();
                tmpFecha = {
                    color: "#38761d",
                    display: "background",
                    end: tmpFecha,
                    start: tmpFecha
                }
                calendar.addEvent(tmpFecha);
                getFechas();
            }
        });
    }

    function cerrarModalFechaNueva() {
        $('#modalFormFechaNueva').modal('hide');
    }

    function getFechas() {
        $.ajax({
            type: "post",
            url: "fecha/verfechas",
            dataType: "json",
            success: function(resfechas) {
                fechas = resfechas;
            }
        });
    }

    function deshabilitarnuevoHorarioButton(opcion) {
        var buttoncustom = calendar.el.getElementsByClassName("fc-nuevoHorario-button fc-button fc-button-primary");
        buttoncustom[0].disabled = opcion;
    }

    function getCalendarViewType() {
        return calendar.view.type;
    }

    function checkToDisablenuevoHorarioButton() {
        let vistaActual = getCalendarViewType();
        vistaActual == "timeGridDay" ? deshabilitarnuevoHorarioButton(false) : deshabilitarnuevoHorarioButton(true);
    }

    function clickButtonDiaMes() {
        var buttonMes = calendar.el.getElementsByClassName("fc-dayGridMonth-button");
        var todayButton = calendar.el.getElementsByClassName("fc-today-button");
        $(buttonMes[0]).click(function() {
            deshabilitarnuevoHorarioButton(true);
        });

        $(todayButton[0]).click(function() {
            deshabilitarnuevoHorarioButton(false);
        });
    }

    function cerrarModalHorarioNuevo() {
        $('#modalFormHorarioNuevo').modal('hide');
    }

    $("#formHorarioNuevo").submit(function(event) {
        event.preventDefault();
        horarioNuevo();
    });

    function horarioNuevo() {
        var datos = $("#formHorarioNuevo").serialize();
        $.ajax({
            type: "post",
            url: "horario/insertar",
            data: datos,
            success: function(resultado) {
                console.log(resultado);
                /*if (resultado > 0) {
                    $('#modalFormHorarioNuevo').modal('hide');
                } else {
                    alert('Error: ' + resultado);
                }*/
            }
        });
    }
</script>

</body>

</html>