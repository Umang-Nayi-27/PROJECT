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

play.addEventListener("click", function () {
    if (song.paused) {
        song.play();
        play.innerHTML = '<i class="fa-solid fa-pause"></i>';
    } else {
        song.pause();
        play.innerHTML = '<i class="fa-solid fa-play"></i>';
    }
});

song.addEventListener("timeupdate", function () {
    range.value = song.currentTime;
    range.max = song.duration;
    if(song.currentTime == song.duration){
        play.innerHTML = '<i class="fa-solid fa-play"></i>';
    }
});

range.addEventListener("input", function () {
    song.currentTime = range.value;
});
