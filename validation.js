$(function () {
  const $form = $("#applicationForm");
  $form.on("submit", function (event) {
    const form = this;
    const $message = $("#formMessage");
    $message.removeClass("error").text("");

    if (!form.checkValidity()) {
      event.preventDefault();
      form.reportValidity();
      $message.addClass("error").text("Please complete the required fields correctly.");
      return;
    }
    const phone = $('input[name="phone"]').val().trim();
    if (!/^[0-9]{10}$/.test(phone)) {
      event.preventDefault();
      $message.addClass("error").text("Please enter a valid 10-digit phone number.");
    }
  });
});