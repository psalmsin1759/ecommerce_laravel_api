<VirtualHost *:80>
    ServerAdmin samson_ude@yahoo.com
    DocumentRoot "/var/www/html/backend/public"
    DirectoryIndex index.html index.php
    ServerName admin.houseofeppagelia.com
    Redirect / https://bakers.samsonude.dev


<Directory "/var/www/html/backend/public">

 Options Indexes FollowSymLinks
        AllowOverride All
        Order allow,deny
    allow from all
Require all granted


 # BEGIN WordPress
    <IfModule mod_rewrite.c>
        RewriteEngine On
        RewriteRule ^index\.php$ - [L]
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteRule . /index.php [L]
    </IfModule>
    # END WordPress

</Directory>

RewriteCond %{SERVER_NAME} =admin.houseofeppagelia.com
RewriteRule ^ https://%{SERVER_NAME}%{REQUEST_URI} [END,NE,R=permanent]
</VirtualHost>


sudo certbot --apache -d america.samsonude.dev


<VirtualHost *:80>
    ServerName america.samsonude.dev
    ServerAlias america.samsonude.dev

    ProxyRequests Off
    ProxyPreserveHost On
    ProxyVia Full

    <Proxy *>
        Require all granted
    </Proxy>

    ProxyPass / http://127.0.0.1:5050/
    ProxyPassReverse / http://127.0.0.1:5050
RewriteEngine on
RewriteCond %{SERVER_NAME} =america.samsonude.dev [OR]
RewriteCond %{SERVER_NAME} =america.samsonude.dev
RewriteRule ^ https://%{SERVER_NAME}%{REQUEST_URI} [END,NE,R=permanent]
</VirtualHost>

pm2 start npm --name america -- start