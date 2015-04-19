static-page-blog
================

This is a quick little project that tries to combine two facets that are both popular in technical design of websites:

- allowing users to edit content through in-page editors, and
- having all files that are shown be static files (ie. no waiting on server rendering)

How to Use It
=============

Clone the repository.
Have apache2 (or other web server) installed, and set up a URL for the `public/` folder.
Have PHP installed and run the build script, `php build.php`.
The site should now work at whatever URL you set up.

Background
==========

What exactly are these two things, why are they not normally done together, and why are they done together here?

...

Problems with this Approach
===========================

This approach is an experiment, to get concrete knowledge.
The biggest problem here is the same that will be found in most big frameworks:
business code and presentation code is pretty intermingled.
The frontend (presentation) needs access to the API (business), which has been solved by---in this case---leaving them next to each other.

It is pretty much impossible to change the business code without at least knowing of the presentation code.
That's bad separation.

Work to be Done
===============

I would love it if this project became more general in structure.
A lot of the code, right now, is tied very much to the domain.
A better separation of framework, presentation, and business would be nice.
Right now, the framework permeates everything---we're framework-whipped.
And that's bad.

The current work flow is a bit cumbersome.
It can definitely be improved with developer tools (like grunt watching and building on change).
It would also be nice to not ship with *Michelf/Markdown*, but use a package manager (composer) to include it.
