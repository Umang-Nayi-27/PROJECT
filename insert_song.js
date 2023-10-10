document.getElementById("upload_song").addEventListener("click", function(event) {
    event.preventDefault();

    var song_name = document.getElementById("song_name").value;
    var song_language = document.getElementById("song_language").value;
    var song_genre = document.getElementById("song_genre").value;
    var song_lyrics = document.getElementById("song_lyrics").value;

    var song_file_input = document.getElementById("song_file");
    var song_image_input = document.getElementById("song_image");

    if (song_name.trim() === "" || song_language.trim() === "" || song_genre.trim() === "" || song_lyrics.trim() === "") {
        console.log("Fill in all fields.");
        return;
    }

    if (song_file_input.files.length === 0 || song_image_input.files.length === 0) {
        console.log("Select both a song file and an image file.");
        return;
    }

    // Create a FormData object to send file data
    var formData = new FormData();
    formData.append("song_name", song_name);
    formData.append("song_language", song_language);
    formData.append("song_genre", song_genre);
    formData.append("song_lyrics", song_lyrics);
    formData.append("song_file", song_file_input.files[0]);
    formData.append("song_image", song_image_input.files[0]);

    // Perform the AJAX request
    $.ajax({
        type: "POST",
        url: "insert_song.php",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response_from_php) {
            console.log(response_from_php.message);
            Swal.fire({
                title: 'Song Uploaded',
                text: 'song will be updated to mymusic after refresh !',
                icon: 'success'
            });
            document.getElementById("song_name").value = "";
            document.getElementById("song_language").value = "";
            document.getElementById("song_genre").value = "";
            document.getElementById("song_lyrics").value = "";
            document.getElementById("song_file").value = "";
            document.getElementById("song_image").value = "";
            // Handle success, e.g., show a success message to the user
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log("Error: " + errorThrown);
            // Handle error, e.g., show an error message to the user
        }
    });
});