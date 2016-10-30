--- 
Title: Migration WordPress en un clin d&rsquo;oeil
Author: Seb
Template: post
Permalink: /blog/archives/2007/01/19/migration-wordpress-en-un-clin-doeil
Date: 2007-01-19T18:43:30+00:00
Categories: Développement, Web, WordPress
--- 

Les versions de WordPress pleuvent en ce moment, la 2.0.7 pour des raisons de sécurité, la 2.1 en [Release Candidate][1]. Mais la question la plus importante c&rsquo;est comment déployer WordPress à chaque nouvelle version ? Quelle est la meilleur solution pour un site productif ? Par site productif, j&rsquo;entends bien évidement un site accessible à des utilisateurs, ça n&rsquo;a aucun rapport avec le contenu ou la fréquence de mise à jour&#8230;

<!--more-->

## <a href="#bourrin" title="bourrin" name="bourrin">La méthode bourrin</a>

Il existe une méthode qui a fait ses preuves depuis de nombreuses années, à l&rsquo;époque où peu de sites n&rsquo;utilisaient de langages tels que PHP. Charger les fichiers à mettre à jour via votre client FTP favoris en remplaçant les anciens. Le problème c&rsquo;est que le temps de transfert n&rsquo;est toujours pas immédiat. Donc pendant que vous allez transférer vos fichiers, vos utilisateurs vont utiliser une application avec des bouts de code de versions différentes et là c&rsquo;est le drame. Soit vous avez de la chance et tout fonctionne, soit le site plante avec une erreur PHP et votre visiteur vous prend pour un charlot, soit tout semble fonctionner pour lui et vos données deviennent incohérentes dans la base. Bref ce n&rsquo;est pas la meilleur solution si vous avez un peu de trafic sur votre site. Sinon utilisez la plage de 2 heures lorsque personne ne visite votre site (souvent entre 2h et 4h du matin).

## <a href="#malin" title="malin" name="malin">La méthode dérangement</a>

Une autre méthode consiste à rediriger toutes les visites vers une page indiquant que pour des raisons techniques et/ou de maintenance le site est indisponible pendant quelques temps, le temps pour vous de mettre à jour tous les scripts, de mettre à jour la base de données et de vérifier que tout s&rsquo;est bien passé. Malheureusement pendant ce temps, les visiteurs peuvent se décourager et ne pas revenir si le temps de maintenance est trop long ce qui est souvent le cas pour les visites depuis un moteur de recherche.

## <a href="#bon" title="bon" name="bon">La méthode transparente</a>

La méthode que je vous propose devrait vous permettre de réduire considérablement le temps d&rsquo;indisponibilité lors d&rsquo;une mise à jour majeure.

La première chose à faire est de tester la nouvelle version en local pour s&rsquo;assurer que tout va fonctionner. C&rsquo;est évident mais comme ça va sans dire, c&rsquo;est toujours mieux en le disant. C&rsquo;est la phase de qualification (pour les pros).

Procédure de déploiement d&rsquo;une nouvelle version de WordPress :

1.  Préparation (en local): 
    1.  Placer la nouvelle version dans un répertoire spécifique par exemple dans v2
    2.  Chargez votre thème dans le dossier v2/wp-content/themes ainsi que vos plugins dans v2/wp-content/plugins
    3.  Chargez le fichier de localisation si vous n&rsquo;utilisez pas WordPress en anglais. Pensez à prendre le fichier de localisation correspondant à la version que vous déployez.
    4.  Chargez le contenu de vos uploads (wp-content/uploads) si vous n&rsquo;avez pas déplacer vos upload ailleurs.
    5.  Testez
    6.  Chargez le fichier wp-config.php de la version précédente dans le dossier v2 pour récupérer le paramétrage de base de données et de localisation.
2.  Déploiement (sur votre serveur) 
    1.  Chargez le contenu de votre répertoire v2 à l&rsquo;endroit où votre site doit se situer. A la racine du domaine si votre site est accessible directement depuis le domaine, dans le répertoire &laquo;&nbsp;blog&nbsp;&raquo; si WordPress est accessible via une adresse du type : http://votredomaine/blog/.
    2.  Connectez-vous à l&rsquo;interface d&rsquo;administration de la version précédente et modifiez dans les options générales l&rsquo;adresse WordPress : il suffit de reprendre l&rsquo;adresse du blog et de coller à la fin le nom du répertoire de la nouvelle version (ici v2)
    3.  Préparez en local un fichier index.php qui contient le code suivant : 
        <pre><code class="php">&lt;?php /* Short and sweet */
define('WP_USE_THEMES', true);
require('./v2/wp-blog-header.php');
?&gt;</code></pre>
        
        v2 doit correspondre au nom du répertoire qui contient la nouvelle version.</li> </ol> </li> 
        *   Bascule 
            1.  Connectez-vous à l&rsquo;interface d&rsquo;administration de la nouvelle version pour mettre à jour la base de données
            2.  Chargez le fichier index.php de l&rsquo;étape 2 dans le dossier père de la nouvelle version</ol> 
        C&rsquo;est fini. De plus de cette façon, vous avez placé la nouvelle version wordpress dans son propre répertoire ce qui a pour vertu de l&rsquo;isoler du reste de votre site. Avantage : seule l&rsquo;étape 3 étant cruciale, vous pouvez préparez les autres étapes sur des mois.
        
        Vous me direz qu&rsquo;entre les étapes 3.1 et 3.2, vous allez vous retrouvé dans la situation [de la méthode bourrin][2] où la version précédente manipule un modèle de données différent de celui pour lequel elle a été construite. Certes rien ne vous empêche de passer par l&rsquo;astuce du [malin][3] et de rediriger vos visiteurs vers un page de maintenance en indiquant de revenir dans la seconde, mais le temps de bascule est réduit à son minimum. Cette opération ne doit pas vous prendre plus de quelques secondes, soit le temps de passer de votre navigateur à votre client FTP.
        
        A moins que vous ne fassiez cette opération depuis une ligne GSM&#8230;

 [1]: http://fr.wikipedia.org/wiki/Release_Candidate
 [2]: #bourrin
 [3]: #malin