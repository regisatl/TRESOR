<?php
    try
    {
        $bd = new PDO ('mysql:host=localhost;dbname=tresor','root','');
    }
    catch(PDOException $e)
    {
        die('Une erreur a été trouvée...'.$e->getMessage());
    }

?>