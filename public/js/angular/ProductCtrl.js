productList.controller('ProductCtrl', function($scope, $window) {

    $scope.setRoute = function(user, route){
        $window.location.href += '/' + user.id + '/' + route;
    }

    
});