var fields = document.getElementsByTagName("fieldset");
var user_admin_check = document.getElementById("username");
var password_check = document.getElementById("password");
var form = document.getElementById("entry-form");
const inputs = [user_admin_check, password_check];
form.addEventListener("submit", (e) => {
  var flag_login = true;

  console.log(inputs);
  inputs.forEach((element) => {
    if (element.value.trim() === "") {
      element.parentNode.classList.remove("error");
      element.parentNode.classList.remove("success");

      element.parentNode
        .getElementsByTagName("i")[0]
        .classList.remove("error-icon");
      element.parentNode
        .getElementsByTagName("i")[0]
        .classList.remove("success-icon");

      element.parentNode.classList.add("error");
      element.parentNode
        .getElementsByTagName("i")[0]
        .classList.add("error-icon");

      element.parentNode.parentNode.getElementsByTagName("small")[0].innerText =
        "Field cannot be blank!";

      element.parentNode.parentNode
        .getElementsByTagName("small")[0]
        .classList.remove("error");
      element.parentNode.parentNode
        .getElementsByTagName("small")[0]
        .classList.remove("success");
      element.parentNode.parentNode
        .getElementsByTagName("small")[0]
        .classList.add("error");

      flag_login = false;
    } else {
      element.parentNode.classList.remove("error");
      element.parentNode.classList.remove("success");

      element.parentNode
        .getElementsByTagName("i")[0]
        .classList.remove("error-icon");
      element.parentNode
        .getElementsByTagName("i")[0]
        .classList.remove("success-icon");

      element.parentNode.classList.add("success");
      element.parentNode
        .getElementsByTagName("i")[0]
        .classList.add("success-icon");

      element.parentNode.parentNode.getElementsByTagName("small")[0].innerText =
        "Accepted!";

      element.parentNode.parentNode
        .getElementsByTagName("small")[0]
        .classList.remove("error");
      element.parentNode.parentNode
        .getElementsByTagName("small")[0]
        .classList.remove("success");
      element.parentNode.parentNode
        .getElementsByTagName("small")[0]
        .classList.add("success");
    }
  });

  if (!flag_login) {
    e.preventDefault();
    alert("Please check all the fields!");
  }
});

form.addEventListener("reset", (e) => {
  inputs.forEach((element) => {
    element.parentNode.classList.remove("error");
    element.parentNode.classList.remove("success");

    element.parentNode
      .getElementsByTagName("i")[0]
      .classList.remove("error-icon");
    element.parentNode
      .getElementsByTagName("i")[0]
      .classList.remove("success-icon");

    element.parentNode.parentNode
      .getElementsByTagName("small")[0]
      .classList.remove("error");
    element.parentNode.parentNode
      .getElementsByTagName("small")[0]
      .classList.remove("success");

    element.parentNode.parentNode.getElementsByTagName("small")[0].innerText =
      "";
  });
});

function showpwd() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
