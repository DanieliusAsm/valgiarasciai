diet.controller('DietController', function($scope){
    $scope.proteins = Array('');
    $scope.produktas = [];

    $scope.calculateValue = function(quantity, baseValue) {
        if (quantity && baseValue){
            var amount = Number(quantity) * Number(baseValue) / 100;

            //if(dataType=='protein'){
               // $scope.proteins[parentIndex].push(5);
           // }

            return amount;
        }
        return 0;
    };

    $scope.getProteinSum = function(parentIndex){
        console.log($scope.proteins);
        var sum = 0;
        for(var i =0; i<$scope.proteins.length; i++){
            if(parentIndex==i){
                for(var b=0; b<$scope.proteins[i].length;b++){
                    sum += $scope.proteins[i][b];
                }
            }

        }
        return sum;
    }
});