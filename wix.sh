nombre=$1
parametro=$2
mkdir $nombre
echo $parametro | cat> index.php	
mv index.php $nombre/

mkdir css
mv css $nombre/
mkdir user
mv user $nombre/css/
echo | cat> estilo.css
mv estilo.css $nombre/css/user/
mkdir admin
mv admin $nombre/css/
echo | cat> estilo.css
mv estilo.css $nombre/css/admin/

mkdir img
mv img $nombre/
mkdir avatars
mv avatars $nombre/img/
mkdir buttons
mv buttons $nombre/img/
mkdir products
mv products $nombre/img/
mkdir pets
mv pets $nombre/img/

mkdir js
mv js $nombre/
mkdir validations
mv validations $nombre/js/
echo | cat> login.js
mv login.js $nombre/js/validations/
echo | cat> register.js
mv register.js $nombre/js/validations/
mkdir effects
mv effects $nombre/js/
echo | cat> panel.js
mv panel.js $nombre/js/effects/

mkdir tpl
mv tpl $nombre/
echo | cat> main.tpl
mv main.tpl $nombre/tpl/
echo | cat> login.tpl
mv login.tpl $nombre/tpl/
echo | cat> register.tpl
mv register.tpl $nombre/tpl/
echo | cat> panel.tpl
mv panel.tpl $nombre/tpl/
echo | cat> profile.tpl
mv profile.tpl $nombre/tpl/
echo | cat> crud.tpl
mv crud.tpl $nombre/tpl/

mkdir php
mv php $nombre/
echo | cat> create.php
mv create.php $nombre/php/
echo | cat> read.php
mv read.php $nombre/php/
echo | cat> update.php
mv update.php $nombre/php/
echo | cat> delete.php
mv delete.php $nombre/php/
echo | cat> dbconect.php
mv dbconect.php $nombre/php/