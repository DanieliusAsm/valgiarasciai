userList.controller('UserlistCtrl', function($scope, $window) {

    /**
     * Variable store table sorting column name.
     * @type {string}
     */
    $scope.sortKey = "";

    /**
     * Variable describe sorting column order.
     * @type {boolean}
     */
    $scope.reverseOrder = false;

    /**
     * Method define how data will be sorted.
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
     * @param value
     * @returns {string}
     */
    $scope.checkTextValue = function(textValue) {
        return (textValue) ? value : "Informacijos nėra";
    }

    /**
     * @param index
     * @param addition
     * @returns {string}
     */
    $scope.setContentId = function(index, addition) {

        var idLink = '#' + index;
        return (addition == undefined) ? idLink : idLink + addition;
    }

    /**
     * @param index
     * @param addition
     * @returns {*}
     */
    $scope.getContentId = function(index, addition) {
        return (addition == undefined) ? index : index + addition;
    }

    /**
     * Set heading for each user panel.
     * @param index
     * @param user
     * @returns {string}
     */
    $scope.setHeading = function(index, user) {
        return '#' + (index + 1) + ' ' + user.name + ' ' + user.lastname;
    }

    /**
     * Redirect to user edit page or delete from users list.
     * @param user
     * @param action
     */
    $scope.redirect = function(user, action) {
        $window.location.href += '/' + user.id + '/' + action;
    }
});