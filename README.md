## DOCUMENT BEING WRITTEN

Oauth2-Symfony2 API-Skeleton
========================

Welcome to this skeleton of a webAPI in Symfony2 with FOSUser - Oauth2 Features
You can use this application as the skeleton for your future applications

This documents will explains you how to install and start using this 
application using Symfony2, FOSUserBundle and FOSOAuth2.
At the end of installation you should be able to run preloaded example. 
Of course your expertise is necessary to apply your own modifications.

This Git repository works with the [Oauth2-Symfony2 Client-Skeleton][1] form which
the example will be runnable.


1) Installing the API Side
----------------------------------

### 1-1 Unzip file
### 1-2 Install vendors

To install vendors, execute the following command

	php composer.phar update

### 1-3 Configure database

The first step is to to configure the parameters.yml config file.
Type your connection settings to the database.

Then execute the following commands to create database (if it's not already done):
	
	php app/console doctrine:database:create --force

Then set the database architecture according to API entities:

	php app/console doctrine:schema:update --force

Here we are, your database is ready.

### 1-4 Define sample of users

This step is important because we are going to set users and api authorizations.

First execute the following command to create a user:

	php app/console cb:user:create

Follow command line questions. This command is an adaptation of FOSUserBundle user creation script. If you try to use FOSUserScript it won't work beacause of OAuth needs.

### 1-5 Define API client authorizations

The last step is to prepare API OAuth to allow client satellites to consume informations throw API.

Run the following command to create a client grants informations:

	php app/console cb:oauth-server:client:create --redirect-uri=http:/my-redirect-uri --grant-type=password

IMPORTANT: Look at the console output and remember informations. There is 2 important informations to remember. This informations will be used in [Oauth2-Symfony2 Client-Skeleton][1].
This is an output example:
	
	$ php app/console cb:oauth-server:client:create
	Added a new client with public id 1_pirizr2x1es4c40ws0kcoc4wc0gkc80w0g0c8coss84g
	o84ow, secret 3yyvqta1mgowgk8gocgkwwc848wc0gogg8k44wcgos0ckwswwo

Remember the public id (here: 1_pirizr2x1es4c40ws0kcoc4wc0gkc80w0g0c8coss84go84ow)
and the secret token (here: 3yyvqta1mgowgk8gocgkwwc848wc0gogg8k44wcgos0ckwswwo)


2) First tests of your application
----------------------------------

### 2-1 Using router debug

For the first test, run the following command and compare to this output:

	php app/console router:debug

You should have the same things as below:

	All toutes about symfony profiler and configuration ...
	api_1_new_offer_scale            GET      ANY    ANY  /api/v1/offer_scales/new.{_format}
	api_1_get_offer_scales           GET      ANY    ANY  /api/v1/offer_scales.{_format}
	api_1_get_offer_scale            GET      ANY    ANY  /api/v1/offer_scales/{id}.{_format}
	api_1_post_offer_scale           POST     ANY    ANY  /api/v1/offer_scales.{_format}
	api_1_put_offer_scale            PUT      ANY    ANY  /api/v1/offer_scales/{id}.{_format}
	api_1_patch_offer_scale          PATCH    ANY    ANY  /api/v1/offer_scales/{id}.{_format}
	api_1_delete_offer_scale         DELETE   ANY    ANY  /api/v1/offer_scales/{id}.{_format}
	nelmio_api_doc_index             GET      ANY    ANY  /api/doc/
	fos_oauth_server_token           GET|POST ANY    ANY  /oauth/v2/token
	fos_oauth_server_authorize       GET|POST ANY    ANY  /oauth/v2/auth
	cb_oauth_server_auth_login       ANY      ANY    ANY  /oauth/v2/auth_login
	cb_oauth_server_auth_login_check ANY      ANY    ANY  /oauth/v2/auth_login_check


### 2-2 Using Postman

Do yuo know Postman? It's a Chrome Application able to run http request formated as you like.
I invite you to use this tool in order to make the first tests of API Side.

1) Import test sample into Postman application. you will find the document [here][3].

2) Try one by one each requests.

3) If you don't know about OAuth requests flow, take look at [here][4] or search on the web.


### 2-2 Using Nelmio doc

Look at the previous router debug, ther is a route called 'nelmio_api_doc_index'.
Point your web broswer to the corresponding address:
Dont forget to modify uri location and the access_token that you will have via Postman's reqponse.

	http://localhost/YourProjectLocation/web/app_dev.php/api/doc?access_token=ZWRiYTg2MjRkMTkxNWQxZTk5MWE1MTcyY2VkMjgxNGE5ZDZlMDRjZDMyM2EwNTk2NWE0ZjdiNzBjMjE0ZjU2ZA

	
3) Finalizing test with client side
-----------------------------------

Refer to the [Client Side Skeleton][1].


4) Some explanations
--------------------

### 4-1 What is this skeleton made for?
### 4-2 Application template

What's inside?
---------------

The Symfony Standard Edition is configured with the following defaults:

  * FOSUserBundle configured and ready to use;

  * FOSOAuthServerBundle configured and ready to use;

  * FOSRestBundle configured and ready to use;

  * NelmioAPIDocBundle configured and ready to use;

  * All other symfony standard edition bundles


Enjoy!

[1]:  	https://github.com/spirit-dev/Oauth2-Symfony2_Client-Skeleton
[2]:  	https://github.com/spirit-dev/Oauth2-Symfony2_API-Skeleton
[3]:	https://github.com/spirit-dev/Oauth2-Symfony2_API-Skeleton/tree/master/doc/resources
[4]:	https://github.com/spirit-dev/Oauth2-Symfony2_API-Skeleton/blob/master/doc/OAuth-requests-flow.md
