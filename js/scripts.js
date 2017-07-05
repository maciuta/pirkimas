$("#contactForm").validator().on("submit", function(event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        submitMSG(false, "Ar viską užpildėte?");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});


function submitForm() {
    // Initiate Variables With Form Content
    var name = $("#name").val();
    var message = $("#message").val();

    $.ajax({
        type: "POST",
        url: "php/gavimas.php",
        data: "name=" + name + "&message=" + message,
        success: function(text) {
            if (text == "success") {
                formSuccess();
            } else {
                submitMSG(false, text);
            }
        }
    });
}

function formSuccess() {
    $("#contactForm")[0].reset();
    submitMSG(true, "Žinutė išsiųsta!")
}

function submitMSG(valid, msg) {
    if (valid) {
        var msgClasses = "h3 text-center text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}