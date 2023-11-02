

function next_song() {
    // Generate a random number between 1 and 36
    const randomNumber = Math.floor(Math.random() * 36) + 1;
    console.log(randomNumber);

    $.ajax({
        type: "POST",
        url: "next_prev.php",
        data: {
            id: randomNumber
        },
        dataType: "json",

        success: function(response_from_php) {

            $.each(response_from_php, function(index, song) {

                document.getElementById("song").src = song.song_file;
                document.getElementById("pbimg").src = song.song_image;
                document.getElementById("song-name").innerHTML = song.song_name;
                document.getElementById("lyrics_area").innerHTML = song.song_lyrics;
                document.getElementById("playback_singer_name").innerHTML = song.song_artist;

                document.getElementById("song").play();
                document.getElementById("play").innerHTML = '<i class="fa-solid fa-pause"></i>';

                check_like_song(song.song_name);
            });
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log('error ')
        }
    });

}