        
        
function nav_color(name) {
    document.getElementById('nav_Song').style.color = 'black';
    document.getElementById('nav_User').style.color = 'black'
    document.getElementById('nav_Artist').style.color = 'black'
    document.getElementById('nav_Genre').style.color = 'black'
    document.getElementById('nav_Language').style.color = 'black'
    document.getElementById(name).style.color = 'crimson'
}

function z_index(name) {
    document.getElementById('Song').style.zIndex = '1'
    document.getElementById('User').style.zIndex = '1'
    document.getElementById('Artist').style.zIndex = '1'
    document.getElementById('Genre').style.zIndex = '1'
    document.getElementById('Language').style.zIndex = '1'
    document.getElementById('add_user').style.zIndex = '1'
    document.getElementById('add_song').style.zIndex = '1'
    document.getElementById('add_artist').style.zIndex = '1'
    document.getElementById('add_genre').style.zIndex = '1'
    document.getElementById('add_language').style.zIndex = '1'

    document.getElementById(name).style.zIndex = '99'



    if(name=='Song')
    {
        $.ajax({
            type: "POST",
            url: "admin_song.php",
            dataType: "json",
            success: function (response_from_php) {
                if (response_from_php.length > 0) {
                    console.log("Data received from PHP:", response_from_php);
                    
                    var admin_song_div = $("#admin_songs_div");
                    admin_song_div.empty();
        
                    $.each(response_from_php, function (index, song) {
                        var songFile = song.song_file;
                        var songImage = song.song_image;
                        var songName = song.song_name;
                        var songLyrics = song.song_lyrics;
                        var songartist = song.song_artist;
                        var song_genre = song.song_genre;
                        var song_language = song.song_language;

                        var imgDiv =$("<div></div>")
                        imgDiv.append("<img style='height: 60px; padding: 4px 15px; border-radius: 5px;' src='" + songImage + "' >");


                        var audiodiv =$("<audio controls style='width: 250px; height:40px ; padding-top:15px;border-width:5px'></audio>")
                        audiodiv.append("<source src='"+songFile+"' type='audio/mpeg'>")

                        var artistname = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                        artistname.append("<h6 style='color: black;font-weight:lighter,'>"+songName+"</h6>")

                        
                        var song_artist = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                        song_artist.append("<h6 style='color: black;font-weight:lighter,'>"+songartist+"</h6>")
                        
                        var song_genre = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                        song_genre.append("<h6 style='color: black;font-weight:lighter,'>"+song.song_genre+"</h6>")
                        
                        var song_language = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                        song_language.append("<h6 style='color: black;font-weight:lighter,'>"+song.song_language+"</h6>")

                        
                        var song_button = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                        song_button.append("<input type='submit' value='Delete' style='border-radius:5px ;margin-right:10px ' >")
                        song_button.append("<input type='submit' value='update' style='border-radius:5px ;margin-right:10px ' >")
                        
                        admin_song_div.append(imgDiv)
                        admin_song_div.append(audiodiv)
                        admin_song_div.append(artistname)
                        admin_song_div.append(song_artist)
                        admin_song_div.append(song_genre)
                        admin_song_div.append(song_language)
                        admin_song_div.append(song_button)
                    }
                    );
                } else {
                    console.log("No data received from PHP.");
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                alert("ERROR");
            }
        });
    }



    if(name == 'User'){
        $.ajax({
            type: "POST",
            url: "admin_user.php",
            dataType: "json",
            success: function (response_from_php) {
                if (response_from_php.length > 0) {
                    console.log("Data received from PHP:", response_from_php);
                    
                    var admin_user_div = $("#admin_user_div");
                    admin_user_div.empty();
        
                    $.each(response_from_php, function (index, song) {
                        var userimage = song.img;
                        var fullname = song.fname;
                        var username = song.uname;
                        var email = song.email;
                        var password = song.pass;

                        var imgDiv =$("<div></div>")
                        imgDiv.append("<img style='height: 60px; padding: 4px 15px; border-radius: 5px;' src='" + userimage + "' >");

                        var artistname = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                        artistname.append("<h6 style='color: black;font-weight:lighter,'>"+fullname+"</h6>")

                        
                        var song_artist = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                        song_artist.append("<h6 style='color: black;font-weight:lighter,'>"+username+"</h6>")
                        
                        var song_genre = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                        song_genre.append("<h6 style='color: black;font-weight:lighter,'>"+email+"</h6>")
                        
                        var song_language = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                        song_language.append("<h6 style='color: black;font-weight:lighter,'>"+password+"</h6>")

                        
                        var song_button = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                        song_button.append("<input type='submit' value='Delete' style='border-radius:5px ;margin-right:10px ' >")
                        song_button.append("<input type='submit' value='update' style='border-radius:5px ;margin-right:10px ' >")
                        
                        admin_user_div.append(imgDiv)
                        admin_user_div.append(artistname)
                        admin_user_div.append(song_artist)
                        admin_user_div.append(song_genre)
                        admin_user_div.append(song_language)
                        admin_user_div.append(song_button)
                    }
                    );
                } else {
                    console.log("No data received from PHP.");
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                alert("ERROR");
            }
        });
    }


    if(name == 'Artist'){
        $.ajax({
            type: "POST",
            url: "admin_artist.php",
            dataType: "json",
            success: function (response_from_php) {
                if (response_from_php.length > 0) {
                    console.log("Data received from PHP:", response_from_php);
                    
                    var admin_user_div = $("#admin_artist_div ");
                    admin_user_div.empty();
        
                    $.each(response_from_php, function (index, song) {
                        var userimage = song.img;
                        var fullname = song.fname;
                        var username = song.uname;
                        var email = song.email;
                        var password = song.pass;

                        var imgDiv =$("<div></div>")
                        imgDiv.append("<img style='height: 60px; padding: 4px 15px; border-radius: 5px;' src='" + userimage + "' >");

                        var artistname = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                        artistname.append("<h6 style='color: black;font-weight:lighter,'>"+fullname+"</h6>")

                        
                        var song_artist = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                        song_artist.append("<h6 style='color: black;font-weight:lighter,'>"+username+"</h6>")
                        
                        var song_genre = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                        song_genre.append("<h6 style='color: black;font-weight:lighter,'>"+email+"</h6>")
                        
                        var song_language = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                        song_language.append("<h6 style='color: black;font-weight:lighter,'>"+password+"</h6>")

                        
                        var song_button = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                        song_button.append("<input type='submit' value='Delete' style='border-radius:5px ;margin-right:10px ' >")
                        song_button.append("<input type='submit' value='update' style='border-radius:5px ;margin-right:10px ' >")
                        
                        admin_user_div.append(imgDiv)
                        admin_user_div.append(artistname)
                        admin_user_div.append(song_artist)
                        admin_user_div.append(song_genre)
                        admin_user_div.append(song_language)
                        admin_user_div.append(song_button)
                    }
                    );
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