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
                text: 'song will be deleted after Refresh The page !',
                icon: 'delete'
            });
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