<?php

$host = "localhost"; //	Adresse du serveur MySQL
$dbname = "task_manager"; //Nom de ta base de données
$username = "root"; //Identifiant de connexion
$password = ""; //Mot de passe MySQL

try { //essaie d'excuter le code
    $connexion = new PDO( //crée la connexion à MySQL
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // demander explicitement à PDO en cas d'erreur
        ]
    );
    //echo "Connexion réussie à la base de données !";

} catch (PDOException $e) { //intercepte une erreur eventuelle $e contient les infos sur l'erreur
    die("Erreur de connexion : " . $e->getMessage()); //arrete le script et affiche le message
}