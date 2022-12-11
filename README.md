## About the project

This is a simple Product Inventory Management app in Laravel framework . 
It takes advantages of laravel api resources and collections to store and show product data in a 
nice looking format .

Overview of the routes : 


  GET|HEAD  api/products .................................... products.index › ProductController@index 

  POST      api/products .................................... products.store › ProductController@store  

  GET|HEAD  api/products/{product} ............................ products.show › ProductController@show  

  PUT|PATCH   api/products/{product} ..... products.update › ProductController@update  (not implemented)

  DELETE  api/products/{product} ...................... products.destroy › ProductController@destroy

## Run the project 

Install dependencies 

> composer install 

Make a copy of .env.example file and rename it to .env

> cp .env.example .env 

Create a database and insert the credentials in the .env file 

Run the migrations 

> php artisan migrate

Run the development server 

> php artisan serve


## About product data management 

The system supports product attributes as well , that means that alongside standalone products ,
it supports variants and combinations as well .
Variants are products that belong to a group but have different attributes .
Example : 

A T-Shirt as product 

- Variants of this product would be all the colors that product comes in e.g Black , White , Green etc 
- Combinations of this product would be Size XXL of black variant , size M of the white variant etc

I have provided some mock data to test how the product data will look like , you can find it in the project root , file products.json. This file contains data for a standalone product , for a product 
with variants and for a product with combinations .

To insert the data just copy the data as it is , put it in the body of the request 
and make a POST request to the endpoint /api/products . Do not forget to set the header: 
application/json if you are in postman 

To see all the data you can make a get request to the same route , and if you want to see a specific product make a get request to the endpoint /api/products/{id} e.g  /api/products/1

