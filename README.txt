README jobsityChallenge
=======================


The site has a login / register menu on top right, when user is logged, the username is display inside login / resgister links, and display the loguot and User home links too, when user is loggued or not a home link is displaying all time on this area.

Home link is a home page and this page list the entries of all users, and paginated by 3, on side bar can display a tweets with #jobsitychallenge hashtag, is a section that display all tweets, for all users, wirh this hash tags, the hidden tweets, not displaying.

Home user page, list the entries of the autenticated user in main content area, and display the lastes tweets for this user, in this area the user, can hide - unhide yuors, tweets. when a tweet is hidden, it is removed, whn the page is listing again, this tweet, appear with a unhide - link.


REQUERIMENTS
-------------

- Composer - php laravel require

- Git - For clone project

- php artisan - is a laravel command manager

- Twitter api app configured go to https://developer.twitter.com/
  create an app to authenticate on twitter apiand get the
  TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET, TWITTER_ACCESS_TOKEN, TWITTER_ACCESS_TOKEN_SECRET




INSTALL
--------------


1. Get code from github https://github.com/cesabal/jobsitychallenge.git, make sure your folder installation is

	/var/www/jobsitychallenge/cesar_landazabal/ and clone into cesar_landazabal folder

	git clone https://github.com/cesabal/jobsitychallenge.git 


3. create database and configure this params on .env file

	DB_DATABASE=yourDatabaseName
	DB_USERNAME=user
	DB_PASSWORD=pass

	TWITTER_CONSUMER_KEY=thekey
	TWITTER_CONSUMER_SECRET=thescret
	TWITTER_ACCESS_TOKEN=thetoken
	TWITTER_ACCESS_TOKEN_SECRET=thetokensecret


2. Run the following command to migrate data base tables

	php artisan migrate

3. Run the followin command to add data examples with seeders

	php artisan db:seed --class=UsersTableSeeder
	php artisan db:seed --class=EntriesTableSeeder

4. run the followin command to generate security key for laravel

	php artisan key:generate


5. Download the cesar_landazabal.jobsitychallenge.com.conf file and put it on /etc/apache2/site-available, and then execute enable it

	* make sure that the domain cesar_landazabal.jobsitychallenge.com is ersolve to your host ip, or add this in hosts file

6. Go to your site