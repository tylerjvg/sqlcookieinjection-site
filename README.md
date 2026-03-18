# sqlcookieinjection-site
vulnerable website to demo sql cookie injections


payload - document.cookie = "remember_email=' OR '1'='1'%3B SELECT * FROM users%3B -- ; path=/";
