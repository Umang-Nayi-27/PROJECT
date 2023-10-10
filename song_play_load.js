function singer_click(name, path) {
    $(".artist_section").css("zIndex", "99");
    $("#artist_img").attr("src", path);
    $("#artist_click_name").html(name);

    event.preventDefault(); // Prevent the default link behavior
    $.ajax({
        type: "POST",
        url: "get_songs.php", // Replace with your server-side script
        data: {
            artist_name: name
        },
        dataType: "json",
        success: function(response_from_php) {
            var songList = $("#songList");
            songList.empty(); // Clear existing songs

            $.each(response_from_php, function(index, song) {
                var songFile = song.song_file;
                var songImage = song.song_image;
                var songName = song.song_name;
                var songLyrics = song.song_lyrics;
                var songartist = song.song_artist;

                // Create HTML elements for each song using jQuery
                var songDiv = $("<div id='artist_song_div'></div>");
                songDiv.click(function() {
                    singer_song_click(songFile, songImage, songName, songLyrics, songartist);
                });

                var imgDiv = $("<div class='artist_song_div_manage' id='artist_song_div_img'></div>");
                imgDiv.append("<img style='height:100%;border-radius:10px ' src='" + songImage + "'>");

                var nameDiv = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>");
                nameDiv.append("<h6 style='color: white;font-weight:lighter'>" + songName + "</h6>");

                var artistDiv = $("<div class='artist_song_div_manage' id='artist_song_div_artistname'></div>");
                artistDiv.append("<h6 style='color: white; font-weight:lighter'>" + name + "</h6>");

                // Append the inner divs to the outer div
                songDiv.append(imgDiv);
                songDiv.append(nameDiv);
                songDiv.append(artistDiv);

                // Append the entire song container to the songList div
                songList.append(songDiv);
            });
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log("error occur ")
        }
    });

    gsap.from(".artist_section",{ x:20,           
        duration: 1,    })

}