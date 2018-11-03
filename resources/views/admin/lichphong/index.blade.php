@extends('layouts._share.admin')
@section('title',"Thống kê khách")
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
<h2>Thống kê số lượng khách đặt và đến ngày hết hạn</h2>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Chú thích</h4>
					</div>
					<div class="card-body">
						<!-- the events -->
						<div id="external-events">
							<div class="external-event bg-warning">Số khách đặt</div>
							<div class="external-event bg-danger">Số khách hết hạn đặt</div>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /. box -->
			</div>
			<!-- /.col -->
			<div class="col-md-9">
				<div class="card card-primary">
					<div class="card-body p-0">
						<!-- THE CALENDAR -->
						<div id="calendar"></div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /. box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
	$(function () {

    /* initialize the external events
    -----------------------------------------------------------------*/
    function ini_events(ele) {
    	ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
      }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
        	zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
      })

  })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
    -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)

    $('#calendar').fullCalendar({
    	header    : {
    		left  : 'prev,next today',
    		center: 'title',
    		right :''
    	},
    	buttonText: {
    		today: 'Hôm nay',
    		month: 'Tháng',
    		week : 'Tuần',
    		day  : 'Ngày'
    	},
      //Random default events
      events    :
      [
      @foreach($khachdats as $item)
      {
      	title          : '{{$item->sl_dat}} khách',
      	start          : new Date(<?php echo \Carbon\Carbon::parse($item->NgayDat)->format('Y'); ?>, <?php echo \Carbon\Carbon::parse($item->NgayDat)->format('m-1'); ?>, <?php echo \Carbon\Carbon::parse($item->NgayDat)->format('d'); ?>),
          backgroundColor: '#ffc107 ', //red
          borderColor    : '#ffc107 ' //red,
      },
      @endforeach
      @foreach($khachhethans as $item)
      {
      	title          : '{{$item->sl}} khách',
      	start          : new Date(<?php echo \Carbon\Carbon::parse($item->NgayDi)->format('Y'); ?>, <?php echo \Carbon\Carbon::parse($item->NgayDi)->format('m-1'); ?>, <?php echo \Carbon\Carbon::parse($item->NgayDi)->format('d'); ?>),
          backgroundColor: '#dc3545 ', //red
          borderColor    : '#dc3545 ' //red,
      },
      @endforeach

      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

      	// retrieve the dropped element's stored Event Object
      	var originalEventObject = $(this).data('eventObject')

      	// we need to copy it, so that multiple events don't have a reference to the same object
      	var copiedEventObject = $.extend({}, originalEventObject)

      	// assign it the date that was reported
      	copiedEventObject.start           = date
      	copiedEventObject.allDay          = allDay
      	copiedEventObject.backgroundColor = $(this).css('background-color')
      	copiedEventObject.borderColor     = $(this).css('border-color')

      	// render the event on the calendar
      	// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
      	$('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

      	// is the "remove after drop" checkbox checked?
      	if ($('#drop-remove').is(':checked')) {
      		// if so, remove the element from the "Draggable Events" list
      		$(this).remove()
      }

  }
})

      	/* ADDING EVENTS */
      var currColor = '#3c8dbc' //Red by default
      //Color chooser button
      var colorChooser = $('#color-chooser-btn')
      $('#color-chooser > li > a').click(function (e) {
      	e.preventDefault()
      	//Save color
      	currColor = $(this).css('color')
      	//Add color effect to button
      	$('#add-new-event').css({
      		'background-color': currColor,
      		'border-color'    : currColor
      	})
      })
      $('#add-new-event').click(function (e) {
      	e.preventDefault()
      	//Get value and make sure it is not null
      	var val = $('#new-event').val()
      	if (val.length == 0) {
      		return
      	}

      	//Create events
      	var event = $('<div />')
      	event.css({
      		'background-color': currColor,
      		'border-color'    : currColor,
      		'color'           : '#fff'
      	}).addClass('external-event')
      	event.html(val)
      	$('#external-events').prepend(event)

      	//Add draggable funtionality
      	ini_events(event)

      	//Remove event from text input
      	$('#new-event').val('')
      })
      })

      $(".fc-time").css("display", "none");
  </script>


  @endsection