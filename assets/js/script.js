jQuery(document).ready(function($) {
   $('.countdown_div').each(function (index) {
      var date_to_followed = $(this).data('date_to_followed');
      console.log('date_to_followed', date_to_followed)
      $(this).countdown({
        date: date_to_followed, // TODO Date format: 07/27/2017 17:00:00
        offset: +2, // TODO Your Timezone Offset
        day: 'Day',
        days: 'Days',
        hideOnComplete: false
      });
    });
});