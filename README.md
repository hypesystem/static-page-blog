static-page-blog
================

This is a quick little project that tries to combine two facets that are both popular in technical design of websites:

- allowing users to edit content through in-page editors, and
- having all files that are shown be static files (ie. no waiting on server rendering)

How to Use It
-------------

Clone the repository.
Have apache2 (or other web server) installed, and set up a URL for the `public/` folder.
Have PHP installed and run the build script, `php build.php`.
The site should now work at whatever URL you set up.

Background
----------

What exactly are these two things, why are they not normally done together, and why are they done together here?

Traditionally, the two things are at odds, because they're hard to combine.
Let's start with looking at where the methods are used traditionally.

Pages that can be edited within the system are usually rendered dynamically:
every page is processed on the server, in some scripting language, before being sent to the browser.
This works because every page depends on data in a database, and it is easy to write a system where each request results in database lookups and rendering of a page.
The downside to this is that page load-time takes a lot longer than just serving a static HTML page.
Caching can help with some issues here, but if, for example, user information is part of the rendered page, it must be re-rendered *every time* a request is made.

Serving static files is faster.
Static files are usually used in sites that are built *before* deploying, and the deployed pages stay that way.
So they are static files to be served, and they are also static in that they do not change between deployments.
This is often used with website tools like [Jekyll](http://jekyllrb.com/), which are glorified templating engines.
A lot of people use this together with [Github Pages](https://pages.github.com/) to run simple blogs, where changes are rare.
The blogs are edited locally and the changes are pushed.
Once they are pushed, they stay the same.

But what if we want the static pages (because they are served faster) at the same time as letting people change stuff from the site itself?
For example, a blog (as this is) with an online editor, that renders all pages as static pages.
That's basically what I've built here, to show that it *is* possible to get the best from both worlds.

Problems with this Approach
---------------------------

This approach is an experiment, to get concrete knowledge.
The biggest problem here is the same that will be found in most big frameworks:
business code and presentation code is pretty intermingled.
The frontend (presentation) needs access to the API (business), which has been solved by---in this case---leaving them next to each other.

It is pretty much impossible to change the business code without at least knowing of the presentation code.
That's bad separation.

To give you an example:
the API files---which are in charge of the business logic---also have calls to rendering of pages, which is clearly presentation.
This is a problem to be solved in a different project (out of scope of this one).

Work to be Done
---------------

I would love it if this project became more general in structure.
A lot of the code, right now, is tied very much to the domain.
A better separation of framework, presentation, and business would be nice.
Right now, the framework permeates everything---we're framework-whipped.
And that's bad.

An obvious improvement would be adding an existing templating engine, and using its flow.
What I have written here is a bit wobbly and very hard to extend.

The current work flow is a bit cumbersome.
It can definitely be improved with developer tools (like grunt watching and building on change).
It would also be nice to not ship with *Michelf/Markdown*, but use a package manager (composer) to include it.

The project is currently quite ugly.
Styling would be like a long-lost friend returning home after the war.
What war?
Any war.
