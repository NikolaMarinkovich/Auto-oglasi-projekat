
<!--nav bar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Auto plac Marinkovic</a>
    </div>
    <ul class="nav navbar-nav">
      <li  <?php if(basename($_SERVER['SCRIPT_NAME'])=='index.php') echo 'class="active"'; ?> ><a href="index.php">Pocetna</a></li>
      <li  <?php if(basename($_SERVER['SCRIPT_NAME'])=='oglasi.php') echo 'class="active"'; ?> ><a href="oglasi.php">Oglasi</a></li> 
      <li  <?php if(basename($_SERVER['SCRIPT_NAME'])=='kontakt.php') echo 'class="active"'; ?> ><a href="kontakt.php">Kontakt</a></li>
		 
    </ul>
  </div>
</nav>
<!--KRAJ NAVA BAR -->
