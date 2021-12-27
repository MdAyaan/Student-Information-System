function myFilterFunction(x) {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;

  //   input_name = document.getElementById("name-filter");
  //   input_roll = document.getElementById("roll-filter");
  filters = document.getElementsByClassName("filters-input");

  filter = filters[x - 1].value.toUpperCase();
  console.log(filter);
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[x];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
