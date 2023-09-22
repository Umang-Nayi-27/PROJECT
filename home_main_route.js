
// ------------------------------------------------------------------------------------------------------------- func main route
var all = document.getElementById("all");
var search = document.getElementById("search");
var hindi = document.getElementById("hindi");
var eng = document.getElementById("eng");
var guj = document.getElementById("guj");
var kpop = document.getElementById("kpop");
var party = document.getElementById("party");
var dance = document.getElementById("dance");
var bollywood = document.getElementById("bollywood");
var romantic = document.getElementById("romantic");
var bhakti = document.getElementById("bhakti");
var lofi = document.getElementById("lofi");
var plist = document.getElementById("plist");
var linked = document.getElementById("linked");
var queue = document.getElementById("queue");





var songfunct = document.querySelector(".songfunct");
var searchfunct = document.querySelector(".searchfunct");
// --------------------------------------------------------------------------------------------------------------------------
var arthin = document.querySelector(".arthin");
var arteng = document.querySelector(".arteng");
var artguj  = document.querySelector(".artguj");
var artkpop = document.querySelector(".artkpop");
// ----------------------------------------------------------------------------------------------------------------------
var genresparty = document.querySelector(".genresparty");
var genresdance = document.querySelector(".genresdance");
var genresbollywood = document.querySelector(".genresbollywood");
var genresromantic = document.querySelector(".genresromantic");
var genresbhakti = document.querySelector(".genresbhakti");
var genreslofi = document.querySelector(".genreslofi");
// ---------------------------------------------------------------------------------------------------------------------------
var playlistfunct = document.querySelector(".playlistfunct");
var likedfunct = document.querySelector(".likedfunct");
var queuefunct = document.querySelector(".queuefunct");

document.getElementById("all").addEventListener("click", function(event) {
    event.preventDefault();
    
    
    songfunct.style.zIndex="99";
    searchfunct.style.zIndex="1";
    // --------------------------------------------------------------------------    
    arthin.style.zIndex="1";
    arteng.style.zIndex="1";
    artguj.style.zIndex="1";
    artkpop.style.zIndex="1";
    // -----------------------------------------------------------------------------
    genresparty.style.zIndex="1";
    genresdance.style.zIndex="1";
    genresbollywood.style.zIndex="1";
    genresromantic.style.zIndex="1";
    genresbhakti.style.zIndex="1";
    genreslofi.style.zIndex="1";
    // -----------------------------------------------------------------------------
    playlistfunct.style.zIndex="1";
    likedfunct.style.zIndex="1";
    queuefunct.style.zIndex="1";
});

document.getElementById("search").addEventListener("click", function(event) {
    event.preventDefault();
    
    
    songfunct.style.zIndex="1";
    searchfunct.style.zIndex="99";
    // --------------------------------------------------------------------------    
    arthin.style.zIndex="1";
    arteng.style.zIndex="1";
    artguj.style.zIndex="1";
    artkpop.style.zIndex="1";
    // -----------------------------------------------------------------------------
    genresparty.style.zIndex="1";
    genresdance.style.zIndex="1";
    genresbollywood.style.zIndex="1";
    genresromantic.style.zIndex="1";
    genresbhakti.style.zIndex="1";
    genreslofi.style.zIndex="1";
    // -----------------------------------------------------------------------------
    playlistfunct.style.zIndex="1";
    likedfunct.style.zIndex="1";
    queuefunct.style.zIndex="1";
});

document.getElementById("hindi").addEventListener("click", function(event) {
    event.preventDefault();
    
    
    songfunct.style.zIndex="1";
    searchfunct.style.zIndex="1";
    // --------------------------------------------------------------------------    
    arthin.style.zIndex="99";
    arteng.style.zIndex="1";
    artguj.style.zIndex="1";
    artkpop.style.zIndex="1";
    // -----------------------------------------------------------------------------
    genresparty.style.zIndex="1";
    genresdance.style.zIndex="1";
    genresbollywood.style.zIndex="1";
    genresromantic.style.zIndex="1";
    genresbhakti.style.zIndex="1";
    genreslofi.style.zIndex="1";
    // -----------------------------------------------------------------------------
    playlistfunct.style.zIndex="1";
    likedfunct.style.zIndex="1";
    queuefunct.style.zIndex="1";
});

document.getElementById("eng").addEventListener("click", function(event) {
    event.preventDefault();
    
    
    songfunct.style.zIndex="1";
    searchfunct.style.zIndex="1";
    // --------------------------------------------------------------------------    
    arthin.style.zIndex="1";
    arteng.style.zIndex="99";
    artguj.style.zIndex="1";
    artkpop.style.zIndex="1";
    // -----------------------------------------------------------------------------
    genresparty.style.zIndex="1";
    genresdance.style.zIndex="1";
    genresbollywood.style.zIndex="1";
    genresromantic.style.zIndex="1";
    genresbhakti.style.zIndex="1";
    genreslofi.style.zIndex="1";
    // -----------------------------------------------------------------------------
    playlistfunct.style.zIndex="1";
    likedfunct.style.zIndex="1";
    queuefunct.style.zIndex="1";
});

