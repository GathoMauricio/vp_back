<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }} | System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <section class="login">
        <div class="login_box">
            <div class="right">
                <div class="right-text">
                    <center>
                        <img src="{{ asset('img/brand.png') }}" alt="Brand" style="width:180px;height:140px;">
                    </center>
                    <h3 class="text-center" style="color:white;">VICTORIA PROJECT</h3>
                    <h5 class="text-center" style="color:white;">Que tus negocios no se detengan</h5>
                    <center>
                        <table width="200">
                            <tr>
                                <td class="text-center">
                                    <img src="{{ asset('img/consultoria.png') }}" alt="consultoria" width="50"
                                        height="50">
                                    <br>
                                    <span style="color:white;font-weight:bold;font-size:10px;">CONSULTORÍA Y<br>SOPORTE
                                        TI</span>
                                </td>
                                <td class="text-center">
                                    <img src="{{ asset('img/camaras.png') }}" alt="camaras" width="50"
                                        height="50">
                                    <br>
                                    <span style="color:white;font-weight:bold;font-size:10px;">CÁMARAS
                                        DE<br>SEGURIDAD</span>
                                </td>
                                <td class="text-center">
                                    <img src="{{ asset('img/proyectos.png') }}" alt="proyectos" width="50"
                                        height="50">
                                    <br>
                                    <span style="color:white;font-weight:bold;font-size:10px;">PROYECTOS
                                        E<br>INGENIERÍA</span>
                                </td>
                            </tr>
                        </table>
                    </center>
                </div>
                <div class="right-inductor"><img
                        src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft"
                        alt=""></div>
            </div>
            <div class="left">
                <div class="contact">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h3>ACCESO AL SISTEMA</h3>
                        <input type="email" placeholder="Email" name="email">
                        @error('email')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                        <input type="password" placeholder="Contraseña" name="password">
                        @error('password')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror

                        <button class="submit">Iniciar Sesión</button>
                        <center><br><a href="#">No recuerdo mi contraseña</a></center>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <style>
        img {
            width: 100%;
        }

        .login {
            height: 100%;
            width: 100%;
            background: radial-gradient(#60b22f, #60b22f);
            position: relative;
        }

        .login_box {
            width: 90%;
            height: 90%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            border-radius: 10px;
            box-shadow: 1px 4px 22px -8px #0004;
            display: flex;
            overflow: hidden;
        }

        .login_box .left {
            width: 41%;
            height: 100%;
            padding: 25px 25px;

        }

        .login_box .right {
            width: 59%;
            height: 100%
        }

        .left .top_link a {
            color: #FFFFFF;
            font-weight: 400;
        }

        .left .top_link {
            height: 20px
        }

        .left .contact {
            display: flex;
            align-items: center;
            justify-content: center;
            align-self: center;
            height: 100%;
            width: 73%;
            margin: auto;
        }

        .left h3 {
            text-align: center;
            margin-bottom: 40px;
        }

        .left input {
            border: none;
            width: 80%;
            margin: 15px 0px;
            border-bottom: 1px solid #ef770e;
            padding: 7px 9px;
            width: 100%;
            overflow: hidden;
            background: transparent;
            font-weight: 600;
            font-size: 14px;
        }

        .left {
            background: linear-gradient(-45deg, #dcd7e0, #fff);
        }

        .submit {
            border: none;
            padding: 15px 70px;
            border-radius: 8px;
            display: block;
            margin: auto;
            margin-top: 50px;
            background: #ef770e;
            color: #fff;
            font-weight: bold;
            -webkit-box-shadow: 0px 9px 15px -11px rgb(35, 197, 62);
            -moz-box-shadow: 0px 9px 15px -11px rgb(35, 197, 62);
            box-shadow: 0px 9px 15px -11px rgb(35, 197, 62);
        }



        .right {
            background: linear-gradient(212.38deg, rgba(0, 0, 0, 0.7) 0%, rgba(47, 67, 178, 0.71) 100%), url(https://static.seattletimes.com/wp-content/uploads/2019/01/web-typing-ergonomics-1020x680.jpg);
            color: #fff;
            position: relative;
        }

        .right .right-text {
            height: 100%;
            position: relative;
            transform: translate(0%, 20%);
        }

        .right-text h2 {
            display: block;
            width: 100%;
            text-align: center;
            font-size: 50px;
            font-weight: 500;
        }

        .right-text h5 {
            display: block;
            width: 100%;
            text-align: center;
            font-size: 19px;
            font-weight: 400;
        }

        .right .right-inductor {
            position: absolute;
            width: 70px;
            height: 7px;
            background: #fff0;
            left: 50%;
            bottom: 70px;
            transform: translate(-50%, 0%);
        }

        .top_link img {
            width: 28px;
            padding-right: 7px;
            margin-top: -3px;
        }
    </style>
</body>

</html>
