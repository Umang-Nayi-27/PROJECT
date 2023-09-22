var profile = document.getElementById("prof");
var nav = document.getElementById("nav");
var close = document.getElementById("close");
var song_player = document.getElementById("song_player");
var singer_area = document.getElementById("singer_area");
var mainhome = document.getElementById("mainhome");
var suggested_info = document.getElementById("suggested_info");
var aboutus = document.getElementById("aboutus");
var ftr = document.getElementById("ftr");
var profupd = document.getElementById("profupd");
var profchng = document.getElementById("profchng");

var search = document.getElementById("search");
var songs = document.getElementById("songs");

document.getElementById("name").addEventListener("click", function() {
    profile.style.display = "block";
    nav.style.filter = "blur(10px)";
    song_player.style.filter = "blur(10px)";
    singer_area.style.filter = "blur(10px)";
    mainhome.style.filter = "blur(10px)";
    suggested_info.style.filter = "blur(10px)";
    aboutus.style.filter ="blur(10px)";
    ftr.style.filter = "blur(10px)";
    document.getElementById("uploadsong").style.filter = "blur(10px)";
});

document.getElementById("close").addEventListener("click", function(event) {
    event.preventDefault();
    profile.style.display = "none";
    profupd.style.display = "none";
    nav.style.filter = "blur(0px)";
    song_player.style.filter = "blur(0px)";
    singer_area.style.filter = "blur(0px)";
    mainhome.style.filter = "blur(0px)";
    suggested_info.style.filter = "blur(0px)";
    aboutus.style.filter = "blur(0px)";
    ftr.style.filter = "blur(0px)";
});
// ---------------------------------------------------------------------------------------------------------------------------


document.getElementById("upd").addEventListener("click", function(event) {
event.preventDefault();

profchng.style.display = "none";
profupd.style.display = "block";
});

document.getElementById("chng").addEventListener("click", function(event) {
event.preventDefault();
profupd.style.display = "none";
profchng.style.display = "block";
});
// ---------------------------------------------------------------------------------------------- close click
document.getElementById("closeupd").addEventListener("click", function(event) {
event.preventDefault();
profupd.style.display = "none";
});

document.getElementById("closechng").addEventListener("click", function(event) {
event.preventDefault();
profchng.style.display = "none";
});

document.getElementById("close").addEventListener("click", function(event) {
event.preventDefault();
profupd.style.display = "none";
profchng.style.display = "none";
});
