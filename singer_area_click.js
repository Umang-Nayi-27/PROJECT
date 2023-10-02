function singer_click(name , path){
    document.querySelector(".artist_section").style.zIndex="99";
    document.getElementById("artist_img").src=path;
    document.getElementById("artist_click_name").innerHTML = name;
}