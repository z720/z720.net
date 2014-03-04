/*
 Title: Histoire d&rsquo;une mise &agrave;  jour
 Author: Seb
 Template: post
 Permalink: /blog/archives/2005/02/26/histoire-dune-mise-jour
 Date: 2005-02-25T23:18:56+00:00
 Categories: Développement, Projets, Web, WordPress
*/
Ce soir ce weblog est passé à la [dernière version de wordpress][1], petite histoire d&rsquo;une bascule

<!--more-->

&Agrave; force de planifier des évolutions sur des systèmes d&rsquo;informations, je me suis plié à l&rsquo;exercice sur mon propre site: il y a 8 jours Matt annonçait la sortie de la v1.5 de wordpress, il était donc temps de mettre à jour ma vieille version beta. 

## Procédure de préparation

1.  Récupérer en local de la vieille version en ligne
2.  Dupliquer les sources (pour comparaison ultérieure)
3.  Copie de la base en local
4.  Configuration pour rendre la version locale opérationnelle
5.  Lancement de la mise à jour avec la 1.5  
    &Agrave; partir de maintenant, la nouvelle version tourne en local. Il nous reste plus qu&rsquo;à vérifier que tout fonctionne bien et s&rsquo;il faut réappliquer les personnalisations. 
6.  Test de manière générale
7.  Test spécifique pour les points de personnalisation et comparaison des sources
8.  Mise à jour du fichier de localisation
9.  Validation : tout est ok, on peut tout envoyer sur le serveur

## Procédure de mise en ligne

&Agrave; partir de maintenant il s&rsquo;agit de déterminer une stratégie pour la mise en ligne finale. Afin d&rsquo;éviter de perturber les visiteurs, il faut au minimum afficher un [message d&rsquo;information pour les avertir des opérations en cours][2].

1.  Mise en place d&rsquo;un page d&rsquo;information comme [celle-ci par exemple][2]
2.  Modifer le fichier .htaccess pour faire pointer toutes les pages publiques vers la page d&rsquo;avertissement.   
    **Attention** : Nous aurons besoin plus tard d&rsquo;accéder à l&rsquo;administration pour faire des vérifications. Il ne faut pas de redirection vers la page d&rsquo;avertissement pour la partie d&rsquo;administration. 
3.  Supprimer tous les fichiers de l&rsquo;application hors `wp-config.php` qui contient la configuration;
4.  Charger tous les fichiers applicatifs de la version locale
5.  Lancer la procédure de mise à jour
6.  Faire les contrôles nécessaires pour s&rsquo;assurer que tout s&rsquo;est bien passé : liste des billets, pages, etc.
7.  Replacer le fichier .htaccess pour réactiver toutes les pages du site.
8.  C&rsquo;est fini&#8230;

 [1]: http://wordpress.org/development/2005/02/strayhorn/
 [2]: /v04/wp-admin/wp-maintenance.php