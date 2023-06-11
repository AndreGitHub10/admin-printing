// $(document).ready(function () {
//   Swal.fire("Hello!", "Welcome to SweetAlert2!", "success");
// });

document.addEventListener("DOMContentLoaded", function (event) {
  const showNavbar = (toggleId, navId, bodyId, headerId) => {
    const toggle = document.getElementById(toggleId),
      nav = document.getElementById(navId),
      bodypd = document.getElementById(bodyId),
      headerpd = document.getElementById(headerId);

    // Validate that all variables exist
    if (toggle && nav && bodypd && headerpd) {
      toggle.addEventListener("click", () => {
        // show navbar
        nav.classList.toggle("show-nav");
        // change icon
        toggle.classList.toggle("bx-x");
        // add padding to body
        bodypd.classList.toggle("body-pd");
        // add padding to header
        headerpd.classList.toggle("body-pd");
      });
    }
  };

  showNavbar("header-toggle", "nav-bar", "body-pd", "header");

  /*===== LINK ACTIVE =====*/
  const linkColor = document.querySelectorAll(".nav_link");

  function colorLink() {
    if (linkColor) {
      linkColor.forEach((l) => l.classList.remove("active"));
      this.classList.add("active");
    }
  }
  linkColor.forEach((l) => l.addEventListener("click", colorLink));

  // Your code to run since DOM is loaded and ready
});

const toastTrigger = document.getElementById("liveToastBtn");
const toastLiveExample = document.getElementById("liveToast");
const toastBody = document.getElementById("toast-body");

if (!toastTrigger.textContent.includes("none")) {
  toastBody.textContent = toastTrigger.textContent;
  const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
  toastBootstrap.show();
}

const toastErrorValidationTrigger = document.getElementById(
  "errorValidationToast"
);
const toastErrorValidationLiveExample = document.getElementById(
  "liveToastErrorValidation"
);
const toastErrorValidationBody = document.getElementById(
  "toast-body-error-validation"
);

if (!toastErrorValidationTrigger.textContent.includes("none")) {
  toastErrorValidationBody.textContent =
    toastErrorValidationTrigger.textContent;
  const toastErrorValidationBootstrap = bootstrap.Toast.getOrCreateInstance(
    toastErrorValidationLiveExample
  );
  toastErrorValidationBootstrap.show();
}
