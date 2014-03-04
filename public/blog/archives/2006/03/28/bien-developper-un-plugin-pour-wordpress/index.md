/*
 Title: Bien développer un plugin pour WordPress
 Author: Seb
 Template: post
 Permalink: /blog/archives/2006/03/28/bien-developper-un-plugin-pour-wordpress
 Date: 2006-03-28T19:07:37+00:00
 Categories: Développement, Web, WordPress
*/
WordPress est étonnant de simplicité lorsqu&rsquo;il s&rsquo;agit de développer de nouveaux plugins. Cependant, il convient de suivre un certains nombre de bonnes pratiques.

## Quelques bonnes pratiques

*   Encapsuler ses functions dans une classe afin de complètement isoler le fonctionnement du plugin de WordPress. Cela évite les conflits de variables, de nom de fonction, etc.
*   Penser à l&rsquo;internationalisation du code en utilisant les fonctions `__()` et `_e()` et déclarer un domaine pour votre plugin.
*   Penser à documenter l&rsquo;utilisation du plugin : rédiger une page de mode d&rsquo;emploi que l&rsquo;on affichera ensuite par le menu plugins > aide plugin X
*   N&rsquo;utilisez pas n&rsquo;importe quel &laquo;&nbsp;hook&nbsp;&raquo;, mais assurez-vous qu&rsquo;il correspond bien à votre usage.

<!--more-->

## Un modèle de squelette de plugin

Dans le squelettes suivant, je vous propose un petit coup de pouce pour mettre en place vos plugins. Copiez ce code dans un nouveau fichier et créez votre plugin&#8230;

Dans l&rsquo;exemple proposé, le plugin va ajouté à la fin de chaque billet le nom du plugin. Cen&rsquo;est pas très utile mais ça permet de faire un exemple.

<pre class="php"><code>
/* 
Plugin Name: Nom du Plugin
Plugin URI: http://www.example.com/votre_plugin
Description: Ce que fait votre plugin en quelques mots.
Version: 1.0
Author: Votre Nom
Author URI:  http://www.example.com
*/

/*
Squelete de plugin : Mode d'emploi

1. Remplir le cartouche en début de fichier, ce sont les informations qui apparaissent dans la description du plugin dans WordPress
2. Remplacer {{VotrePlugin}} par le nom de votre plugin composé de lettres (sans accents), chiffre, underscore (_)
3. Ajouter vos fonctions dans la partie à éditer
4. Gérer le contenu de la page d'aide de votre plugin (fonction AdminHelpPage)
5. (facultatif) Gérer l'installation options de paramétrage, tables... (fonction install)

*/

class {{VotrePlugin}} {
  var $domain = '';
  var $version = '1.0'; //Changer pour correspondre à la version courante
  var $option_ns = '';
  var $options = array();
  	
// Raccourci interne pour ajouter des actions
  function add_action($nom, $num = 0) {
    $hook = $nom;
    $fonction = $nom;
    if(!$num) { $fonction .= $num; }
    add_action($hook, array(&#038;$this, 'action_'.$nom));
  }
	
  function {{VotrePlugin}}() {
// Initialisation des variables
     if ($this->domain == '') $this->domain = get_class($this);
     if ($this->option_ns == '') $this->option_ns = get_class($this);
// Récupération des options
		$this->options = get_option($this->option_ns);

// Doit-on lancer l'installation ?
    if(!isset($this->options['install']) or ($this->options['install'] != $this->version))
    	$this->install();
	
//Charger les données de localisation
    load_plugin_textdomain($this->domain); 
	
// gestion automatique des actions
		foreach(get_class_methods(get_class($this)) as $methode) {
			if(substr($methode, 0, 7) == 'action_') {
				$this->add_action(substr($methode, 7));
			}
		}		
		
  }      
	
  function action_admin_menu() {
    if (function_exists('add_submenu_page')) {
      add_submenu_page('plugins.php',
                       __('{{VotrePlugin}}', $this->domain),
                       __('{{VotrePlugin}}', $this->domain),
                       3,
                       basename(__FILE__),
                       array(&#038;$this, 'AdminHelpPage'));
    }
  }
  
  function set($option, $value) {
  	$this->options[$option] = $value;
  }
  
  function get($option) {
  	if (isset($this->options[$option])) {
  		return $this->options[$option];
  	} else {
  		return false;
  	}
  }
  
  function update_options() {
  	return update_option($this->option_ns, $this->options);
  }
	
//---------------------------------------------
// Editez à partir d'ici
//---------------------------------------------

  function install() {
// Fonction permettant l'installation de votre plugin (création de tables, de paramètres...)
		$this->set('install', $this->version);
		$this->set('page', 0);
		$this->update_options();
  }
	
  function AdminHelpPage() {
  	echo '&lt;div class="wrap">Page d'admin de votre plugin&lt;/div>';    
  }
  	  
  function action_wp_title($titre) {
  	return $titre.' (on stéroïd)';    
  }
  

  
//---------------------------------------------
// Fin de la partie d'édition
//---------------------------------------------
	
}
	
$inst_{{VotrePlugin}} = new {{VotrePlugin}}();

</code>
</pre>

Dans la partie édition, il suffit de créer de nouvelles méthodes `action_`&laquo;&nbsp;nom du hook&nbsp;&raquo; pour que celles-ci soient automatiquement enregistrées et exécutées par WordPress. De plus il est facile de gérer les options de votre plugin parmi les options de WordPress en utilisant les méthodes `get`, `set` et `update_options`

N&rsquo;hésitez pas à faire vos remarques dans les commentaires.

[Télécharger le squelette][1]

## Ressources connexes

Pour vous aider à créer vos propres plugins, n&rsquo;hésitez pas à consulter :

*   [Ecrire un plugin (en anglais)][2]
*   [Plugin API (en anglais)][3]
*   [Hook Database : documentation des points de branchement des plugins (en anglais)][4]

 [1]: /FileSharing/WordPress/SquelettePlugin.txt
 [2]: http://codex.wordpress.org/Writing_a_Plugin
 [3]: http://codex.wordpress.org/Plugin_API
 [4]: http://wphooks.flatearth.org/