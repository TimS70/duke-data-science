/*********************************
 * Src: https://www.youtube.com/watch?v=iiADhChRriM
 * Src: https://www.youtube.com/watch?v=uxf0--uiX0I&list=PLRqwX-V7Uu6YxDKpFzf_2D84p0cyk4T7X&index=6
 *
 * What is an API?
 *  - facilitates the commmunication between laptops
 ***********************************/


/***********************************
 * Set map
 * https://leafletjs.com/examples/quick-start/
 ************************************/
function setMap() {
    // Now some very leaflet specific stuff
    // Set up the leaflet map
    const myWorldmap = L.map('issMap').setView([0, 0], 1);
    // Some type of format for an actual url
    const tileURL = "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";
    // Specify the tiles. The tiles are the images shown in the map
    const attribution =
        `&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors`;
    const tiles = L.tileLayer(tileURL, {attribution});
    tiles.addTo(myWorldmap);

    var issIcon = L.icon({
        iconUrl: 'iss200.png',
        // shadowUrl: 'leaf-shadow.png',
        iconSize: [50, 50], // size of the icon
        // shadowSize:   [50, 64], // size of the shadow
        iconAnchor: [4, 62], // point of the icon which will correspond to marker's location
        // shadowAnchor: [4, 62],  // the same for the shadow
        // popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    const marker = L.marker([0, 0], {icon: issIcon}).addTo(myWorldmap);
    return {myWorldmap, marker};
}

async function getISS() {
    const response = await fetch("https://api.wheretheiss.at/v1/satellites/25544");
    const data = await response.json();
    // console.log(data.latitude);
    // console.log(data.longitude);
    // JS destructuring: Take the pieces from an opject and put the into variables
    const {latitude, longitude} = data;
    // console.log(latitude);
    document.getElementById("latitudeText").textContent = "latitude: " + latitude;
    document.getElementById("longitudeText").textContent = "longitude: " + longitude;
    // Better solution for marker
    myMap.marker.setLatLng([latitude, longitude]);
    /* Archive: Create html elements
    let tag1 = document.createElement("p");
    let tag2 = document.createElement("p");
    let latitudeOut = document.createTextNode("latitude: " + latitude);
    let longitudeOut = document.createTextNode("longitude: " + longitude);
    tag1.appendChild(latitudeOut);
    tag2.appendChild( longitudeOut);
    document.getElementById("output").appendChild(tag1);
    document.getElementById("output").appendChild(tag2);
     */
}

const myMap = setMap();

setInterval(function() {
    getISS();
}, 5000);


/************************************
 * What is JSON? (javascript object notation)
 *  - Data representation format (string, numbers, objects {"":""} {"":""} ...)
 *  - Save data in file.json
 *  - Allows nesting in data, e.g. arrays
 *  - Lightweight, quickly to send
 *  - Is completely valid in js. You can just copy-paste
 *  - Use JSON.parse("string") to use in js
 ***********************************/
/* Outcomment all the remaining code
// myCat is an object
let myCat = {
    "name": "Billy",
    "species": "cat",
    "food": "Thuna"
}

// myFavColors is an array
let myFavColors = ["blue", "green", "purple"];

// JSON (javascript object notation) is a format to nest objects and arrays inside each other
// Access a value: thePets[1].food
// Normally we would get the json from a URL, not from our own js
let thePets = [
    {
        "name": "Billy",
        "species": "cat",
        "food": "Thuna"
    },
    {
        "name": "Andrew",
        "species": "dog",
        "food": "carrot"
    },
]
*/