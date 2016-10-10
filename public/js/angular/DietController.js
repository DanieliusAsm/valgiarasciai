diet.controller('DietController', function ($scope, $http, $window,$httpParamSerializerJQLike) {
    //TODO learn to form array
    $scope.eatingInfo = [{type:"Pusryčiai",time:"8:00"},{type:"Priešpiečiai",time:"11:00"},
        {type:"Pietūs",time:"13:00"},{type:"Pavakariai",time:"16:00"},
        {type:"Vakarienė",time:"18:00"},{type:"Naktipiečiai",time:"21:00"}];
    $scope.diet=[];
    $scope.lastDays = 0;

    // TODO optimisation. Gets called 6 times per row.
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

        //TODO Too much work for 1 product added goes through the whole diet. add indexes
        for (var i = 0; i < $scope.diet.length; i++) {
            for (var b = 0; b < 6; b++) {
                for(var c = 0;c<$scope.diet[i].eating_types[b].rows.length;c++){
                    var row = $scope.diet[i].eating_types[b].rows[c];
                    if(Number(row.quantity) > 0){
                        sumB += Number(row.quantity) * Number(row.baltymai) / 100;
                        sumR += Number(row.quantity) * Number(row.riebalai) / 100;
                        sumA += Number(row.quantity) * Number(row.angliavandeniai) / 100;
                        sumCh += Number(row.quantity) * Number(row.cholesterolis) / 100;
                        sumE += Number(row.quantity) * Number(row.eVerte) / 100;
                    }
                }
                $scope.diet[i].total_values[b] = {"baltymai":sumB.toFixed(2), "riebalai":sumR.toFixed(2), "angliavandeniai":sumA.toFixed(2), "cholesterolis":sumCh.toFixed(2), "eVerte":sumE.toFixed(2)};
                sumB = 0;
                sumR = 0;
                sumA = 0;
                sumCh = 0;
                sumE = 0;
            }
        }
    }

    $scope.getTotal = function (dietIndex, valueIndex) {
        return $scope.sumValues[dietIndex][valueIndex];
    }

    $scope.sendDiet = function(saveLink,redirect){
         var data =  [$scope.diet, $scope.eatingInfo];
        $http({
            method: 'POST',
            url: saveLink,
            data: data //$httpParamSerializerJQLike($scope.diet)
        }).then(function successCallback(response){
            //console.log(response)
        }, function errorCallback(response){
            //console.log(response);
        });
        //$window.location = redirect;
    }

    $scope.getNumberToArray = function(n){
        if(n!= null && n > 0){
            return new Array(n);
        }else{
            return new Array(0);
        }
    }

    $scope.updateDietArray = function(){
        if($scope.days != null && $scope.days != $scope.lastDays){
            var length = $scope.days - $scope.lastDays;
            if(length > 0){
                var baseDays = 0;
                if($scope.lastDays != 0){
                    baseDays = $scope.days;
                }
                for(var i =0;i<length;i++){
                    $scope.diet.push({});
                    $scope.diet[i].day = baseDays + i + 1;
                    $scope.diet[i].eating_types = [{},{},{},{},{},{}];
                    $scope.diet[i].total_values = [{},{},{},{},{},{}];
                    $scope.sumValues
                    for(var b=0;b<6;b++){
                        $scope.diet[i].eating_types[b].rows = [{"pavadinimas":""}];
                        $scope.diet[i].total_values[b] = {"baltymai":0, "riebalai":0, "angliavandeniai":0, "cholesterolis":0, "eVerte":0};
                        //$scope.diet[i].eating_types[b].type = $scope.eatingInfo[b].type;
                        //$scope.diet[i].eating_types[b].time = $scope.eatingInfo[b].time;
                        //diet[0].eating_types[$index].type = eatingType; diet[0].eating_types[$index].time=eatingTimes[$index]
                    }
                }
            }else{
                $scope.diet = $scope.diet.slice(0,days);
            }
            $scope.lastDays = $scope.days;
        }
    }
});