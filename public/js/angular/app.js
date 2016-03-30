var userList = angular.module('UserlistApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('%');
    $interpolateProvider.endSymbol('%');
});