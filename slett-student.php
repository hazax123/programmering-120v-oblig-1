<?php  /* slett-student */
/*  Programmet lager et skjema for å velge en student som skal slettes
/*  og sletter den valgte studenten */
?>

<script src="funksjoner.js"> </script>

<h3>Slett student</h3>

<form method="post" action="" id="slettStudentSkjema" name="slettStudentSkjema" onSubmit="return bekreft()">
  Student
  <select name="brukernavn" id="brukernavn" required>
    <option value="">velg student</option>
    <?php include("dynamiske-funksjoner.php"); listeboksBrukernavn(); ?>
  </select> <br/>
  <input type="submit" value="Slett student" id="slettStudentKnapp" name="slettStudentKnapp" />
</form>

<?php
  if (isset($_POST ["slettStudentKnapp"]))
    {
      $brukernavn=$_POST ["brukernavn"];

      include("db-tilkobling.php");

      $sqlSetning="DELETE FROM student WHERE brukernavn='$brukernavn';";
      mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");

      print ("F&oslash;lgende student er n&aring; slettet: $brukernavn");
    }
?>
