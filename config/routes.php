<?php

route()->group('/api', function () {
    route()->get('/users', 'UserController@findUsers');
    route()->get('/users/{user}', 'UserController@findUser');
    route()->post('/users', 'UserController@createUser');
    route()->patch('/users/{user}', 'UserController@patchUser');
    route()->delete('/users/{user}', 'UserController@deleteUser');

    route()->post('/login', 'LoginController@login');
    route()->post('/logout', 'LoginController@logout');
    route()->post('/register', 'RegisterController@register');
    route()->post('/third/{platform}', 'ThirtyController@login');

    route()->post('/follow/{id}', 'FriendShipController@follow');
    route()->get('/followers/{id}', 'FriendShipController@followers');
    route()->get('/following/{id}', 'FriendShipController@following');
    route()->delete('/followers/{id}', 'FriendShipController@removeFollower');
});
