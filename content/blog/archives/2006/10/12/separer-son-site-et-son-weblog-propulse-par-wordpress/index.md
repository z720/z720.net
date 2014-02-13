/*
 Title: Séparer son site et son weblog propulsé par WordPress
 Author: Seb
 Template: post
 Permalink: /blog/archives/2006/10/12/separer-son-site-et-son-weblog-propulse-par-wordpress
 Date: 2006-10-12T11:25:55+00:00
 Categories: Développement, Web, WordPress
*/
Le but de cet article est de permettre l&rsquo;utilisation de WordPress comme un gestionnaire de contenu faisant apparaitre un site classique et un blog de manière distincte.

![Exemple de plan du site][1]

Avec cette solution l&rsquo;arborescence des pages WordPress sont visibles à la racine du site alors que les articles du blog apparaisse dans un dossier nommé blog.

<!--more-->

Pour donner au weblog son propre répertoire dans l&rsquo;arborescence des pages, il faut d&rsquo;abord modifier les permaliens pour que les articles soient publiées dans un sous-répertoire en changeant la structure pour faire apparaitre un sous répertoire blog par exemple. La structure des permaliens devrait ressembler à ceci : <a>/blog/%year%/%monthnum%/%day%/%postname%</a>.

Ensuite vous pourrez remarquer que si vous allez à l&rsquo;adresse <a>http://www.votresite.com/blog</a> une erreur 404 va apparaitre. C&rsquo;est parce que WordPress n&rsquo;interprète pas ce répertoire comme l&rsquo;accueil du weblog. Pour cela il faut ajouter une règle de redirection pour ce répertoire en utilisant le filtre `rewrite_rules_array` qui permet d&rsquo;ajouter des règles de redirections. Nous allons donc utiliser les point d&rsquo;entrés fournis par WordPress pour les plugins.

Dans un thème WordPress la page d&rsquo;accueil du weblog utilise le gabarit `home.php` si celui-ci existe, sinon c&rsquo;est le fichier `index.php` qui est utilisé. Nous allons ajouter une règle permettant à WordPress d&rsquo;afficher un autre gabarit quand nous sommes sur l&rsquo;accueil du site et de rediriger vers le gabarit de l&rsquo;accueil classique du blog lorsque nous sommes dans notre répertoire <a>/blog/</a>.

Pour cela il faut ajouter un fichier `functions.php` dans le thème, si celui-ci n&rsquo;existe pas déjà. Ainsi notre modification sera active pour notre thème uniquement et ne sera pas dépendante de l&rsquo;activation ou non d&rsquo;un plugin. Cela évite les mauvaises manipulations et de voir notre mise en page totalement désordonnées en cas de désactivation du plugin ou de changement de thème.

Il va falloir mettre en place 2 fonctions pour gérer cette fonctionnalité :

*   la première (`add_rules`) va permettre à WordPress de  
    reconnaitre notre dossier <a>/blog/</a> en l&rsquo;assimilant à l&rsquo;accueil de  
    la partie weblog 
*   la seconde (`template_redirect`) va permettre à WordPress  
    d&rsquo;utiliser le fichier `homepage.php` comme gabarit de la  
    racine de notre site. 

Pour éviter que nos fonctions entrent en collision avec celles de WordPress, celles-ci seront encapsulées dans une classe. De la même manière que [je le préconise pour les plugins][2].

<pre class="php"><code>  function add_rules($rules) {
// Récupération des informations de redirections d'adresse
    global $wp_rewrite;
// Génération des liens pour les commentaires, pagination, etc.
    $new_rules = $wp_rewrite-&gt;generate_rewrite_rules($wp_rewrite-&gt;front);
// Génértation de la règle de redirection principale
    $global_home_rule = substr($wp_rewrite-&gt;front,1).'?';
    $new_rules[$global_home_rule] = "index.php";

// ajout des nouvelles règles de redirection
    $rules += $new_rules;
    return $rules;
  }

  function redirect() {
//Récupération du contexte
    global $wp;
// S'il s'agit de l'accueil et de la racine du site charger le gabarit homepage.php
    if(is_home() and ($wp-&gt;matched_rule == '')) {
      if(file_exists(dirname(__FILE__).'/homepage.php')) {
        include(dirname(__FILE__).'/homepage.php');
      } else {
        include(get_query_template('homepage'));
      }
// La page est affichée on sort
      exit;
    }
  }
</code></pre>

 [1]: http://v05.z720.net/blog/images/sitemap.png
 [2]: http://v05.z720.net/blog/archives/2006/03/28/bien-developper-un-plugin-pour-wordpress "Bien développer un plugin pour WordPress"