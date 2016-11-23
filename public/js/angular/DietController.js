diet.controller('DietController', function ($scope, $http, $window) { // $httpParamSerializerJQLike
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
        $window.location = redirect;
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

    $scope.calculate = function(){
        var kmi = Number($scope.mass) / (Math.pow(Number($scope.height),2) / 10000);
        kmi = kmi.toFixed(2);
        var salyga,pma,idealusSvoris,idealusPMA;
        
        if (Math.round(kmi) == 22) {
            salyga = "idealus KMI";
        } else if (kmi >= 25.5 && kmi <= 29.9) {
            salyga = "Antsvoris";
        } else if (kmi >= 30 && kmi <= 34.9) {
            salyga = "1 laipsnio nutukimas";
        } else if (kmi >= 35 && kmi <= 39.9) {
            salyga = "2 laipsnio nutukimas";
        } else if (kmi >= 40) {
            salyga = "3 laipsnio nutukimas";
        } else if (kmi >= 17.5 && kmi <= 18.5) {
            salyga = "1 laipsnio mitybos nepakankamumas";
        } else if (kmi >= 16 && kmi <= 17.4) {
            salyga = "2 laipsnio mitybos nepakankamumas";
        } else if (kmi <= 16) {
            salyga = "3 laipsnio mitybos nepakankamumas";
        }

        idealusSvoris = Math.pow(Number($scope.height),2) * 22 / 10000;
        if ($scope.gender == 'vyras') {
            pma = (66 + 13.7 * Number($scope.mass) + 5 * Number($scope.height) - 6.8 * Number($scope.age)) * Number($scope.selected.rate);
            idealusPMA = (66 + 13.7 * idealusSvoris + 5 * Number($scope.height) - 6.8 * Number($scope.age)) * Number($scope.selected.rate);
        } else {
            pma = (655 + 9.6 * Number($scope.mass) + 1.7 * Number($scope.height) - 4.7 * Number($scope.age)) * Number($scope.selected.rate);
            idealusPMA = (655 + 9.6 * idealusSvoris + 1.7 * Number($scope.height) - 4.7 * Number($scope.age)) * Number($scope.selected.rate);
        }
        $scope.calcData.kmi = kmi;
        $scope.calcData.salyga = salyga;
        $scope.calcData.pma = pma.toFixed(2);
        $scope.calcData.idealusSvoris = idealusSvoris;
        $scope.calcData.idealusPMA = idealusPMA.toFixed(2);
    }
});