window.addEventListener ("load", function () {
    const search = window.location.search;
    const params = new URLSearchParams(search);
    const property_id = params.get('property_id');

    var is_interested_image = document.getElementsByClassName('is-interested-image')[0];
    is_interested_image.addEventListener ("click", function (event) {
        var XHR = new XMLHttpRequest();
        // on success
        XHR.addEventListener("load", toggle_interested_success);
        // on error
        XHR.addEventListener("error", on_error);
        // set up request
        XHR.open ("GET", "api/toggle_interested.php?property_id=" + property_id);
        // initiate the request
        XHR.send();

        document.getElementById("loading").style.display = "block";
        event.preventDefault();
    });
});

var toggle_interested_success = function (event) {
    document.getElementById("loading").style.display = "none";

    var response = JSON.parse(event.target.responseText);
    if (response.success) {
        var is_interested_image = document.getElementsByClassName('is-interested-image')[0];
        var interested_user_count = document.getElementsByClassName('interested-user-count')[0];

        if(response.is_interested) {
            is_interested_image.classList.add('fas');
            is_interested_image.classList.remove('far');
            interested_user_count.innerHTML = parseFloat(interested_user_count.innerHTML) + 1;
        } else {            
            is_interested_image.classList.add('far');
            is_interested_image.classList.remove('fas');
            interested_user_count.innerHTML = parseFloat(interested_user_count.innerHTML) - 1;
        }
    } else if (!response.success && !response.is_logged_in) {
        window.$('#login-modal').modal("show");
    }
};