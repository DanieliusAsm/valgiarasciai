diet.controller('DietController', function ($scope, $http, $window) { // $httpParamSerializerJQLike
    //TODO learn to form array
    $scope.eatingInfo = [{type: "Pusryčiai", time: "8:00", enabled: "true"}, {
        type: "Priešpiečiai",
        time: "11:00",
        enabled: "true"
    },
        {type: "Pietūs", time: "13:00", enabled: "true"}, {type: "Pavakariai", time: "16:00", enabled: "true"},
        {type: "Vakarienė", time: "18:00", enabled: "true"}, {type: "Naktipiečiai", time: "21:00", enabled: "true"}];
    $scope.diet = [];
    $scope.lastDays = 0;
    $scope.initialized = false;

    $scope.sendDiet = function (saveLink, redirect) {
        var data = [$scope.diet, $scope.eatingInfo];
        $http({
            method: 'POST',
            url: saveLink,
            data: data //$httpParamSerializerJQLike($scope.diet)
        }).then(function successCallback(response) {
            //success
        }, function errorCallback(response) {
            //error
        });
        $window.location = redirect;
    }

    $scope.getNumberToArray = function (n) {
        if (n != null && n > 0) {
            return new Array(n);
        } else {
            return new Array(0);
        }
    }

    $scope.updateDietArray = function () {
        if ($scope.days != null && $scope.days != $scope.lastDays) {
            var lengthOfDays = $scope.days - $scope.lastDays;
            // do we add days/initialize or remove ?
            if ($scope.lastDays == 0) {
                $scope.initializeDietArray();
            } else if ($scope.lastDays > 0) {
                //$scope.updateDietArray(lenghtOfDays);
            } else {
                $scope.diet = $scope.diet.slice(0, days);
            }
            $scope.lastDays = $scope.days;
            $scope.initialized = true;
        }
    }
    //will initialize or update the current array depending if its empty or not.
    $scope.initializeDietArray = function () {
        var baseDays = $scope.lastDays;
        $scope.diet.total_days = $scope.days;
        var enabledEatingsArray = $scope.getEatingsPerDay();
        $scope.diet.total_eating = enabledEatingsArray.length;
        $scope.diet.eatings = [];
        $scope.diet.day_stats = [];
        console.log(enabledEatingsArray);

        for (var i = 0; i < $scope.diet.total_days; i++) {
            var index = baseDays + i;
            for (var a = 0; a < $scope.diet.total_eating; a++) {
                var eatingsIndex = i * $scope.diet.total_eating + a;
                $scope.diet.eatings[eatingsIndex] = {};
                $scope.diet.eatings[eatingsIndex].day = i + 1;
                $scope.diet.eatings[eatingsIndex].eating_type = enabledEatingsArray[a].type;
                $scope.diet.eatings[eatingsIndex].eating_time = enabledEatingsArray[a].time;
                $scope.diet.eatings[eatingsIndex].protein = 0;
                $scope.diet.eatings[eatingsIndex].fat = 0;
                $scope.diet.eatings[eatingsIndex].carbs = 0;
                $scope.diet.eatings[eatingsIndex].cholesterol = 0;
                $scope.diet.eatings[eatingsIndex].energy_value = 0;
                $scope.diet.eatings[eatingsIndex].products = [];

                var array = [{
                    "product_name": "",
                    "pivot": {"quantity": 100,"protein":0,"fat":0,"carbs":0,"energy_value":0,"cholesterol":0,}
                }];
                $scope.diet.eatings[eatingsIndex].products.push(array[0]);
            }
        }
    }

    $scope.updateDieutArray = function (lenghtOfDays) {
        var baseDays = $scope.lastDays;
        $scope.diet.total_days = $scope.days;

        // i shouldnt be 0 then changing days will work
        for (var i = 0; i < length; i++) {
            var index = baseDays + i;

            $scope.diet[i] = {};
            $scope.diet[i].day = baseDays + i + 1;
            $scope.diet[i].eating_types = [{}, {}, {}, {}, {}, {}];
            $scope.diet[i].total_values = [{}, {}, {}, {}, {}, {}];

            for (var b = 0; b < 6; b++) {
                $scope.diet[i].eating_types[b].rows = [{"pavadinimas": ""}];
                $scope.diet[i].total_values[b] = {
                    "baltymai": 0,
                    "riebalai": 0,
                    "angliavandeniai": 0,
                    "cholesterolis": 0,
                    "eVerte": 0
                };
                //$scope.diet[i].eating_types[b].type = $scope.eatingInfo[b].type;
                //$scope.diet[i].eating_types[b].time = $scope.eatingInfo[b].time;
                //diet[0].eating_types[$index].type = eatingType; diet[0].eating_types[$index].time=eatingTimes[$index]
            }
        }
    }
    // later on you can remove all for example "pusryciai"


    //todo errors when undefined
    $scope.calculateRowValues = function (row) {
        if(row && row.pivot.quantity){
            var quantity = row.pivot.quantity;
            row.pivot.protein = quantity * Number(row.protein) / 100;
            row.pivot.protein = Number(row.pivot.protein.toFixed(2));
            row.pivot.fat = quantity * Number(row.fat) / 100;
            row.pivot.fat = Number(row.pivot.fat.toFixed(2));
            row.pivot.carbs = quantity * Number(row.carbs) / 100;
            row.pivot.carbs = Number(row.pivot.carbs.toFixed(2));
            row.pivot.energy_value = quantity * Number(row.energy_value) / 100;
            row.pivot.energy_value = Number(row.pivot.energy_value.toFixed(2));
            row.pivot.cholesterol = quantity * Number(row.cholesterol) / 100;
            row.pivot.cholesterol = Number(row.pivot.cholesterol.toFixed(2));
        }
    };
    //todo errors when undefined
    $scope.calculateEatingValues = function($eating) {
        if($eating){
            var length = $eating.products.length;
            var sumB = 0;
            var sumR = 0;
            var sumA = 0;
            var sumCh = 0;
            var sumE = 0;
            for (var i = 0; i < length; i++) {
                if($eating.products[i].pivot.protein){
                        sumB += $eating.products[i].pivot.protein;
                        sumA += $eating.products[i].pivot.carbs;
                        sumR += $eating.products[i].pivot.fat;
                        sumE += $eating.products[i].pivot.energy_value;
                        sumCh += $eating.products[i].pivot.cholesterol;
                }
            }
            $eating.protein = Number(sumB.toFixed(2));
            $eating.fat = Number(sumR.toFixed(2));
            $eating.carbs = Number(sumA.toFixed(2));
            $eating.cholesterol = Number(sumCh.toFixed(2));
            $eating.energy_value = Number(sumE.toFixed(2));
        }
    };

    //sums up stats for one eating and for
    // a whole day.
    $scope.calculateTotalValues = function ($dayIndex) {
        var eatings = $scope.getEatingsInDay($dayIndex);
        if(!eatings){
            return;
        }

        var sumB = 0;
        var sumR = 0;
        var sumA = 0;
        var sumCh = 0;
        var sumE = 0;
        //  loop to calculate this days eating sum and another for diet whole
        for(var i=0;i<eatings.length;i++){
            if(eatings[i].protein){
                sumB += eatings[i].protein;
                sumA += eatings[i].carbs;
                sumR += eatings[i].fat;
                sumE += eatings[i].energy_value;
                sumCh += eatings[i].cholesterol;
            }
        }
        var day_stats = $scope.diet.day_stats;
        day_stats[$dayIndex] = {};
        day_stats[$dayIndex].day = $dayIndex + 1;
        day_stats[$dayIndex].protein = Number(sumB.toFixed(2));
        day_stats[$dayIndex].fat = Number(sumR.toFixed(2));
        day_stats[$dayIndex].carbs = Number(sumA.toFixed(2));
        day_stats[$dayIndex].cholesterol = Number(sumCh.toFixed(2));
        day_stats[$dayIndex].energy_value = Number(sumE.toFixed(2));

        sumB = 0;
        sumR = 0;
        sumA = 0;
        sumCh = 0;
        sumE = 0;
        for(var i=0;i<day_stats.length;i++){
            if(day_stats[i].protein){
                sumB += day_stats[i].protein;
                sumA += day_stats[i].carbs;
                sumR += day_stats[i].fat;
                sumE += day_stats[i].energy_value;
                sumCh += day_stats[i].cholesterol;
            }
        }
        $scope.diet.protein = Number(sumB.toFixed(2));
        $scope.diet.fat = Number(sumR.toFixed(2));
        $scope.diet.carbs = Number(sumA.toFixed(2));
        $scope.diet.cholesterol = Number(sumCh.toFixed(2));
        $scope.diet.energy_value = Number(sumE.toFixed(2));
    }

    $scope.getEatingsPerDay = function () {
        var localEatingInfo = [];
        for (var b = 0; b < 6; b++) {
            if ($scope.eatingInfo[b].type == '') {
                $scope.eatingInfo[b].enabled = false;
            } else {
                localEatingInfo.push($scope.eatingInfo[b]);
            }
        }
        return localEatingInfo;
    }

    //slice first inclusive last not
    $scope.getEatingsInDay = function ($day) {
        $day += 1;
        var start = ($day - 1) * Number($scope.diet.total_eating);
        var end = $day * Number($scope.diet.total_eating);
        return $scope.diet.eatings.slice(start, end);
    };

    $scope.onProductSelected = function ($item, $dayIndex, $eatingIndex, $productIndex) {
        // calculate eatigs index
        var index = $scope.getDefaultEatingsIndex($dayIndex, $eatingIndex);
        var product = $scope.diet.eatings[index].products[$productIndex];
        if (product != undefined) {
            product.product_name = $item.product_name;
            product.protein = $item.protein;
            product.fat = $item.fat;
            product.carbs = $item.carbs;
            product.cholesterol = $item.cholesterol;
            product.energy_value = $item.energy_value;
        }
        // recalculate the stats for this food.
        // stats are calculated on the front end and not saved
        // dont forget to send in a day and its eating index
    };
    $scope.getDefaultEatingsIndex = function($dayIndex, $eatingIndex){
        if($scope.diet){
            return $dayIndex * Number($scope.diet.total_eating) + $eatingIndex;
        }
        return 0;
    }


    $scope.calculate = function () {
        var kmi = Number($scope.mass) / (Math.pow(Number($scope.height), 2) / 10000);
        kmi = kmi.toFixed(2);
        var salyga, pma, idealusSvoris, idealusPMA;

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

        idealusSvoris = Math.pow(Number($scope.height), 2) * 22 / 10000;
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