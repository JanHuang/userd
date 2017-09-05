<?php

route()->group(['prefix' => '/admin'], function () {

});

route()->group(['prefix' => '/api', 'middleware' => [
//    'common.cache',
//    'validator'
]], function () {
    // users
    route()->get('/users', 'Api\\UserController@findUsers');
    route()->get('/users/{id}', 'Api\\UserController@findUser');
    route()->post('/test', 'Api\\UserController@optionsUser');
    route()->post('/users', 'Api\\UserController@createUser');
    route()->post('/users/{id}/avatar', 'Api\\UserController@avatar');
    route()->patch('/users/{id}', 'Api\\UserController@patchUser');
    route()->delete('/users/{id}', 'Api\\UserController@deleteUser');
    route()->get('/users/{id}/followers', 'Api\\FriendShipController@followers');
    route()->get('/users/{id}/followings', 'Api\\FriendShipController@following');
    route()->post('/users/{id}/follow', 'Api\\FriendShipController@follow');
    route()->delete('/users/{id}/followings/{follow}', 'Api\\FriendShipController@removeFollower');
    // groups
    route()->get('/groups', 'Api\\GroupController@findGroups');
    route()->get('/groups/{id}', 'Api\\GroupController@findGroup');
    route()->post('/groups', 'Api\\GroupController@createGroup');
    route()->patch('/groups/{id}', 'Api\\GroupController@patchGroup');
    route()->delete('/groups/{id}', 'Api\\GroupController@deleteGroup');
    // login and logout
    route()->post('/login', 'Api\\LoginController@login');
    route()->post('/logout', 'Api\\LoginController@logout');
    route()->post('/register', 'Api\\RegisterController@register');
    route()->post('/third/{platform}', 'Api\\ThirtyController@login');
});
