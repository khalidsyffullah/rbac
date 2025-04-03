const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});

$(document).ready(function() {
    $('[data-bs-toggle="tooltip"]').tooltip({
        template: '<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-white text-dark shadow-sm border-0"></div></div>'
    });
});

$('#togglePassword').on('click', function() {
    const passwordInput = $('#password');
    const icon = $(this);

    if (passwordInput.attr('type') === 'password') {
        passwordInput.attr('type', 'text');
        icon.removeClass('bi-eye-slash').addClass('bi-eye');
    } else {
        passwordInput.attr('type', 'password');
        icon.removeClass('bi-eye').addClass('bi-eye-slash');
    }
});
