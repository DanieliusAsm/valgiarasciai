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

    /**
     * Remove user from the array
     * @param index
     */
    $scope.generateUrl = function(url, id, action) {
        if (!action.localeCompare('delete')) {
            $window.location.href = url + '/user/' + id + '/delete';
        } else {
            $window.location.href = url + '/user/' + id + '/edit';
        }
    }

    /**
     * @param $value
     * @returns {if $value is empty retrun N/A else return $value}
     */
    $scope.checkValue = function(value) {
        return (value) ? value : "N/A";
    }
});