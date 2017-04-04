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

    route()->get('/followers/{id}', 'FriendShipController@followers');
    route()->post('/followers/{id}', 'FriendShipController@following');
    route()->delete('/followers/{id}', 'FriendShipController@removeFollower');
});
