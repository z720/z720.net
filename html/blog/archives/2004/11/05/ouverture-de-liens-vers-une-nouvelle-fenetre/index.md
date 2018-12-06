--- 
Title: Ouverture de liens vers une nouvelle fen&ecirc;tre
Author: Seb
Template: post
Permalink: /blog/archives/2004/11/05/ouverture-de-liens-vers-une-nouvelle-fenetre
Date: 2004-11-05T08:30:00+00:00
Categories: Développement
--- 

Retour sur l&rsquo;article de cybercodeur <a href="http://www.cybercodeur.net/weblog/commentaires/detailsCarnet.php?idmessage=1088" hreflang="fr">Liens et nouvelle fenêtre</a> que je trouve très intéressant et que tout le monde n&rsquo;a pas l&rsquo;air d&rsquo;avoir bien compris.

<!--more-->

Eric Daspet a écrit un article (<a href="http://www.cybercodeur.net/weblog/commentaires/detailsCarnet.php?idmessage=1088" hreflang="fr">Liens et nouvelle fenêtre</a>) très intéressant sur le problème d&rsquo;ouverture de nouvelles fenêtres en <acronym>xhtml</acronym> strict. D&rsquo;après lui la question <q>Comment dois-je faire sans l&rsquo;attribut &lsquo;target&rsquo; qui a disparu?</q> revient souvent. J&rsquo;ai passé un bout de temps à lire tous les commentaires et il m&rsquo;est resté une impression que les gens n&rsquo;ont pas tout bien compris les points intéressants.

D&rsquo;abord il est important de commencer par lire son article, car ça démarche est bien expliquée.

Ensuite ce qui m&rsquo;a le plus posé de problème, c&rsquo;est la manière dont le principe de séparation&nbsp;: contenu structuré / habillage / comportement n&rsquo;est pas compris ou mal interprété.

Pour moi l&rsquo;intérêt du XHTML strict est de séparer tout ça, ce qui revient globalement à&nbsp;:

*   un fichier pour le contenu et sa structure (<acronym>xhtml</acronym>)
*   un fichier pour l&rsquo;habillage et le style (<acronym>css</acronym>)
*   un fichier pour le comportement (javascript)

Pour le reste il ne s&rsquo;agit que de principe de développement&nbsp;: si dans une équipe assurant la maintenance d&rsquo;un produit, un collaborateur ne sait pas comment fonctionne et est organisé celui-ci, ça ne peut pas marcher quelle que soit la technique&#8230;

Eric a voulu donner une solution à un problème précis en utilisant un principe très général.

Dans les commentaires, j&rsquo;en ai lu qui prétendaient que cela ne valait pas le coup de créer un fichier de 50 lignes pour reproduire un comportement qui fonctionne déjà en quelques lettres ajoutées au code <acronym>html</acronym>. En revanche c&rsquo;est très intéressant dans un contexte où la création d&rsquo;une nouvelle fenêtre n&rsquo;est pas le seul comportement&nbsp;:

Imaginez un site commercial qui aurait impérativement besoin de faire ouvrir les liens vers des sites externes dans d&rsquo;autres fenêtres (j&rsquo;ai du mal mais je peux comprendre que des fois on ne puisse pas faire comme on veut). Comme souvent sur les sites commerciaux, un certain nombre de formulaires permettent aux visiteurs de saisir des informations (données d&rsquo;inscription, informations de commande, de paiement&#8230;) Dans ces formulaires tous les champs de saisie sont des balises input, select, textarea&#8230; Pourtant ils n&rsquo;ont pas toujours le même comportement&nbsp;: zone numérique, champs contenant des adresses email.

En séparant structure et comportement, il suffit de modifier le fichier javascript pour prendre en compte par exemple l&rsquo;évênement &laquo;&nbsp;saisie d&rsquo;une adresse email&nbsp;&raquo; dans un champ de type email identifié par `class="email"`. Et là les 51 lignes deviennent très intéressante car dès que les règles comportementales se multiplie, 1 seul fichier est modifié, à 1 seul endroit. Je peux vous assurer que niveau maintenance / évolutivité c&rsquo;est un énorme gain de temps.

Maintenant, si les équipes de développement ne se conforment pas aux &laquo;&nbsp;normes&nbsp;&raquo; de développement de leur projet, c&rsquo;est qu&rsquo;elles sont soit mal formées, soit mal encadrées. Je mets norme entre guillemets parce qu&rsquo;il ne s&rsquo;agit d&rsquo;appliquer les standards proposés par le <acronym title="World Wide Web Consortium">W3C</acronym> mais ceux d&rsquo;un projet qui peuvent ou non les appliquer.