/**
 * Define angular.js module for userlist application.
 */
var userList = angular.module('UserlistApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<@');
    $interpolateProvider.endSymbol('@>');
});

var productList = angular.module('ProductApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<@');
    $interpolateProvider.endSymbol('@>');
});

var diet = angular.module('DietApp', ['ui.bootstrap'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<@');
    $interpolateProvider.endSymbol('@>');
});