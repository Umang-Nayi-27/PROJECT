
// ------------------------------------------------------------------------------------------------------------- func main route
var all = document.getElementById("all");
var search = document.getElementById("search");
var hindi = document.getElementById("hindi");
var eng = document.getElementById("eng");
var guj = document.getElementById("guj");
var kpop = document.getElementById("kpop");
var party = document.getElementById("party");
var dance = document.getElementById("dance");
var bollywood = document.getElementById("bollywood");
var romantic = document.getElementById("romantic");
var bhakti = document.getElementById("bhakti");
var lofi = document.getElementById("lofi");
var plist = document.getElementById("plist");
var linked = document.getElementById("linked");
var queue = document.getElementById("queue");





var songfunct = document.querySelector(".songfunct");
var searchfunct = document.querySelector(".searchfunct");
// --------------------------------------------------------------------------------------------------------------------------
var arthin = document.querySelector(".arthin");
var arteng = document.querySelector(".arteng");
var artguj = document.querySelector(".artguj");
var artkpop = document.querySelector(".artkpop");
// ----------------------------------------------------------------------------------------------------------------------
var genresparty = document.querySelector(".genresparty");
var genresdance = document.querySelector(".genresdance");
var genresbollywood = document.querySelector(".genresbollywood");
var genresromantic = document.querySelector(".genresromantic");
var genresbhakti = document.querySelector(".genresbhakti");
var genreslofi = document.querySelector(".genreslofi");
// ---------------------------------------------------------------------------------------------------------------------------
var playlistfunct = document.querySelector(".playlistfunct");
var likedfunct = document.querySelector(".likedfunct");
var your_music_class = document.querySelector(".your_music_class");
var upload_song_class = document.querySelector(".upload_song_class  ");
var artist_section = document.querySelector(".artist_section");
var artist_song_div = document.getElementById("artist_song_div");




function show(class_name) {
    console.log(class_name);

    // Reset the zIndex for all elements
    songfunct.style.zIndex = "1";
    searchfunct.style.zIndex = "1";
    arthin.style.zIndex = "1";
    arteng.style.zIndex = "1";
    artguj.style.zIndex = "1";
    artkpop.style.zIndex = "1";
    genresparty.style.zIndex = "1";
    genresdance.style.zIndex = "1";
    genresromantic.style.zIndex = "1";
    genresbhakti.style.zIndex = "1";
    genreslofi.style.zIndex = "1";
    playlistfunct.style.zIndex = "1";
    likedfunct.style.zIndex = "1";


    your_music_class.style.zIndex = "1";
    upload_song_class.style.zIndex = "1";

    artist_section.style.zIndex = "1";
    var selected_section = document.querySelector('.' + class_name);

    gsap.from(selected_section, {
        x: 20,
        duration: 1,
    });

    selected_section.style.zIndex = "99";

    if (class_name == "likedfunct") {
        like_music_class()        
    }
    if (class_name == "your_music_class") {
        $.ajax({
            type: "POST",
            url: "yoour_music.php",
            dataType: "json",
            success: function (response_from_php) {
                if (response_from_php.length > 0) {
                    console.log("Data received from PHP:", response_from_php);
                    var artist_song_div_your_music = $("#artist_song_div_your_music");
                    artist_song_div_your_music.empty(); // Clear previous content
        
                    $.each(response_from_php, function (index, song) {
                        var songFile = song.song_file;
                        var songImage = song.song_image;
                        var songName = song.song_name;
                        var songLyrics = song.song_lyrics;
                        var songartist = song.song_artist;
        
                        // Create HTML elements for each song using jQuery
                        var songDiv = $("<div id='artist_song_div'></div>");
                       
        
                            var imgDiv = $("<div class='artist_song_div_manage' id='artist_song_div_img'></div>");
                            var imgtag = $("<img style='height:100%;border-radius:10px' src='" + songImage + "'>");
                            imgDiv.click(function () {
                                singer_song_click(songFile, songImage, songName, songLyrics, songartist);
                                check_like_song(songName)
                            });
                            imgDiv.append(imgtag)
        
                        var nameDiv = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>");
                        var songname= $("<h6 style='color: white;font-weight:lighter'>" + songName + "</h6>");
                        nameDiv.click(function () {
                            singer_song_click(songFile, songImage, songName, songLyrics, songartist);
                            check_like_song(songName)
                        });
                        nameDiv.append(songname)
        
                        var artistDiv = $("<div class='artist_song_div_manage' id='artist_song_div_artistname'></div>");
                        var songart = $("<h6 style='color: white; font-weight:lighter'>" + songartist + "</h6>");
                        artistDiv.click(function () {
                            singer_song_click(songFile, songImage, songName, songLyrics, songartist);
                            check_like_song(songName)
                        });
                        artistDiv.append(songart)
                        
                        var deletediv = $("<div class='artist_song_div_manage' id='artist_song_div_artistname'></div>");
                        var deletebtn =$("<input type='submit' value='Delete' style='border-radius:5px ; '  onclick='singer_song_delete_click("+songName +"))'>");

                        deletebtn.click(
                            function(){
                                singer_song_delete_click(songName)   
                            }
                        )
                        deletediv.append(deletebtn)
                        
        
                        // Append the inner divs to the outer div
                        songDiv.append(imgDiv);
                        songDiv.append(nameDiv);
                        songDiv.append(artistDiv);
                        songDiv.append(deletediv)
        
                        // Append the entire song container to the songList div
                        artist_song_div_your_music.append(songDiv);
                    });
                } else {
                    console.log("No data received from PHP.");
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                alert("ERROR");
            }
        });
    }

    


}
