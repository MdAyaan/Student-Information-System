edits = document.getElementsByClassName("edit-entry");
deletes = document.getElementsByClassName("delete-entry");

var fname = document.getElementById("first-name");
var lname = document.getElementById("last-name");
var branch = document.getElementById("branch");
var semester = document.getElementById("semester");
var session = document.getElementById("session");
var rollno = document.getElementById("rollno");
var rollkey = document.getElementById("rollkey");
var year = document.getElementById("year");
var dob = document.getElementById("dob");
var address = document.getElementById("address");
var email = document.getElementById("email");
// console.log(deletes);

Array.from(deletes).forEach((element) => {
  element.addEventListener("click", (e) => {
    var check = confirm("Are you sure you want to delete this entry!?");

    if (check) {
      const xhr1 = new XMLHttpRequest();
      const url = "/info/components/delete.php";
      xhr1.open("POST", url, true);

      xhr1.onload = () => {
        let response_delete = xhr1.responseText;
        console.log(response_delete);
        if (response_delete === "True") {
          alert("Record deleted Succesfully!");
          setTimeout(() => {
            window.location.href = "/info/edit/";
          }, 0);
        }
      };

      //
      xhr1.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded"
      );
      xhr1.send("riddel=" + element.id.slice(1));
    }
  });
});

Array.from(edits).forEach((element) => {
  // document.getElementById("new-record").scrollIntoView();

  element.addEventListener("click", (e) => {
    document
      .getElementsByClassName("modal")[0]
      .classList.toggle("modal-visibility");
    // document.getElementsByClassName("modal")[0].style.display = "block";

    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0;
    document.getElementsByTagName("body")[0].style.overflow = "hidden";
    // console.log(element.id.slice(1));
    // location.href = "#";
    // location.href = "#edit-record";
    const xhr = new XMLHttpRequest();
    const url = "/info/components/fetch.php";
    xhr.open("POST", url, true);

    xhr.onload = () => {
      let arr = xhr.response.split("\n");
      console.log(arr);
      rollkey.value = arr[0];
      rollno.value = arr[0];
      fname.value = arr[1];
      lname.value = arr[2];
      branch.value = arr[3];
      session.value = arr[4];
      semester.value = arr[5];
      dob.value = arr[6];
      email.value = arr[7];
      address.value = arr[8];
      year.value = arr[9];

      if (arr[9] === 1) {
        year.value = "1st year";
      }
      if (arr[9] === 2) {
        year.value = "2nd year";
      }
      if (arr[9] === 3) {
        year.value = "3rd year";
      }
      if (arr[9] === 4) {
        year.value = "4th year";
      }
    };

    //
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("rid=" + element.id.slice(1));
  });
});

var cross = document.getElementsByClassName("cross");
cross[0].addEventListener("click", () => {
  document
    .getElementsByClassName("modal")[0]
    .classList.toggle("modal-visibility");
  // document.getElementsByClassName("modal")[0].style.display = "none";
  document.getElementsByTagName("body")[0].style.overflow = "auto";
});
