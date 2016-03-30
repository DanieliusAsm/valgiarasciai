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
     * if value is empty retrun N/A else return value
     * @param value
     * @returns {string}
     */
    $scope.checkValue = function(value) {
        return (value) ? value : "N/A";
    }

    /**
     * Set content location id.
     * @param index
     * @returns {string}
     */
    $scope.setContentId = function(index) {
        return '#' + index;
    }

    /**
     * Assign collapse content for each user panel.
     * @param index
     * @returns {*}
     */
    $scope.getContentId = function(index) {
        return index;
    }

    /**
     * Set heading for each user panel.
     * @param index
     * @param user
     * @returns {string}
     */
    $scope.setHeading = function(index, user) {
        return '#' + (index + 1) + ' ' + user.first_name + ' ' + user.last_name;
    }

    /**
     * Redirect to specific user edit page or delete from list.
     * @param user
     * @param action
     */
    $scope.redirect = function(user, action) {
        $window.location.href += '/' + user.id + '/' + action;
    }
});