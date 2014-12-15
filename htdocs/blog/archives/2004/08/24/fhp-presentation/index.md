/*
 Title: F&eacute;d&eacute;ration Hospitali&egrave;re Priv&eacute;e (Rh&ocirc;ne-Alpes Auvergne)
 Author: Seb
 Excerpt: <p>Pr&eacute;sentation du projet de cr&eacute;ation du portail FHP-R2A.
Il s'agit du projet sur lequel je travaille actuellement&nbsp;: refonte du site <a href="http://www.fhpauvergne.com" hreflang="fr" title="Site de la FHP Auvergne">FHP Auvergne</a> et cr&eacute;ation d'un portail mutualis&eacute; avec la d&eacute;l&eacute;gation Rh&ocirc;ne Alpes.</p>
 Template: post
 Permalink: /blog/archives/2004/08/24/fhp-presentation
 Date: 2004-08-24T20:00:00+00:00
 Categories: Projets
*/
Pr&eacute;sentation du projet de cr&eacute;ation du portail FHP-R2A.  
Il s&rsquo;agit du projet sur lequel je travaille actuellement&nbsp;: refonte du site <a href="http://www.fhpauvergne.com" hreflang="fr" title="Site de la FHP Auvergne">FHP Auvergne</a> et cr&eacute;ation d&rsquo;un portail mutualis&eacute; avec la d&eacute;l&eacute;gation Rh&ocirc;ne Alpes.

<!--more-->

  
### Qu&rsquo;est ce que la <acronym title="F&eacute;d&eacute;ration de l&#039;Hospitalisation Priv&eacute;e">FHP</acronym>:

Il s&rsquo;agit de la f&eacute;d&eacute;ration de l&rsquo;hospitalisation priv&eacute;e, syndicat professionnel des &eacute;tablissements de sant&eacute; priv&eacute;s

Extrait du site national de la <acronym title="F&eacute;d&eacute;ration de l&#039;Hospitalisation Priv&eacute;e">FHP</acronym>:  
<q lang="fr" cite="http://195.3.8.57/fhp/htm/FHP_presentation1.asp">Regroupant quelques 1300 &eacute;tablissements, la FHP repr&eacute;sente l&rsquo;int&eacute;gralit&eacute; des lits d&rsquo;Hospitalisation en France. Organis&eacute;e en Syndicats R&eacute;gionaux et en Syndicats de Sp&eacute;cialit&eacute;s, la FHP est un interlocuteur privil&eacute;gi&eacute; des pouvoirs publics sur les grands th&egrave;mes qui engagent l&rsquo;avenir du syst&egrave;me de sant&eacute;.</q>

### Naissance du projet&nbsp;:

L&rsquo;id&eacute;e originale vient du d&eacute;l&eacute;gu&eacute; Auvergne de la FHP (responsable du site <a href="http://www.fhpauvergne.com" hreflang="fr" title="Site FHP Auvergne">www.fhpauvergne.com</a>) qui &eacute;tait d&eacute;sireux de refondre le site de sa région. La délégation de la région Rhône Alpes n&rsquo;avait pas de site Internet et s&rsquo;est naturellement associ&eacute;e afin de r&eacute;aliser un portail commun aux 2 r&eacute;gions limitrophes.

De cette id&eacute;e est n&eacute;e le projet de portail FHP-R2A pour FHP Rhône-Alpes Auvergne.

### Nature du projet&nbsp;:

*   Choix de syst&egrave;me de gestion de publication
*   R&eacute;alisation d&rsquo;une nouvelle charte graphique
*   R&eacute;alisation des gabarits pour le <acronym title="Content Managment System">CMS</acronym>

Le choix du syst&egrave;me de publication s&rsquo;est naturellement port&eacute; vers <a href="http://www.spip.net/fr" hreflang="fr" title="Site officiel de SPIP">SPIP 1.7.2</a> qui offrait presque toutes les fonctionnalités nécessaires au bon fonctionnement du portail&nbsp;:

1.  Publication d&rsquo;articles avec validation
2.  Interface d&rsquo;administration conviviale
3.  Gestion des documents attach&eacute;s aux articles
4.  Gestion de forum
5.  Identification des membres, auteurs et administrateurs
6.  Architecture du site

Seuls probl&egrave;mes&nbsp;:

1.  Pas de gestion en standard d&rsquo;espace restreint dans la partie publique du site
2.  Pas de gestion des droits d&rsquo;acc&egrave;s aux fichiers des documents attach&eacute;s
3.  Code g&eacute;n&eacute;r&eacute; par SPIP n&rsquo;est pas parfaitement conforme aux standards du <a href="http://www.w3.org" hreflang="en" title="Site du W3C"><acronym title="World Wide Web Consortium">W3C</acronym></a>

Les 2 premiers points seront r&eacute;gl&eacute;s facilement par la multitude d&rsquo;extensions disponibles pour SPIP et un peu de travail sur APACHE et <a href="http://www.php.net" hreflang="en" title="Site officiel PHP"><acronym title="PHP: Hypertext Preprocessor">PHP</acronym></a>.

Le dernier point n&rsquo;est que partiellement r&eacute;solu en utilisant le moins possible les fonctions ne g&eacute;n&eacute;rant pas de <acronym title="(eXtensible) HyperText Markup Language">(X)HTML</acronym> valide dans les gabarits.

### R&eacute;alisation

*   Maquette de la charte graphique
*   Mise en place de la navigation
*   Param&eacute;trage SPIP
*   R&eacute;alisation des gabarits (squelettes SPIP)

### Avancement

Pour le moment le syst&egrave;me est quasiment op&eacute;rationnel, il manque encore quelques pages d&rsquo;agr&eacute;ments (contact, cr&eacute;dits,&#8230;) Mais dans l&rsquo;ensemble tout semble fonctionner comme pr&eacute;vu.

La release est bien sur pr&eacute;vue pour le mois de septembre. &Agrave; suivre&nbsp;: l&rsquo;adresse du site d&egrave;s que les informations publi&eacute;es ne seront des donn&eacute;es de test&#8230;