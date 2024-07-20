# trongate-booknotes
I love books. I have read a lot of them. Made notes about some of them. Published reviews online for quite a few.

The thing with writing book reviews to publish online is: they are time-consuming.

I have Dr. Angela Yu of the London App Brewery, UK, to thank for this idea of simply sharing brief notes about books that I've read. The original project which was completed for her Web Developer Bootcamp can be found on Github.

That project was built with Node.js, Express.js, Embedded.js and PostgreSQL. It is a mini-CMS for making notes about non-fiction books I have read, studied, or worked through for a variety of projects.

The public API used for this project is from the Open Library Book Covers API.

I decided shortly after completing the native PHP version to rebuild this project using the Trongate PHP Framework by web developer extraordinaire David Connelly. This framework uses native PHP too.

You are welcome to use the sample code in this repository for your own projects. If you wish to implement security features, please note that you must check the controller files to enable them as they are currently commented out. In other words, there is NO login facility (apart from the default that comes with the framework), and you must create your own. If in doubt, check the Trongate documentation.

While the styling does work because the app uses Trongate CSS, the CSS (from AdminLTE) in the view files is a bit messy with most classes and IDs not being used. Feel free to clean this up to suit your needs.

One last thing. I am presuming that you know where the files go, right?
