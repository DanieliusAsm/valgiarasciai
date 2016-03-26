userList.controller('UserlistCtrl', function($scope, $http) {
    
    $scope.users = [];

    $scope.sortType = "";

    $scope.reverseOrder = false;

    $http.get('js/angular/temp.json').success(function(array) {
        angular.forEach(array, function(obj) {
            $scope.users.push(obj);
        });
    });

    $scope.sortBy = function(sortType) {
        if ($scope.sortType === sortType && !$scope.reverseOrder) {
            $scope.reverseOrder = true;
        } else {
            $scope.reverseOrder = false;
        }

        $scope.sortType = sortType;
    }

    console.log('asd');
});