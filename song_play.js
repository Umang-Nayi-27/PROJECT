var song = document.getElementById("song");
var range = document.getElementById("range");
var previous = document.getElementById("previous");
var play = document.getElementById("play");
var next = document.getElementById("next");

song.onloadedmetadata = function () {
    range.max = song.duration;
    range.value = song.currentTime;
    document.getElementById("song_duration").innerHTML = (song.duration / 60).toFixed(2);
}

// Add a click event listener to the play button
play.addEventListener("click", function () {
    if (song.paused) {
        song.play();
        play.innerHTML = '<i class="fa-solid fa-pause"></i>';
    } else {
        song.pause();
        play.innerHTML = '<i class="fa-solid fa-play"></i>';
    }
});

// Add a 'timeupdate' event listener to continuously update the range input
song.addEventListener("timeupdate", function () {
    range.value = song.currentTime;
});

// Add an input event listener to the range input
range.addEventListener("input", function () {
    // Update the song's currentTime based on the range value
    song.currentTime = range.value;
});
