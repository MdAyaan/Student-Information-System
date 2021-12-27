var previous = document.getElementsByClassName("previous");
var next = document.getElementsByClassName("next");
var steps = document.getElementsByClassName("step");
var form = document.getElementById("entry-form");
var inputs = form.getElementsByTagName("input");
var selects = form.getElementsByTagName("select");

form.addEventListener("submit", (e) => {
  var flag = true;
  Array.from(inputs).forEach((element) => {
    if (element.value.trim() === "") {
      element.parentNode.parentNode
        .getElementsByTagName("small")[0]
        .classList.remove("success");
      element.parentNode.classList.remove("success");
      element.parentNode.parentNode
        .getElementsByTagName("legend")[0]
        .classList.remove("success");

      element.parentNode.parentNode
        .getElementsByTagName("i")[0]
        .classList.remove("hide-icon");

      element.parentNode.parentNode
        .getElementsByTagName("i")[1]
        .classList.remove("hide-icon");

      element.parentNode.parentNode
        .getElementsByTagName("i")[1]
        .classList.add("hide-icon");

      element.parentNode.parentNode
        .getElementsByTagName("small")[0]
        .classList.add("error");
      element.parentNode.classList.add("error");
      element.parentNode.parentNode
        .getElementsByTagName("legend")[0]
        .classList.add("error");

      element.parentNode.parentNode.getElementsByTagName("small")[0].innerText =
        "*This field cannot be blank!";
      flag = false;
    } else {
      element.parentNode.parentNode
        .getElementsByTagName("i")[0]
        .classList.remove("hide-icon");

      element.parentNode.parentNode
        .getElementsByTagName("i")[0]
        .classList.add("hide-icon");

      element.parentNode.parentNode
        .getElementsByTagName("i")[1]
        .classList.remove("hide-icon");

      element.parentNode.parentNode
        .getElementsByTagName("small")[0]
        .classList.remove("error");
      element.parentNode.classList.remove("error");
      element.parentNode.parentNode
        .getElementsByTagName("legend")[0]
        .classList.remove("error");

      element.parentNode.parentNode
        .getElementsByTagName("small")[0]
        .classList.add("success");
      element.parentNode.classList.add("success");
      element.parentNode.parentNode
        .getElementsByTagName("legend")[0]
        .classList.add("success");

      element.parentNode.parentNode.getElementsByTagName("small")[0].innerText =
        "The value is accepted!";
      // flag = false;
    }
  });

  Array.from(selects).forEach((element) => {
    if (element.value.trim() === "none") {
      element.parentNode.parentNode
        .getElementsByTagName("small")[0]
        .classList.remove("success");
      element.parentNode.classList.remove("success");
      element.parentNode.parentNode
        .getElementsByTagName("legend")[0]
        .classList.remove("success");

      element.parentNode.parentNode
        .getElementsByTagName("i")[0]
        .classList.remove("hide-icon");

      element.parentNode.parentNode
        .getElementsByTagName("i")[1]
        .classList.remove("hide-icon");

      element.parentNode.parentNode
        .getElementsByTagName("i")[1]
        .classList.add("hide-icon");

      element.parentNode.parentNode
        .getElementsByTagName("small")[0]
        .classList.add("error");
      element.parentNode.classList.add("error");
      element.parentNode.parentNode
        .getElementsByTagName("legend")[0]
        .classList.add("error");

      element.parentNode.parentNode.getElementsByTagName("small")[0].innerText =
        "*This field cannot be blank!";
      flag = false;
    } else {
      element.parentNode.parentNode
        .getElementsByTagName("i")[0]
        .classList.remove("hide-icon");

      element.parentNode.parentNode
        .getElementsByTagName("i")[0]
        .classList.add("hide-icon");

      element.parentNode.parentNode
        .getElementsByTagName("i")[1]
        .classList.remove("hide-icon");

      element.parentNode.parentNode
        .getElementsByTagName("small")[0]
        .classList.remove("error");
      element.parentNode.classList.remove("error");

      element.parentNode.parentNode
        .getElementsByTagName("legend")[0]
        .classList.remove("error");

      element.parentNode.parentNode
        .getElementsByTagName("small")[0]
        .classList.add("success");
      element.parentNode.classList.add("success");

      element.parentNode.parentNode
        .getElementsByTagName("legend")[0]
        .classList.add("success");

      element.parentNode.parentNode.getElementsByTagName("small")[0].innerText =
        "The value is accepted!";
      // flag = false;
    }
  });

  if (!flag) {
    e.preventDefault();
    alert("Please fill in all the fields!");
  }
});

form.addEventListener("reset", () => {
  console.log("Reset pressed");
  Array.from(inputs).forEach((element) => {
    element.parentNode.classList.remove("error");
    element.parentNode.parentNode
      .getElementsByTagName("legend")[0]
      .classList.remove("success");
    element.parentNode.classList.remove("success");
    element.parentNode.parentNode
      .getElementsByTagName("legend")[0]
      .classList.remove("error");
    element.parentNode.parentNode
      .getElementsByTagName("small")[0]
      .classList.remove("success");
    element.parentNode.parentNode
      .getElementsByTagName("small")[0]
      .classList.remove("error");
    element.parentNode.parentNode.getElementsByTagName("small")[0].innerText =
      "";

    element.parentNode.parentNode
      .getElementsByTagName("i")[0]
      .classList.remove("hide-icon");

    element.parentNode.parentNode
      .getElementsByTagName("i")[0]
      .classList.add("hide-icon");

    element.parentNode.parentNode
      .getElementsByTagName("i")[1]
      .classList.remove("hide-icon");

    element.parentNode.parentNode
      .getElementsByTagName("i")[1]
      .classList.add("hide-icon");
  });
  Array.from(selects).forEach((element) => {
    element.parentNode.parentNode
      .getElementsByTagName("i")[0]
      .classList.remove("hide-icon");

    element.parentNode.parentNode
      .getElementsByTagName("i")[0]
      .classList.add("hide-icon");

    element.parentNode.parentNode
      .getElementsByTagName("i")[1]
      .classList.remove("hide-icon");

    element.parentNode.parentNode
      .getElementsByTagName("i")[1]
      .classList.add("hide-icon");

    element.parentNode.classList.remove("error");
    element.parentNode.parentNode
      .getElementsByTagName("legend")[0]
      .classList.remove("success");
    element.parentNode.classList.remove("success");
    element.parentNode.parentNode
      .getElementsByTagName("legend")[0]
      .classList.remove("error");
    element.parentNode.parentNode
      .getElementsByTagName("small")[0]
      .classList.remove("success");
    element.parentNode.parentNode
      .getElementsByTagName("small")[0]
      .classList.remove("error");
    element.parentNode.parentNode.getElementsByTagName("small")[0].innerText =
      "";
  });
});
