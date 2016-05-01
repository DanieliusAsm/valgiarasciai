productList.controller('ProductCtrl', function($scope, $window) {

    $scope.setRoute = function(product, route){
        $window.location.href += '/' +product.id + '/' + route

    }

    $scope.confirmAction = function(product) {
        var confirmRequest = confirm('Ar tikrai norite pašalinti įraša?');

        if (confirmRequest == true) {
            $window.location.href += '/' + product.id + '/delete';
        }
    }
    $scope.open = function (product) {
        alert(product.pavadinimas);
        return product.pavadinimas;
    }
});