/*
 Title: Publication journalière de vos favoris del.icio.us
 Author: Seb
 Template: post
 Permalink: /blog/archives/2006/03/16/publication-journaliere-de-vos-favoris-delicious
 Date: 2006-03-16T15:39:32+00:00
 Categories: Liens, Web, WordPress
*/
Comme vous l&rsquo;avez probablement constater [dans la rubrique lien][1], j&rsquo;ai testé pendant quelques jours un nouveau service [del.icio.us][2] : le daily blog posting

Cette option est assez simple : tous les jours del.icio.us se propose de créer un article sur votre blog contenant les favoris que vous avez créés depuis la veille.

<!--more-->

Il n&rsquo;y a pas vraiment besoin de présenter les avantages de ce service, vous n&rsquo;avez plus besoin de faire un article avec les liens intéressants du jour, on s&rsquo;en charge pour vous.

Comment ça marche ? Il suffit de s&rsquo;identifier dans del.icio.us et d&rsquo;aller dans le menu settings &raquo; daily blog posting. Ensuite il vous faut créer un nouveau &laquo;&nbsp;job&nbsp;&raquo; (add new thingy) auquel vous donnez un nom et vous renseignez :

*   le nom d&rsquo;utilisateur pour se connecter au blog,
*   et son mot de passe
*   l&rsquo;adresse du serveur XML-RPC de votre blog
*   l&rsquo;heure de publication GMT (9 pour 9h GMT soit 10h en France)
*   l&rsquo;ID du blog pour les systèmes multi-blog. Pour WordPress laissez vide ou mettez 1
*   l&rsquo;ID de la catégorie dans laquelle le billet sera publié

Pour votre blog WordPress cela devrait donner ceci:

<table summary="Exemple de paramétrage dle.icio.us daily blog posting">
  <tr>
    <th>
      Nom de la zone
    </th>
    
    <th>
      Valeur d&rsquo;exemple
    </th>
  </tr>
  
  <tr>
    <td>
      job_name
    </td>
    
    <td>
      Publication Blog
    </td>
  </tr>
  
  <tr>
    <td>
      out_name
    </td>
    
    <td>
      admin
    </td>
  </tr>
  
  <tr>
    <td>
      out_pass
    </td>
    
    <td>
      **votre mot de passe**
    </td>
  </tr>
  
  <tr>
    <td>
      out_url
    </td>
    
    <td>
      http://adresse.de/votre/wordpress/xmlrpc.php
    </td>
  </tr>
  
  <tr>
    <td>
      out_time
    </td>
    
    <td>
      8
    </td>
  </tr>
  
  <tr>
    <td>
      out_blog_id
    </td>
    
    <td>
      1
    </td>
  </tr>
  
  <tr>
    <td>
      out_cat_id
    </td>
    
    <td>
      Un numéro de catégorie
    </td>
  </tr>
</table>

Il y a cependant un certains nombre d&rsquo;inconvénients : 

*   Il n&rsquo;est pas possible de filtrer les liens que vous voulez ajouter à votre article, del.icio.us publie tous vos favoris. La possibilité de filter sur un tag particulier serait un vrai plus.
*   L&rsquo;article est rédigé en anglais. Il n&rsquo;est pas possible de paramétrer le titre. C&rsquo;est un moindre mal dans la mesure où le libellé et le descriptif est saisi par l&rsquo;utilisateur.
*   Il n&rsquo;est pas possible de choisir la fréquence : daily, c&rsquo;est tous les jours. Cependant s&rsquo;il n&rsquo;y a pas de nouveaux favoris, aucun article n&rsquo;est publié.

**Conclusion** j&rsquo;ai désactivé cette option pour le moment. Je pense que yadd peut être une bonne base pour un futur plugin sur ce thème. Autre piste à explorer : [taga.licio.us][3] 

[En savoir plus sur yadd (en anglais)][4]

 [1]: http://v05.z720.net/blog/categories/web/liens/ "Voir les derniers liens"
 [2]: http://del.icio.us "Social Bookmarking"
 [3]: http://frenchfragfactory.net/ozh/archives/2004/10/05/tagalicious-a-way-to-integrate-delicious/
 [4]: http://www.nozell.com/blog/index.php?s=yadd "Site de l'auteur de yadd : Yet Another Daily Deliocious"

 *[yadd]: Yet Another Daily Delicious