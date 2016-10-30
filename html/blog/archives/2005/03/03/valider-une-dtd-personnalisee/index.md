--- 
Title: Valider une DTD personnalisée
Author: Seb
Template: post
Permalink: /blog/archives/2005/03/03/valider-une-dtd-personnalisee
Date: 2005-03-03T12:47:01+00:00
Categories: Développement, Traductions, Web, WebStandards
--- 

Comment valider des documents XHTML utilisant une DTD personnalisée.

Traduction de l&rsquo;article [Validating a Custom DTD][1]. Translated with the permission of A List Apart Magazine ([http://alistapart.com][2]) and the author[s].

<!--more-->

Dans [son article de cette même édition][3] (NDT : sur [A List Apart &#8211; Edition NÂ°194][4]), Peter-Paul Koch propose l&rsquo;ajout d&rsquo;attributs personnalisés dans les éléments de formulaire pour déclencher des évènements spéciaux. Le valideur du W3C ne validera pas un document avec de tels attributs, parce qu&#8217;ils ne font pas partie des spécifications XHTML. 

Cet article va vous permettre : 

*   de développer des DTD sur mesure afin de déclarer des attributs personnalisés
*   de valider des documents utilisant ces attributs. 

Voici un exemple de balisage HTML personnalisé qui nous permettra : 

*   de spécifier la longueur maximale de la zone de texte 
*   de déterminer si un élément du formulaire est obligatoire ou non :

<pre>&lt;form action="http://example.com/cgi-bin/example.cgi"&gt;
&lt;p&gt;
  Name:
  &lt;input type="text" name="yourName" size="40" /&gt;

&lt;/p&gt;
&lt;p&gt;
  Email:
  &lt;input type="text" name="email" size="40"
  required="true" /&gt;

&lt;/p&gt;
&lt;p&gt;
  Comments:&lt;br /&gt;
  &lt;textarea maxlength="300" required="false"
  rows="7" cols="50"&gt;&lt;/textarea&gt;

&lt;/p&gt;
&lt;p&gt;
  &lt;input type="submit" value="Send Data" /&gt;
&lt;/p&gt;
&lt;/form&gt;
</pre>

## Qu&rsquo;est ce qu&rsquo;une DTD ? 

La Définition du Type de Document (DTD) est un fichier qui spécifie quels éléments et attributs existent dans un langage balisé et comment ils apparaissent. Ainsi la DTD XHTML précise que <p> est un élément valide et qu&rsquo;il peut apparaître dans une balise <div> mais pas dans <b>. L&rsquo;adresse URL, à la fin de la déclaration DOCTYPE, pointe à l&rsquo;endroit où l&rsquo;on va trouver le fichier de DTD pour la version HTML que l&rsquo;on va utiliser. Ni votre navigateur, ni le valideur du W3C ne parcourt le web pour récupérer la DTD &#8211; Ils ont une liste des DOCTYPEs valides en mémoire et utilisent l&rsquo;URL pour les identifier uniquement. Comme nous le verrons plus loin, ce comportement change en cas de DTD personnalisée. 

## Spécifier les attributs 

Ajouter des attributs dans une DTD existante est facile. Pour chaque attribut, vous devez spécifier à quel élément il est associé, quel est son nom, quel type de données il peut contenir et s&rsquo;il est obligatoire ou facultatif. Ces informations sont spécifiées suivant le modèle : 

<pre>&lt;!ATTLIST
  elementName attributeName type optionalStatus
&gt;
</pre>

Pour ajouter l&rsquo;attribut maxlength à l&rsquo;élément <textarea>, il suffit d&rsquo;écrire :

<pre>&lt;!ATTLIST textarea maxlength CDATA #IMPLIED&gt;
</pre>

La spécification CDATA signifie que la valeur de l&rsquo;attribut peut contenir n&rsquo;importe quels caractères; ainsi maxlength=&nbsp;&raquo;300&Prime; ou maxlength=&nbsp;&raquo;ten&nbsp;&raquo; seront tous les deux valides. Pour les données &laquo;&nbsp;ouvertes&nbsp;&raquo;, les DTD ne nous permettent pas d&rsquo;être plus précis. La spécification #IMPLIED signifie que l&rsquo;attribut est optionnel. Un attribut obligatoire serait spécifié par #REQUIRED.  
Quand un attribut peut contenir une liste de valeurs, vous pouvez les spécifier dans la DTD. C&rsquo;est le cas pour notre attribut required, qui ne peut contenir que true ou false. Les valeurs sont sensibles à la casse; dans notre exemple seule les valeurs en minuscules sont spécifiées, donc la valeur TRUE ne sera pas considérée comme valide. 

<pre>&lt;!ATTLIST textarea required (true|false) #IMPLIED&gt;
</pre>

Attention à la confusion: l&rsquo;attribut s&rsquo;appelle &laquo;&nbsp;required&nbsp;&raquo; mais n&rsquo;est pas obligatoire dans tous les éléments <textarea>, car c&rsquo;est un attribut optionnel. Dans l&rsquo;ensemble, les modifications des spécifications dans la DTD ressemblent à ceci :

<pre>&lt;!ATTLIST textarea maxlength CDATA #IMPLIED&gt;
&lt;!ATTLIST textarea required (true|false) #IMPLIED&gt;
&lt;!ATTLIST input required (true|false) #IMPLIED&gt;
&lt;!ATTLIST select required (true|false) #IMPLIED&gt;
</pre>

<p class="note">
  Note: Ajouter de nouveaux attributs à des éléments existants est facile; ajouter de nouveaux éléments est plus compliqué et n&rsquo;est pas le sujet de cet article.
</p>

## Placer les attributs 

Maintenant que vous avez défini des attributs personnalisés, comment les placer pour qu&rsquo;ils soient pris en compte à la validation? La meilleure place serait comme un sous-ensemble directement dans votre document:

<pre>&lt;!DOCTYPE html PUBLIC
"-//W3C//DTD XHTML 1.0 Transitional//EN"

"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"
[
  &lt;!ATTLIST textarea maxlength CDATA #IMPLIED&gt;
  &lt;!ATTLIST textarea required (true|false) #IMPLIED&gt;
  &lt;!ATTLIST input required (true|false) #IMPLIED&gt;
  &lt;!ATTLIST select required (true|false) #IMPLIED&gt;
]&gt;
</pre>

Si vous passez un tel fichier au travers de la validation du W3C, il va valider merveilleusement bien. Si vous téléchargez les fichiers d&rsquo;exemple pour cet article et validez le fichier internal.html, vous pourrez le voir par vous-même. Malheureusement, quand vous affichez ce fichier dans votre navigateur, les caractères `<br />
]>` vont apparaitre à l&rsquo;écran. Il n&rsquo;y a aucun moyen de contourner ce bug, on peut donc abandonner directement cette méthode. 

## Modifier la DTD 

Une autre méthode consiste à obtenir la DTD de XHTML Transitional et d&rsquo;ajouter les modifications directement dans ce fichier. La version originale de cette DTD est le fichier xhtml1-transitional.dtd dans le répertoire dtd des fichiers d&rsquo;exemples accompagnant cet article. Vous y trouverez aussi 3 fichiers avec l&rsquo;extension .ent. Ces fichiers définissent toutes les entités que vous utilisez en HTML, comme &rsquo; et &ntilde;. Vous devez garder tous ces fichiers ensemble dans le même dossier.

Le fichier personnalisé, nommé xhtml1-custom.dtd est créé en ajoutant les nouveaux attributs à la fin du fichier xhtml1-transitional.dtd. Quand vous ajoutez des attributs, faites-le à la fin du fichier pour vous assurer que tout ce à quoi vous faites référence a déjà été défini.

## Changer le DOCTYPE 

Vous devez maintenant changer l&rsquo;insrtuction <!DOCTYPE > de votre fichier HTML pour indiquer l&rsquo;utilisation de votre &laquo;&nbsp;version&nbsp;&raquo; personnalisé de XHTML. Comme la nouvelle DTD ne fait pas partie des DTD public enregistrée, le DOCTYPE n&rsquo;utilisera pas le spécificateur PUBLIC. Il sera remplacer par le mot-clé SYSTEM suivi de l&rsquo;emplacement de la DTD personnalisée. Ce chemin peut être relatif ou absolu, il peut même être une URL si votre fichier DTD est sur un autre serveur. Le chemin doit pointer vers l&rsquo;emplacement exact de votre fichier ! Le fichier custom.html dans les exemples de cet article utilise le chemin relatif: 

<pre>&lt;!DOCTYPE html SYSTEM "dtd/xhtml1-custom.dtd"&gt;
</pre>

Quand vous essayez d&rsquo;utiliser le valideur du W3C sur ce fichier, il rejette le document parce qu&rsquo;il n&rsquo;utilise que les DTD qu&rsquo;il connait et ne va pas chercher les DTD personnalisées.

## Utiliser un valideur différent 

La solution consiste à utiliser un valideur différent qui utilisera bien l&rsquo;URL spécifiée pour vérifier la validité du document. Comme il s&rsquo;agit d&rsquo;un document XHTML, il est possible d&rsquo;utiliser n&rsquo;importe quel analyseur XML qui fait de la validation. Dans cet article nous allons utiliser l&rsquo;analyseur Xerces disponible sur [xml.apache.org][5]. Cet analyseur est écrit en Java(tm), donc Java doit être installé sur votre système. La décompression de l&rsquo;archive Xerces va créer un doccier xerces-2\_6\_2 (ou n&rsquo;importe quelle autre version courante). Par la suite, nous supposerons que vous avez décompresser l&rsquo;archive à la racine du disque C: sous Windows ou vers /usr/local sous Linux. 

Le programme Counter fait partie des exemples fournis avec Xerces. Ce programme compte le nombre d&rsquo;éléments, d&rsquo;attributs, d&rsquo;espace ignorables et de caractères apparaissants dans un document XML (ou dans notre cas XHTML). Ce programme permet d&rsquo;activer une option de validation lors de l&rsquo;analyse, le rendant parfait pour cette tache. Vous pouvez lancer le programme Counter (qui devient notre &laquo;&nbsp;valideur&nbsp;&raquo;) à partir d&rsquo;un fichier batch dans Windows ou à partir d&rsquo;un script shell dans Linux. Voici le fichier batch, nommé validate.bat. Il n&rsquo;y a qu&rsquo;une ligne de commande, mais nous l&rsquo;afficherons sur plusieurs lignes pour que cela tienne sur la page.  
Notez qu&rsquo;il y a un espace avant le mot &laquo;&nbsp;dom&nbsp;&raquo; et après &laquo;&nbsp;-v&nbsp;&raquo;.

<pre>java -cp c:\xerces-2_6_2\xercesImpl.jar; &raquo;
c:\xerces-2_6_2\xmlParserAPIs.jar; &raquo;
c:\xerces-2_6_2\xercesSamples.jar dom/Counter -v &raquo;
%1 %2 %3 %4 %5 %6 %7 %8
</pre>

Voici le script shell, nommé validate.sh.

<pre>java -cp /usr/local/xerces-2_6_2/xercesImpl.jar:\
/usr/local/xerces-2_6_2/xmlParserAPIs.jar:\
/usr/local/xerces-2_6_2/xercesSamples.jar \
dom/Counter -v $1 $2 $3 $4 $5 $6 $7 $8
</pre>

Bien sur si vous avez décompressé l&rsquo;archive de Xerces à un autre endroit, vous devrez changer les noms de chemin. Une fois ceci mis en place, il vous suffit de taper la commande suivante sous l&rsquo;invite de commande Windows pour valider le fichier custom.html :

<pre>validate custom.html
</pre>

Ou celle-ci sous l&rsquo;invite de commande Linux:

<pre>./validate.sh custom.html
</pre>

Si le fichier est valide, vous recevrez un message donnant le nom du fichier et quelques statistiques à son propos, comme ceci: 

<pre>custom.html: 543;50;0 ms
  (15 elems, 20 attrs, 9 spaces, 43 chars)
</pre>

Si le fichier n&rsquo;est pas valide, vous obtiendrez des messages d&rsquo;erreur. Par exemple, si vous essayer de valider un fichier badfile.html contenant ces erreurs:

<pre>&lt;p&gt;Email: &lt;input type="text" name="email" size="40"
	required="yes" /&gt;&lt;/p&gt;
&lt;p&gt;Comments:&lt;br /&gt;
&lt;textarea maxlength="300" inquirer="false"
   rows="7" cols="50"&gt;&lt;/textarea&gt;
</pre>

Vous obtiendrez cette sortie de l&rsquo;analyseur:

<pre>[Error] badfile.html:12:70: Attribute "required"
  with value "yes" must have a value from the
  list "true false ".
[Error] badfile.html:14:63: Attribute "inquirer"
  must be declared for element type "textarea"
badfile.html:
  611;82;0 ms (15 elems, 20 attrs, 9 spaces, 43 chars)
</pre>

## Autre méthode de validation 

Si vous utilisez l&rsquo;éditeur [jEdit][6], vous pouvez télécharger le plugin XML. Si votre fichier porte l&rsquo;extension xhtml, jEdit utilisera la DTD personnalisée pour la validation comme spécifié dans le DOCTYPE.

## Conclusion 

Il est facile de spécifier des attributs supplémentaires pour des éléments XHTML; avec un peu de travail, vous pourrez mettre en place un valideur pour vérifier vos fichiers avec votre version personnalisée HTML. [Télécharger tous les fichiers d&rsquo;exemple de cet article][7] et c&rsquo;est parti! 

## &Agrave; propos de l&rsquo;auteur

[J. David Eisenberg][8] est programmeur et professeur habitant &agrave; San Jose, CA avec son chat, Marco Polo. La plupart de son travail porte sur XML, Java, JavaScript et Perl. Il est aussi l&rsquo;auteur d&rsquo;un livre sur [le format d&rsquo;images vectorielles SVG][9]. Plus d&rsquo;information sur [catcode.com/narrative.html][10].

 [1]: http://www.alistapart.com/articles/customdtd/
 [2]: http://www.alistapart.com
 [3]: http://www.alistapart.com/articles/scripttriggers/
 [4]: http://www.alistapart.com/issues/194/
 [5]: http://xml.apache.org
 [6]: http://www.jEdit.org
 [7]: http://www.alistapart.com/d/customdtd/custom_dtd_sample_files.zip
 [8]: mailto:catcode@catcode.com
 [9]: http://oreilly.com/catalog/9780596002237/
 [10]: http://catcode.com/narrative.html