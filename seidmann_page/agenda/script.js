document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['dayGrid', 'bootstrap'],
        themeSystem: 'bootstrap',
        events: 'events.php',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,dayGridWeek,dayGridDay'
        },
        eventClick: function (info) {
            alert('Event: ' + info.event.title);
        },
        editable: false,
        eventLimit: true
    });

    calendar.render();
});
