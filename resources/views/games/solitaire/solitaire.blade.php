@extends('layouts.app')
@section('content')
    <div class="felt" style="background:url(felt.jpg);">
        <canvas id="game" style=""></canvas>
    </div>
    <div id="login" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <h3>Login</h3>
            <span class="close">&times;</span>

{{--            <form id="loginForm">--}}
{{--                <div id="nameRow" class="row" style="display:none;">--}}
{{--                    <div class="col-25"><label for="nname">Name</label></div>--}}
{{--                    <div class="col-75"><input id="nname" name="name" type="text" ></div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-25"><label for="ename">Email</label></div>--}}
{{--                    <div class="col-75"><input id="ename" name="email" type="email" ></div>--}}
{{--                </div>--}}
{{--                <div id="passwordRow" class="row">--}}
{{--                    <div class="col-25"><label for="pname">Password</label></div>--}}
{{--                    <div class="col-75"><input id="pname" name="pwd" type="password" ></div>--}}
{{--                </div>--}}
{{--                <div id="loginRow" class="row">--}}
{{--                    Not a member? register <a href="#none" onclick="game.showRegister()">here</a><br>--}}
{{--                    <button onclick="game.login()">Login</button>--}}
{{--                </div>--}}
{{--                <div id="registerRow" class="row" style="display:none;">--}}
{{--                    Already a member? login <a href="#none" onclick="game.showLogin()">here</a>--}}
{{--                    <button onclick="game.register()">Register</button>--}}
{{--                </div>--}}
{{--            </form>--}}


        </div>
    </div>
@endsection
