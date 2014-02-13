/*
 Title: Du neuf avec du vieux : balise <code>button</code>
 Author: Seb
 Template: post
 Permalink: /blog/archives/2006/10/16/du-neuf-avec-du-vieux-balise-button
 Date: 2006-10-16T10:10:48+00:00
 Categories: Design, Développement, Web
*/
Grâce au [Digital Web Magazine][1], je viens de découvrir une nouvelle balise HTML, la balise `button`. Je me suis alors rendu compte que cette balise n&rsquo;était pas du tout nouvelle. Par contre elle est très peu employée, et je me demande pourquoi&nbsp;? Effectivement, cette balise fonctionne totalement différemment de la balise `input` et a bien des avantages. 

<!--more-->

Le premier vient du fait qu&rsquo;il ne s&rsquo;agit d&rsquo;une balise vide comme input qui porte le texte du bouton dans un attribut. Il est donc possible de faire des boutons avec des contenus complexes, alors que la balise `input` ne permet que de présenter une chaîne de caractères. 

    <input type="submit" value="Envoyer votre réponse" />

    <button type="submit"><strong>Envoyer</strong> votre réponse</button>

Autre avantage, il est possible de passer une valeur de paramètre différente du texte du bouton: 

    <button type='submit' name='action' value='1'>Ajouter</button>
    <button type='submit' name='action' value='2'>Supprimer</button>
    

Cette balise permet dâ€™utiliser nâ€™importe quelle balise dans le contenu exceptés les liens et d&rsquo;autres contrôles de formulaire bien entendu. De plus les navigateurs n&rsquo;impose pas de style prédéfini pour la balise button à l&rsquo;instar de la balise input qui reprend un style peu joyeux d&rsquo;interface utilisateur &laquo;&nbsp;classique&nbsp;&raquo;. Il devient beaucoup plus aisé de faire coïncider le design du formulaire avec celui du site, voir même de s&rsquo;affranchir du bouton valider. 

[Aaron Gustafson][2] donne de [beaux exemples d&rsquo;utilisations de cette balise `button`][3] : 

*   [Transformer un formulaire pour qu&rsquo;il ne ressemble pas à un formulaire][4] (choix entre plusieurs cadeaux)
*   [Application pour la vente d&rsquo;hébergement][5]
*   [Application pour une gestion de la pagination][6]

 [1]: http://www.digital-web.com/articles/push_my_button/ "Voir l'article Push my button sur Digital Web Magazine (anglais)"
 [2]: http://www.digital-web.com/about/contributors/aaron_gustafson/ "En savoir plus sur Aaron Gustafson : contributeur Digital Web Magazine"
 [3]: http://www.digital-web.com/articles/push_my_button/
 [4]: http://www.digital-web.com/extras/push_my_button/example_1/index.html
 [5]: http://www.digital-web.com/extras/push_my_button/example_2/index.html
 [6]: http://www.digital-web.com/extras/push_my_button/example_3/index.html