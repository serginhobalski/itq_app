<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='{{asset('fullcalendar-4.1.0')}}/packages/core/main.css' rel='stylesheet' />
<link href='{{asset('fullcalendar-4.1.0')}}/packages/daygrid/main.css' rel='stylesheet' />
<link href='{{asset('fullcalendar-4.1.0')}}/packages/list/main.css' rel='stylesheet' />
<link href='{{asset('fullcalendar-4.1.0')}}/packages/timegrid/main.css' rel='stylesheet' />
<script src='{{asset('fullcalendar-4.1.0')}}/packages/core/main.js'></script>
<script src='{{asset('fullcalendar-4.1.0')}}/packages/core/locales/pt-br.js'></script>
<script src='{{asset('fullcalendar-4.1.0')}}/packages/interaction/main.js'></script>
<script src='{{asset('fullcalendar-4.1.0')}}/packages/daygrid/main.js'></script>
<script src='{{asset('fullcalendar-4.1.0')}}/packages/list/main.js'></script>
<script src='{{asset('fullcalendar-4.1.0')}}/packages/moment/main.js'></script>
<script src='{{asset('fullcalendar-4.1.0')}}/packages/timegrid/main.js'></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        plugins: [ 'interaction', 'dayGrid' , 'list', 'moment', 'timeGrid'],
        //   defaultDate: '2019-04-12',
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: '{{route("listar_eventos")}}',
        extraParams: function () {
            return {
                cachebuster: new Date().valueOf()
            };
        }
    });

    calendar.render();
  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</head>
<body>

  <div id='calendar'></div>

</body>
</html>
