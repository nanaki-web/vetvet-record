<?php
/*if (extension_loaded ('PDO')) {
echo 'PDO OK'; 
} else {
echo 'PDO KO'; 
}*/
//ce code permet de verifier la connection dés le depart



    function connect () {
    
                // Paramètres de connexion serveur local
                $host ="database";
                $login="root";     // Votre loggin d'accès au serveur de BDD 
                $password="tiger";    // Le Password pour vous identifier auprès du serveur
                $base ="record";    // La bdd avec laquelle vous voulez travailler 
        
        
        try{        
                //$db = new PDO('mysql:host=localhost;charset=utf8;dbname=hotel', 'root', '');
                $db = new PDO("mysql:host=".$host.";charset=utf8;dbname=".$base."", $login, $password);
                // $db = new PDO("mysql:dbname=record;host=database:3306", $login, $password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        
        catch (Exception $e) {
                echo "La connection à la base de données a échoué ! <br>";
                echo "Merci de bien vérifier vos paramètres de connection ...<br>";
                echo "Erreur : " . $e->getMessage() . "<br>";
                echo "N° : " . $e->getCode(). "<br>";
                die("Fin du script");
        } 
        
        //Attention : ne pas oublier de faire un return de la connection $db !
        return $db;
        
        }
        



        
        ?>