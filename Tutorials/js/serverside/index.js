/*******************************************************
 * Src: https://www.youtube.com/watch?v=Kw5tC5nQMRY&list=PLRqwX-V7Uu6YxDKpFzf_2D84p0cyk4T7X&index=11&t=132s
 *
 * What is node.js?
 * - Node is a js runtime, i.e. it runs without the browser
 * - Possible application: type node in the terminal to enable js in the terminal
 * - Execute a script in the terminal by typing its filename
 * - We create a server in index.js
 *
 * How does it work?
 * 1) Install node.js from https://nodejs.org/en/download/
 * 2) Install express, a node.js package manager (http://expressjs.com/): npm install express --save
 * 3) Create package.json (npm init), the configuration file of the project, incl. license, name, version, etc.
 *
 * What does serving mean?
 *  - Our server hosts static files (e.g. index.php)
 *  - A client can request a file and the server sends the file to the client
 *  - The file is rendered (made into a picture) in the client's browser
 *  - Our server index.js is not accessible to the public
 */

const express = require("express");
// https://nodejs.org/api/fs.html#fs_file_system
const fs = require("fs");
const Datastore = require("nedb");

// Create a webapp by calling express
const app = express();
// Connects at the port 3000
app.listen(3000, () => console.log("listening at 3000"));

// We want to serve other webpages (e.g. index.php), however static files are not given yet
// Everything in public is publicly accessible, i.e. "served" or hosted
app.use(express.static("public"));

// 3) PARSE ANY INCOMING DATA AS JSON!
// I want the server to understand incoming data as json
// https://expressjs.com/de/api.html
app.use(express.json({limit: "1mb"}));


/***********************************
 * Save the information to a database and a file
 * https://www.youtube.com/watch?v=xVYa20DCUv0&list=PLRqwX-V7Uu6YxDKpFzf_2D84p0cyk4T7X&index=12
 * https://github.com/louischatriot/nedb
 * npm install nedb
 * https://dbdb.io/db/nedb
 *
 */

const database = new Datastore("data/database.db");
// Puts the database into the memory. If it does not find, it creates the database.db
database.loadDatabase();

// Create an array to store the data in
 const datatext = [];

/***************************
 * Next, we will establish a Route in order to receive a request the geolocation data from the client
 *
 * Run index.js in the terminal. Type "node index.js"
 * When loading the webpage by the client, you can see request data in the server's terminal
 *
 * Install node monitor (npm install -g nodemon) -g as a global module
 */

// Reply to the request from the client
app.get("/api", (request, response) => {
    // https://github.com/louischatriot/nedb
    // Find me an object
    database.find({}, (err, data) => {
        if (err) {
            response.end();
            console.log("There has been an error when sending the data from GET")
            return;
        }
        response.json({data});
    })

    // Test
    // response.json({test: 123});
});


// 1) RECEIVE A REQUEST!
// https://expressjs.com/de/guide/routing.html
// WE expect a post request
// We set up an api for clients to send data to me
// (request, response) => {..., is analogue to function(request, response) {...
app.post("/api", (request, response) => {
    console.log(request.body);
    // Need to define data, otherwise latitude and longitude are not defined
    const data =  request.body;

    // Get a timestamp and attach it to data
    const timestamp = Date.now();
    data.timestamp = timestamp;

    // inserted as json, Save to the database
    database.insert(data);

    datatext.push(data);
    // You have to convert it to a string in order to save as a text
    const dataString = JSON.stringify(datatext, null, 2);
    // Don't forget the callback
    fs.writeFile("data/geolog.txt", dataString, (err) => {
        if (err) throw err;
       console.log('The file has been saved!');
    });

    // The server should be polite and send sth. back. In any case, it has to end the request.
    response.json({
        status: "success",
        timestamp: timestamp,
        latitude: data.latitude,
        longitude: data.longitude,
        image: data.image64
    });
});

/***********************************
 * HTTP Post Request
 *
 * The client executes its own js,
 * sends it to the server
 *
 * Routing
 *  - Endpoint for the API
 *  - Route can be get or post
 *
 *  JSON parsing
 *  POST with fetch()
 */