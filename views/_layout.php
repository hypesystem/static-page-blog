<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Static Page Blog</title>
        <link rel="stylesheet" type="text/css" href="/assets/style.css">
    </head>
    <body>
        <header>
            <nav>
                <span class="logo">static-page-blog</span>
                <a href="/index.htm">Home</a>
                <a href="/admin.htm">Admin-overview</a>
                <form action="search.php" method="get">
                    <input type="text" placeholder="search ..." name="q">
                    <button>-></button>
                </form>
            </nav>
        </header>
        <section class="content">
            <?php echo $content; ?>
        </section>
    </body>
</html>