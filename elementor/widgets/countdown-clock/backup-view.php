<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>jQuery Countdown Clock Plugin</title>
  <link type="text/css" href="demo.css" rel="stylesheet">
  <link type="text/css" href="../jquery.countdown.css" rel="stylesheet">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="../jquery.countdown.js"></script>
</head>
<body>
  <ul class="countdown_div" data-date_to_followed="07/27/2022 00:00:00">
    <li>
      <span class="digit_content days">
        <span class="digit_content_element">0</span>
        <span class="digit_content_element">0</span>
      </span>
      <p class="days_text">Days</p>
    </li>
    <li>
      <span class="digit_content hours">
        <span class="digit_content_element">0</span>
        <span class="digit_content_element">0</span>
      </span>
      <p class="hours_text">Hours</p>
    </li>
    <li>
      <span class="digit_content minutes">
        <span class="digit_content_element">0</span>
        <span class="digit_content_element">0</span>
      </span>
      <p class="minutes_text">Minutes</p>
    </li>
    <li>
      <span class="digit_content seconds">
        <span class="digit_content_element">0</span>
        <span class="digit_content_element">0</span>
      </span>
      <p class="seconds_text">Seconds</p>
    </li>
  </ul>

  <script class="source" type="text/javascript">
    var now = new Date();
    var day = now.getDate();
    var month = now.getMonth() + 1;
    var year = now.getFullYear() + 1;

    // var date_to_followed = month + '/' + day + '/' + year + ' 07:07:07';
    // date_to_followed = "07/27/2022 00:00:00";
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

  </script>

  <ul id="buttons">
    <li><a href="https://epiksel.github.io/countdown" class="btn download">Download</a></li>
    <li><a href="https://openix.io/en/product/preview?pid=57" class="btn download">OpenCart Extension</a></li>
    <li><a href="https://github.com/epiksel/countdown" class="btn forkme">Fork Me</a></li>
  </ul>
</body>
</html>