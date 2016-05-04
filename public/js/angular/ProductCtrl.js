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

    $scope.showReceptas = function (product) {

       var recipe = product.recipe;
       var recipeText = recipe.recipe;
       var title = product.pavadinimas;
       var image = recipe.image_name;

        $('#myModal').on('show.bs.modal', function () {

            var loc = window.location.href;
            var rootUrl = loc.substring(0, loc.lastIndexOf("/"));
            var modal = $(this);

            modal.find('.modal-title').text(title + ' receptas');
            modal.find('.modal-body .row .col-sm-4 img').attr('src', rootUrl + '/img/' + image);
            modal.find('.modal-body .row .col-sm-8 pre').text(recipeText);
        });
    }
});