function like_song() {

            
    var song_name = document.getElementById('song-name').textContent;
    
    if (document.getElementById('like_song').style.color == 'red') {
        document.getElementById('like_song').style.color = 'white';
        $.ajax({
                type: "POST",
                url: "delete_like_song.php",
                data: {
                    song_name: song_name
                },
                dataType: "json",
                success: function(response_from_php) {
                    console.log('success');
                    like_music_class() 
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log("Undone");
                }
            });

            

    } else {
        document.getElementById('like_song').style.color = 'red'
        
            $.ajax({
                type: "POST",
                url: "like_song.php",
                data: {
                    song_name: song_name
                },
                dataType: "json",
                success: function(response_from_php) {
                    
                    console.log('success');
                    like_music_class() 
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log("Undone");
                }
            });
        
    }
}