function singer_song_delete_click(name) {
    
    $.ajax({
        type: "POST",
        url: "singer_song_delete_click.php",
        data: {
            song_name: name
        },
        dataType: "json",
        success: function(response_from_php) {
            if (response_from_php.status === "done") {
                console.log("Done");
                Swal.fire({
                title: 'Song Deleted',
                text: 'Song Is Deleted Now',
                icon: 'delete'
            });
            
            show("your_music_class")
            } else if (response_from_php.status === "error") {
                console.log("Error: " + response_from_php.message);
                
            } else if (response_from_php.status === "no_data") {
                console.log("No data provided");
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log("Undone");
        }
    });
}