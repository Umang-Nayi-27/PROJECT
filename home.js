var profile = document.getElementById("prof");
var nav = document.getElementById("nav");
var close = document.getElementById("close");
var song_player = document.getElementById("song_player");
var singer_area = document.getElementById("singer_area");
var mainhome = document.getElementById("mainhome");
var suggested_info = document.getElementById("suggested_info")

document.getElementById("name").addEventListener("click", function() {
    event.preventDefault(); // default rite a tag link per redirect thay.... to aa default vastu je automatic thay tene prevent kersse che
    profile.style.display = "block";
    nav.style.filter = "blur(10px)";
    song_player.style.filter="blur(10px)";
    singer_area.style.filter="blur(10px)";
    mainhome.style.filter="blur(10px)";
    suggested_info.style.filter="blur(10px)";
})

document.getElementById("close").addEventListener("click", function() {
    event.preventDefault();
    profile.style.display = "none";
    nav.style.filter = "blur(0px)";
    song_player.style.filter="blur(0px)";
    singer_area.style.filter="blur(0px)";
    mainhome.style.filter="blur(0px)";
    suggested_info.style.filter="blur(0px)";
})

