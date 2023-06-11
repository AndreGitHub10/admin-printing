$(document).ready(function () {
  // $(".register-info-box").fadeOut();
  // $(".register-show").addClass("show-log-panel");
  var admorusr = document.getElementById("adminoruser");
  if (admorusr.textContent.includes("user")) {
    $(".register-info-box").fadeOut();
    $(".register-show").addClass("show-log-panel");
  } else if (admorusr.textContent.includes("admin")) {
    $(".login-info-box").fadeOut();
    $(".login-show").addClass("show-log-panel");
    $(".white-panel").removeClass("right-log");
    $(".white-panel").removeClass("bg-primary");
    $(".white-panel").addClass("bg-warning");
  }
  // $("#log-login-show").attr("checked", false);
  // $("#log-reg-show").attr("checked", true);
});

$('.login-reg-panel input[type="radio"]').on("change", function () {
  if ($("#log-login-show").is(":checked")) {
    $(".register-info-box").fadeOut();
    $(".login-info-box").fadeIn();

    $(".white-panel").addClass("right-log");
    $(".white-panel").removeClass("bg-warning");
    $(".white-panel").addClass("bg-primary");
    $(".register-show").addClass("show-log-panel");
    $(".login-show").removeClass("show-log-panel");
  } else if ($("#log-reg-show").is(":checked")) {
    $(".register-info-box").fadeIn();
    $(".login-info-box").fadeOut();

    $(".white-panel").removeClass("right-log");
    $(".white-panel").removeClass("bg-primary");
    $(".white-panel").addClass("bg-warning");
    $(".login-show").addClass("show-log-panel");
    $(".register-show").removeClass("show-log-panel");
  }
});
