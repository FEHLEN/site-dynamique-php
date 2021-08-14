# site-dynamique-php
1) Créer un dossier classes et un dossier controllers. Télécharger un theme possédant un menu : sur html5up.
2) Créer un fichier index.php : inclure la page classes/Page.php et un appel à la fonction prepare.
3) Coder dans la Page.php du dossier classes : instruire les variables page et theme, mettre une fonction construct et une fonction string, ainsi l'objet $fichier = theme->index.twig.
4) Ensuite la page index.html s'affiche sans les paramètres css puisque le fichier n'est plus la racine, il est dans le dossier html5up-massively - donc ajouter dans le head de index.html, la bonne adresse -link rel="stylesheet" href="html5up-massively/assets/css/main.css" - faire ainsi sur tous les liens en bas de la page de code.
5) Lorsque vous lancez le serveur la page sitedynamique2 apparaît.
6) Installer l'extension twig sur visual studio code : Twig 1.0.2 de base.
7) Créer un fichier index.twig et copier tout le code de index.html dedans.
8) Dans ce fichier pour créer un template :  installer les variables à la place de titre, de sous titre, de contenu, de pied de page entre moustache {{}}.
9) La fonction prepare permet de mettre à exécution les remplacements coder en dur.
10) La fonction remplaceLabel servira à remplacer les variables entre {{}} par leur contenu dans la page correspondante index.twig.
11) Création d'un controllers "Home" fichier home.php dans le dossier controllers. Le paramétrer dans index.php => new Page("Home").
12) Pour Changer le nom d'une variable "page" en "code_page", selectionner une mot page, click droit avec la souris et dans la liste choisir modifier toutes les occurences, taper le nouveau texte.
13) La nouvelle variable "page" servira d'objet pour définir le nom de la nouvelle page créer, exemple blog ...
14) Remplacer le mot var par private : cela empéche le changement de ces variables pour les sécurisés.
15) Dans la fonction construct($page) instensier la variable $fichier qui correspond au chemin dossier = theme et fichier = /index.twig. Le fichier trouvé est mis dans la variable $code_page.
16) Dans la fonction prepare on appel le fichier du controllers de la page concernée par un include_once ...
17) Les contenus des variables en moustache on veut les mettre dans le fichier du controllers.
18) On crée la fonction controleur dans le fichier Home.php du dossier controllers.
19) Création d'un table "foreach" recherche en boucle pour les variables label et texte qui sont cherchées dans le controllers. $texte est le nom en moustache et label est le contenu.
20) Dans la fonction controlleur, je recherche dans chaque intitulé en variable $texte ce qui lui correspond, chaque ligne est consultée, et la variable $texte est remplacée par le contenu $label.$texte = 'titre' $label = "PHP site dynamique".
21) Ajout d'un nouveau fichier dans controllers correspondant à une nouvelle page = "Apropos" dans laquelle la fonction controleur retourne de nouveaux contenus.
22) Ajout d'un nouveau fichier dans controllers correspondant à une nouvelle page = "Catalogue" dans laquelle la fonction controleur retourne de nouveaux contenus.
23) Si l'on met dans le fichier index.php le nom de la new Page('catalogue') la page index.twig aura le formatage du fichier Catalogue.php cela n'est pas bon. Les pages doivent être différenciées.
24) Création du menu de navigation pour différencier les pages.
25) On supprime les lignes du menu, les lignes (li> et on met la variable $nav ou $menu.
26) Dans la fonction prepare de Page.php : on dit que l'on remplace le mot {{menu}} par la variable $menu. Dans cette variable on veut y mettre le nom de la page concernée dans le controllers soit Home, soit Apropos ... pour que dans la ligne du (li> le liens vers la page soit correct href="".
27) On ouvre le dossier directeur opendir = controllers tant que on lit un fichier, si ce fichier avec un . alors la variable $menu ou $nav sera = -li class="active" a href="index.php?page=-$page-  "- le nom  de la page = $label.
28) On détermine le nom de la page en enlevant le .php par la commande substr($fichier,0,-4).
29) Le label est obtenu en prenant le nom de la page à laquelle on enlève par la commande str_repace : le souligné _ et on le remplace par rien.
30) Pour rendre la page cliquée active et identification de la page courrante : dans le construct mettre ($page = "Home") puis dans la fonction prepare ajouter une condition pour le menu.
31) Pour différencier la page dans le menu, pour ne pas afficher la même il faut guetter $ _GET de la page et lui mettre le bon nom de page.
32) Paramétrer la classe Page mettre par defaut le theme dans le construct $theme = "le nom du theme".
33) Faire aussi pour le template dans le construct $template = "index".
34) Mettre en place des Setters fonction setTheme, fonction setTemplate et un setDossier_controllers sous la fonction construct surtout pas dedans.
35) Verifier que les variables $theme, $template et $dossier_controllers soient bien instanciés avant et dans le construct avec un private devant et une valeur.
36) Dans fichier index.php il est possible de paramétrer le nom du dossier_controllers grâce au setDossier_controllers.
37) Dans fichier index.php il est possible de paramétrer le nom du theme grâce au setTheme.
38) A condition de changer de place la recherche du fichier.twig qui doit être placé dans la fonction prepare car éxécutée après le parametrage du theme pour trouver le fichier.
39) Les liens dans le code CSS doivent aussi être paramétrer pour le changement de nom du theme. Ainsi que les script de javaScript en bas de page de code.
40) Dans la fonction prepare ajouter le remplacement du mot "theme" entre moustache dans le fichier index.twig par la variable $theme.
41) Le controller maîtrise le template. voir la video avec une page catalogue.twig. Le controlleur catalogue récupere le texte 'template' est remplace la valeur pour trouver le bon fichier du template catalogue.twig.

