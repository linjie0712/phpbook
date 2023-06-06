1.准备必要的软件包
```
sudo apt-get install software-properties-common
sudo apt-get install -y language-pack-en-base
sudo LC_ALL=en_US.UTF-8 add-apt-repository ppa:ondrej/php
```
2.安装 php7
```
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get install php7.0-fpm php7.0-cli php7.0-common php7.0-json php7.0-opcache php7.0-mysql php7.0-phpdbg php7.0-mbstring php7.0-gd php7.0-imap php7.0-ldap php7.0-pgsql php7.0-pspell php7.0-recode php7.0-snmp php7.0-tidy php7.0-dev php7.0-intl php7.0-curl php7.0-zip php7.0-xml php7.0-redis
```
3.安装 Nginx
```
sudo apt-get install nginx
```
编辑文件 /etc/php/7.0/fpm/pool.d/www.conf:
```
listen 127.0.0.1:9000
```
然后将 sites-enabled 的主机配置改为：
```
fastcgi_pass 127.0.1.1:9000;
```
4.安装 MySQL Server
```
sudo apt-get install mysql-server
sudo mysql_secure_installation
```
5.重新启动服务
```
sudo service php7.0-fpm restart
sudo service nginx restart
```
完成安装