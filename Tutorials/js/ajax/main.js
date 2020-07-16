/*****************************************************
 * What is AJAX (Asynchronous JavaScript And XML)?
 *  - http requests to a server without reloading the page, only request pieces
 *  - Currenty, the program is asychronous, i.e. the computer goes from top down and does one thing after the other
 *  https://www.youtube.com/watch?v=h0ZUpPiV1ac&list=WL&index=11&t=436s
 *
 *  Use XAMPP
 ***************************************************/


window.onload = function () {
    // First, we need an xml/http-object to request and receive data
    // https://developer.mozilla.org/de/docs/Web/API/XMLHttpRequest
    let http = new XMLHttpRequest();

    http.onreadystatechange = function() {
        // Request

        if (http.readyState === 4 && http.status === 200) {
            // Without JSON.parse it is a string, not an object
            console.log(JSON.parse(http.response));
        }

        // Check out the ready states in the log:
        // https://developer.mozilla.org/de/docs/Web/API/XMLHttpRequest/readyState
        // console.log(http);


    }
    // Switch between synchronous and asynchronous behavior
    http.open("GET", "data/tweet.json", true);
    http.send();
    // console.log("Test comes last if it is synchronous. Because this log is blocked until we received the data.")


    /**********************************
     *     jquery method
     ********************************/
    // No worries about any ready state stuff
    $.get("data/tweet.json", function (data) {
        console.log(data);
    });
    console.log("Test: If this comes before the data, we have asynchronous behavior as intended");
};