document.getElementById("guj").addEventListener("click", function(event) {
    event.preventDefault();
    
    
    songfunct.style.zIndex="1";
    searchfunct.style.zIndex="1";
    // --------------------------------------------------------------------------    
    arthin.style.zIndex="1";
    arteng.style.zIndex="1";
    artguj.style.zIndex="99";
    artkpop.style.zIndex="1";
    // -----------------------------------------------------------------------------
    genresparty.style.zIndex="1";
    genresdance.style.zIndex="1";
    genresbollywood.style.zIndex="1";
    genresromantic.style.zIndex="1";
    genresbhakti.style.zIndex="1";
    genreslofi.style.zIndex="1";
    // -----------------------------------------------------------------------------
    playlistfunct.style.zIndex="1";
    likedfunct.style.zIndex="1";
    queuefunct.style.zIndex="1";
});

document.getElementById("kpop").addEventListener("click", function(event) {
    event.preventDefault();
    
    
    songfunct.style.zIndex="1";
    searchfunct.style.zIndex="1";
    // --------------------------------------------------------------------------    
    arthin.style.zIndex="1";
    arteng.style.zIndex="1";
    artguj.style.zIndex="1";
    artkpop.style.zIndex="99";
    // -----------------------------------------------------------------------------
    genresparty.style.zIndex="1";
    genresdance.style.zIndex="1";
    genresbollywood.style.zIndex="1";
    genresromantic.style.zIndex="1";
    genresbhakti.style.zIndex="1";
    genreslofi.style.zIndex="1";
    // -----------------------------------------------------------------------------
    playlistfunct.style.zIndex="1";
    likedfunct.style.zIndex="1";
    queuefunct.style.zIndex="1";
});

document.getElementById("party").addEventListener("click", function(event) {
    event.preventDefault();
    
    
    songfunct.style.zIndex="1";
    searchfunct.style.zIndex="1";
    // --------------------------------------------------------------------------    
    arthin.style.zIndex="1";
    arteng.style.zIndex="1";
    artguj.style.zIndex="1";
    artkpop.style.zIndex="1";
    // -----------------------------------------------------------------------------
    genresparty.style.zIndex="99";
    genresdance.style.zIndex="1";
    genresbollywood.style.zIndex="1";
    genresromantic.style.zIndex="1";
    genresbhakti.style.zIndex="1";
    genreslofi.style.zIndex="1";
    // -----------------------------------------------------------------------------
    playlistfunct.style.zIndex="1";
    likedfunct.style.zIndex="1";
    queuefunct.style.zIndex="1";
});


document.getElementById("dance").addEventListener("click", function(event) {
    event.preventDefault();
    
    
    songfunct.style.zIndex="1";
    searchfunct.style.zIndex="1";
    // --------------------------------------------------------------------------    
    arthin.style.zIndex="1";
    arteng.style.zIndex="1";
    artguj.style.zIndex="1";
    artkpop.style.zIndex="1";
    // -----------------------------------------------------------------------------
    genresparty.style.zIndex="1";
    genresdance.style.zIndex="99";
    genresbollywood.style.zIndex="1";
    genresromantic.style.zIndex="1";
    genresbhakti.style.zIndex="1";
    genreslofi.style.zIndex="1";
    // -----------------------------------------------------------------------------
    playlistfunct.style.zIndex="1";
    likedfunct.style.zIndex="1";
    queuefunct.style.zIndex="1";
});

document.getElementById("bollywood").addEventListener("click", function(event) {
    event.preventDefault();
    
    
    songfunct.style.zIndex="1";
    searchfunct.style.zIndex="1";
    // --------------------------------------------------------------------------    
    arthin.style.zIndex="1";
    arteng.style.zIndex="1";
    artguj.style.zIndex="1";
    artkpop.style.zIndex="1";
    // -----------------------------------------------------------------------------
    genresparty.style.zIndex="1";
    genresdance.style.zIndex="1";
    genresbollywood.style.zIndex="99";
    genresromantic.style.zIndex="1";
    genresbhakti.style.zIndex="1";
    genreslofi.style.zIndex="1";
    // -----------------------------------------------------------------------------
    playlistfunct.style.zIndex="1";
    likedfunct.style.zIndex="1";
    queuefunct.style.zIndex="1";
});

