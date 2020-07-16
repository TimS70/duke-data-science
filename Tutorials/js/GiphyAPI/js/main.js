/*
When to use callbacks?
    - Callbacks are useful for events, e.g. clicking events
- Not asynchronous events, like fetching data - leads to callback hell
*/

// Giphy API
// How to: https://developers.giphy.com/docs/api#quick-start-guide

/* Test function
function myTest() {
    var number = 1;
    var test = "var_" + number;
    console.log(test);
}
 */




function setup() {
    var api     = "https://api.giphy.com/v1/gifs/search?";
    var apiKey  = "&api_key=4mltcmvK7nuVCdCvgvlkuHWzOwq4tKKo";
    var query   = "q=" + $("#searchInput").val().replace(" ", "+");
    var limit   = "&limit=1";

    var url = api + query + apiKey;
    console.log(query);
    console.log(url);

    $.getJSON(url, gotData);
    // In order to pretty print JSON-Code, copy the code in the browser and paste it in the console
    //noCanvas();
    //loadJSON(url, callback) gets the JSON from a url and then executes a callback
}

function gotData(giphy) {

    for (i=0; i < giphy.data.length; i++) {
        var gif = $('<img alt="Loading" src=""/>'); //Equivalent: $(document.createElement('img'))
        // data is an array. Data path in JSON is guided by .
        var src = giphy.data[i].images.original.url;
        gif.attr('src', src);
        gif.appendTo('#dataOutput');

        // Old command
        //$("#gifOutput").attr("src", src);

    }

    /* Control commands
    console.log(data.data[22].images.original.url);
    console.log(myGif);
    console.log(typeof(src));
    */
}



$(document).ready(function() {
    $("#load").click(function() {
        $("#dataOutput").empty();
        setup();
    });
});