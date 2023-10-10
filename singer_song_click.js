
function singer_song_click(song, poster, name, lyrics, artist, gerne) {
    document.getElementById("song").src = song;
    document.getElementById("pbimg").src = poster;
    document.getElementById("song-name").innerHTML = name;
    document.getElementById("lyrics_area").innerHTML = lyrics;
    document.getElementById("playback_singer_name").innerHTML = artist;

    document.getElementById("song").play();
    document.getElementById("play").innerHTML = '<i class="fa-solid fa-pause"></i>';

    gsap.from("#lyrics_area", {
        y: 10,
        duration: 1,
        opacity: 0,
        ease: "power2.in"
    })
    gsap.from("#pbimg", {
        duration: 1,
        opacity: 0,
        ease: "power2.in"
    })
    gsap.from("#song-name", {
        y: 5,
        duration: 1,
        opacity: 0,
        ease: "power2.in"
    })
    gsap.from("#playback_singer_name", {
        y: 5,
        duration: 1,
        opacity: 0,
        ease: "power2.in"
    })

    $.ajax({
        type: "POST",
        url: "recc.php",
        data: {
            song_genre: gerne
        },
        dataType: "json",
        success: function(response_from_php) 
        {
            var songdiv_main = $("#songdiv_main");
            songdiv_main.empty(); // Clear previous content



            $.each(response_from_php, function(index, song) {

                var songFile = song.song_file;
                var songImage = song.song_image;
                var songName = song.song_name;
                var songLyrics = song.song_lyrics;
                var songartist = song.song_artist;
                var song_genre = song.song_genre;

                // Create a new div for each song
                var songdiv = $("<div class='artist_song_div' style='height:50px; width:98% ; position:relative ; display:flex ;background-color:black; padding: 5px 5px ; margin-top:10px ; overflow:hidden ; gap:10px; cursor:pointer'></div>");
                songdiv.click(function() {
                    singer_song_click(songFile, songImage, songName, songLyrics, songartist, song_genre);
                });
                songdiv.append("<img style='height:26px,width:100%; border-radius:5px' src='" + songImage + "'>");
                songdiv.append("<span style='color: white;font-weight:lighter'>" + songName + "</span>");

                // Append the new div to the main container inside #suggested_info
                songdiv_main.append(songdiv);
            });
        },
        error: function(xhr, textStatus, errorThrown) 
        {
            console.error("Error: " + errorThrown);
        }
    });
}