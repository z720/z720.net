/*
 Title: Convertir la base MySQL de WordPress en UTF-8
 Author: Seb
 Template: post
 Permalink: /blog/archives/2005/09/21/convertir-wordpress-en-utf-8
 Date: 2005-09-21T15:14:49+00:00
 Categories: Développement, Summer Refresh, Web, WordPress
*/
Lors de la mise en place de WordPress sur ce site, j&rsquo;avais décidé de ne pas passer le site en UTF-8. A ce moment là, je passais de [ DotClear ][1] à [ WordPress ][2] et mon DotClear était en ISO-8859-1&#8230; 

Aujourd&rsquo;hui dans le cadre de mon &laquo;&nbsp;Summer Refresh&nbsp;&raquo;, j&rsquo;en profite pour convertir ma base en UTF-8. 

Le problème c&rsquo;est que ce n&rsquo;est pas simple&#8230; Voici comment, je pense y arriver. 

<!--more-->

Une des difficultés de cette opération, c&rsquo;est qu&rsquo;il faut la réaliser à travers un navigateur web. En effet pour manipuler les informations de ma base, il faut que je passe par [ phpMyAdmin ][3] . 

### Les étapes 

J&rsquo;ai d&rsquo;abord commencé par faire une extraction du contenu de ma base (un dump) avec l&rsquo;encodage latin1 (ISO-8859-1), je me suis bien évidemment dit qu&rsquo;il ne me restait plus qu&rsquo;é convertir le fichier et le réinsérer dans MySQL. J&rsquo;ai donc pris mon éditeur de texte préféré et j&rsquo;ai lancé la conversion du fichier de ASCII vers UTF-8. Après insertion des nouvelles données, c&rsquo;est malheureusement l&rsquo;échec&#8230; 

Après un coup de google, je me rend compte que pour bien faire, il faudrait que je fasse un dump via mysqldump puis une conversion avec iconv et l&rsquo;opération inverse avec mysqldump. Mais il faut prendre en compte la contrainte du navigateur : pas de mysqldump. Et comme je suis sous Windows, je n&rsquo;ai pas accès à iconv. 

C&rsquo;est lé que php vient à notre secours : il va nous permettre de faire une conversion vers UTF-8 via la fonction [ utf8_encode ][4] . Mais encore une fois cela ne fonctionne pas correctement, phpMyAdmin refuse obstinément d&rsquo;intégrer le fichier. Je trouve un commentaire dans la documentation php qui conseille de manipuler les fichiers en binaire avec cette astuce, je peux ensuite intégrer mon contenu de WordPress avec un nouvel encodage via phpMyAdmin en précisant que le fichier doit être lu en binaire. 

Voici le code utilisé pour convertir le fichier en UTF-8, avec les entêtes et un format binaire.

     
    <?php
    // Récupération du fichier à convertir
    $str = file_get_contents($_REQUEST['file']);
    // Ouverture en binaire du fichier oé l'on va écrire
    $fh = fopen($_REQUEST['file'].'_UTF','wb');
    // Conversion puis écriture dans le fichier
    fwrite($fh, "\xEF\xBB\xBF".utf8_encode($str));
    // Fermeture du fichier
    fclose($fh);
    ?>
      
     </p> 

Ce script doit bien entendu être utilisé en local, car il n&rsquo;est pas du tout sécurisé : le fichier est passé directement en paramètre sans contrôle&#8230; 

### La manipulation finale 

1.  Dans phpMyAdmin, exporter de la base de données 
2.  Editer le contenu du fichier et ** supprimer toutes les informations d&rsquo;encodage au niveau des instructions de création de table (DEFAULT CHARSET&#8230;) ** 
3.  Convertir le fichier avec le ** script php ** ci-dessus 
4.  Créer un nouvelle base avec un encodage par défaut de type UTF-8 
5.  Insérer le fichier via phpMyAdmin dans la nouvelle base en utilisant le jeu de caractère ** binaire ** 
6.  ** Remplacer ** l&rsquo;ancienne base par la nouvelle 
7.  Ne pas oublier de convertir les fichiers de WordPress : les fichiers de thème, le fichier de localisation, &#8230;

 [1]: http://www.dotclear.net
 [2]: http://www.wordpress.org
 [3]: http://www.phpmyadmin.net/home_page/
 [4]: http://fr.php.net/manual/fr/function.utf8-encode.php