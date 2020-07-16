// setup like onLoad

function setup() {
    // p5 commands
    // noCanvas();
    const capture = createCapture(VIDEO);
    capture.size(320, 240);
    capture.loadPixels();
    // Convert image to base64 (comfortable string format)
    const image64 = capture.canvas.toDataURL();
    console.log(image64);

    // Get the geolocation
    // https://developer.mozilla.org/en-US/docs/Web/API/Geolocation#:~:text=The%20Geolocation%20interface%20represents%20an,is%20obtained%20using%20the%20navigator.
    if ("geolocation" in navigator) {
        console.log("geolocation available");
        // Instead of function(position) {..., you can use position => {...
        navigator.geolocation.getCurrentPosition(async position => {

            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            console.log(latitude, longitude);

            document.getElementById("spanLatitude").innerHTML = latitude;
            document.getElementById("spanLongitude").innerHTML = longitude;

            const data = {latitude, longitude, image64}
            // https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch
            const options = {
                method: 'POST',
                // A http header can transmit additional information
                // https://developer.mozilla.org/de/docs/Web/HTTP/Headers
                headers: {
                    'Content-Type': 'application/json'
                },
                // The body is where you pack your data. Make the data into a JSON string
                body: JSON.stringify(data)
            }
            // 2) SEND DATA AS A POST!
            // Fetch me the stuff form api
            const response = await fetch("/api", options);
            // Need to define the response as json to continue working with it
            const returnData = await response.json();
            console.log(returnData);

        });

    } else {
        console.log("geolocation not available");
    }
}