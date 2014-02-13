/*
 Title: zCMS
 Author: Seb
 Excerpt:  <p>Cela fait plusieurs jours que je me suis mis en t&ecirc;te de faire mon propre <acronym title="Content Managment System">CMS</acronym> pour g&eacute;rer le site <a href="http://z720.net" hreflang="fr">z720.net</a>.</p>
 Template: post
 Permalink: /blog/archives/2004/09/21/zcms
 Date: 2004-09-21T12:00:05+00:00
 Categories: Projets
*/
Cela fait plusieurs jours que je me suis mis en t&ecirc;te de faire mon propre <acronym title="Content Managment System">CMS</acronym> pour g&eacute;rer le site <a href="http://z720.net" hreflang="fr">z720.net</a>.

<!--more-->

### Pourquoi&nbsp;?

Aujourd&rsquo;hui le site est g&eacute;r&eacute; par des fichiers <acronym title="eXtensible Markup Language">XML</acronym> qui sont transform&eacute; pour obtenir un ensemble <acronym>xhtml</acronym>/<acronym>css</acronym> très simple&nbsp;: un menu statique, un contenu dynamique et un style dynamique. Evidemment j&rsquo;ai besoin d&rsquo;un peu plus de fonctionnalités pour me présenter de mani&egrave;re un peu plus percutante. Le but étant d&rsquo;arriver à un site encore plus professionnel. De plus, je n&rsquo;ai jamais réalisé l&rsquo;interface d&rsquo;administration du site actuel.

### Réinventer la roue

Je pourrais bien sur installer un <acronym title="Content Managment System">CMS</acronym> existant tel <a href="http://typo3.org" hreflang="en">typo3</a> qui est tr&egrave;s puissant mais compliqué à mettre en oeuvre notamment sur l&rsquo;intégration des gabarits ou <a href="http://www.spip.net/fr" hreflang="fr">SPIP</a> mais le code en sortie ne me convient pas. J&rsquo;en ai bien essayé d&rsquo;autre comme <a href="http://www.mamboserver.com" hreflang="en">Mambo</a> mais aucun de réellement satisfaisant.

De plus, il n&rsquo;y a rien de tel que de d&eacute;velopper son propre syst&egrave;me pour maitriser les tenants et aboutissants des standards et des probl&egrave;mes utilisateurs.

### Fonctionnalit&eacute;s

*   Fonctionnalit&eacute;s de base&nbsp;: 
    *   Gestion du contenu par modules (objets <a href="http://www.php.net" hreflang="en"><acronym title="PHP: Hypertext Preprocessor">PHP</acronym></a>)
    *   Gestion de l&rsquo;affichage par template (<a href="http://smarty.php.net" hreflang="en">Smarty Engine</a>)
    *   Compatibilit&eacute; <acronym>xhtml</acronym>/<acronym>css</acronym> à travers le moteur de template
*   Extensions de base (modules) 
    *   Gestion des droits sur les pages
    *   Module de gestion de news
    *   Module de gestion de galleries
    *   Module de gestion weblog