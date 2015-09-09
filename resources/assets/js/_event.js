$(document).ready(function () {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        lang: 'en',
        header:
            {
                left: 'prev,next,today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            }
        ,

        events: [
            {
                title: 'Event1',
                start: '2015-09-09',
                allDay: true,
                editable: true,
                startEditable: true,
                durationEditable: true
            },
            {
                title: 'Event2',
                start: '2015-09-10'
            }
        ],
        dayClick: function(date, jsEvent, view) {

            //alert('Clicked on: ' + date.format());
            //
            //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
            //
            //alert('Current view: ' + view.name);

            // change the day's background color just for fun
            //$(this).css('background-color', 'red');



        }
    })

});