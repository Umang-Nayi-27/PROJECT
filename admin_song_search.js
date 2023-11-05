document.getElementById("admin_search_song").onkeyup = function() {
    var key = document.getElementById("admin_search_song").value;
    console.log(key)

    $.ajax({
        type: "POST",
        url: "search.php",
        data:{search_key:key},
        dataType: "json",
        success: function(response_from_php) {
            if (response_from_php.length > 0) {
                console.log("Data received from PHP:", response_from_php);

                var admin_song_div = $("#admin_songs_div");
                admin_song_div.empty();


                $.each(response_from_php, function(index, song) {
                    var songid = song.id
                    var songFile = song.song_file;
                    var songImage = song.song_image;
                    var songName = song.song_name;
                    var songLyrics = song.song_lyrics;
                    var songartist = song.song_artist;
                    var song_genre = song.song_genre;
                    var song_language = song.song_language;

                    var imgDiv = $("<div></div>")
                    imgDiv.append("<img style='height: 60px; padding: 4px 50px; border-radius: 5px;' src='" + songImage + "' >");



                    var artistname = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                    artistname.append("<h6 style='color: black;font-weight:lighter,'>" + songName + "</h6>")


                    var song_artist = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                    song_artist.append("<h6 style='color: black;font-weight:lighter,'>" + songartist + "</h6>")

                    var song_genre = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                    song_genre.append("<h6 style='color: black;font-weight:lighter,'>" + song.song_genre + "</h6>")

                    var song_language = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                    song_language.append("<h6 style='color: black;font-weight:lighter,'>" + song.song_language + "</h6>")


                    var song_button = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                    song_button.append("<input type='submit' value='Delete' style='border-radius:5px ;margin-right:10px ' onclick='singer_song_delete_click(\" "+songid +" \")'  >")
                    song_button.append("<input type='submit' value='Update' style='border-radius:5px ;margin-right:10px ' >")
                    song_button.append("<input type='submit' value='Play' style='border-radius:5px; margin-right:10px;' onclick='song_open(\"  " + songName + " \" , \" " + songImage + "  \" ,\"" + songFile + "\" ,\" " + songartist + "\");' />");


                    admin_song_div.append(imgDiv)
                    admin_song_div.append(artistname)
                    admin_song_div.append(song_artist)
                    admin_song_div.append(song_genre)
                    admin_song_div.append(song_language)
                    admin_song_div.append(song_button)

                });
            } else {
                console.log("No data received from PHP.");
                var admin_song_div = $("#admin_songs_div");
                admin_song_div.empty();
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            alert("ERROR");
        }
    });
}



