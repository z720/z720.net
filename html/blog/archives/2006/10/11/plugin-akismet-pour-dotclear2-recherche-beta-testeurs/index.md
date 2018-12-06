--- 
Title: Plugin Akismet pour DotClear2 : recherche beta testeurs
Author: Seb
Template: post
Permalink: /blog/archives/2006/10/11/plugin-akismet-pour-dotclear2-recherche-beta-testeurs
Date: 2006-10-11T11:32:27+00:00
Categories: Développement, DotClear, Web
--- 

Je délaisse quelque peu [WordPress][1] en ce moment pour me pencher sur [DotClear2][2]. Je ne vais pas faire de comparatif ici entre ces 2 plateformes qui, à mon avis, ne se destinent pas du tout à la même utilisation. En étudiant DotClear2 j&rsquo;ai pu apprécier la façon dont la bête est admirablement bien codée : tout en objet en tirant profit de PHP5.

<!--more-->

Sans vouloir dénigrer le travail de [biou][3] et [zbb][4] qui ont apporté à DotClear [le plugin antispam Spamplemousse][5] qui manquait terriblement à DotClear, je me suis penché sur l&rsquo;intégration de l&rsquo;API [Akismet][6]. Pour moi, il s&rsquo;agit de 2 méthodes de détection des spams qui sont complémentaires et qui peuvent coexister sur le même blog. De plus 

J&rsquo;ai quasiment fini le plugin pour DotClear2, et je recherche donc quelques beta-testeurs volontaires pour utiliser ce plugin sur un ou plusieurs de leur blog sous DotClear2.

## Fonctionnalités du plugin :

*   Activation du plugin pour chaque blog
*   Détection des spams à la soumission des commentaires et des trackbacks via le système de détection d&rsquo;Akismet.
*   Soumission à Akismet des spams non détectés et des commentaires détectés injustement comme spam car le système peut apprendre de ses erreurs.
*   Possibilité d&rsquo;activer une suppression automatique des spams après un certains nombre de jours, paramétrable par l&rsquo;administrateur du blog.
*   Système de log pour le super administrateur.
*   Gestion des droits pour le paramétrage du plugin.
*   Affichage d&rsquo;une liste des spams.

Si vous êtes intéressés pour tester ce plugin, contactez-moi via les commentaires de cet article. De même si vous avez des questions, laissez un commentaire.

 [1]: http://wordpress-fr.net/
 [2]: http://preview.dotclear.net
 [3]: http://www.vanschklift.com/blog
 [4]: http://zeubeubeu.net/blog/
 [5]: http://zeubeubeu.net/blog/plugins-dotclear#spamplemousse
 [6]: http://www.akismet.com