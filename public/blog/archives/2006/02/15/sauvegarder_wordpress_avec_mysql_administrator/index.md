/*
 Title: Sauvegarder WordPress avec MySQL Administrator
 Author: Seb
 Template: post
 Permalink: /blog/archives/2006/02/15/sauvegarder_wordpress_avec_mysql_administrator
 Date: 2006-02-15T11:59:58+00:00
 Categories: Web, WordPress
*/
<p>La sauvegarde de ses publications est une probl&eacute;matique<br />
r&eacute;curente pour toutes les personnes qui publient sur<br />
internet via une syst&egrave;me de gestion de contenu bas&eacute;<br />
sur une base de donn&eacute;es. Effectivement lorsqu&rsquo;on utilise un<br />
site statique, il suffit de copier r&eacute;guli&egrave;rement le<br />
contenu de son compte FTP sur son ordinateur personnel. Seulement<br />
lorsque l&rsquo;on utilise un CMS, les choses sont moins faciles : le<br />
contenu proprement dit est souvent &laquo;&nbsp;cach&eacute;&nbsp;&raquo; dans une base de<br />
donn&eacute;es et un bug dans le CMS peut &eacute;ventuellement<br />
corrompre tout le site.</p>
<p>Je vous propose donc ici une m&eacute;thode assez facile pour<br />
sauvegarder votre site. Cette m&eacute;thode est illustr&eacute;e<br />
avec un site sous WordPress mais peut tout &agrave; fait convenir<br />
pour tout autre CMS avec une base de donn&eacute;es<br />
g&eacute;r&eacute;e par MySQL : SPIP, DotClear, Typo3&#8230;</p>
<p><!--more--></p>
<h2>Cas d&rsquo;&eacute;tude</h2>
<p>Notre site est un weblog propuls&eacute; par WordPress tel que<br />
distribu&eacute; par ses auteurs. Il a choisit ou<br />
d&eacute;velopp&eacute; un th&egrave;me pour son site sur lequel il<br />
ne fait plus de modifications. Bref son installation de WordPress<br />
est stable, il ne modifie pas les sources et n&rsquo;installe pas de<br />
plugins souvent.</p>
<p>Notre utilisateur publie r&eacute;guli&egrave;rement du contenu et<br />
craint de perdre ses publications en cas de probl&egrave;me chez<br />
son h&eacute;bergeur ou en cas de mauvaise manipulation sur son<br />
site. D&rsquo;ailleurs il n&rsquo;est pas expert en PHP ni en MySQL.</p>
<h2>Principe de base</h2>
<p>Etant donn&eacute; que le script de publication ne varie pas<br />
beaucoup, la sauvegarde des fichiers PHP n&rsquo;a pas besoin<br />
d&rsquo;&ecirc;tre tr&egrave;s fr&eacute;quente. En cas de perte de ses<br />
fichiers sur le serveur, il lui suffira de r&eacute;installer<br />
WordPress, son th&egrave;me et ses plugins. En revanche le contenu<br />
de la base de donn&eacute;es doit &ecirc;tre sauvegarder<br />
r&eacute;guli&egrave;rement. De plus si des plugins permettent la<br />
sauvegarde de votre base sur votre serveur, il est plus sure de<br />
garder une sauvegarde sur votre ordinateur personnel. Si votre<br />
h&eacute;bergeur crash son syst&egrave;me, la sauvegarde sera bien<br />
au chaud chez vous. C&rsquo;est l&agrave; que MySQL Administrator va nous<br />
&ecirc;tre tr&egrave;s utile.</p>
<h2>T&eacute;l&eacute;charger et installer MySQL Administrator</h2>
<p>Il suffit d&rsquo;aller sur le site de MySQL dans <a href="http://dev.mysql.com/downloads/administrator/index.html" title="Page de t&eacute;l&eacute;chargement de MySQL Administrator">la<br />
section d&eacute;di&eacute;e &agrave; Administrator</a> et de<br />
choisir sa plateforme. MySQL Administrator est disponible pour<br />
Windows, MacOS et Linux. Il est aussi possible de<br />
t&eacute;l&eacute;charger les sources.</p>
<p>Puis il suffit de lancer l&rsquo;installation.</p>
<p>Ensuite il faut configurer la connexion &agrave; la base de<br />
donn&eacute;e. C&rsquo;est l&agrave; que cela se complique : certains<br />
h&eacute;bergeurs ne permettent pas d&rsquo;&eacute;tablir de connexion<br />
au serveur de base de donn&eacute;es depuis l&rsquo;ext&eacute;rieur mais<br />
uniquement depuis le serveur de votre h&eacute;bergement.<br />
Contactez-le si vous avez un doute.</p>
<p><a href="http://v05.z720.net/blog/images/MySQL_Admin-connexion.gif"><img src="http://v05.z720.net/blog/images/MySQL_Admin-connexion.gif" alt="Capture d'écran : connexion"/></a></p>
<p>Vous devez renseigner au minimum le serveur, l&rsquo;utilisateur MySQL<br />
et son mot de passe.</p>
<p><a href="http://v05.z720.net/blog/images/MySQL_Admin-admin.gif"><img src="http://v05.z720.net/blog/images/MySQL_Admin-admin.gif" alt="Capture d'écran : Interface " /></a></p>
<p>Vous pouvez constater que MySQL Administrator permet de<br />
contr&ocirc;ler totalement MySQL. Les 2 sections qui nous<br />
int&eacute;ressent sont <strong>backup</strong> et<br />
<strong>restore</strong>.</p>
<h2>Mettre en place des sauvegardes r&eacute;guli&egrave;res</h2>
<ol>
<li>Placez-vous dans la section backup</li>
<li>Cr&eacute;er une nouvelle sauvegarde avec le bouton New<br />
Project.<br />
<a href="http://v05.z720.net/blog/images/MySQL_Admin-backup.gif"><img src="http://v05.z720.net/blog/images/MySQL_Admin-backup.gif" alt="Capture d'écran : Nouveau projet"/></a></li>
<li>Choisir un r&eacute;pertoire de destination</li>
<li>S&eacute;lectionner les param&egrave;tres du backup. L&rsquo;option<br />
&laquo;&nbsp;normal backup&nbsp;&raquo; est grandement suffisante.<br />
<a href="http://v05.z720.net/blog/images/MySQL_Admin-backup-advanced.gif"><img src="http://v05.z720.net/blog/images/MySQL_Admin-backup-advanced.gif" alt="Capture d'écran : Options avancées"/></a></li>
<li>S&eacute;lectionner le format de fichier</li>
<li>D&eacute;finir la fr&eacute;quence de sauvegarde&nbsp;<br />
<blockquote>
<p>Inutile de sauvegarder 5 fois votre base de<br />
donn&eacute;es entre 2 mises &agrave; jour. Prenez en compte votre<br />
fr&eacute;quence de publication, &eacute;ventuellement la<br />
fr&eacute;quence de mise &agrave; jour des visiteurs via les<br />
commentaires ou un forum.</p>
<p>Pensez &eacute;galement au volume de votre sauvegarde et &agrave;<br />
votre bande passante : une base de donn&eacute;es de 2mo<br />
sauvegard&eacute;e toutes les heures repr&eacute;sente 1.4Go de<br />
bande passante par mois.</p>
</blockquote>
<p>
<a href="http://v05.z720.net/blog/images/MySQL_Admin-backup-schedule.gif"><img src="http://v05.z720.net/blog/images/MySQL_Admin-backup-schedule.gif" alt="Capture d'écran : planification" /></a></li>
<li>Renseigner l&rsquo;utilisateur syst&egrave;me qui ex&eacute;cutera la<br />
tache. <br />
<a href="http://v05.z720.net/blog/images/MySQL_Admin-backup-login.gif"><img src="http://v05.z720.net/blog/images/MySQL_Admin-backup-login.gif" alt="Capture d'écran : Identification système" /></a><br />
<br />Effectivement MySQL Administrator va g&eacute;n&eacute;rer<br />
une tache planifi&eacute;e dans votre syst&egrave;me. Dans windows<br />
vous pouvez acc&eacute;der aux taches planifi&eacute;es via le<br />
panneau de configuration.<br />
<a href="http://v05.z720.net/blog/images/MySQL_Admin-backup-system.gif"><img src="http://v05.z720.net/blog/images/MySQL_Admin-backup-system.gif" alt="Capture d'écran : Planification système" /></a></li>
</ol>
<h2>Et les images?</h2>
<p>Si vous charger des fichiers tels que des images, de la musique<br />
ou des documents, il faudra penser &agrave; utiliser la bonne<br />
vieille m&eacute;thode pour sauvegarder ce contenu :<br />
r&eacute;cup&eacute;rer par FTP le contenu du r&eacute;pertoire<br />
o&ugrave; sont charg&eacute;s ces fichiers par WordPress. Il est<br />
possible de trouver des logiciels qui fassent des<br />
t&eacute;l&eacute;chargements p&eacute;riodiques de<br />
r&eacute;pertoire FTP.
</p>
<h2>Prochaine étape</h2>
<p>Récupération de la base à partir de la sauvegarde&#8230; Bientôt</p>
