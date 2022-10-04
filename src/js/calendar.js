let data = []

document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 'auto',
        contentHeight: 'auto',
        aspectRatio: 2,
        scrollTime: '10:00',

        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },

    });
    
    calendar.render();

    FullCalendar.requestJson('GET', 'http://localhost/process/getSessionsCalendar.php', null, function (data) {
    
    console.log(data);
    data.forEach(element => {
        console.log(element);
        var event = {
            title: element.title,
            start: element.start,
            end: element.end,
        }
        calendar.addEvent(event);
    }
    );

});
});