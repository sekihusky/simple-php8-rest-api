# simple-php8-rest-api
I'm using a nginx web server, this rewrite rule is in my vhost config.

if (!-e $request_filename)
{
rewrite ^/user/getone\/([^\/]+?)(\/|$) /user/getone.php?id=$1 last;
    rewrite ^/user/(.*)$ /user/$1.php last ;
}


REST API
GET - /user/getall    Fetch ALL Records
GET - /user/getone/2  Fetch Single Record
POST - /user/create   Create Record
POST - /user/update   Update Record
DELETE - /user/delete Remove Record