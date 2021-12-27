var navmenuitems = document.getElementsByClassName("nav-item");

window.onload = () => {
  Array.from(navmenuitems).forEach((element) => {
    if (element.href === window.location.href) {
      element.classList.add("active");
    } else {
      console.log(element.href);
      // console.log(window.location.href);
      element.classList.remove("active");
    }
  });
};
