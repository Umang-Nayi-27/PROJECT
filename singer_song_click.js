function singer_song_click(song, poster, name, lyrics) {
    document.getElementById("song").src = song;
    document.getElementById("pbimg").src = poster;
    document.getElementById("song-name").innerHTML = name;
    document.getElementById("lyrics_area").innerHTML=lyrics;
    document.getElementById("song").play();         
    document.getElementById("play").innerHTML = '<i class="fa-solid fa-pause"></i>';   

}