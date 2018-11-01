
var timer = new Timer();
timer.start();
timer.addEventListener('secondsUpdated', function (e) {
    $('#clock').html(timer.getTimeValues().toString());
});
