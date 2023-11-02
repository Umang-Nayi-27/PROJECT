document.addEventListener("DOMContentLoaded", function () {


    
    var fullnameInput = document.getElementById("fullname");
    var updateProfileBtn = document.getElementById("updpr");

    updateProfileBtn.addEventListener("click", function () {
        var fullname = fullnameInput.value;

        // step 1 : create a object of hml html request
        var xhr = new XMLHttpRequest();

        // step 2.1 : declare method and redirect tothe file , async : "true", "post" because on click we send the data
        xhr.open("POST", "update_profile.php", true);

        // step 2.2 : only when we use post(upload data) 
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // step 3: what to do when data fetched --> 
        xhr.onload = function () {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    Swal.fire({
                        title: 'Updated',
                        text: response.message,
                        icon: 'success'
                    });
                    document.getElementById("prfname").innerHTML = fullnameInput.value;
                    dis();

                }
                else {
                    Swal.fire({
                        title: 'error',
                        text: response.message,
                        icon: 'error'
                    });
                    dis();
                }
            }
            else {
                Swal.fire({
                    title: 'error',
                    text: response.message,
                    icon: 'error'
                });
                dis();
            }
        };

        // step 4 : send xml http request ---> "variable_name" ---> fullname banne ma same rakhvanu. aa php ma je banavano che te rakhvano 
        xhr.send("fullname=" + encodeURIComponent(fullname));
    });
});


var profile = document.getElementById("prof");
var nav = document.getElementById("nav");
var close = document.getElementById("close");
var song_player = document.getElementById("song_player");
var lyrics_player = document.getElementById("lyrics_player");
var mainhome = document.getElementById("mainhome");
var suggested_info = document.getElementById("suggested_info");
var aboutus = document.getElementById("aboutus");
var ftr = document.getElementById("ftr");
var profupd = document.getElementById("profupd");
var profchng = document.getElementById("profchng");

var search = document.getElementById("search");
var songs = document.getElementById("songs");

function dis() {
    document.getElementById("profupd").style.display = "none";
    document.getElementById("prof").style.display = "none";

    nav.style.filter = "blur(0px)";
    song_player.style.filter = "blur(0px)";
    lyrics_player.style.filter = "blur(0px)";
    mainhome.style.filter = "blur(0px)";
    suggested_info.style.filter = "blur(0px)";
    aboutus.style.filter = "blur(0px)";
    ftr.style.filter = "blur(0px)";

    document.getElementById("fullname").innerHTML=null;
}
