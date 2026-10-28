<?php  /* slett-klasse */
/*  Programmet lager et skjema for å velge en klasse som skal slettes
/*  og sletter den valgte klassen hvis den ikke har studenter */
?>

<script src="funksjoner.js"> </script>

<h3>Slett klasse</h3>

<form method="post" action="" id="slettKlasseSkjema" name="slettKlasseSkjema" onSubmit="return bekreft()">
  Klasse
  <select name="klassekode" id="klassekode" required>
    <option value="">velg klasse</option>
    <?php include("dynamiske-funksjoner.php"); listeboksKlassekode(); ?>
  </select> <br/>
  <input type="submit" value="Slett klasse" id="slettKlasseKnapp" name="slettKlasseKnapp" />
</form>

<?php
  if (isset($_POST ["slettKlasseKnapp"]))
    {
      $klassekode=$_POST ["klassekode"];

      include("db-tilkobling.php");

      $sqlSetning="SELECT * FROM student WHERE klassekode='$klassekode';";
      $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
      $antallRader=mysqli_num_rows($sqlResultat);

      if ($antallRader!=0)  /* klassen har studenter */
        {
          print ("Klassen $klassekode kan ikke slettes fordi den har studenter");
        }
      else
        {
          $sqlSetning="DELETE FROM klasse WHERE klassekode='$klassekode';";
          mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");

          print ("F&oslash;lgende klasse er n&aring; slettet: $klassekode");
        }
    }
?>
