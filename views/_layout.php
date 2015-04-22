<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Static Page Blog</title>
        <style type="text/css">
            section, nav {
                box-sizing: border-box;
            }
            body {
                font-family: sans-serif;
                margin: 0;
                text-align: center;
                margin-bottom: 100px;
            }
            header {
                background: #7f8c8d;
                box-shadow: 0 1px 1px rgba(0,0,0,0.2);
            }
            header a {
                color: white;
                text-decoration: none;
                text-shadow: 1px 1px 1px rgba(0,0,0,0.2);
                padding: 0 12px;
                transition: text-shadow 0.2s;
            }
            header a:hover {
                text-shadow: 3px 3px 1px rgba(0,0,0,0.6);
            }
            header nav {
                display: inline-block;
                text-align: left;
                width: 100%;
                max-width: 800px;
                padding: 10px 0;
            }
            header .logo {
                color: white;
                font-weight: bold;
                margin-left: -10px;
                padding-right: 12px;
                text-shadow: 2px 2px 1px rgba(0,0,0,0.6);
            }
            section.content {
                text-align: left;
                display: inline-block;
                width: 100%;
                max-width: 800px;
                padding: 10px 20px;
            }
            .toolbar {
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                text-align: right;
                padding: 25px 20px;
                background: #ecf0f1;
                z-index: 100;
                transition: background 1s;
            }
            .toolbar:before {
                content: ' ... ';
                display: inline-block;
                float: left;
                color: white;
                background: rgba(0,0,0,0.4);
                padding: 6px 18px;
                border-radius: 25px;
                opacity: 0;
                transition: opacity 1s;
                width: 70px;
                text-align: left;
            }
            .toolbar.saving {
                background: #bdc3c7;
            }
            .toolbar.saving:before {
                content: 'Saving ... ';
                opacity: 1;
            }
            .toolbar.saved {
                background: #2ecc71;
            }
            .toolbar.saved:before {
                content: 'Saved :-)';
                opacity: 1;
            }
            .toolbar.failed {
                background: #e74c3c;
            }
            .toolbar.failed:before {
                content: 'Failed :-(';
                opacity: 1;
            }
            .toolbar button {
                margin: 0 25px;
                border: 1px solid black;
                text-transform: uppercase;
                background: white;
                vertical-align: middle;
                cursor: pointer;
                padding: 6px 20px;
                border-radius: 25px;
                transition: background 0.2s, color 0.2s;
            }
            .toolbar button:hover {
                background: black;
                color: white;
            }
            .toolbar .url-edit {
                display: inline-block;
                margin-right: 25px;
                font-weight: bold;
                font-size: 0.75em;
                color: #95a5a6;
                vertical-align: middle;
            }
            .toolbar .url-edit input {
                border: none;
                border-bottom: 1px dashed #95a5a6;
                width: auto;
                background: inherit;
            }
        </style>
    </head>
    <body>
        <header>
            <nav>
                <span class="logo">static-page-blog</span>
                <a href="/index.htm">Home</a>
                <a href="/admin.htm">Admin-overview</a>
                <a href="/edit-blog-post.htm">+ New blog post</a>
            </nav>
        </header>
        <section class="content">
            <?php echo $content; ?>
        </section>
    </body>
</html>