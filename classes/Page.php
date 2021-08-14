<?php
function afficheProblemeInstallation($msg){//fonction généraliste des erreurs
    ?>
    <h1>Erreur d'installation dans la structure de votre code !</1>
    <p>Le nom du dossier ou du fichier est incorrect, veuillez le corriger. Il doit être identique dans la structure et en variable dans 
        le code en fonction construct ou en fonction prepare.</p>
    <?php
    echo $msg;
    die();
}

class Page {
    private $code_page = "";
    private $page = "";
    //private $theme = "html5up-massively";
    private $theme = "";
    private $template = "";
    private $dossier_controllers = "";
    private $dossier_themes = "";

    function __construct($page = "Home", $theme = "html5up-massively", $template = "index", $dossier_controllers = "controllers",$dossier_themes= "themes"){
        //initialiser toutes les valeurs des variables
        $this->theme = $theme;
        $this->template = $template;
        if(is_dir($dossier_controllers)){//Je vérifie si le bon nom de dossier_controllers existe
            $this->dossier_controllers = $dossier_controllers;
        }else{
            afficheProblemeInstallation("Dossier controllers");
        }
        if(is_dir($dossier_themes)){//Je vérifie si le bon non du dossier themes existe
            $this->dossier_themes = $dossier_themes;
        }else{
            afficheProblemeInstallation("Dossier themes");
        }
        

        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }
        $this->page = $page;
      
    }
    function setTheme($theme){//Setter qui permet de forcer en changeant la valeur de la variable dans index.php
        $this->theme = $theme;
    }
    function setTemplate($template){
        $this->template = $template;
    }
    function setControllers($dossier_controllers){
        $this->dossier_controllers = $dossier_controllers;
    }

    function __toString(){
        return $this->code_page;//Affichage de la page
    }
    function remplaceLabel($label, $texte){//Je remplace les variables label et texte par leur contenu (dans la fonction controlleur) de la page correspondante
        $this->code_page = str_replace("{{ $label }}", $texte, $this->code_page);
    }
    function prepare(){//Je fais des recherches sur la page correspondante et je traite cette page
        if(!is_file($this->dossier_controllers."/".$this->page.".php")){
            afficheProblemeInstallation("Le controleur que vous appelez n'existe pas !");
        }
        include_once $this->dossier_controllers."/".$this->page.".php";
        $textes = controleur();
        if(isset($textes['template'])){//on recupere le texte template dans le controlleur si il existe
            $this->template = $textes['template'];
            unset($textes['template']);
        }
        //Je recherche le fichier.twig qui correspond
        $fichier = $this->dossier_themes."/".$this->theme."/".$this->template.".twig";
        if(!is_file($fichier)){
            afficheProblemeInstallation("Template inexistant erreur dans le controllers");
        }
        $this->code_page = file_get_contents($fichier);//readfile envoie dans le buffer donc utiliser file_get_content pour mettre dans une variable
        $this->remplaceLabel("theme", $this->theme);

        $nav = "";
        if($d = opendir("controllers/")){
            while($fichier=readdir($d)){
                if($fichier[0] != "."){
                    $page = substr($fichier, 0, -4);
                    $label = str_replace("_"," ",$page);
                    if ($page == $this->page){
                        $temp = "class='active'";
                    }else{
                        $temp = "";
                    }
                    $nav .='<li '.$temp.'><a href="index.php?page='.$page.'">'.$label.'</a></li>';
                }
            }   
        }
        $this->remplaceLabel("nav", $nav);
        
        foreach ($textes as $label =>$texte){
            $this->remplaceLabel($label, $texte); 
        }
        /*$this->remplaceLabel("titre", $texte['titre']); 
        $this->remplaceLabel("sous-titre", $texte['sous-titre']); 
        $this->remplaceLabel("titre-court", $texte['titre-court']); 
        $this->remplaceLabel("contenu", $texte['contenu']); 
        $this->remplaceLabel("pied-infos", $texte['pied-infos']);
        $this->remplaceLabel("pied-page", $texte['pied-page']);*/
    }
}


?>