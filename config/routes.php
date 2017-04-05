<?php

route()->group('/api', function () {
    // users
    route()->get('/users', 'UserController@findUsers');
    route()->get('/users/{id}', 'UserController@findUser');
    route()->post('/users', 'UserController@createUser');
    route()->post('/users/{id}/avatar', 'UserController@avatar');
    route()->patch('/users/{id}', 'UserController@patchUser');
    route()->delete('/users/{id}', 'UserController@deleteUser');
    // groups
    route()->get('/groups', 'GroupController@findGroups');
    route()->get('/groups/{id}', 'GroupController@findGroup');
    route()->post('/groups', 'GroupController@createGroup');
    route()->patch('/groups/{id}', 'GroupController@patchGroup');
    route()->delete('/groups/{id}', 'GroupController@deleteGroup');
    // login and logout
    route()->post('/login', 'LoginController@login');
    route()->post('/logout', 'LoginController@logout');
    route()->post('/register', 'RegisterController@register');
    route()->post('/third/{platform}', 'ThirtyController@login');
    // friend ship
    route()->post('/follow/{id}', 'FriendShipController@follow');
    route()->get('/followers/{id}', 'FriendShipController@followers');
    route()->get('/following/{id}', 'FriendShipController@following');
    route()->delete('/followers/{id}', 'FriendShipController@removeFollower');
});
