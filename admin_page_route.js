gsap.from("#welc", {
    opacity: 0,
    x: 30,
    duration: 2,
    delay: 0.5
});


gsap.from("#bb", {
    opacity: 0,
    x: -30,
    duration: 2,
    delay: 0.5
});


function dis_add(name) {
    document.getElementById(name).style.display = "block"
    document.getElementById("Song").style.filter = "blur(10px)"
    document.getElementById("nav").style.filter = "blur(10px)"
    document.getElementById('User').style.filter = 'blur(10px)'
    document.getElementById('Artist').style.filter = 'blur(10px)'
    document.getElementById('Genre').style.filter = 'blur(10px)'
    document.getElementById('Language').style.filter = 'blur(10px)'
}

function close_add(name) {
    document.getElementById(name).style.display = "none"
    document.getElementById("Song").style.filter = "blur(0px)"
    document.getElementById("nav").style.filter = "blur(0px)"
    document.getElementById('User').style.filter = 'blur(0px)'
    document.getElementById('Artist').style.filter = 'blur(0px)'
    document.getElementById('Genre').style.filter = 'blur(0px)'
    document.getElementById('Language').style.filter = 'blur(0px)'
}


function song(){    
    $.ajax({
        type: "POST",
        url: "admin_song.php",
        dataType: "json",
        success: function (response_from_php) {

            
            document.getElementById("select_language").value = ""
            document.getElementById("select_genre").value = ""

            if (response_from_php.length > 0) {
                console.log("Data received from PHP:", response_from_php);
                
                var admin_song_div = $("#admin_songs_div");
                admin_song_div.empty();
                
    
                $.each(response_from_php, function (index, song) {
                    var songid = song.id
                    var songFile = song.song_file;
                    var songImage = song.song_image;
                    var songName = song.song_name;
                    var songLyrics = song.song_lyrics;
                    var songartist = song.song_artist;
                    var song_genre = song.song_genre;
                    var song_language = song.song_language;

                    var imgDiv =$("<div></div>")
                    imgDiv.append("<img style='height: 60px; padding: 4px 50px; border-radius: 5px;' src='" + songImage + "' >");



                    var artistname = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                    artistname.append("<h6 style='color: black;font-weight:lighter,'>"+songName+"</h6>")

                    
                    var song_artist = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                    song_artist.append("<h6 style='color: black;font-weight:lighter,'>"+songartist+"</h6>")
                    
                    var song_genre = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                    song_genre.append("<h6 style='color: black;font-weight:lighter,'>"+song.song_genre+"</h6>")
                    
                    var song_language = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                    song_language.append("<h6 style='color: black;font-weight:lighter,'>"+song.song_language+"</h6>")

                    
                    var song_button = $("<div class='artist_song_div_manage' id='artist_song_div_songname'></div>")
                    song_button.append("<input type='submit' value='Delete' style='border-radius:5px ;margin-right:10px ' onclick='singer_song_delete_click(\" "+songid +" \")' >")
                    song_button.append("<input type='submit' value='Update' style='border-radius:5px ;margin-right:10px ' >")
                    song_button.append("<input type='submit' value='Play' style='border-radius:5px; margin-right:10px;' onclick='song_open(\"  " + songName +" \" , \" "+ songImage +"  \" ,\""+ songFile+"\" ,\" "+ songartist +"\");' />");

                    
                    admin_song_div.append(imgDiv)
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
function song_open(name , image, songfile ,artist){
    document.getElementById("admin_song_play").style.display = 'block'

    document.getElementById("Song").style.filter = "blur(10px)"
    
    
    document.getElementById("nav").style.filter = "blur(10px)"
    document.getElementById("s_n").innerHTML = name;
    document.getElementById("i_f").src = image
    document.getElementById("song").src = songfile
    document.getElementById("a_n").innerHTML = artist;

    document.getElementById("song").play()
    
}

function singer_song_delete_click(name) {
    $.ajax({
        type: "POST",
        url: "admin_song_delete.php",
        data: {
            song_name: name
        },
        dataType: "json",
        success: function(response_from_php) {
            if (response_from_php.status === "done") {
                console.log("Done");
                
                Swal.fire({
                title: 'Deleted !',
                text: 'Song Is Deleted Now',
                icon: 'warning'
            });
            song()
            
            } else if (response_from_php.status === "error") {
                console.log("Error: " + response_from_php.message);
                
            } else if (response_from_php.status === "no_data") {
                console.log("No data provided");
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log("Error: " + textStatus); // Log the error status
            console.log(errorThrown); // Log the error message
        }        
    });
}

function admin_song_play_close(){
    document.getElementById("admin_song_play").style.display = 'none'
    document.getElementById("Song").style.filter = "blur(0px)"
    document.getElementById("nav").style.filter = "blur(0px)"
    document.getElementById("song").pause()
}



function user(){
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

function artist(){
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
function genre(){
    $.ajax({
        type: "POST",
        url: "admin_genre.php",
        dataType: "json",
        success: function (response_from_php) {
            if (response_from_php.length > 0) {
                console.log("Data received from PHP:", response_from_php);
                
                var admin_user_div = $("#admin_genre_div ");
                admin_user_div.empty();
    
                $.each(response_from_php, function (index, song) {
                    var genre = song.song_genre_name
                    var id = song.id

                    var artistname = $("<div class='artist_song_div_manage' id='artist_song_div_songname' style='padding:30px 5px'></div>")
                    artistname.append("<h6 style='color: black;font-weight:lighter,'>"+genre+"</h6>")

                    var song_button = $("<div class='artist_song_div_manage' id='artist_song_div_songname' style='padding:30px 5px'></div>")
                    song_button.append("<input type='submit' value='Delete' style='border-radius:5px ;margin-right:10px ' onclick='admin_genre_delete_data(\" "+id+" \")' >")
                    
                    var song_artist = $("<div class='artist_song_div_manage' id='artist_song_div_songname' style='padding:30px 5px'></div>")
                    song_artist.append("<h6 style='color: black;font-weight:lighter,></h6>")
                    
                    var song_genre = $("<div class='artist_song_div_manage' id='artist_song_div_songname' style='padding:30px 5px'></div>")
                    song_genre.append("<h6 style='color: black;font-weight:lighter,'></h6>")
                    
                    var song_language = $("<div class='artist_song_div_manage' id='artist_song_div_songname' style='padding:30px 5px'></div>")
                    song_language.append("<h6 style='color: black;font-weight:lighter,'></h6>")
                    
                    admin_user_div.append(artistname)
                    admin_user_div.append(song_button)
                    admin_user_div.append(song_artist)
                    admin_user_div.append(song_genre)
                    admin_user_div.append(song_language)
                    
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

function add_genre_data(name) {
    var lang = document.getElementById("genre_name").value
    close_add(name)


    $.ajax({
        type: "POST",
        url: "admin_genre_add.php",
        data: {
            lang_name: lang
        },
        dataType: "json",
        success: function(response_from_php) {
            if (response_from_php.status === "done") {
                console.log("Done");

                Swal.fire({
                    title: 'Added !',
                    text: 'New Language Is Addeed Now',
                    icon: 'sucess'
                });
                genre()
            } else if (response_from_php.status === "error") {
                alert("Cant Delete : Songs are Available for this  " + response_from_php.message);

            } else if (response_from_php.status === "no_data") {
                console.log("No data provided");
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log("Error: " + textStatus); // Log the error status
            console.log(errorThrown); // Log the error message
        }
    });
}

function admin_genre_delete_data(name){
    $.ajax({
        type: "POST",
        url: "admin_genre_delete_click.php",
        data: {
            lang_name: name
        },
        dataType: "json",
        success: function(response_from_php) {
            if (response_from_php.status === "done") {
                console.log("Done");

                Swal.fire({
                    title: 'Deleted !',
                    text: 'Genre Is Deleted Now',
                    icon: 'warning'
                });
                genre()

            } else if (response_from_php.status === "error") {
                
            alert("Cant Delete : Songs are Available for this   ")

            } else if (response_from_php.status === "no_data") {
                console.log("No data provided");
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            alert("Cant Delete : Songs are Available for this   ")
        }
    });
}



function language(){
    $.ajax({
        type: "POST",
        url: "admin_language.php",
        dataType: "json",
        success: function (response_from_php) {
            if (response_from_php.length > 0) {
                console.log("Data received from PHP:", response_from_php);
                
                var admin_user_div = $("#admin_language_div ");
                admin_user_div.empty();
    
                $.each(response_from_php, function (index, song) {
                    var lang = song.language
                    var id = song.id
                    

                    var artistname = $("<div class='artist_song_div_manage' id='artist_song_div_songname' style='padding:30px 5px'></div>")
                    artistname.append("<h6 style='color: black;font-weight:lighter,'>"+lang+"</h6>")

                    var song_button = $("<div class='artist_song_div_manage' id='artist_song_div_songname' style='padding:30px 5px'></div>")
                    song_button.append("<input type='submit' value='Delete' style='border-radius:5px ;margin-right:10px '  onclick='admin_lang_delete_click(\" "+ id +" \")'>")
                    
                    var song_artist = $("<div class='artist_song_div_manage' id='artist_song_div_songname' style='padding:30px 5px'></div>")
                    song_artist.append("<h6 style='color: black;font-weight:lighter,></h6>")
                    
                    var song_genre = $("<div class='artist_song_div_manage' id='artist_song_div_songname' style='padding:30px 5px'></div>")
                    song_genre.append("<h6 style='color: black;font-weight:lighter,'></h6>")
                    
                    var song_language = $("<div class='artist_song_div_manage' id='artist_song_div_songname' style='padding:30px 5px'></div>")
                    song_language.append("<h6 style='color: black;font-weight:lighter,'></h6>")
                    
                    admin_user_div.append(artistname)
                    admin_user_div.append(song_button)
                    admin_user_div.append(song_artist)
                    admin_user_div.append(song_genre)
                    admin_user_div.append(song_language)
                    
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

function add_language_data(name) {
    var lang = document.getElementById("lang_name").value
    close_add(name)


    $.ajax({
        type: "POST",
        url: "admin_language_add.php",
        data: {
            lang_name: lang
        },
        dataType: "json",
        success: function(response_from_php) {
            if (response_from_php.status === "done") {
                console.log("Done");

                Swal.fire({
                    title: 'Added !',
                    text: 'New Language Is Addeed Now',
                    icon: 'sucess'
                });
                language()
            } else if (response_from_php.status === "error") {
                alert("Cant Delete : Songs are Available for this  " + response_from_php.message);

            } else if (response_from_php.status === "no_data") {
                console.log("No data provided");
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log("Error: " + textStatus); // Log the error status
            console.log(errorThrown); // Log the error message
        }
    });
}

function admin_lang_delete_click(name) {
    $.ajax({
        type: "POST",
        url: "admin_lang_delete_click.php",
        data: {
            lang_name: name
        },
        dataType: "json",
        success: function(response_from_php) {
            if (response_from_php.status === "done") {
                console.log("Done");

                Swal.fire({
                    title: 'Deleted !',
                    text: 'Language Is Deleted Now',
                    icon: 'warning'
                });
                language()

            } else if (response_from_php.status === "error") {
                
            alert("Cant Delete : Songs are Available for this   ")

            } else if (response_from_php.status === "no_data") {
                console.log("No data provided");
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            alert("Cant Delete : Songs are Available for this   ")
        }
    });
}
// --------------------------------------------------------------------------------------------------------------------------------------------------------------
// -----------------------------------------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------------------------------------------
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

    document.getElementById(name).style.zIndex = '99'


    if(name=='Song')
    {
        console.log('song function called')
        song()
    }



    if(name == 'User'){
        user()
    }


    if(name == 'Artist'){
        artist()
    }   

    if(name == 'Genre'){
        genre()
    }


    if(name == 'Language'){
        language()
    }

}