### XSS 漏洞学习

框架参考[daveh php-mvc](https://github.com/daveh/php-mvc)

#### Nginx 配置

```
server {
        listen       80;
        server_name  Your server name;
        root   "Your Path/xss/public";
		index  index.php;

		#location / {
		#	try_files $uri $uri/ /index.php$is_args$args;
        #}
		location / {
			if (!-f $request_filename){
				set $rule_0 1$rule_0;
			}
			if (!-d $request_filename){
				set $rule_0 2$rule_0;
			}
			if ($rule_0 = "21"){
				rewrite ^/(.*)$ /index.php?$1 last;
			}
		}
		location ~  ^/static/(\w+).(\w+)$ {
			alias Your Path/xss/publicstatic/$2/$1.$2;
		}

		location ~ \.php$ {
        	include fastcgi_params;
        	fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        	fastcgi_pass 127.0.0.1:9000;
        	#fastcgi_pass unix:/var/run/php5-fpm.sock;
        	try_files $uri =404;
    	}
		location ~* /\. {
			deny all;
		}
}
```

#### 数据库配置
数据库配置在 `App/Config.php` 中。

表结构在 xss.sql 文件
