@extends('parent',['meta_title'=>'Apie projektą'])

@section('content')
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="{{url("public/img/user.png")}}" alt="Users">
            </div>
            <div class="item">
                <img src="{{url("public/img/products.png")}}" alt="Products">
            </div>
            <div class="item">
                <img src="{{url("public/img/calc.png")}}" alt="Calculator">
            </div>
        </div>

        <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <h2>Apie Projektą</h2>
    <p>ullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.

        Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla.

        Maecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
    <h2>Komanda</h2>
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>Vardas Pavardė</th>
                <th>Pareigos</th>
                <th>Kontaktai</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>Artūras Ochonko</td>
            <td>Programuotojas</td>
            <td></td>
        </tr>
        <tr>
            <td>Danielius Ašmontas</td>
            <td>Programuotojas</td>
            <td>dan.asmontas@gmail.com <a href="http://www.visiogen.io">visiogen.io</a></td>
        </tr>
        <tr>
            <td>Edita Čėsnienė</td>
            <td>Dietologė</td>
            <td>editukass31@gmail.com</td>
        </tr>
        <tr>
            <td>Julius Jankus</td>
            <td>Programuotojas</td>
            <td></td>
        </tr>
        <tr>
            <td>Laimonas Komža</td>
            <td>Programuotojas</td>
            <td></td>
        </tr>
        <tr>
            <td>Marius Kolozinskas</td>
            <td>Programuotojas</td>
            <td></td>
        </tr>
        <tr>
            <td>Valentas Malakauskas </td>
            <td>Programuotojas</td>
            <td></td>
        </tr>
        <tr>
            <td>Vilius Viršilas</td>
            <td>Programuotojas</td>
            <td></td>
        </tr>
        </tbody>
    </table>
@stop