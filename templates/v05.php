<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" lang="fr-FR">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" lang="fr-FR">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" lang="fr-FR">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8) ]>
<!-->
<html lang="fr-FR">
<!--<![endif]-->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>
        <?php echo $resource['title'][0] ?> | z720.net (v05 Archived)</title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="/css/v05-2011.css"/>
    <!--[if lt IE 9]>
        <script src="/js/html5.js"
        type="text/javascript"></script>
    <![endif]-->
    <link rel="alternate" type="application/rss+xml" title="z720.net &raquo; Flux" href="http://z720.net/feed" />
    <link rel="alternate" type="application/rss+xml" title="z720.net &raquo; Flux des commentaires" href="http://z720.net/comments/feed" />
    <link rel='stylesheet' id='dark-css' href='/css/v05-2011-dark.css' type='text/css' media='all' />
    <link rel='canonical' href='<?php echo $resource['link'][0] ?>' />
</head>

<body class="single single-post single-format-standard singular one-column content">
<!--
<?php var_dump($resource); ?>
-->
    <div id="page" class="hfeed">
        <header id="branding" role="banner">
            <hgroup>
                <h1 id="site-title">
                    <span>
                        <a href="http://z720.net/" title="z720.net" rel="home">z720.net</a>
                    </span>
                </h1>
                <h2 id="site-description">Web / Inspiration / Photos</h2>
            </hgroup>
            <form method="get" id="searchform" action="http://z720.net/">
                <label for="s" class="assistive-text">Recherche</label>
                <input type="text" class="field" name="s" id="s" placeholder="Recherche"
                />
                <input type="submit" class="submit" name="submit" id="searchsubmit" value="Recherche"
                />
            </form>
            <nav id="access" role="navigation">
                <h3 class="assistive-text">Menu principal</h3>
                <div class="skip-link">
                    <a class="assistive-text" href="#content" title="Aller au contenu principal">Aller au contenu principal</a>
                </div>
                <div class="skip-link">
                    <a class="assistive-text" href="#secondary" title="Aller au contenu secondaire">Aller au contenu secondaire</a>
                </div>
                <div class="menu-principal-container">
                    <ul id="menu-principal" class="menu">
                        <li id="menu-item-331" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-331">
                            <a href="http://z720.net/about">&Agrave; propos</a>
                        </li>
                        <li id="menu-item-332" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-332">
                            <a href="http://z720.net/produits/wordpress">Plugins pour WordPress</a>
                            <ul class="sub-menu">
                                <li id="menu-item-330" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-330">
                                    <a href="http://z720.net/produits/wordpress/dashbar">DashBar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- #access -->
        </header>
        <!-- #branding -->
        <div id="main">
            <div id="primary">
                <div id="content" role="main">
                    <!-- #nav-single -->
                    <article  class="post type-post status-publish format-standard hentry category-divers">
                        <header class="entry-header">
                            <h1 class="entry-title"><?php echo $resource['title'][0] ?></h1>
                            <div class="entry-meta"><?php 
try {
    $edate = new DateTime($resource['pubDate'][0],new DateTimeZone('Europe/London'));
    /* strtotime($resource['pubDate'][0]);*/ 
    $edate->setTimeZone(new DateTimeZone('Europe/Paris'));
} catch(Exception $e) {
    var_dump($e);
}
                            ?>
                                <span class="sep">Publié le</span>
                                <a href="<?php echo $resource['link'][0] ?>" title="<?php echo $edate->format("H:i")?>" rel="bookmark">
                                <time class="entry-date" datetime="<?php echo $edate->format(DateTime::W3C) ?>"><?php echo $edate->format("d/m/y") ?></time>
                                </a>
                                <span class="by-author">
                                    <span class="sep">par</span>
                                    <span class="author vcard">
                                        <a class="url fn n" href="http://z720.net/"  title="Afficher tous les articles par Seb" rel="author">Seb</a>
                                    </span>
                                </span>
                            </div>
                            <!-- .entry-meta -->
                        </header>
                        <!-- .entry-header -->
                        <div class="entry-content">
                            <?php echo $resource['content:encoded'][0] ?>
                        </div>
                        <!-- .entry-content -->
                        <footer class="entry-meta">Ce contenu a été publié dans
                            <a href="http://z720.net/blog/categories/divers" title="Voir tous les articles dans Divers" rel="category tag">Divers</a>  par <a href="http://z720.net/">Seb</a>. 
                            Mettez-le en favori avec son <a href="<?php echo $resource['link'][0] ?>" title="Permalien vers <?php echo $resource['title'][0] ?>" rel="bookmark">permalien</a>.
                        </footer>
                        <!-- .entry-meta -->
                    </article>
                    <div id="comments"></div>
                    <!-- #comments -->
                </div>
                <!-- #content -->
            </div>
            <!-- #primary -->
        </div>
        <!-- #main -->
        <footer id="colophon" role="contentinfo">
            <div id="site-generator">
                <a href="http://wordpress.org/" title="Plate-forme de publication personnelle à la pointe de la sémantique">(Anciennement) Fièrement propulsé par WordPress</a>
            </div>
        </footer>
        <!-- #colophon -->
    </div>
    <!-- #page -->
</body>

</html>