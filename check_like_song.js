function check_like_song(name){
    $.ajax({
    type: "POST",
    url: "check_like.php",
    data :{song_name : name},
    dataType: "json",
    success: function (response_from_php) {
        if (response_from_php.length > 0) {
            console.log("Data received from PHP:", response_from_php);
            document.getElementById('like_song').style.color = 'red';
        } else {
            console.log("No data received from PHP.");
            
            document.getElementById('like_song').style.color = 'white';
        }
    },
    error: function (xhr, textStatus, errorThrown) {
        alert("ERROR");
    }
});
}