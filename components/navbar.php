<base href="/info">
<link rel="stylesheet" href="/info/styles/index.css">
<section id="navbar">
    <div id="logo">Brand</div>
    <div id="nav-menu">
      <input type="checkbox" id="check" />
      <label for="check">
        <div id="hamburger-toggle"></div>
      </label>
      <ul>
      <?php if(!((isset($_SESSION['loggedin'])) && $_SESSION['loggedin']==true)){echo "<li><a href='/info/admin-login/' class='nav-item'>"."Login"."</a></li>";} else echo "<li><a href='/info/admin-logout/' class='nav-item'>"."Logout"."</a></li>"; ?>
        <li><a href="/info/" class="nav-item">Create</a></li>
        <li><a href="/info/edit/"  class="nav-item">Edit</a></li>
        <!-- <li><a href="/info/delete/" class="nav-item">Delete</a></li> -->
        <li><a href="/info/view/" class="nav-item">View Records</a></li>
      </ul>
    </div>
  </section>
