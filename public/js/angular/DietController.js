diet.controller('DietController', function ($scope, $http, $window,$httpParamSerializerJQLike) {
    $scope.diet = [{"type": "", "time": "", "rows": []},{"type": "", "time": "", "rows": []},{"type": "", "time": "", "rows": []},{"type": "", "time": "", "rows": []},{"type": "", "time": "", "rows": []},{"type": "", "time": "", "rows": []}];
    $scope.sumValues = [[0, 0, 0, 0, 0], [0, 0, 0, 0, 0], [0, 0, 0, 0, 0], [0, 0, 0, 0, 0], [0, 0, 0, 0, 0], [0, 0, 0, 0, 0],];

    $scope.calculateValue = function (quantity, baseValue) {
        if (quantity && baseValue) {
            var amount = Number(quantity) * Number(baseValue) / 100;
            $scope.updateTotal();
            return amount.toFixed(2);
        }
        return 0;
    };

    $scope.updateTotal = function () {
        var sumB = 0;
        var sumR = 0;
        var sumA = 0;
        var sumCh = 0;
        var sumE = 0;

        for (var i = 0; i < $scope.diet.length; i++) {
            if (typeof $scope.diet[i].rows != 'undefined') {
                for (var b = 0; b < $scope.diet[i].rows.length; b++) {
                    if(Number($scope.diet[i].rows[b].quantity) > 0){
                    sumB += Number($scope.diet[i].rows[b].quantity) * Number($scope.diet[i].rows[b].baltymai) / 100;
                    sumR += Number($scope.diet[i].rows[b].quantity) * Number($scope.diet[i].rows[b].riebalai) / 100;
                    sumA += Number($scope.diet[i].rows[b].quantity) * Number($scope.diet[i].rows[b].angliavandeniai) / 100;
                    sumCh += Number($scope.diet[i].rows[b].quantity) * Number($scope.diet[i].rows[b].cholesterolis) / 100;
                    sumE += Number($scope.diet[i].rows[b].quantity) * Number($scope.diet[i].rows[b].eVerte) / 100;
                }}
            }
            $scope.sumValues[i] = [sumB.toFixed(2), sumR.toFixed(2), sumA.toFixed(2), sumCh.toFixed(2), sumE.toFixed(2)];
            $scope.diet[i]['bendraVerte'] = {"baltymai":sumB.toFixed(2), "riebalai":sumR.toFixed(2), "angliavandeniai":sumA.toFixed(2), "cholesterolis":sumCh.toFixed(2), "eVerte":sumE.toFixed(2)};
            sumB = 0;
            sumR = 0;
            sumA = 0;
            sumCh = 0;
            sumE = 0;
        }
    }
// valueIndex 0-4 baltymai - eVerte
    $scope.getTotal = function (dietIndex, valueIndex) {
        return $scope.sumValues[dietIndex][valueIndex];
    }

    $scope.sendDiet = function(saveLink,redirect){
        $http({
            method: 'POST',
            url: saveLink,
            data: $scope.diet //$httpParamSerializerJQLike($scope.diet)
        }).then(function successCallback(response){
            console.log(response)
        }, function errorCallback(response){
            console.log(response);
        });
        //$window.location = redirect;
    }
})
;