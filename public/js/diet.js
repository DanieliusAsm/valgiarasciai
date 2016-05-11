/**
 * Created by Danielius on 05-May-16.
 */
//$('document').ready(function(){
     //var index = 1;
    /*$('button.add-row').click(function(){
        //sets the html content of every matched element
        $("#row"+index).html('<td></td> <td> <input class="form-control" type="text" ng-model="selected" uib-typeahead="product as product.pavadinimas for product in products | filter:$viewValue | limitTo:10"> </td> ' +
            '<td> <input class="form-control" ng-model="quantity" id="quantity" type="number" name="quantity[]" placeholder="100"/> </td> ' +
            '<td><input class="form-control" id="disabledInput" name="baltymai" placeholder="0" ng-value="calculateValue(quantity,selected.baltymai)"disabled/></td> ' +
            '<td><input class="form-control" id="disabledInput" type="number" name="riebalai" placeholder="0" ng-value="calculateValue(quantity,selected.riebalai)"disabled/></td> ' +
            '<td><input class="form-control" id="disabledInput" type="number" name="angliavandeniai" placeholder="0" ng-value="calculateValue(quantity,selected.angliavandeniai)"disabled/></td> ' +
            '<td><input class="form-control" id="disabledInput" type="number" name="eVerte" placeholder="0" ng-value="calculateValue(quantity,selected.eVerte)"disabled/></td> ' +
            '<td><input class="form-control" id="disabledInput" type="number" name="cholesterolis" placeholder="0" ng-value="calculateValue(quantity,selected.cholesterolis)"disabled/></td>');

        index++;
        //insert content to the end of evey matched element
        if(!$("#row"+index).length){
            $("#diet-table").append("<tr id='row"+index+"'></tr>");
        }
    });

    $('button.delete-row').click(function(){
        if(index>1){
            index--;
            $("#row"+index).html("");
        }
    });

    $('#quantity').on('input', function(){
        var tr = $(this).closest('tr');
        var selectedName = tr.find('input').val();

        //jQuery getJSON (url) - how to generate full url ?
        var option = tr.find('datalist').find('option[value="' +selectedName + '"]');
        if(option.length){
            var products = angular.element("#DietController").scope().products;
            console.log("hi"+products[0].id);
        }

        //alert($("#product option:selected").val());
        //alert($("#product").index());
    })*/
//});