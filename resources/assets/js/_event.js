$(document).ready(function () {

    // page is now ready, initialize the calendar...
    var $calender = $('#calendar');
    var addEventModal = $('#addEvent');

    $calender.fullCalendar({
        lang: 'en',
        header:
            {
                left: 'prev,next,today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            }
        ,
        events: 'myfeed',
        dayClick: function(date, jsEvent, view) {
            //console.log(date,jsEvent,view);
            addEvent(date);

        },
    });

    function addEvent(date)
    {
        addEventModal.modal('toggle');



        $calender.fullCalendar('refetchEvents');
    }

    $('#btn-save-event').on('click',function(){
        var title = addEventModal.find('input');
        var description = addEventModal.find('textarea');
    });

});