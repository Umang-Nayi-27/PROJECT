function like_music_class(){
$.ajax({
    type: "POST",
    url: "artist_music.php",
    dataType: "json",
    success: function (response_from_php) {
        if (response_from_php.length > 0) {
            console.log("Data received from PHP:", response_from_php);
            var songsearch_main2 = $("#songsearch_main2");
            songsearch_main2.empty(); // Clear previous content

            $.each(response_from_php, function (index, song) {
                var songFile = song.song_file;
                var songImage = song.song_image;
                var songName = song.song_name;
                var songLyrics = song.song_lyrics;
                var songartist = song.song_artist;

                // Create HTML elements for each song using jQuery
                var songDiv = $("<div id='artist_song_div'></div>");
                songDiv.click(function () {
                    singer_song_click(songFile, songImage, songName, songLyrics, songartist);
                    check_like_song(songName)
                });

                var imgDiv = $("<div class='artist_song_div_manage' id='artist_song_div_img'></div>");
                imgDiv.append("<img style='height:100%;border-radius:10px' src='" + songImage + "'>");

                var nameDiv = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>");
                nameDiv.append("<h6 style='color: white;font-weight:lighter'>" + songName + "</h6>");

                var artistDiv = $("<div class='artist_song_div_manage' id='artist_song_div_artistname'></div>");
                artistDiv.append("<h6 style='color: white; font-weight:lighter'>" + songartist + "</h6>");


                // Append the inner divs to the outer div
                songDiv.append(imgDiv);
                songDiv.append(nameDiv);
                songDiv.append(artistDiv);

                
                // Append the entire song container to the songList div
                songsearch_main2.append(songDiv);
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