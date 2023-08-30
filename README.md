# fedi-redi

A naive PHP+Apache implementation of the redirections and proxying necessary to obtain a beautiful vanity URL for Mastodon. So even if you host your instance in a subdomain, you can still refer your friends to your top-level domain instead.

E.g. your Mastodon server points to `mastodon.example.com` but you don't want your friends to have to follow `@user@mastodon.example.com` - you want them to follow `@user@example.com`

Based on information from...
* this post that does sort of the same, but uses Django instead: https://aeracode.org/2022/11/01/fediverse-custom-domains/ - thank you, Andrew!
* this post which uses the above and explains things neatly: https://simonwillison.net/2022/Nov/5/mastodon/ - thank you, Simon!
* this post https://masto.host/mastodon-usernames-different-from-the-domain-used-for-installation/ - thank you, Hugo!

## Installation

1. Get a copy of this project.
2. Place the files in the root folder of your domain, i.e. where you want your Mastodon URLs to _appear_ to be. But watch out if you already have an `.htaccess`, you'll need to manually merge them (see _Limitations_ section below).
3. Rename `config-dist.php` to `config.php` and customise it: change the value of `redirect_to_server` to the URL of the Mastodon server you're using.

Now requests to `${your_domain}/@your_user` and other requests to `well-known` files should be automatically redirected and/or or proxied appropriately.
 
## Features

Assuming that `folder` is where this folder is copied in your server...

* [x] proxies `folder/.well-known/webfinger` to `redirect-to-server/.well-known/webfinger`
* [x] redirects `folder/.well-known/host-meta` to `redirect-to-server/.well-known/host-meta`
* [x] proxies `folder/.well-known/nodeinfo` to `redirect-to-server/.well-known/nodeinfo`
* [x] redirects `folder/@user` to `redirect-to-server/@user`

## Limitations

I've written this in a few hours and it's the first time I do this sort of `well-known` manipulation so if something breaks I would not be surprised. Proceed with caution.

My current server uses Apache so if you need nginx rules, you'll have to write them yourself! Have a look at .htaccess for what you need to do. Hopefully it's simple enough that it's not too hard. There are also some pointers in the post from Masto.host that explain how to do this in Nginx.

Also if your server already has content that conflicts (e.g. .htaccess or paths starting with an `@` like the ones for the users), then this might clash to some degree.

Hopefully it is helpful.  Contributions are welcome but please note this isn't intended to be a fully fledged project, more like a snippet of code for you to use or get started.

Good luck and happy federating! 🤩