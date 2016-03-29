userList.controller('UserlistCtrl', function($scope, $window) {

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
     * Method set sort column and order.
     * @param requestSortType
     */
    $scope.sortBy = function(requestSortType) {
        if ($scope.sortKey == requestSortType && !$scope.reverseOrder) {
            $scope.reverseOrder = true;
        } else {
            $scope.reverseOrder = false;
        }

        $scope.sortKey = requestSortType;
    }

    /**
     * Redirect to user edit page or delete speficif user from list
     * @param id
     * @param action
     */
    $scope.redirect = function(id, action) {
		$window.location.href += '/' + id + '/' + action;
    }

    /**
     * if value is empty retrun N/A else return value
     * @param value
     * @returns {string}
     */
    $scope.checkValue = function(value) {
        return (value) ? value : "N/A";
    }
});