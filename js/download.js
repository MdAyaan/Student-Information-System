function exportData() {
  /* Get the HTML data using Element by Id */
  var table = document.getElementById("myTable");
  console.log(table);
  /* Declaring array variable */
  var rows = [];

  //iterate through rows of table
  for (var i = 0, row; (row = table.rows[i]); i++) {
    //rows would be accessed using the "row" variable assigned in the for loop
    //Get each cell value/column from the row
    if (row.style.display != "none") {
      column1 = row.cells[0].innerText;
      column2 = row.cells[1].innerText;
      column3 = row.cells[2].innerText;
      column4 = row.cells[3].innerText;
      column5 = row.cells[4].innerText;
      column6 = row.cells[5].innerText;
      column7 = String(row.cells[6].innerText);
      column8 = row.cells[7].innerText;
      column9 = row.cells[8].innerText;
      // column5 = row.cells[9].innerText;
      // column5 = row.cells[4].innerText;
      console.log(column7);
      /* add a new records in the array */
      rows.push([
        column1,
        column2,
        column3,
        column4,
        column5,
        column6,
        column7,
        column8,
        column9,
      ]);
    }
  }
  csvContent = "data:text/csv;charset=utf-8,";
  /* add the column delimiter as comma(,) and each row splitted by new line character (\n) */
  rows.forEach(function (rowArray) {
    row = rowArray.join(",");
    csvContent += row + "\r\n";
  });

  /* create a hidden <a> DOM node and set its download attribute */
  var encodedUri = encodeURI(csvContent);
  var link = document.createElement("a");
  link.setAttribute("href", encodedUri);
  link.setAttribute("download", "Data_IET");
  document.body.appendChild(link);
  /* download the data file named "Stock_Price_Report.csv" */
  link.click();
}
