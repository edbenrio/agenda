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
    let fechaSelected;
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
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
            selectable: true,
            locale: 'es',
            dateClick: function(info) {
                if(info.dateStr.length < 11){
                    fechaSelected = info.dateStr;
                    info.time
                    $.ajax({
                        type: "post",
                        url: "fecha/verfechas",
                        dataType: "json",
                        success: function(fechas) {
                            let existeFecha = fechas.find(o => o.start === info.dateStr);
                            if (existeFecha) {
                                calendar.changeView('timeGridDay', info.dateStr);
                            } else {
                                document.getElementById('hiddenIdFechaNueva').value = info.dateStr;
                                $('#modalFormFechaNueva').modal('show');

                            }

                        }
                    });
                }else{
                    console.log('clic en hora');
                }
            }
        });
        calendar.render();
    });

    $("#formFechaNueva").submit(function(event) {
        event.preventDefault();
        nuevaFecha();
    });

    function nuevaFecha() {
        var datos = $("#formFechaNueva").serialize();
        $.ajax({
            type: "post",
            url: "fecha/insertar",
            data: datos,
            success: function(resultado) {
                $('#modalFormFechaNueva').modal('hide');
                calendar.changeView('timeGridDay', fechaSelected);
            }
        });
    }

    function cerrarModalFechaNueva(){
        $('#modalFormFechaNueva').modal('hide');
    }
</script>

</body>

</html>