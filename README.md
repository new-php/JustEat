# JustEat

## Requirements

- Apache

- PHP 7.4

- Composer

- Mysql Server

- NVM (node version v12.19.0)

- PHP Extensions: BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML


## Installation

- instal·lar extensions php
apt-cache search php | grep php7.4 | awk {'print $1'} | xargs apt install -y



## Deploy

echo -e "Host deploy.staging.justeat.xavidejuan.com\n\tHostName 138.197.187.69" | tee -a ~/.ssh/config
echo -e "Host deploy.justeat.xavidejuan.com\n\tHostName 138.197.187.69" | tee -a ~/.ssh/config