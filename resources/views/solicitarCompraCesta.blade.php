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
                <li><a  class="active" href="#" title="Gestao"><i class="icon"><img class="icone" src="../../../assets/user.svg"></i></a></li>
                <li><a href="./Sobre.html" title="Sobre o projeto"> <i class="icon" ><img class="icone" src="../../../assets/out.svg"></i></a></li>

            </ul>
        </section>
        <div class="container">
            <div class="title">
                <h2>Systems - Solicitacao de Compra</h2>
                <a><img src="{{ asset('assets/car.png') }}" ></a>
            </div>
            <div class="main">
                <form method="POST" action="{{ route('compras.store') }}">
                    @csrf
                    <div class="titleForm">
                        <span>Adicionar Compra</span>
                    </div>

                    <input type="hidden" name="_id" value="{{ old('compra') }}">
                    <input type="text" name="descricao" value="{{ old('descricao_compra') }}" placeholder="Descrição">
                    <input type="text" name="quantidade" value="{{ old('quantidade') }}" placeholder="Quantidade">
                    <input type="text" name="valor_unitario" value="{{ old('valor_unitario') }}" placeholder="Valor unitario">
                    <input type="text" name="valueMany" value="{{ old('valot_total') }}" placeholder="Valor total">


                    <!-- <select name="provider">
                        <option value="null">Fornecedor</option>

                    {{-- @foreach($empresa as $item)
                    <option value="1" ng-value="item">Nome do produto</option>
                    @endforeach
                    </select> --}} -->
                    <button id="open-modal" type="button" class="btn btn-primary">Enviar</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>

                    <!-- Modal  -->
                    <div class="teste">
                    <div id="fade" class="hide"></div>
                    <div id="modal" class="hide">
                        <div class="modal-header">
                            <h2>Sua compra foi adicionada</h2>
                            <button id="close-modal">Fechar</button>
                        </div>
                        <div class="modal-body">
                            <button type="button" class="first btn btn-primary">Finalizar</button>
                            <button type="button" class="first btn btn-secondary" onclick="alert('Mais compras');">Adicionar Item</button>
                        </div>
                    </div>
                    </div>
                </form>

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

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<!-- </div> -->
