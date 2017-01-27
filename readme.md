# clob

The blog platform for developers.

## Features

* Write posts in GitHub Flavored Markdown
* Excellent syntax highlighting
* Developer-oriented sharing links - Hacker News, Reddit, Twitter, Email (no JS dependency)
* Comprehensive metadata support (SEO, OpenGraph, Twitter Cards, etc)
* Automatic XML Sitemap generation
* RSS 2.0 and Atom feeds
* Superfast out-of-the-box performance
* Strong accessibility with default theme
* Graceful degradation (works great with JavaScript disabled)
* Strong privacy by default (no cookies)
* Open source under MIT license

This is a very early release (v0.1.0) of clob. The next minor release (v0.2.0) will include the following new features:

* Media management and upload
* Comments module

If there's a specific feature you'd like to see in clob, let us know. We're [@theclob](https://twitter.com/theclob) on Twitter.

## Requirements

clob is built with Laravel 5.4. To install it, you'll need the following:

* PHP 7.1
* OpenSSL, PDO, Mbstring, Tokenizer and XML PHP extensions
* Composer
* MySQL, MariaDB or SQLite

## Installation

1. Download the latest version of clob from [GitHub](https://github.com/theclob/clob/releases).

1. Change into the `clob` directory  
	`$ cd clob`

1. Install dependencies with Composer  
	`$ composer install`

1. Configure the following environment variables in your system:

	`APP_KEY`: (Required) Set this to a random 32-character string (used for encryption)  
	`DB_DATABASE`: (Required) Set this to the name of your database (make sure to create it first!)  
	`DB_USERNAME`: (Required) Set this to your database username  
	`DB_PASSWORD`: (Required) Set this to your database password  
	`DB_CONNECTION`: (Optional) If you want to use SQLite, set this to `sqlite`  
	`DB_HOST`: (Optional) Hostname for the database. Only required if your database is on a different server to your Web server  
	`DB_PORT`: (Optional) Port number for the database. Only required if your database is not running on port 3306.  
	`APP_URL`: (Optional) Set this to the base URL for your app (e.g. http://example.com) - used by Laravel's Artisan CLI  
	`GAMP_TRACKING_ID`: (Optional) Set this to your Google Analytics Tracking ID to enable server-side analytics integration

	If this is a local or dev installation, you can copy the `.env.example` file in the project root to `.env` and set the values there. This is not recommended for use in a production environment, however.

1. Configure your Web server's document root to point to the `/public` directory in your clob installation. For guidelines on ensuring pretty URLs are set up in Apache or nginx, see the [relevant section](https://laravel.com/docs/5.4/installation#web-server-configuration) in the Laravel documentation.

1. Navigate to **https://{yourdomain}/setup** in your browser. You should see a setup form like the screenshot below. Fill out the form to complete the setup. If you don't see the setup form, your Web server is probably not configured correctly. If you see an error message about your database configuration, check your environment variables are set up correctly.

1. Once your blog is setup, you'll be logged straight into the clob Admin. This can be accessed in future at **https://{yourdomain}/admin**. The blog itself can be reached at **https://{yourdomain}/**.

**NOTE** The URLs above assume you have HTTPS configured on your Web server. If you don't, replace *https://* in the URLs above with *http://*.

## Frequently Asked Questions (FAQ)

1. **Does clob work in a load balanced environment?**  
	Yes. By default, clob will store session data on the filesystem. This will cause problems in a load balanced environment, however, as session data could be stored on a different server to the one currently serving up a HTTP response. To fix this, use one of Laravel's other session drivers by setting the `SESSION_DRIVER` environment variable. For more information on available drivers and how to configure them, see the [relevant section](https://laravel.com/docs/5.4/session) of the Laravel documentation.

1. **Why doesn't clob support {feature}?**  
	The short answer is that clob is still in an early stage of development, and as such is missing a lot of features and traits of other blog platforms. We are working on a website for clob that will include a detailed roadmap for clob's development as we look to reach version 1.0 later this year.

1. **How do I customise the appearance of my blog?**  
	The views for the blog are in `resources/views/blog/themes/default`.

	To customise the CSS styling, see the `resources/assets/sass` directory. For JavaScript, see `resources/assets/js/blog.js`. If you make changes to any of these files, you will need to rebuild public assets using Gulp. Make sure you have Node and Gulp installed, and simply run `gulp` in your project directory to recompile assets.

	Feel free to customize views and assets as you wish, but note that we haven't worked out an upgrade strategy for clob yet. As a result, it's vital that you backup any changes you make to these folders as you will probably lose these changes when you upgrade. We are investigating the best strategy for upgrades and hope to have this figured out in the coming months.  

1. **Help! Something's not working right!**  
	For now, there are two primary ways to get support for clob. You can [create a GitHub Issue](https://github.com/theclob/clob/issues/new). Please search [existing issues](https://github.com/theclob/clob/issues?utf8=%E2%9C%93&q=is%3Aissue) to make sure your question hasn't been asked before. Alternatively, visit the [#clob channel on Freenode](http://webchat.freenode.net/?channels=%23clob). We are working on a more complete set of documentation for clob, and we are also planning to make a discussion forum available to enable you to seek help from others in the community.

1. **Are there any examples of clob Blogs I can see?**  
	Well clob is brand new so there's not many traces of it in the wild just yet! You can check out the blog of [Joe Lennon](https://joelennon.com), the maintainer of clob, which is powered by clob. Very soon we'll have an official clob website, which will of course be powered by clob. If you have a clob blog that you'd like to list here, let us know [@theclob](https://twitter.com/theclob) on Twitter.

## License (MIT)

Copyright 2017 Joe Lennon

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