document.getElementById("romantic").addEventListener("click", function(event) {
    event.preventDefault();
    
    
    songfunct.style.zIndex="1";
    searchfunct.style.zIndex="1";
    // --------------------------------------------------------------------------    
    arthin.style.zIndex="1";
    arteng.style.zIndex="1";
    artguj.style.zIndex="1";
    artkpop.style.zIndex="1";
    // -----------------------------------------------------------------------------
    genresparty.style.zIndex="1";
    genresdance.style.zIndex="1";
    genresbollywood.style.zIndex="1";
    genresromantic.style.zIndex="99";
    genresbhakti.style.zIndex="1";
    genreslofi.style.zIndex="1";
    // -----------------------------------------------------------------------------
    playlistfunct.style.zIndex="1";
    likedfunct.style.zIndex="1";
    queuefunct.style.zIndex="1";
});

document.getElementById("bhakti").addEventListener("click", function(event) {
    event.preventDefault();
    
    
    songfunct.style.zIndex="1";
    searchfunct.style.zIndex="1";
    // --------------------------------------------------------------------------    
    arthin.style.zIndex="1";
    arteng.style.zIndex="1";
    artguj.style.zIndex="1";
    artkpop.style.zIndex="1";
    // -----------------------------------------------------------------------------
    genresparty.style.zIndex="1";
    genresdance.style.zIndex="1";
    genresbollywood.style.zIndex="1";
    genresromantic.style.zIndex="1";
    genresbhakti.style.zIndex="99";
    genreslofi.style.zIndex="1";
    // -----------------------------------------------------------------------------
    playlistfunct.style.zIndex="1";
    likedfunct.style.zIndex="1";
    queuefunct.style.zIndex="1";
});

document.getElementById("lofi").addEventListener("click", function(event) {
    event.preventDefault();
    
    
    songfunct.style.zIndex="1";
    searchfunct.style.zIndex="1";
    // --------------------------------------------------------------------------    
    arthin.style.zIndex="1";
    arteng.style.zIndex="1";
    artguj.style.zIndex="1";
    artkpop.style.zIndex="1";
    // -----------------------------------------------------------------------------
    genresparty.style.zIndex="1";
    genresdance.style.zIndex="1";
    genresbollywood.style.zIndex="1";
    genresromantic.style.zIndex="1";
    genresbhakti.style.zIndex="1";
    genreslofi.style.zIndex="99";
    // -----------------------------------------------------------------------------
    playlistfunct.style.zIndex="1";
    likedfunct.style.zIndex="1";
    queuefunct.style.zIndex="1";
});

document.getElementById("plist").addEventListener("click", function(event) {
    event.preventDefault();
    
    
    songfunct.style.zIndex="1";
    searchfunct.style.zIndex="1";
    // --------------------------------------------------------------------------    
    arthin.style.zIndex="1";
    arteng.style.zIndex="1";
    artguj.style.zIndex="1";
    artkpop.style.zIndex="1";
    // -----------------------------------------------------------------------------
    genresparty.style.zIndex="1";
    genresdance.style.zIndex="1";
    genresbollywood.style.zIndex="1";
    genresromantic.style.zIndex="1";
    genresbhakti.style.zIndex="1";
    genreslofi.style.zIndex="1";
    // -----------------------------------------------------------------------------
    playlistfunct.style.zIndex="99";
    likedfunct.style.zIndex="1";
    queuefunct.style.zIndex="1";
});

document.getElementById("linked").addEventListener("click", function(event) {
    event.preventDefault();
    
    
    songfunct.style.zIndex="1";
    searchfunct.style.zIndex="1";
    // --------------------------------------------------------------------------    
    arthin.style.zIndex="1";
    arteng.style.zIndex="1";
    artguj.style.zIndex="1";
    artkpop.style.zIndex="1";
    // -----------------------------------------------------------------------------
    genresparty.style.zIndex="1";
    genresdance.style.zIndex="1";
    genresbollywood.style.zIndex="1";
    genresromantic.style.zIndex="1";
    genresbhakti.style.zIndex="1";
    genreslofi.style.zIndex="1";
    // -----------------------------------------------------------------------------
    playlistfunct.style.zIndex="1";
    likedfunct.style.zIndex="99";
    queuefunct.style.zIndex="1";
});

document.getElementById("queue").addEventListener("click", function(event) {
    event.preventDefault();
    
    
    songfunct.style.zIndex="1";
    searchfunct.style.zIndex="1";
    // --------------------------------------------------------------------------    
    arthin.style.zIndex="1";
    arteng.style.zIndex="1";
    artguj.style.zIndex="1";
    artkpop.style.zIndex="1";
    // -----------------------------------------------------------------------------
    genresparty.style.zIndex="1";
    genresdance.style.zIndex="1";
    genresbollywood.style.zIndex="1";
    genresromantic.style.zIndex="1";
    genresbhakti.style.zIndex="1";
    genreslofi.style.zIndex="1";
    // -----------------------------------------------------------------------------
    playlistfunct.style.zIndex="1";
    likedfunct.style.zIndex="1";
    queuefunct.style.zIndex="99";
});
                                                                                                                                