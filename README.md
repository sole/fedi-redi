# fedi-redi

A naive PHP+Apache implementation of the redirections and proxying necessary to obtain a beautiful vanity URL for Mastodon. So even if you host your instance in a subdomain, you can still refer your friends to your top-level domain instead.

E.g. your Mastodon server points to mastodon.example.com but you don't want your friends to have to follow @user@mastodon.example.com - you want them to follow @user@example.com

This uses the pointers in this post that does sort of the same, but uses Django instead: https://aeracode.org/2022/11/01/fediverse-custom-domains/ - thank you Andrew and thank you Simon Williamson (who pointed to it: https://simonwillison.net/2022/Nov/5/mastodon/ )

## Installation

1. Get a copy of this project.
2. Place the files in your root folder - watch out if you already have an .htaccess, you'll need to manually merge them
3. Rename config-dist.php to config.php and customise it: change the value of `redirect_to_server` to the right Mastodon server you're using.

Now requests to `${your_domain}/@your_user` should be automatically redirected to `${your_mastodon_domain}/@your_user`.
And other requests to well-known files should be proxied under the hood.
 
## Features

Assuming that `folder` is where this folder is copied in your server...

* [x] proxies `folder/.well-known/webfinger` to `redirect-to-server/.well-known/webfinger`
* [x] proxies `folder/.well-known/host-meta` to `redirect-to-server/.well-known/host-meta`
* [x] proxies `folder/.well-known/nodeinfo` to `redirect-to-server/.well-known/nodeinfo`
* [x] redirects `folder/@user` to `redirect-to-server/@user`

## Limitations

I've written this in a few hours and it's the first time I do this sort of `well-known` manipulation so if something breaks I would not be surprised. Proceed with caution.

My current server uses Apache so if you need nginx rules, you'll have to write them yourself! Have a look at .htaccess for what you need to do. Hopefully it's simple enough that it's not too hard. Contributions are welcome.

Also if your server already has content that conflicts (e.g. .htaccess or paths starting with an `@` like the ones for the users), then this might clash to some degree.

Hopefully it is helpful. Good luck and happy federating!