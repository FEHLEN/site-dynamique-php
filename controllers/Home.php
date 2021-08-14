<?php
    function controleur(){
        return [
            'titre' => "PHP site dynamique",
            'sous-titre' => "Cours de Marc Augier",
            'titre-court' => "En avant",
            'contenu' => "1) Créer un dossier classes et un dossier controllers.<br/>
            2) Créer un fichier index.php : inclure la code_page classes/code_page.php.<br/>
            3) Coder dans la code_page.php du dossier classes : instruire les privateiables code_page et theme, mettre une fonction construct et une fonction string.<br/>
            4) Ensuite la code_page index.html s'affiche sans les paramètres css puisque le fichier n'est plus la racine, il est dans le dossier html5up-massively - donc ajouter dans le head de index.html, la bonne adresse <link rel=stylesheet href=html5up-massively/assets/css/main.css /> faire ainsi sur tous les liens en bas de la code_page de code.<br/>
            5) Lorsque vous lancez le serveur la code_page sitedynamique2 apparaît.<br/>
            6) Installer l'extension twig sur visual studio code : Twig 1.0.2 de base.<br/>
            7) Créer un fichier index.twig et copier tout le code de index.html dedans.<br/>
            8) Dans ce fichier pour créer un template :  installer les privateiables à la place de titre, de sous titre, de contenu, de pied de code_page entre moustache {{}}.",
            'pied-infos' => "<p>Adresse : 36 route de Bayonne<br/>64140 Billère</p>",
            'pied-page' => "<p>Téléphone : 06 38 70 09 81</p>",
            'author' => "Nelly Fehlen",
        ];
    }

//ne pas fermer le script