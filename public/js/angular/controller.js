userList.controller('UserlistCtrl', function($scope, $http) {

    /**
     * Array store all data from JSON.
     * @type {Array}
     */
    $scope.users = [];

    /**
     * Variable store column with sort table
     * @type {string}
     */
    $scope.sortKey = "";

    /**
     * Variable describe sorting column order.
     * @type {boolean}
     */
    $scope.reverseOrder = false;

    /**
     * Read data from JSON file to array.
     */
    $http.get('js/angular/temp.json').success(function(array) {
        angular.forEach(array, function(obj) {
            $scope.users.push(obj);
        });
    });

    /**
     * Method set sort column and order.
     * @param sortType
     */
    $scope.sortBy = function(requestSortType) {
        if (!$scope.sortKey.localeCompare(requestSortType) && !$scope.reverseOrder) {
            $scope.reverseOrder = true;
        } else {
            $scope.reverseOrder = false;
        }

        $scope.sortKey = requestSortType;
    }
});