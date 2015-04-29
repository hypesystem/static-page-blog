static-page-blog
================

This is a quick little project that tries to combine two facets that are both popular in technical design of websites:

- allowing users to edit content through in-page editors, and
- having all files that are shown be static files (ie. no waiting on server rendering)

I realize now that the name of the project, *static-page-blog*, is slightly misleading.
Please note that this is *not* like using Git as a CMS, because the files on the server in this project *can change after deployment*, note the 2<sup>nd</sup> point above.

How to Use It
-------------

Clone the repository.
Have apache2 (or other web server) installed, and set up a URL for the `build/` folder.
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
It becomes easy to add an online editor (like the one Wordpress, or most other blogging services out there, has).
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
[Twig](http://twig.sensiolabs.org/doc/installation.html) looks like a good choice, but this should be deferred until a package manager exists.

The current work flow is a bit cumbersome.
It can definitely be improved with developer tools (like grunt watching and building on change).
It would also be nice to not ship with *Michelf/Markdown*, but use a package manager (composer) to include it.

In order to work like a real blog, we need some kind of user system.
Keeping with the current approach, it would be very easy to simply write users to a file (each line containing user,salt,password).
When this is introduced, login should be required for posting blog posts, and blog posts should have an author.

At some point it should totally be made possible to edit the name of a blog post, so it doesn't just create a new one with the same content.
Yeahhhh.

It needs to be possible to add in some dynamic pages.
Some pages just need to be dynamic (don't make sense as static ones).
I am thinking, in particular, of search.
We should add a search.php

Assets are a thing.
Assets need to be possible.
Files that are just as they are, whatever file type they are, and should be available publically.
`public/` should contain files that are copied directly (also including search.php).

Turbolinks or the like would be super awesome, and really useful for search in particular.
When a keypress is made, a query is made to the server, and the content is actually replaced.
The only thing needed on enter-press would then be updating the URL (the content is already there).

I should add a license.

We need a concept of draft/published.

Hmmm... deleting would be nice.

The frontpage should be nicified, and the about page should be filled in with some info (link to Github?)
