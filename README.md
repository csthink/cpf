# [cpf](http://csthink.com/)
cpf(csthink php framework) [cpf](http://csthink.com/),PHP开源框架

# 安装
> Git clone 并安装
```shell
    git clone https://github.com/csthink/cpf.git
    cd cpf
    composer install -v
    chmod -R 777 app/log
```

> 配置 nginx 虚拟主机
```
server {
    listen 80;
    server_name www.cpf.app cpf.app; # 修改成你的域名
    root "path/to/cpf/public";
    index index.html index.htm index.php;

    charset utf-8;
    autoindex off;
    
    location / { 
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    access_log /usr/local/nginx/logs/cpf.app-access.log;
    error_log /usr/local/nginx/logs/cpf.app-error.log;

     location ~* \.php$ {
         fastcgi_index   index.php;
         fastcgi_pass    127.0.0.1:9000;
         include         fastcgi_params;
         fastcgi_param   SCRIPT_FILENAME    $document_root$fastcgi_script_name;
         fastcgi_param   SCRIPT_NAME        $fastcgi_script_name;
      }
      
     location ~ /\.ht {
         deny all;
     }
}
```

> 访问后台 `cpf.app`

# composer 
修改composer.json文件后，记得执行 composer dump-autoload