--- 
Title: Déclencheurs JavaScript
Author: Seb
Template: post
Permalink: /blog/archives/2005/04/29/declencheurs-javascript
Date: 2005-04-29T06:34:21+00:00
Categories: Développement, Traductions, Web, WebStandards
--- 

En dépit de la stricte séparation, les couches de présentation et de comportement ont besoin d&rsquo;instructions de la couche structurelle. Elles ont besoin de savoir où ajouter cette jolie touche de style, quand initier ces petites actions qui font la différence. Elles ont besoin de déclencheurs. 

Traduction de l&rsquo;article <a href="http://alistapart.com/articles/javascripttriggers/" hreflang="en">JavaScript Triggers</a>.   
Translated with the permission of A List Apart Magazine (<a href="http://www.alistapart.com" hreflang="en">http://alistapart.com</a>) and the author[s].

<!--more-->

L&rsquo;affichage d&rsquo;une page web consiste en 3 couches. Le fichier XHTML représentent la couche structurelle qui contient la structure, la sémantique et le contenu du site. &Agrave; cette couche, il est possible de joindre une couche de mise en page (CSS) et une couche comportementale (JavaScript) afin de rendre le site plus beau et plus facile à utiliser. Ces trois couches doivent rester strictement séparées. On peut de cette façon changer toute la mise en page sans toucher ni à la structure ni aux comportements. 

En dépit de la stricte séparation, les couches de présentation et de comportement ont besoin d&rsquo;instructions de la couche structurelle. Elles en ont besoin pour savoir où ajouter cette jolie touche de style, quand initier cette petite action qui fait la différence. Elles ont besoin de déclencheurs

Les déclencheurs CSS sont bien connus. Les attributs `class` et `id` vous permettent de contrôler totalement la présentation de vos sites web. Bien qu&rsquo;il soit possible de travailler sans ces déclencheurs, en plaçant les instructions en ligne dans l&rsquo;attribut `style`, cette méthode de codage est à proscrire. Si vous voulez redéfinir la présentation de votre site avec cette méthode, vous allez devoir modifier la couche structurelle en même temps, il s&rsquo;agit d&rsquo;une entorse à la régle de séparation de la présentation et de la structure.

## Déclencheurs JavaScript

La couche comportementale doit fonctionner de la même manière. Il faut <a href="http://www.digital-web.com/articles/separating_behavior_and_structure_2/" hreflang="en"> séparer le comportement de la structure</a> en vous séparant des gestionnaires d&rsquo;évenements en ligne comme celui-ci : `onmouseover="switchImages('fearful',6,false)"`. &Agrave; la place, comme en CSS, nous allons utiliser des déclencheurs pour informer le script permettant la mise en oeuvre du comportement adéquate.

Le déclencheur JavaScript le plus simple est l&rsquo;attribut `id` :

<pre class="html"><code>&lt;div id="navigation"&gt;
 &lt;ul&gt;
  &lt;li&gt;&lt;a href="#"&gt;Link 1&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="#"&gt;Link 2&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="#"&gt;Link 3&lt;/a&gt;&lt;/li&gt;
 &lt;/ul&gt;
&lt;/div&gt;
</code></pre>

<pre class="javascript"><code>var x = document.getElementById('navigation');
if (!x) return;
var y = x.getElementsByTagName('a');
for (var i=0;i&lt;y.length;i++)
 y[i].onmouseover = addBehavior;
</code></pre>

Avec ce code, le comportement est déclenché par la présence ou l&rsquo;absence de `id="navigation"`. S&rsquo;il est absent, il ne se passe rien (`if (!x) return`), mais s&rsquo;il est présent tous les éléments liens qui en descendent auront un comportement au survol. Cette solution est simple et élégante, et elle fonctionne dans tous les navigateurs. Si l&rsquo;`id` permet de couvrir vos besoins, vous n&rsquo;avez pas besoin de lire la suite de cet article.

## Déclencheurs avancés

Malheureusement, dans certaines situations il est impossible d&rsquo;utiliser l&rsquo;attribut `id` comme déclencheur:

1.  Un `id` doit être unique dans tout le document et vous pouvez avoir besoin d&rsquo;un même comportement pour plusieurs (un groupe) éléments.
2.  Parfois un script a besoin de plus d&rsquo;information que simplement &#8220;exécutez-moi ici.&#8221;

Prenons pour ces 2 problèmes l&rsquo;exemple d&rsquo;un script de gestion de formulaire. Il serait pratique d&rsquo;ajouter un déclencheur permettant d&rsquo;indiquer qu&rsquo;un champ est obligatoire. Si nous avions un tel déclencheur, nous pourrions utiliser un script aussi simple que le suivant.

<pre class="javascript"><code>function validateForm()
{
 var x = document.forms[0].elements;
 for (var i=0;i&lt;x.length;i++)
 {
  if (&lt;strong>[ce champ est obligatoire]&lt;/strong> &#038;&#038; !x[i].value)
    // Informer l'utilisateur de l'anomalie
 }
}
</code></pre>

Mais comment créer un déclencheur XHTML permettant d&rsquo;indiquer au script que certains champs sont obligatoires&nbsp;? Utilisez un `id` n&rsquo;est pas envisageable : car nous avons besoin d&rsquo;une solution qui puisse fonctionner sur plusieurs champs. Il serait possible d&rsquo;utiliser l&rsquo;attribut `class` pour piloter ce comportement :

<pre class="html"><code>&lt;input name="name" class="required" /&gt;
</code></pre>

<pre class="javascript"><code>
if (&lt;strong>x[i].className == 'required'&lt;/strong> &#038;&#038; !x[i].value)
  // Informer l'utilisateur de l'anomalie
</code></pre>

Pourtant, <a href="http://www.w3.org/TR/xhtml1/#C_13" hreflang="en">l&rsquo;attribut <code>class</code> est plutôt dédié à la définition de styles CSS</a>. Mélanger des déclencheurs CSS et JavaScript n&rsquo;est pas impossible mais peut mener rapidement à un amas de code confus: 

<pre class="html"><code>&lt;input name="name" class="largefield required" /&gt;
</code></pre>

<pre class="javascript"><code>
if (
  &lt;strong>x[i].className.indexOf('required') != -1&lt;/strong> &#038;&#038;
  !x[i].value
)
</code></pre>

&Agrave; mon avis, l&rsquo;attribut `class` ne devrait être utilisé *que* pour le CSS. Les classes sont les premiers déclencheurs XHTML pour la couche de présentation et les utiliser aussi pour porter une information de comportement complique les choses. Déclencher la couche de présentation et de comportement avec le même attribut `class` représente aussi une entorse à la stricte [séparation du comportement et de la présentation ][1], bien qu&rsquo;en fin de compte c&rsquo;est à vous de choisir ce qui est acceptable à ce sujet.

## Déclencheurs porteurs d&rsquo;information

De plus ces déclencheurs peuvent prendre plus d&rsquo;importance et être plus compliqués que la simple commande &#8220;déployez ce comportement ici&#8221;. Vous aurez certainement besoin de joindre une valeur à un déclencheur. Une valeur de déclenchement rendrait la couche comportementale beaucoup plus souple, puisqu&rsquo;elle pourrait répondre à différentes conditions d&rsquo;exécution pour chaque élément XHTML au lieu d&rsquo;exécuter bêtement le même script.

Prenez un formulaire dans lequel des zones de texte ont des tailles maximum pour paramètre. Le vieil attribut `MAXLENGTH` ne fonctionne pas avec les zones de texte, nous devons donc ecrire un petit script pour cela. De plus toutes les zones de textes n&rsquo;ont pas la même longueur maximum, nous allons donc avoir à renseigner cette information quelque part de façon individuelle pour chaque zone de texte.

Nous voulons avoir quelquechose de la forme :

<pre class="javascript"><code>var x = document.getElementsByTagName('textarea');
for (var i=0;i&lt;x.length;i++)
{
 if (&lt;strong>[cette zone de texte a une longueur max]&lt;/strong>)
  x[i].onkeypress = checkLength;
}

function checkLength()
{
 var max = &lt;strong>[Lecture de la longueur max]&lt;/strong>;
 if (this.value.length > max)
  // Informer l'utilisateur de l'anomalie
}
</code></pre>

Ce script a besoin de 2 paramètres :

1.  Est-ce que cette zone de texte a une longueur maximum? Il s&rsquo;agit ici du déclencheur qui informe le script qu&rsquo;il y a un comportement à gérer. 
2.  Quelle est la longueur max? C&rsquo;est la valeur que le script doit vérifier pour valider la saisie utilisateur.

Et c&rsquo;est typiquement dans ce cas que la solution basée sur les classes montre ses limites. C&rsquo;est toujours techniquement possible, mais le code à implémenter devient trop compliqué. Prenez une zone de texte avec la classe CSS &laquo;&nbsp;large&nbsp;&raquo; qui soit aussi obligatoire et dont la longueur max. est de 300 caractères: 

<pre class="html"><code>&lt;textarea class="large required maxlength=300"&gt;
&lt;/textarea&gt;
</code></pre>

Non seulement cet exemple mélange de la présentation et 2 types de comportement, mais cela rend la longueur maximum de la zone de texte plus difficile à lire:

<pre class="javascript"><code>var max = &lt;strong>this.className.substring(this.className.indexOf('maxlength')+10)&lt;/strong>;
if (this.value.length > max)
 // Informer l'utilisateur de l'anomalie
</code></pre>

&Agrave; noter que ce bout de code ne fonctionne que si le paramètre longueur max. est placé en fin de valeur de classe. Si on veut placer la longueur max. n&rsquo;importe où dans la valeur de classe (au cas où on voudrait ajouter un autre déclencheur après celui-ci) le code devient bien plus compliqué.

## Le problème

C&rsquo;est bien notre problème du jour. Comment ajouter de bon déclencheurs JavaScript qui nous permettent à la fois de couvrir le cas d&rsquo;un simple déclenchement d&rsquo;action (&#8220;exécutez-moi ici&#8221;) et celui du passage de valeur spécifique à l&rsquo;éléments ?

Techniquement, nous avons vu qu&rsquo;il était possible de gérer ces cas avec l&rsquo;attribut `class`, mais avons-nous le droit de détourner la fonction l&rsquo;usage de cet attribut pour porter des informations pour lequel il n&rsquo;est pas fait ? Est ce une entorse à la règle de séparation de la présentation et du comportement ? Et même si vous ne voyez pas d&rsquo;obstacle à cette solution, elle reste tout de même compliquée à mettre en oeuvre et requiert un code JavaScript assez ardu.

Il est tout de fois possible d&rsquo;utiliser d&rsquo;ajouter des déclencheurs sur d&rsquo;autres attributs comme `lang` ou `dir`, mais , encore une fois, ce serait une utilisation détournée d&rsquo;attributs.

## Attributs personnalisées

Je vos propose une autre solution. Reprenons l&rsquo;exemple de la longueur max. de la zone de texte. Nous avons besoin de 2 informations:

1.  Est-ce que la zone de texte a une limite de taille ?
2.  Quelle est cette limite ?

La manière naturelle et sémantique d&rsquo;exprimer cette information serait d&rsquo;ajouter un attribut à la zone de texte:

<pre class="html"><code>&lt;textarea  class="large" maxlength="300" &gt;
&lt;/textarea&gt;
</code></pre>

La présence de l&rsquo;attribut `maxlength` informe le script qu&rsquo;il faut vérifier la saisie utilisateur dans cette zone de texte et il peut trouver la taille limite pour cette zone dans la valeur de l&rsquo;attribut. De la même manière, pour le contrôle d&rsquo;obligation de saisie, nous pouvons aussi créer un attribut personnalisé. `required="true"`, par exemple, même si n&rsquo;importe quelle valeur permet de déclencher le contrôle. 

<pre class="html"><code>&lt;textarea class="large" maxlength="300" required="true"&gt;
&lt;/textarea&gt;
</code></pre>

Techniquement ce n&rsquo;est pas un problème. La méthode DOM du W3C `getAttribute()` permet de lire n&rsquo;importe quel attribut d&rsquo;une balise. Seul Opera jusqu&rsquo;à [sa version 7.54 ne permet pas ][2] de lire un attribut existant sur la mauvaise balise (comme `src` sur la balise `<h2>`). Heureusement les version ultérieur assure un support complet de la méthode `getAttribute()`.

Voici donc ma solution&nbsp;:

<pre class="javascript"><code>function validateForm()
{
 var x = document.forms[0].elements;
 for (var i=0;i&lt;x.length;i++)
 {
  if (&lt;strong>x[i].getAttribute('required')&lt;/strong> &#038;&#038; !x[i].value)
    // Informer l'utilisateur que le champ est obligatoire
 }
}

var x = document.getElementsByTagName('textarea');

for (var i=0;i&lt;x.length;i++)
{
 if (&lt;strong>x[i].getAttribute('maxlength')&lt;/strong>)
  x[i].onkeypress = checkLength;
}

function checkLength()
{
 var max = &lt;strong>this.getAttribute('maxlength')&lt;/strong>;
 if (this.value.length &gt; max)
  // Informer l'utilisateur que la longueur max est atteinte
}
</code></pre>

&Agrave; mon avis cette solution est simple à implémenter et cohérente avec la forme que les déclencheurs JavaScript peuvent prendre: une paire clé/valeur à l&rsquo;endroit où la clé déclenche l&rsquo;action et la valeur permet de conditionner l&rsquo;action en fonction de chaque élément. Finalement, ajouter ces déclencheurs au code XHTML est très simple même pour des webmaster débutants.

## DTDs personnalisées

Après l&rsquo;implémentation de cette solution vous pourrez noter que la page résultante n&rsquo;est pas valide. &Agrave; la validation les attributs `required` et `maxlength` sont rejetés car il ne sont pas autorisées dans le document. C&rsquo;est bien sur complètement vrai : le premier attribut ne fait pas partie des spécifications XHTML, tandis que le second n&rsquo;est valide que sur un élément `<input>`.

Pour résoudre ce problème, il suffit de les *rendre* valides; en créant une Définition de Type de Document (DTD) personnalisée qui étend XHTML pour inclure ces attributs déclencheurs. Cette DTD personnalisée définit nos attributs spéciaux et leur place dans le document, l&rsquo;outil de validation permet de confronter la structure du document à notre version personnalisée de XHTML Si la DTD déclare les attributs valides, c&rsquo;est qu&rsquo;ils le sont.

Si vous ne savez pas créer de DTD personnalisée, vous pouvez lire l&rsquo;article de J. David Eisenberg&#8217;s intitulé <a href="http://www.alistapart.com/articles/customdtd/" hreflang="en">Creating Custom DTDs</a> (NDT: ou la traduction français <a href="http://v05.z720.net/blog/archives/2005/03/03/valider-une-dtd-personnalisee" hreflang="fr">Valider une DTD personnalisée</a>) pour tout savoir sur le sujet.

&Agrave; mon avis, utiliser des attributs personnalisés pour contrôler la couche comportementale et écrire des DTD personnalisées pour définir ces attributs correctement contribue à séparer comportement et structure et à écrire des scripts simples et efficaces. De plus une fois ces attributs déclarés et les scripts rédigés, même un webmaster débutant est capable d&rsquo;ajouter facilement des comportements complexes dans les documents XHTML.

<h3 class="byline">
  Version originale par <a href="http://alistapart.com/authors/peterpaulkoch/" title="Voir tous les articles de Peter-Paul Koch sur A List Apart" hreflang="en">Peter-Paul Koch</a>
</h3>

<p id="authorbio">
  Peter-Paul Koch est développeur web indépendant à Amsterdam en Hollande. Il écrit et maintient <a href="http://www.quirksmode.org/">www.quirksmode.org</a>, un condensé d&rsquo;environ 180 articles, trucs et astuces CSS et JavaScript, ainsi qu&rsquo;un système de rapport de bogue et un blog
</p>

 [1]: http://www.digital-web.com/articles/separating_behavior_and_presentation/
 [2]: http://www.quirksmode.org/bugreports/archives/2005/01/existing_attrib.html "Bug report"