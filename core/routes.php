<?php
/**
 * Author: Jalen Vaughn
 * Date: 4/9/24
 * File: routes.php
 * Description: Contains route declarations for each page.
 */


// Initialize Router object
$router = new Router();

/**
 * Product page:
 * - index: Lists all products.
 * - show: Displays details of a single product.
 * - search: Displays the products found in the user search result.
 */
$router->get(BASE_URL, 'ProductController@index');
$router->get(BASE_URL . "/product/show/{id}", 'ProductController@show');
$router->get(BASE_URL . "/product/search/{terms}", 'ProductController@search');
