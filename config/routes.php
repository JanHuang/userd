<?php

/**
 * User login APIs
 */
route()->post('/login', 'LoginController@login');
route()->post('/logout', 'LoginController@logout');
route()->post('/register', 'RegisterController@register');
route()->get('/register/{id}', 'RegisterController@register');
route()->post('/thirty/{platform}', 'ThirtyController@login');

/**
 * User profile APIs
 */
route()->get('/profile/{id}', 'ProfileController@getProfile');
route()->post('/profile', 'ProfileController@createProfile');
route()->patch('/profile/{id}', 'ProfileController@setProfile');
route()->delete('/profile/{id}', 'ProfileController@deleteProfile');

/**
 * User friend ship
 */
route()->get('/followers/{id}', 'FollowerController@followers');
route()->post('/followers/{id}', 'FollowerController@follow');
route()->delete('/followers/{id}', 'FollowerController@removeFollower');