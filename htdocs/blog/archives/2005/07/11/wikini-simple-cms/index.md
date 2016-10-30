--- 
Title: Wikini comme simple CMS
Author: Seb
Template: post
Permalink: /blog/archives/2005/07/11/wikini-simple-cms
Date: 2005-07-11T11:28:59+00:00
Categories: Design, Développement, Divers, Projets, Web
--- 

L&rsquo;idée peut paraître originale, pourtant cela n&rsquo;est pas idiot. Les fonctionnalités de base d&rsquo;un moteur de wiki sont : la facilité d&rsquo;édition et la possibilité pour n&rsquo;importe qui d&rsquo;intervenir sur le contenu&#8230; Pour avoir un CMS simple, il suffit de brider la seconde possibilité.

<!--more-->

Wikini est un outil intéressant car il s&rsquo;agit d&rsquo;un moteur de Wiki. 

## Les Wikis

Les wiki sont des outils de collaboration exceptionnels car ils permettent à tous les utilisateurs de modifier toutes les pages à volonté. Cette liberté peut faire peur dans un premier temps : est-ce que quelqu&rsquo;un ne va pas supprimer ce que j&rsquo;ai mis tant de temps à rédiger ? Il y a peu de risque car l&rsquo;objectif principal est la mise en commun d&rsquo;informations.

Cependant ce concept théorique se heurte souvent à la stupidité de certaines personnes&#8230; Cette liberté de création, modification ou suppression est souvent entourées dans ces outils de règles de propriété, d&rsquo;appartenance à la communauté (attribution d&rsquo;accès aux membres de confiance), et de gestion de version permettant de faire un retour arrière en cas de mauvaise manipulation ou d&rsquo;abus de modification.

## Pourquoi pas ?

Ce qui m&rsquo;intéresse surtout dans ces outils, c&rsquo;est la manière dont il est facile de rédiger une page&nbsp; : un clic pour modifier, le texte apparaît avec quelques raccourcis de mise en forme, on change le texte, on valide et la page est mise à jour.

## Etude de cas : Site Vitrine

Dans le cas d&rsquo;un site institutionnel vitrine, il faut mettre en place un site ne contenant que quelques pages, faciles à mettre à jour pour un néophyte en HTML.

Dans un premier temps, je me suis dit que quelques pages statiques étaient suffisantes mais elles n&rsquo;auraient pas été simples à maintenir par le client qui n&rsquo;a que peu de connaissances en HTML.

Dans un second temps, je me suis dit que le déploiement d&rsquo;un outil de gestion de contenu type portail comme SPIP était trop lourd et qu&rsquo;il n&rsquo;y avait pas de réel besoin de rubriques, de news, de forum&#8230;

Puis, je me suis dit que wikini pourrait être intéressant : facile à mettre, facile à mettre à jour, gestion des droits parfaite pour notre usage. Il suffisait de donner un réel look aux pages et de restreindre les fonctionnalités de collaboration afin maîtriser le contenu des pages du site.

## Mode d&rsquo;emploi

Il suffit de déterminer à l&rsquo;avance le nom d&rsquo;utilisateur de l&rsquo;administrateur, de ne donner par défaut les droits de modification des pages à cet utilisateur. Ainsi quand une nouvelle page est créée, seul l&rsquo;administrateur peut en changer le contenu.

De plus avec la gestion des droits de wikini, il sera possible plus tard de créer des pages protégées où d&rsquo;autres utilisateurs pourront faire des modifications : on aura sans peine un espace client interactif et restreint.

Ensuite il faut changer l&rsquo;entête standard de Wikini qui offre les services de base des wiki : retour à la PagePrincipale; liste des derniers changements, liste des derniers commentaires, les paramètres de l&rsquo;utilisateur courant. Ces fonctionnalités ne sont pas pertinentes dans notre cas, il nous faudrait plutôt une navigation à travers les pages importantes. Pour des raisons de flexibilité, il faudrait que la navigation puisse être gérée par le client, on pourra donc créer une page NaVigation qui sera facilement modifiable et dans laquelle il pourra mettre des raccourcis vers les pages importantes.

Il ne reste plus qu&rsquo;à modifier les droits d&rsquo;accès pour les pages de gestion : statistiques, lien vers l&rsquo;édition de la navigation, etc, pour ne laisser en accès public que les pages prévues. Selon les besoins, il est aussi possible de brider la fonction d&rsquo;inscription de nouveaux membres pour maîtriser les utilisateurs avec pouvoir : création et modification de certaines pages.

Il ne reste plus qu&rsquo;à habiller le site avec un design adéquat en créant une feuille de style CSS. Ensuite le site peut être livré avec une petite formation&nbsp;: notion d&rsquo;administration, édition des pages&#8230;

Exemple en phase d&rsquo;élaboration&nbsp;: [Astec (en développement)][1]

[Technorati Tags][2] : <a href="http://technorati.com/tag/wikini" rel="tag">wikini</a>, [CMS][3], <a href="http://technorati.com/tag/development" rel="tag">development</a>

 [1]: http://astec.z720.net
 [2]: http://technorati.com/tags
 [3]: http://technorati.com/tag/CMS