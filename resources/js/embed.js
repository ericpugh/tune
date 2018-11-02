
var timer = new Timer();
var $clock = $('#clock');
// A demo "seconds" clock.
timer.start();
timer.addEventListener('secondsUpdated', function (e) {
    $clock.html(timer.getTimeValues().toString());
});

// Calculate the last time the media was updated.
var d = Date.now();
var loaded = d.getTime()/1000;
console.log('Loaded');
console.log(loaded);

var updated = $clock.attr('data-updated');
console.log('Updated at');
console.log(updated);

var ago = Math.floor((loaded - updated)/1000);
console.log('Ago');
console.log(ago);



