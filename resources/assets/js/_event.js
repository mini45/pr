$(document).ready(function () {

    // page is now ready, initialize the calendar...
    var $calender = $('#calendar');
    var addEventModal = $('#addEvent');
    var showEventModal = $('#showEvent');
    //var start;
    //var end;
    var EventDate;


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
        eventClick: function(calEvent, jsEvent, view){
            console.log(calEvent);
            showEventModal.find('.modal-title').html(calEvent.title);
            showEventModal.find('.description').html(calEvent.description);
            showEventModal.modal('toggle');
        },
    });

    function addEvent(date)
    {
        addEventModal.modal('toggle');
        EventDate = date;
    }

    $('#btn-save-event').on('click',function(){
        var title = addEventModal.find('input').val();
        var description = addEventModal.find('textarea').val();
        var arr = {};
        arr['title'] = title;
        arr['description'] =description;
        arr['date'] =EventDate;
        //arr['end'] =description;

        //console.log(JSON.stringify(arr));

        //console.log(title,description);
        $.ajax({
            url: 'makeNewEvent?data='+JSON.stringify(arr),
            error: function() {
                addEventModal.modal('hide');
            },
            success: function(data) {
                $calender.fullCalendar('refetchEvents');
                addEventModal.modal('hide');
            },
            type: 'GET',
        });
    });

});