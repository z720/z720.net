--- 
Title: Plug-In DotClear
Author: Seb
Excerpt: <p>Je me suis encore lanc&eacute; dans une sorte de d&eacute;fi technologique. Pourquoi ne pourrais-je pas poster sur ce weblog de n'importe o&ugrave;? Et surtout, profiter de mon t&eacute;l&eacute;phone appreil photo pour envoyer r&eacute;guli&egrave;rement des photos du jours plus insolites...</p>
Template: post
Permalink: /blog/archives/2004/11/03/plug-in-dotclear
Date: 2004-11-03T19:05:37+00:00
Categories: Projets
--- 

Je me suis encore lanc&eacute; dans une sorte de d&eacute;fi technologique. Pourquoi ne pourrais-je pas poster sur ce weblog de n&rsquo;importe o&ugrave;? Et surtout, profiter de mon t&eacute;l&eacute;phone appreil photo pour envoyer r&eacute;guli&egrave;rement des photos du jours plus insolites&#8230;

<!--more-->

  
### Le besoin

Je n&rsquo;ai pas acc&egrave;s &agrave; Internet depuis mon bureau ou alors exceptionnellement, le navigateur de mon t&eacute;l&eacute;phone portable n&rsquo;est pas top. Comment puis-je poster depuis mon boulot ou depuis la rue, le train &agrave; partir de mon t&eacute;l&eacute;phone&nbsp;?

Tout simplement en utilisant une boite mail. Tout le monde peut envoyer des mails de n&rsquo;importe o&ugrave;&nbsp;: du boulot par Lotus Notes, du t&eacute;l&eacute;phone par <acronym>MMS</acronym>&#8230;

### Comment &ccedil;a marche&nbsp;?

&Eacute;tendre <a href="http://www.dotclear.net" hreflang="fr">dotClear</a> pour lire une boite mail, filtrer les mails et cr&eacute;er un post par mail valide.

1.  Cr&eacute;er un script qui puisse lire une boite <acronym>IMAP</acronym>, filtrer les mails et cr&eacute;er des postes.
2.  Cr&eacute;er un plugin permettant de g&eacute;rer la configuration de ce script (serveur, cl&eacute; de validation,
3.  Programmer un job cron r&eacute;guli&egrave;rement sur le premier script pour cr&eacute;er lire la boite aux lettres

Pour la programmation, il est possible d&rsquo;utiliser <a href="http://www.webcron.org/click.php?ref=z720" hreflang="fr">webcron</a>, si vous ne pouvez pas acc&eacute;der &agrave; cron sur le serveur.

### Pourquoi r&eacute;inventer la poudre&nbsp;?

Je me suis aussi pench&eacute; sur les solutions existantes, mais il faut avouer que cela &agrave; moins de charme.  
J&rsquo;ai trouv&eacute; 2 solutions utilisables&nbsp;:

1.  Utiliser le service ext&eacute;rieur <a href="http://www.flickr.com" hreflang="en">Flickr</a>. Le principal probl&egrave;me, c&rsquo;est que ce service n&rsquo;est du tout fait pour cela&nbsp;: il permet de g&eacute;rer des galeries de photos. 
    *   L&rsquo;int&eacute;r&ecirc;t venant de ces 2 fonctionnalit&eacute;s&nbsp;: 
        1.  Possibilit&eacute; de mettre &agrave; jour ses galeries par mail
        2.  Possibilit&eacute; de cr&eacute;er une entr&eacute;e sur votre weblog lors de la mise &agrave; jour de vos galeries
    *   Le probl&egrave;me venant du mode de fonctionnement&nbsp;: lorsque plusieurs images sont envoy&eacute;es dans le m&ecirc;me mail, autant d&rsquo;entr&eacute;es sont cr&eacute;es dans le weblog.
2.  Utiliser un PlugIn existant&nbsp;: moblogging par Rn&otilde; 
    *   Idem le mode de fonctionnement n&rsquo;est pas satisfaisant&nbsp;: la lecture de la boite aux lettres se fait &agrave; partir du th&egrave;me dotClear, donc &agrave; chaque visite il peut y avoir interrogation de la boite mail.
    *   Conclusion il peut y avoir un ralentissement lors de l&rsquo;affichage des pages qui n&rsquo;est pas acceptable. L&rsquo;action de consultation doit &ecirc;tre s&eacute;par&eacute;e de l&rsquo;action de mise &agrave; jour. (En tout cas, pour moi)

### Les probl&egrave;mes

&Eacute;videmment sur le papier c&rsquo;est tr&egrave;s simple. Seulement &ccedil;a ne marche pas&#8230; En effet j&rsquo;ai un peu de mal &agrave; r&eacute;cup&eacute;rer proprement le contenu des mails car l&rsquo;utilisation des fonctions <acronym>IMAP</acronym> n&rsquo;est pas facile.

Notamment, la structure des mails (fonction <acronym>php</acronym> imap_fetchstructure) qui n&rsquo;est vraiment pas facile mettre en parall&egrave;le avec le contenu. Surtout lorsque les mails sont envoy&eacute;s au format <acronym title="HyperText Markup Language">HTML</acronym> avec des fichiers attach&eacute;s, bref d&egrave;s que la structure est plus complexe que de texte brut avec des fichiers &agrave; c&ocirc;t&eacute;s&#8230;