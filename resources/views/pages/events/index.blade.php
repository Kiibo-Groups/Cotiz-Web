@extends('layouts.app')

@section('content')
 
<section class="wrapper bg-light">
  <div class="container py-14 py-md-16">
    <div class="row gx-lg-8 gx-xl-12">
      <div class="col-lg-10 mx-auto">
        <div class="blog classic-view">
          <div id='calendar'></div>
          <!-- /.post -->
        </div>
        <!-- /.blog -->  
      </div> 
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>
<!-- /section -->

@section('js')
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    $.get('api/GetEvents/', function(data) { 
      let eventsDat = [];
      data.data.forEach(element => {  
        eventsDat.push({
          title: element.titulo,
          start: element.fecha,
          end: element.fecha,
          overlap: false,
          display: 'background',
          url: './event/'+element.id
        });
 
        var calendar = new FullCalendar.Calendar(calendarEl, {
          timeZone: 'UTC',
          initialDate: '2023-02-25',
          initialView: 'dayGridMonth',
          events: eventsDat,
          eventClick: function(info) {
          info.jsEvent.preventDefault(); // don't let the browser navigate

          if (info.event.url) {
            window.open(info.event.url);
          }
        }
        });

        calendar.render();
      });
    });
  });

</script>
@endsection

@endsection