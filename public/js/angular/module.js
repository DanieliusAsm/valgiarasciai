/**
 * Define angular.js modules for application.
 */
var userList = angular.module('UserlistApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<@');
    $interpolateProvider.endSymbol('@>');
});

var productList = angular.module('ProductApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<@');
    $interpolateProvider.endSymbol('@>');
});

var diet = angular.module('DietApp', ['ui.bootstrap','angular-loading-bar'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<@');
    $interpolateProvider.endSymbol('@>');
});