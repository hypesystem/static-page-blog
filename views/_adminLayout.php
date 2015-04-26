<section id="create-blog-post-section">
    <h1>Create a new blog post</h1>
    <a href="/edit-blog-post.htm" id="link-to-create">Click here</a>
    <script>
        (function() {
            var input = document.createElement("input");
            input.setAttribute("type", "text");
            input.setAttribute("placeholder", "Write the title of a new post here...");
            input.setAttribute("class", "big-text-input");
            
            var s = document.querySelector("#create-blog-post-section");
            s.appendChild(input);
            
            var linkToCreate = document.querySelector("#link-to-create");
            linkToCreate.remove();
            
            input.addEventListener("keypress", function(e) {
                if(e.keyCode == 13) {
                    input.setAttribute("disabled", true);
                    postUrl("_api/save-blog-post.php", {
                        title: input.value,
                        content: ""
                    }, function(error, res) {
                        input.setAttribute("disabled", false);
                        if(error) {
                            console.error("Failed to create blog post");
                            input.className = "big-text-input error";
                            setTimeout(function() {
                                input.className = "big-text-input";
                            }, 2000);
                            return;
                        }
                        input.className = "big-text-input success";
                        window.location.href += "/../edit-blog-post.htm?name=" + input.value;
                    });
                }
            });
        })();
                
        function postUrl(url, data, callback) {
            httpRequest("POST", url, function(readyState, body) {
                if(readyState == 4) {
                    try {
                        var res = JSON.parse(body);
                        if(res.error) {
                            return callback(res.error);
                        }
                        callback(null, res);
                    }
                    catch(e) {
                        callback(e+" - '"+body+"'");
                    }
                }
            }).send(JSON.stringify(data));
        }
        
        function httpRequest(method, url, callback) {
            var req = new XMLHttpRequest();
            req.open(method, url);
            req.onreadystatechange = function() {
                callback(req.readyState, req.responseText);
            };
            return req;
        }
    </script>
</section>
<section class="blog-post-overview">
    <h1>Existing posts</h1>
    <?php echo $content; ?>
</section>
