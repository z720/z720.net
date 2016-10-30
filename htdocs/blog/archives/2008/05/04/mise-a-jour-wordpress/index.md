--- 
Title: Mise à jour WordPress
Author: Seb
Template: post
Permalink: /blog/archives/2008/05/04/mise-a-jour-wordpress
Date: 2008-05-04T14:04:04+00:00
Categories: Web, WordPress
Tags: WordPress
--- 

J&rsquo;ai rechigné pendant quelques temps à mettre à jour mon <a class="zem_slink" title="WordPress" rel="homepage" href="http://wordpress.org/" target="_blank">WordPress</a> pour la &laquo;&nbsp;brand new&nbsp;&raquo; version 2.5. Effectivement, vu la fréquence de mes posts, je trouvais cela abusé.

[<img class="alignnone size-full wp-image-233" title="Mise à jour WordPress 2.5.1" src="http://v05.z720.net/v05/../share/upgrade-wp-251.png" alt="" />][1]

Aujoud&rsquo;hui c&rsquo;est chose faites. D&rsquo;abord,j &lsquo;avais cassé ma base en la déplaçant. (je viens de me rendre compte que plus aucune de mes tables n&rsquo;avait d&rsquo;auto_increment sur les clés primaires, c&rsquo;est très génant&#8230;) Ensuite parce que pourquoi ne ferai-je <span class="zem_slink">pas</span> revivre cet endroit?

<!--more-->Pour les mauvaise langues, qui voudraient dire que je ne post que pour dire que j&rsquo;ai mis à jour WordPress. Je vous signale, une nouvelle &laquo;&nbsp;

[photo][2] du jour&nbsp;&raquo;: [Fleurs, enfin le printemps][3].

Bref, pour revenir à l&rsquo;actu technique, je ne sais pas pourquoi je n&rsquo;ai pas fait cette upgrade plus tôt, puiqu&rsquo;au final ça ne m&rsquo;a pris que 5 minutes:

1.  Désactiver les <a class="zem_slink" title="Plugin" rel="wikipedia" href="http://en.wikipedia.org/wiki/Plugin" target="_blank">plugins</a>
2.  Taper la commande suivantes:` svn sw http://svn.automattic.com/wordpress/tags/2.5.1`
3.  Ré-activer les plugins (et les mettre à jour automatiquement)
4.  Ecrire ce post (ce qui explique pourquoi ça prend 5 minutes.

Pour pouvoir faire cette manipulation, il faut bien évidement avoir accès au serveur en ligne de commande.

<div id="zemanta-pixie" style="margin: 5px 0pt; width: 100%;">
  <a id="zemanta-pixie-a" title="Zemified by Zemanta" href="http://www.zemanta.com/"><img id="zemanta-pixie-img" style="border: medium none; float: right;" src="http://img.zemanta.com/pixie.png?x-id=259b05b3-3cc4-4f36-9b32-e3c76ea69032" alt="" /></a>
</div>

 [1]: http://v05.z720.net/blog/archives/2008/05/04/mise-a-jour-wordpress
 [2]: http://v05.z720.net/blog/categories/photo-du-jour "La catégorie "
 [3]: http://v05.z720.net/blog/archives/2008/05/04/fleurs-enfin-le-printemps