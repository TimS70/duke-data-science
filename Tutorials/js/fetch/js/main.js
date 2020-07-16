/*
    What is fetch?
     - call data from a url
     - send data
     - Asynchronous function that includes a promise

     - process:
        1) call data
        2) get response (text, blob, json)
        3) complete data stream: Grab the body of the response
        4) Show in some way, e.g. create image element in html

    What is a blob?
     - Binary large object
     - section of memory that contains data, could be anything
     - Create a blob with blob(), get a piece of a blob with slice()
     - URL.createObjectURL(blob) creates a readable image
 */

/* XMLHttpRequest establishes a connection with a URL and enables to send or receive data
https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch


/*************************************
* Fetch a gif
* @type {string} ********************
*/
let api = "https://api.giphy.com/v1/gifs/search?";
let apiKey = "&api_key=4mltcmvK7nuVCdCvgvlkuHWzOwq4tKKo";
let query = "q=rainbow";
let url = api + query + apiKey;

console.log("About to fetch");

/* Promise solution
fetch(url)
    .then(response   => response.json())
    .then(function(giphy){
        let src = giphy.data[0].images.original.url;
        $("#myImage").attr('src', src);
    })
    // Error handling
    .catch( error => {
        console.log("Error");
        console.error(error);
    })
*/

// Await solution
// await can only be used in the context of an asynch function

catchRainbow()
    .then(response => {
        console.log("yay");
    })
    .catch(error => {
        console.log("error");
        console.error(error);
    });

async function catchRainbow() {
    // Same thing as .then but more pretty code
    const response = await fetch(url);
    const giphy = await response.json();
    let src = giphy.data[0].images.original.url;
    $("#myImage").attr('src', src);
}


/**********************************
 * Fetch data
 * https://www.youtube.com/watch?v=RfMkdvN-23o&list=PLRqwX-V7Uu6YxDKpFzf_2D84p0cyk4T7X&index=4
 */

// Data from https://data.giss.nasa.gov/gistemp/

// Make asynchronous calls with fetch
async function getData() {
    const response = await fetch("./SourceData/ZonAnn.Ts+dSST.csv");
    // I want to receive the data as text and handle the data later
    // .text found here: https://developer.mozilla.org/de/docs/Web/API/Response
    const data = await response.text();
    // Regular expressions / are useful here
    // Split a string by a separator
    // Slice removes an element with a certain index
    const table = data.split(/\n/).slice(1);

    table.forEach(elt => {
        const row = elt.split(",");
        const year = row[0];
        const temperature = row[1];
        console.log(year, temperature);
    });
}

$(document).ready(function() {
   $("#myButton").click(function() {
       getData();
   });
});

