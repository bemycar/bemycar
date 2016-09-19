var toggled = false;

$('#signup_button').on("click", function() {

  var signup_email = $('#signup_email').val();
  var signup_password = $('#signup_password').val();

  var signup_password2 = $('#signup_password2').val();
  var number = $('#number').val();

  var signup_name = $('#signup_name').val();


  if (signup_email === "" && signup_password === "" && signup_password2 === "" && signup_name === "") {
    alert("please fill out all fields");
  } else if (signup_password != signup_password2) {
    alert("password do not match");

  } else {

    var data = "email=" + signup_email + "&password=" + signup_password + "&number=" + number + "&signup_name=" + signup_name;

    console.log(data);

    $.ajax({
      url: 'signup.php',
      data: data,
      type: 'POST',
      success: function(data) {
        var response = JSON.parse(data);
        if (response.result == "added") {
          console.log(data);

          location.reload();
        } else {
          alert("email exists");

        }
      }
    });
  }
});


$('#login').on("click", function() {

  var email = $('#email').val();

  var password = $('#password').val();

  if (email === "" && password === "") {
    alert("please enter email and password");
  } else {

    var data = "email=" + email + "&password=" + password;

    console.log(data);

    $.ajax({
      url: 'login.php',
      data: data,
      type: 'POST',
      success: function(data) {
        var response = JSON.parse(data);
        if (response.result == "success") {
          console.log(data);

          location.reload();
        } else {
          alert("incorrect  email and password");
        }
      }
    });
  }
});


$(function() {
  $('#search_form').removeAttr('onsubmit')
    .submit(function(event) {
      event.preventDefault();
      // This cancels the event...
      var carword = $('#carword').val();
        $.ajax({
          url: 'check_exists.php?carword=' + carword,

          success: function(data) {

            var response = JSON.parse(data);

            console.log(data);

            if (response.result == "found") {
              location.href = 'search.php?carword=' + carword;

            } else {
              alert("carword not found");
            }



          }
        });

    });

});
