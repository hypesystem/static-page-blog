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
            h1 {
                margin-top: 40px;
                margin-bottom: 8px;
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
                background: #ecf0f1;
                padding: 6px 15px;
                border-radius: 25px;
            }
            .toolbar .url-edit input {
                border: none;
                border-bottom: 1px dashed #95a5a6;
                width: auto;
                background: inherit;
            }
            .editor {
                border: none;
                resize: none;
                width: 100%;
                min-height: 500px;
                overflow: hidden;
                height: fit-content;
                margin: 10px;
                line-height: 175%;
                padding-top: 1.1em;
            }
            .blog-post-entry {
                display: block;
                border-bottom: 1px solid #95a5a6;
                color: black;
                text-decoration: none;
                background: white;
                transition: background 0.2s, color 0.2s;
                padding: 12px 8px;
            }
            .blog-post-entry:hover {
                color: white;
                background: black;
            }
            .blog-post-entry .blog-post-name {
                font-weight: bold;
                display: inline-block;
                vertical-align: middle;
            }
            .blog-post-entry .blog-post-length {
                float: right;
                display: inline-block;
                font-size: 0.8em;
                padding: 3px 7px;
                border: 1px solid black;
                border-radius: 10px;
                background: white;
                color: black;
                vertical-align: middle;
            }
            .blog-post-entry .blog-post-length:after {
                content: " chars";
                color: #7f8c8d;
            }
        </style>
    </head>
    <body>
        <header>
            <nav>
                <span class="logo">static-page-blog</span>
                <a href="/index.htm">Home</a>
                <a href="/admin.htm">Admin-overview</a>
            </nav>
        </header>
        <section class="content">
            <?php echo $content; ?>
        </section>
    </body>
</html>