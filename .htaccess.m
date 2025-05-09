# Use UTF-8 encoding for anything served text/plain or text/html
AddDefaultCharset utf-8
# Force UTF-8 for a number of file formats
<IfModule mod_mime.c>
AddCharset UTF-8 .atom .css .js .json .rss .vtt .xml
</IfModule>

# FileETag None is not enough for every server.
<IfModule mod_headers.c>
Header unset ETag
</IfModule>

# Since we’re sending far-future expires, we don’t need ETags for static content.
# developer.yahoo.com/performance/rules.html#etags
FileETag None

# Cache-Control Headers
<Ifmodule mod_headers.c>
Header set vary "Accept-Encoding"
Header append vary "User-Agent"
Header append Cache-Control "public"
Header append Connection "Keep-Alive"
Header append Keep-Alive "timeout=5, max=100"
<FilesMatch "\.(ico|jpe?g|png|gif|swf|gz|ttf|svg|eot|woff|pdf|mp4|mpeg|avi|svg|woff2)$">
Header set Cache-Control "max-age=31536000"
</FilesMatch>
<filesmatch "\.(css|js)$">
 Header set Cache-Control "max-age=604800, public"
 </filesmatch>
<filesmatch "\.(html|htm)$">
Header set Cache-Control "max-age=7200, must-revalidate"
</filesmatch>
<filesmatch "\.(pl|php|cgi|spl|scgi|fcgi)$">
Header unset Cache-Control
</filesmatch>
</IfModule>

# Expires headers (for better cache control)
<IfModule mod_expires.c>
ExpiresActive on

# Perhaps better to whitelist expires rules? Perhaps.
ExpiresDefault                          "access plus 1 month"

# cache.appcache needs re-requests in FF 3.6 (thanks Remy ~Introducing HTML5)
ExpiresByType text/cache-manifest       "access plus 0 seconds"

# Your document html
ExpiresByType text/html                 "access plus 0 seconds"

# Data
ExpiresByType text/xml                  "access plus 0 seconds"
ExpiresByType application/xml           "access plus 0 seconds"
ExpiresByType application/json          "access plus 0 seconds"

# Feed
ExpiresByType application/rss+xml       "access plus 1 hour"
ExpiresByType application/atom+xml      "access plus 1 hour"

# Favicon (cannot be renamed)
ExpiresByType image/x-icon              "access plus 1 week"

# Media: images, video, audio
ExpiresByType image/gif                 "access plus 1 month"
ExpiresByType image/png                 "access plus 1 month"
ExpiresByType image/jpeg                "access plus 1 month"
ExpiresByType video/ogg                 "access plus 1 month"
ExpiresByType audio/ogg                 "access plus 1 month"
ExpiresByType video/mp4                 "access plus 1 month"
ExpiresByType video/webm                "access plus 1 month"

# HTC files  (css3pie)
ExpiresByType text/x-component          "access plus 1 month"

# Webfonts
ExpiresByType application/x-font-ttf    "access plus 1 month"
ExpiresByType font/opentype             "access plus 1 month"
ExpiresByType application/x-font-woff   "access plus 1 month"
ExpiresByType application/x-font-woff2  "access plus 1 month"
ExpiresByType image/svg+xml             "access plus 1 month"
ExpiresByType application/vnd.ms-fontobject "access plus 1 month"

# CSS and JavaScript
ExpiresByType text/css                  "access plus 1 year"
ExpiresByType application/javascript    "access plus 1 year"
</IfModule>

# Gzip compression
<IfModule mod_deflate.c>
# Active compression
SetOutputFilter DEFLATE
# Force deflate for mangled headers
<IfModule mod_setenvif.c>
<IfModule mod_headers.c>
SetEnvIfNoCase ^(Accept-EncodXng|X-cept-Encoding|X{15}|~{15}|-{15})$ ^((gzip|deflate)\s*,?\s*)+|[X~-]{4,13}$ HAVE_Accept-Encoding
RequestHeader append Accept-Encoding "gzip,deflate" env=HAVE_Accept-Encoding
# Don’t compress images and other uncompressible content
SetEnvIfNoCase Request_URI \
\.(?:gif|jpe?g|png|rar|zip|exe|flv|mov|wma|mp3|avi|swf|mp?g|mp4|webm|webp)$ no-gzip dont-vary
</IfModule>

# Compress all output labeled with one of the following MIME-types
<IfModule mod_filter.c>
AddOutputFilterByType DEFLATE application/atom+xml \
		                          application/javascript \
		                          application/json \
		                          application/rss+xml \
		                          application/vnd.ms-fontobject \
		                          application/x-font-ttf \
		                          application/xhtml+xml \
		                          application/xml \
		                          font/opentype \
		                          image/svg+xml \
		                          image/x-icon \
		                          text/css \
		                          text/html \
		                          text/plain \
		                          text/x-component \
		                          text/xml
</IfModule>
<IfModule mod_headers.c>
Header append Vary: Accept-Encoding
</IfModule>
</IfModule>

# no_x_powered_by
<IfModule mod_headers.c>
    Header unset X-Powered-By
</IfModule>

# disallow site to be in iframe or clickjacking attack
Header always set X-FRAME-OPTIONS SAMEORIGIN
# disallow mime-type sniffing
Header always set X-Content-Type-Options "nosniff"

# protection
<FilesMatch "\.(htaccess|wp-config.php|install.php|readme.txt|readme.html)$">
	<IfModule mod_authz_core.c>
		Require all denied
	</IfModule>
	<IfModule !mod_authz_core.c>
		Order allow,deny
		Deny from all
	</IfModule>
</FilesMatch>

<IfModule mod_rewrite.c>
	RewriteEngine On
	# Protect wp-includes
	RewriteRule ^wp-admin/includes/ - [F]
	RewriteRule !^wp-includes/ - [S=3]
	RewriteCond %{SCRIPT_FILENAME} !^(.*)wp-includes/ms-files.php
	RewriteRule ^wp-includes/[^/]+\.php$ - [F]
	RewriteRule ^wp-includes/js/tinymce/langs/.+\.php - [F]
	RewriteRule ^wp-includes/theme-compat/ - [F]
	# Disable PHP in Uploads
	RewriteRule ^wp\-content/uploads/.*\.(?:php[1-6]?|pht|phtml?)$ - [NC,F]
	# Filter Request Methods
	RewriteCond %{REQUEST_METHOD} ^(TRACE|DELETE|TRACK) [NC]
	RewriteRule ^.* - [F]
</IfModule>

# Disable XML-RPC
<files xmlrpc.php>
	<IfModule mod_authz_core.c>
		Require all denied
	</IfModule>
	<IfModule !mod_authz_core.c>
		Order allow,deny
		Deny from all
	</IfModule>
</files>

# addType woff2
AddType application/x-font-woff2 .woff2

# protection de la lecture des répertoires
Options -Indexes

# désactiver la signature serveur
ServerSignature Off

# prévenir les erreurs liés au format pour la vidéo
AddType video/ogg ogg ogv
AddType video/mp4 mp4
AddType video/webm webm

php_value upload_max_filesize 50M
php_value post_max_size 50M