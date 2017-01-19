# clob

`clob` is a blog platform for developers.

The following is our planned feature list for version 1.0. We are targeting December 2017 as the release date for version 1.0.

* Open source (MIT license)
* Excellent code syntax highlighting
* Write posts in GitHub Flavored Markdown (GFM)
* Full RESTful API
* Excellent accessibility
* No JavaScript requirement, displays great in Lynx and text-based browsers
* Webhooks
* Two factor authentication
* Sign in with GitHub or Bitbucket options
* Comprehensive structured data support (SEO, OpenGraph, Microformats, etc.)
* Accelerated Mobile Pages (AMP) support
* RSS and email subscriptions
* Hacker News, Reddit and Twitter integration
* Embed Gists, Pastebins, Codepen, JSbin and other snippets in your posts
* Elasticsearch-powered search
* Full data import/export (WordPress, Ghost, Tumblr, Jekyll compatibility)
* Command line interface to manage posts
* IDE inspired color schemes
* Native desktop and mobile apps for Linux, Mac, Windows, Android and iOS
* Editor Stats and Targets - Word Count, Reading Time, etc.
* Private Blog option
* Support for multiple editors
* Ultra-fast performance (no bloated client-side code)

You will be able to install `clob` on your own server. We will supply prebuilt images for EC2, DigitalOcean and Heroku that allow you to deploy `clob` quickly and easily. The one-step setup will configure everything to get you started.

## Stack

`clob` is written in PHP 7.1 and uses Laravel 5.3. We use Bootstrap 3.3.7 and jQuery 3.1.1 on the front-end.

The following databases are supported:

* MySQL
* MariaDB
* Postgres
* SQLite
* SQL Server

Session data can be stored in any of the following:

* Local filesystem
* Cookie
* Database
* Memcached
* Redis

The following OAuth providers are supported for social login:

* GitHub
* Bitbucket
* Facebook
* Twitter
* LinkedIn

The following cache storage options are available:

* Local filesystem
* Database
* Memcached
* Redis

Uploaded assets can be stored in any of the following:

* Local filesystem
* FTP server
* Amazon S3
* Rackspace

Any of the following email services can be used for sending transactional emails (password resets, subscription confirmations, notifications, etc.):

* SMTP
* `mail` function
* `sendmail`
* Amazon SES
* Mailgun
* SparkPost

This document will be updated with any additional dependencies as they are added to the platform.

## Browser Support

`clob` supports the following Web browsers:

* Latest Chrome (Linux, Mac, Windows)
* Latest Firefox (Linux, Mac, Windows)
* Latest Firefox ESR (Linux, Mac, Windows)
* Latest Opera (Mac, Windows)
* Latest Safari (Mac)
* Latest Edge (Windows)
* Internet Explorer 8 and above (Windows)

We support the following mobile browsers:

* Latest Chrome (Android, iOS)
* Latest Firefox (Android, iOS)
* Latest Safari (iOS)

## Hosted Version

We are also working on a hosted version of `clob`, which will be available on [https://clob.io](https://clob.io). This will include all the features of the self-hosted version, as well as:

* Entire blog and back-end served exclusively over HTTPS
* Content Delivery Network (CDN) for optimal performance
* HTTP/2
* A complete commitment to privacy
* One-click option to delete your account and all your data
* {yourname}.clob.io (Free)
* Custom domains support ($20/year)

We plan to have an alpha release of the hosted version ready for May 2017, with a beta to follow in August 2017. We will go live with the hosted version simultaneously with the release of version 1.0 of `clob` in December 2017.

## Roadmap

The following is the roadmap for `clob` feature development

Version 0.1 (January 2017):

* Setup blog
* Authentication (Login, Logout, Password Reset)
* Manage Posts (Add, Edit, Delete, View)
* Post Editor (Markdown)
* Blog homepage
* Post view
* GitHub Flavored Markdown support

Version 0.2 (February 2017):

* Search
* RSS and Atom Feeds
* SEO and Structured Data features
* Integration with Google Analytics and other popular stats apps

Version 0.3 (March 2017):

* Comments Module
* OAuth authentication
* Share on Hacker News, Reddit, Twitter
* Image upload

Version 0.4 (April 2017):

* Two Factor Authentication
* API & Webhooks
* Accelerated Mobile Pages (AMP)

Version 0.5 (May 2017):

* Color Schemes and Font Customization
* Embeddable content (Gists, YouTube, Tweets, etc)
* Add support for callout boxes to editor

Version 0.6 (June 2017):

* Editor stats and targets (Word Count, Paragraph Count, Reading Time, etc.)
* Support for pages (About, Profile, etc)
* Call to action (CTA) at end of each post
* EU cookie notice option (if using tracking such as Google Analytics)

Version 0.7 (July 2017):

* Post and comment subscriptions
* Mailing list sign up, export and integration with Mailchimp, etc.

Version 0.8 (August 2017):

* Import from Wordpress, Tumblr, Ghost, Blogger, Jekyll, others
* Export JSON, XML or SQL

Version 0.9 (September 2017):

* Multi-user with authorization (can edit, can view, can create, etc)
* Private blog support

Version 1.0 (December 2017):

* CLI
* Native apps for Linux, Mac, Windows, Android and iOS
* Hosted version live

## Things to be considered before v1.0 release

* Automatic incremental updates
* Major upgrades
* Theming system
* Plugin architecture

## License (MIT)

Copyright 2017 Joe Lennon

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.