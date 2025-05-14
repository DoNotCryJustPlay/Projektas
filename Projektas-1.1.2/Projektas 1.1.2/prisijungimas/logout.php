<?php
session_start(); // Pradeda sesiją
session_unset(); // Išvalo visus sesijos duomenis
session_destroy(); // Sunaikina sesiją

// Nukreipiame į prisijungimo puslapį su užklausa, kad vartotojas buvo atsijungęs
header("Location: ../index.php?message=loggedout");
exit();
?>
