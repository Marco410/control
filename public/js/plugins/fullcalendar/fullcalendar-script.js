
  $(document).ready(function() {


    /* initialize the external events
    -----------------------------------------------------------------*/
    $('#external-events .fc-event').each(function() {

      // store data so the calendar knows to render an event upon drop
      $(this).data('event', {
        title: $.trim($(this).text()), // use the element's text as the event title
        stick: true, // maintain when user navigates (see docs on the renderEvent method)
        color: '#00bcd4'
      });

      // make the event draggable using jQuery UI
      $(this).draggable({
        zIndex: 999,
        revert: true,      // will cause the event to go back to its
        revertDuration: 0  //  original position after the drag
      });

    });

    var eventos=[];
    $.ajax({
      url:"/admin/get_eventos",
      type:"GET",
      dataType:"JSON",
      async:false
    }).done(function(response){
      eventos = response;
    })
    /* initialize the calendar
    -----------------------------------------------------------------*/
    var fecha = new Date();
    var dd = fecha.getFullYear();
    var mm = fecha.getMonth()+1;
    var yyyy = fecha.getDate();
    $fecha =  dd + "-" + mm + "-" + yyyy;
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      defaultDate: moment(),
      editable: false,
      droppable: false, // this allows things to be dropped onto the calendar
      eventLimit: true, // allow "more" link when too many events
      events: eventos
    });

  });
