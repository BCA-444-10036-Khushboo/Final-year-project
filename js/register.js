$(document).ready(function () {
  // Generate Password
  $(".pass-gen").click(function (e) {
    e.preventDefault();
    $("#password").attr("type", "text");
    $(".pass_icon").css({ color: "black" });

    $.ajax({
      type: "POST",
      url: "php/generate_pass.php",
      beforeSend: function () {
        $(".pass_icon").removeClass("fa-eye").addClass("fa-circle-notch fa-spin");
      },
      success: function (response) {
        $(".pass_icon").removeClass("fa-circle-notch fa-spin").addClass("fa-eye");
        $("#password").val(response.trim());
      }
    });
  });

  // Show/Hide Password
  $(".pass_icon").click(function () {
    const type = $("#password").attr("type") === "password" ? "text" : "password";
    $("#password").attr("type", type);
    $(this).css({ color: type === "text" ? "black" : "#ccc" });
  });

  // Email check loader
  $("#email").on("input", function () {
    $(".email_loader").removeClass("d-none").addClass("fa fa-circle-notch fa-spin").css({ color: "#000" });
  });

  // Email verify
  $("#email").on("change", function () {
    $.ajax({
      type: "POST",
      url: "php/check_user.php",
      data: { email: $(this).val() },
      success: function (response) {
        $(".email_loader").removeClass("fa-circle-notch fa-spin");
        if (response.trim() === "notfound") {
          $(".email_loader").removeClass("fa-times-circle").addClass("fa-check-circle").css({ color: "green" });
          $(".register_btn").removeAttr("disabled");
        } else {
          $(".email_loader").removeClass("fa-check-circle").addClass("fa-times-circle").css({ color: "red" });
          $(".register_btn").attr("disabled", "disabled");
        }
      }
    });
  });

  // Register
  $(".signup-formm").submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "php/register.php",
      data: {
        username: $("#username").val(),
        email: $("#email").val(),
        password: $("#password").val()
      },
      beforeSend: function () {
        $(".register_btn").html("Please wait...").attr("disabled", "disabled");
      },
      success: function (response) {
        $(".register_btn").html("Register Now!").removeAttr("disabled");
        $(".msg").html("");

        if (response.trim() === "success") {
          $(".msg").html('<div class="alert alert-success mt-3">Register Success!</div>');
          setTimeout(function () {
            $(".signup-formm").addClass("d-none");
            $(".activation-form").removeClass("d-none");
            $(".msg").html("");
          }, 3000);
        } else if (response.trim() === "usermatch") {
          $(".msg").html('<div class="alert alert-warning mt-3">User already exists</div>');
          setTimeout(function () {
            $(".msg").html("");
            $(".signup-formm").trigger("reset");
          }, 3000);
        } else {
          $(".msg").html('<div class="alert alert-danger mt-3">Registration Failed</div>');
          setTimeout(function () {
            $(".msg").html("");
            $(".signup-formm").trigger("reset");
          }, 3000);
        }
      }
    });
  });

  // Activation
  $(".activation-form").submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "php/check_activation_code.php",
      data: {
        email: $("#email").val(),
        atc: $("#activation_code").val()
      },
      beforeSend: function () {
        $(".activation_btn").html("Checking Activation Code...").attr("disabled", "disabled");
      },
      success: function (response) {
        $(".activation_btn").html("Activate Now!").removeAttr("disabled");
        $(".activation_msg").html("");

        if (response.trim() === "active") {
          $(".activation_msg").html('<div class="alert alert-success mt-3">Account Activated</div>');
          setTimeout(function () {
            window.location = "login.php";
          }, 3000);
        } else {
          $(".activation_msg").html('<div class="alert alert-danger mt-3">' + response + '</div>');
          setTimeout(function () {
            $(".activation_msg").html("");
          }, 3000);
        }
      }
    });
  });
});