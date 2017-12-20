# csthink
csthink cpf framework
 
# composer 
修改composer.json文件后，记得执行 composer dump-autoload

# nginx
```shell
server {
    listen 80;
    server_name www.csthink.com csthink.com;
    charset utf-8;
    root /web/html/cpf/public;
    index index.html index.htm index.php;
    autoindex off;
    
    location / {
        # Matches URLS `$_GET['_url']`
        try_files $uri $uri/ /index.php?_url=$uri&$args;
    }

     location ~* \.php$ {
         fastcgi_index   index.php;
         fastcgi_pass    127.0.0.1:9000;
         include         fastcgi_params;
         fastcgi_param   SCRIPT_FILENAME    $document_root$fastcgi_script_name;
         fastcgi_param   SCRIPT_NAME        $fastcgi_script_name;
      }
}
```
