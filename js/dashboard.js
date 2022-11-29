window.addEventListener("load", function () {
    var is_interested_images = this.document.getElementsByClassName("is-interested-image");
    Array.from(is_interested_images).forEach(element => {
        element.addEventListener("click", function (event) {
            var XHR = new XMLHttpRequest();
            var property_id = event.target.getAttribute("property_id");
            // on success
            XHR.addEventListener("load", remove_interested_success);

            // on error
            XHR.addEventListener("error", on_error);

            // set up request
            XHR.open("GET", "api/toggle_interested.php?property_id=" + property_id);

            // initiate the request
            XHR.send();

            document.getElementById("loading").style.display = 'block';
            event.preventDefault();
        });
    });
});

var remove_interested_success = function (event) {
    document.getElementById("loading").style.display = 'none';

    var response = JSON.parse(event.target.responseText);
    if(response.success) {
        var property_id = response.property_id;
        document.getElementsByClassName("property-id-" + property_id)[0].style.display = 'none';
    }
};