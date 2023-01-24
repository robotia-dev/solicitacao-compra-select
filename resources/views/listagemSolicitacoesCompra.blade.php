@extends('layouts.main')

@section('content')
<!-- <div class="container"> -->
    <div class="column-flex mat-elevation-z8">
        <section class="top-nav">
            <div class="logoDiv">
                <a><img class="logo" src="../assets/marcos.png" alt="gestao" ></a>
            </div>
            <input id="menu-toggle" type="checkbox" />
            <label class='menu-button-container' for="menu-toggle">
                <div class='menu-button'></div>
             </label>
            <ul class="menu">
                <li><a  href="#" title="Marcos Diesel"> <i class="icon"><img class="icone" src="../../../assets/home.svg"></i></a></li>
                <li><a  class="nav-item active" href="#" title="Gestao"><i class="icon"><img class="icone" src="../../../assets/user.svg"></i></a></li>
                <li><a href="./Sobre.html" title="Sobre o projeto"> <i class="icon" ><img class="icone" src="../../../assets/out.svg"></i></a></li>

            </ul>
        </section>
        <div class="container">
            <div class="title">
                <h2>Systems - Solicitacao de Compra</h2>
                <a><img src="{{ asset('assets/car.png') }}" ></a>
            </div>

            <div class="tableDiv">
                <table class="table table" id="tableEquipment">
                    <thead>
                    <tr>
                        <th>ID </th>
                        <th>DATA</th>
                        <th>MODALIDADE</th>
                        <th>FORMA DE PAGAMENTO</th>
                        <th>EMPRESA</th>
                        <th>AUTORIZADORL</th>
                        <th>SOLICITANTE</th>
                        <th> <a href="{{ route('compras.store') }}" type="button" class="add btn btn-info">Adicionar</a>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($dado as $item)
                        <tr>
                        <td> {{ $item->compra}} </td>
                        <td> {{ $item->dta_solicitacao }} </td>
                        <td> {{ $item->modality}} </td>
                        <td> {{ $item->forma_pagamento}} </td>
                        <td> {{ $item->empresa}} </td>
                        <td> {{ $item->autorizador}} </td>
                        <td> {{ $item->solicitante}} </td>

                        <td class="fit">
                            <!-- <form action="{{route('compras.list', $item->_id)}}" method="POST">
                            @csrf
                            @method('DELETE') -->
                            <a ><i class="del fas fa-trash-alt"></i></a>
                            </form>
                            <a  href="{{ route('compras.store') }}"><i  class="confirm fas fa-check-circle"></i></a>
                            <a href="{{ route('compras.list') }}"><i  class="print fas fa-print"></i></a>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9">Total de registros: {{ count($dado) }} </td>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
        <footer class="bg-dark text-center text-white">
  <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
            <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-facebook-f"></i
                ></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-twitter"></i
                ></a>

                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-google"></i
                ></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-instagram"></i
                ></a>

                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-linkedin-in"></i
                ></a>

            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">CH</a>
        </div>
  <!-- Copyright -->
</footer>

    </div>
<!-- </div> -->
