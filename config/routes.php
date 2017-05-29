<?php

route()->group(['prefix' => '/api', 'middleware' => [
//    'common.cache',
//    'validator'
]], function () {
    // users
    route()->get('/users', 'UserController@findUsers');
    route()->get('/users/{id}', 'UserController@findUser');
    route()->post('/users', 'UserController@createUser');
    route()->post('/users/{id}/avatar', 'UserController@avatar');
    route()->patch('/users/{id}', 'UserController@patchUser');
    route()->delete('/users/{id}', 'UserController@deleteUser');
    route()->get('/users/{id}/followers', 'FriendShipController@followers');
    route()->get('/users/{id}/followings', 'FriendShipController@following');
    route()->post('/users/{id}/follow', 'FriendShipController@follow');
    route()->delete('/users/{id}/followings/{follow}', 'FriendShipController@removeFollower');
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

});
