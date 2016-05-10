diet.controller('DietController', function($scope){
    $scope.onProductSelected = function(){
        var product = $(this).find('option[value="' +$scope.productName + '"]');
        //console.log($(event.target).attr("id"));
        if(product.length){
            console.log("not null")
        }else{
            //console.log($scope.productName);
        }
        //console.log($(this).siblings("datalist"));

    }
    $scope.onDatalist = function(ll){
        console.log(ll);
    }
    $scope.onQuantityChanged = function(){
        console.log("lol");
    }
});