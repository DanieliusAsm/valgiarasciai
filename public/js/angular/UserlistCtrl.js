/**
 * Define angular controller for userlist application.
 */
userList.controller('UserlistCtrl', function($scope, $window) {
    
    /**
     * @param value
     * @returns {string}
     */
    $scope.checkTextValue = function(textValue) {
        return (textValue) ? value : "Informacijos nėra";
    }

    /**
     * Generate user tab in panel href based on element id.
     * @param index
     * @param addition
     * @returns {string}
     */
    $scope.setContentId = function(index, addition) {

        var idLink = '#' + index;
        return (addition == undefined) ? idLink : idLink + addition;
    }

    /**
     * Get user tab href based on element id.
     * @param index
     * @param addition
     * @returns {*}
     */
    $scope.getContentId = function(index, addition) {
        return (addition == undefined) ? index : index + addition;
    }

    /**
     * Set heading for each user panel in userlist.
     * @param index
     * @param user
     * @returns {string}
     */
    $scope.setPanelHeading = function(index, user) {
        return user.first_name + ' ' + user.last_name;
    }

    /**
     * Redirect user to edit or delete route.
     * @param user
     * @param action
     */
    $scope.setRoute = function(user, route) {
        $window.location.href += '/' + user.id + '/' + route;
    }

    /**
     * Get Blood or Body object by ID
     * */
    $scope.getItemById = function(items, id){
        for(var i=0;i<items.length;i++){
            var item = items[i];
            if(item.user_id == id){
                return item;
            }
        }
        return null;
    }
});