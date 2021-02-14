# Welcome to **php-simple-mit-app**  

This is a base structure realized in **PHP**, **HTML** (throws BladeOne View Engine) and **Bootstrap** for CSS rules.  
  
It is not necessary to have a database (like SQLServer or MySQL) in order to have a site with dynamic content.  
  
You can change the content by editing the json files and the markdown of the 'data' folder. *php-simple-mit-app* display them.  

As an example, you can show, the [Demo App](http://magicianred.altervista.org/gigs/php-simple-app/).


## Configuration  

### /src/Configs/Base.php  
- path of view template/theme  
- some variables for theme  
- email settings  

### /data  
- markdown files (text content pages)  
    - /data/pages/home.md  
    - /data/pages/about.md  
    - /data/pages/whoare.md  
    - /data/pages/whereare.md  
    - /data/pages/contact.md  
    - /data/pages/contact_confirm.md  

- json files  
    - /data/home_messages.json (jumbotron data)  
    - /data/people.json (who are page data)  
    - /data/places.json (where are page data)  

### View Engine  
- /views/themes  
    - /views/themes/bootstrap (base theme, bootstrap 4)  


