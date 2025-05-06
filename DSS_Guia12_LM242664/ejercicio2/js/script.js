$(function () {
    $("#loginModal").dialog({
        autoOpen: false,
        modal: true,
        closeOnEscape: true
    });

    $("#btnLogin").click(function () {
        $("#loginModal").dialog("open");
    });

    $("#loginForm").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'login.php',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    window.location.href = "restricted.php";
                } else {
                    alert(response.error);
                }
            }
        });
    });
});
