var song = document.getElementById("song");

var range = document.getElementById("range");

var previous = document.getElementById("previous");
var play = document.getElementById("play");
var next = document.getElementById("next");


song.onloadedmetadata = function(){
    range.max = song.duration;
    range.value = song.currentTime;
    document.getElementById("song_duration").innerHTML = (song.duration/60).toFixed(2);
}

// Add a click event listener to the play button
play.addEventListener("click", function () {
    // Check if the song is paused
    if (song.paused) {
        // Play the song
        song.play();
        // Change the icon to pause
        play.innerHTML = '<i class="fa-solid fa-pause"></i>';
    } else {
        // Pause the song
        song.pause();
        // Change the icon to play
        play.innerHTML = '<i class="fa-solid fa-play"></i>';
    }
});


if(song.play()){
    setInterval(() => {
        range.value = song.currentTime;
    }, 200);
}