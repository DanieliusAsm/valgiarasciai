/**
 * Define angular.js module for userlist application.
 */
var userList = angular.module('UserlistApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('%');
    $interpolateProvider.endSymbol('%');
});