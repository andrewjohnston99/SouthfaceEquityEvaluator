# SouthfaceEquityEvaluator
Southface Equity Evaluator, Georgia Tech CS Junior Design - Team 9327

## Release Notes - April 20, 2020
### New
* Admin console on Prismic
* Trial access for guests
* Export and share projects
### Bug Fixes
* DB was seeded using static data
* Users would see all tables instead of the ones associated with their project's Marta Station
* Users could not delete projects
* Users could not view a project's total score
### Known Problems
* ~~Some tables do not dynamically update the project score. ~~
* The forgot password and reset password pages use stock templates.
* The database seeder does not automatically delete items that have been deleted from Prismic.

## Installation
### Production Introduction
The SouthfaceEquityEvaluator utilized Laravel's [Homestead](https://laravel.com/docs/7.x/homestead) development environment. Homestead includes a LEMP stack with Node, composer, and a host of other great dev software. For detailed instructions on how to get your development environment setup, head over to our [project wiki](https://github.com/andrewjohnston99/SouthfaceEquityEvaluator/wiki). Below you'll find all the steps for getting the project up and running in production!

### 1. Prepping your server
Laravel projects work best on a dedicated server. You'll need to either create or purchase one, along with a domain, in order to deploy the project. One you have your server ready to go, you should install a LEMP or LAMP stack. The choice is completely up to you and there's no right or wrong answer. As mentioned above, we used LEMP since Homestead came prepackaged with it. 

### 2. Configure your SSH setup
You'll be using git and Artisan commands to manage and deploy your project. To do this, you'll need to SSH into the machine. This keeps things secure and allows for multiple team members to safely access the project. We won't go into detail about how to set up SSH here, but if you need help Digital Ocean wrote [a great article](https://www.digitalocean.com/community/tutorials/initial-server-setup-with-ubuntu-16-04) on getting everything setup. 

### 3. Configuring Nginx
You've got everything ready to install the dependencies for your project. Now it's time to get the specific folder for your site setup. Laravel provides this [example configuration](https://laravel.com/docs/7.x/deployment) in their documentation. 
```
server {
    listen 80;
    server_name example.com;
    root /example.com/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options "nosniff";

    index index.html index.htm index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.2-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```
By default Ngnix looks in `/var/www/` for the files to serve. The root of your project will be `/var/www/your_project.com/public`. You'll need to make a folder to place your app in.
```
$ sudo mkdir -p /var/www/your_project.com
```
Then update the Nginx config to point to your new project folder. Once that's done, you can run the following command to make sure that there aren't any errors in the file.
```
$ sudo ngnix -t
```
If everything is good to go, you should get a notice that syntax is okay, and the test was successful. Restart Nginx to load the new config.
```
$ sudo systemctl reload nginx
```

### 4. Install Composer
In order to get Laravel's dependencies installed on your server, you'll need to composer. You can find instructions on [GetComposer.org](https://getcomposer.org/). The necessary commands are provided below.
```
$ cd ~
$ sudo apt-get update
$ curl -sS https://getcomposer.org/installer | php
```
Now you have `composer.phar` available. You can move it into your bin, so that all you have to type is `composer` to run commands.
```
$ sudo mv composer.phar /usr/local/bin/composer
```
### 5. Install git
You'll need to use git to clone the project and deploy your application.
```
$ sudo apt-get install git
```
Once the installation is finished, we can use git to clone the our project's repository.

### 5. Cloning your project
We're going to use git hooks to move your project files after a git push.
```
$ cd /var
$ mkdir repo && cd repo
$ git clone <your git repository>
$ cd your_repo/hooks
```
Once in the `hooks/` folder, you'll need to create a file called `post-receive`. Add the following lines to that file:
```
#!/bin/sh
git --work-tree=/var/www/your_project.com --git-dir=/var/repo/your_repo checkout -f
```
After you save `/var/repo/your_repo/hooks/post-receive`, you'll need to give it the correct permissions to copy files to your project directory.
```
sudo chmod +x post-receive
```
You can exit your server now using the command `exit`. Now we can setup your local computer to push to your server just like when you push to github. You're going to set a new remote called `production` that represents your live website. When that's setup you'll be able to push to the server from your local computer by using the command `git push production master`. You'll still be able to push to github using the command `git push origin master`. The idea is that you can continue to develop and utilize github as usual, but when you're ready for changes to go live, you can push to `production`. 

To get this all setup, navigate to your project folder on your local computer. You're going to add a new remote with your project's domain name.
```
$ git remote add production ssh://root@your_project.com/var/repo/your_repo
```
Once you have production ready code you can use the command `git push production master` to push it to your server. You can verify that the git hook works by logging back into your server and navigating to `var/www/your_project.com`. You should see the files from your local computer here. 

### 6. Running composer
Now that your Laravel project is on the server, you can use composer to get all the project requirements.
```
$ cd /var/www/your_project.com
$ composer install --no-dev
```
Before you can view your project in the web browser, you need to give your server permissions over the project directory. 
```
$ sudo chown -R :www-data /var/www/your_project.com
$ sudo chmod -R 775 /var/www/your_project.com/storage
$ sudo chmod -R 775 /var/www/your_project.com/bootstrap/cache
```
### 7. Setup the database
Before you run your migrations and you'll need to create your database.
```
$ mysql -u root -p 'yourverysecurepassword'
mysql> CREATE DATABASE your_project_db
```
You should see your new database listed by using the command `SHOW DATABASES;`. You can quit MySQL using the `\q`.

### 8. Configure Laravel
Make sure you're in your project folder at `/var/www/your_project.com`. That's where you'll setup the Laravel configuration. Laravel includes an example file called `.env.example` with the typical environment variables. Your server's configuration will be a bit different. Before you edit things for your server, copy the example file to your main `.env` file.
```
$ cp .env.example .env
```
You're going to set `APP_ENV` to `production` and `APP_DEBUG` to `false`. Leave the APP_KEY as the default value for now because you'll change that using artisan. Your `DB_HOST` will be `localhost`. Update the `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` to match the credentials you just created in MySQL. You should also change your `MAIL` settings to match your email service provider.
```
APP_ENV=production
APP_DEBUG=false
APP_KEY=SomeRandomString

DB_HOST=localhost
DB_DATABASE=<your_project_db>
DB_USERNAME=root
DB_PASSWORD=XXXXXXXXXXX

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=localhost
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=outlook.office365.com
MAIL_PORT=587
MAIL_USERNAME=XXXXXXXXXXX
MAIL_PASSWORD=XXXXXXXXXXX
MAIL_ENCRYPTION=tls
```
Once you've saved those changes, you can use artisan to generate an encryption key. 
```
$ php artisan key:generate
```
The command will write to your `.env` for you, so there's no need to copy it to the file. Now that your `.env` is finished, there are a few other settings to modify in the `config/` files.

Navigate to `config/app.php`. You should change the `url` to be your project's domain name. You should also update the `timezone`. Save those changes and navigate to `config/prismic.php`. Update the `url` and `token` to match those of your Prismic project. You can find your project's credentials in the project API settings on Prismic. The last config you'll need to edit is `config/mail.php`. Update the from section to include your project's email address and name. 

### 9. Cache settings
There are lots of config files for the application, so it's good practice to created a single cached config file.
```
$ php artisan config:cache
```
### 10. Migrations
Now that everything is setup, you can migrate your database. When you run the migrations, it will warn you that your app is in production. Type `y` to continue.
```
$ php artisan migrate
```
Once the migrations finish, you'll need to seed the database. 
```
$ php artisan db:seed
```
---
You're finally done! Your application should be all set up.

## License
The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
