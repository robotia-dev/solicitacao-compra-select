@extends('layouts.main')

@section('content')
<div class="column-flex mat-elevation-z8">
   
  {{-- @vite(['resources/jsordem/app.js']) --}}

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


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
                        <span>Solicitar Compra</span>
                    </div>

                    <input type="hidden" name="_id" value="{{ old('compra') }}">

                    <input type="date" name="date" value="{{ old('date') }}" placeholder="Data da compra">
                    <input type="text" name="descricao_compra" placeholder="Descrição">

    <!--
                    <input type="text" name="product" value="{{ old('product') }}" placeholder="Produto">
                    <input type="text" name="quant" value="{{ old('quant') }}" placeholder="Quantia">
                    <input type="text" name="valueOne" value="{{ old('valueOne') }}" placeholder="Valor unitario">
                    <input type="text" name="valueMany" value="{{ old('valueMany') }}" placeholder="Valor total"> -->

                    <select name="empresa">
                        <option value="null">Selecione Empresa</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>

                    <select name="revenda">
                        <option value="null">Selecione Revenda</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>

                    <select name="modalidade">
                        <option value="null">Selecione</option>
                        <option value="null"></option>
                        <option value="null"></option>
                        <option value="null">Modalidade</option>
                    </select>
                    <select name="formPag">
                        <option value="null">Forma de pagamento</option>
                        <option value="A prazo">A prazo</option>
                        <option value="A vista">A vista</option>
                    </select>
                    <select name="authorizer">
                        <option value="null">Autorizador</option>
                    </select>

                    <select class="js-data-example-ajax" id='#select_id'></select>
                    <script>
                        var apiUrl='http://10.15.32.11:8000/cliente/00/empty'
               $.getJSON(apiUrl, function(data) {
    $.each(data, function(index, item) {
        $('#select_id').append($('<option>', {
            value: item.value,
            text: item.text
        }));
    });
});
                        </script>

                    {{-- @foreach($empresa as $item)
                    <option value="1" ng-value="item">Nome do produto</option>
                    @endforeach
                    </select> --}}

                    <input type="text" name="requester" placeholder="Solicitante">
                    <button type="submit" class="btn btn-primary" [disabled]="form.invalid">Proximo</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
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

