/*
When to use callbacks?
    - Callbacks are useful for events, e.g. clicking events
- Not asynchronous events, like fetching data - leads to callback hell
*/

/* What is a promise?
 - Promises contain a representation of an eventual execution or failure,
    an object that can be in a certain state
     1) pending: wating
     2) fulfilled
     3) rejected
 - then executes when it is fulfilled, catch executes when it is rejected
 - Useful as an alternative to callbacks
 - Src: https://developer.mozilla.org/de/docs/Web/JavaScript/Reference/Global_Objects/Promise
 */

function setup() {
    let api = "https://api.giphy.com/v1/gifs/search?";
    let apiKey = "&api_key=4mltcmvK7nuVCdCvgvlkuHWzOwq4tKKo";
    let query = "q=" + $("#searchInput").val().replace(" ", "+");
    let limit = "&limit=1";

    let url = api + query + apiKey;

    /* Tutorial Code
    // Without Chaining
    // Instead of $.getJSON, we fetch from URL and obtain back a promise
    // The promise runs behind the curtain while our code does things
    let promise = fetch(url);

    // Initially, the status of promise is pending
    console.log(promise);

    // Finally, when the url is fetched, we can run the next command
    promise.then(gotData);
    // When there is an error, do sth. else
    // You could js pipleine the code but ignore it for now
    promise.catch(LogMessage("Oops, what happened here? Maybe a wrong URL?"));


    // With chaining (.)
    // => is a new notation
    fetch(url)
        // Fetch requires to specifiy the type of data to show. .json itself creates another promise
        .then(response   => response.json)
        .then(json => console.log(json))
        .catch(err   => console.log(err));
*/
    // My code
    fetch(url)
        // Fetch requires to specifiy the type of data to show. .json itself creates another promise
        // Convert the response into json
        .then(response   => response.json())
        .then(showGif)
        .catch(console.log('Wrong URL?'));
}

function showGif(giphy) {
    // Controlling for what we got
    console.log(giphy);

    for (i=0; i < giphy.data.length; i++) {
        var gif = $('<img alt="Loading" src=""/>'); //Equivalent: $(document.createElement('img'))
        // data is an array. Data path in JSON is guided by .
        var src = giphy.data[i].images.original.url;
        gif.attr('src', src);
        gif.appendTo('#dataOutput');

        // Old command
        //$("#gifOutput").attr("src", src);

    }
}

$(document).ready(function() {
    $("#load").click(function() {
        $("#dataOutput").empty();
        setup();
    });
});

