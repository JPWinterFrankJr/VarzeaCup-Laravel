<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Varzeacup Cadastros</title>

    <style>
        .formulario h1 {
            color: black;
            font-size: 70px;
        }

        .formulario {
            text-align: center;
            margin-top: 230px;
        }

        .formulario label {
            font-size: 40px;
        }

        .formulario input {
            background: white;
            text-align: center;
            color: rgb(255, 255, 255);
            border-radius: 5px;
            height: 30px;
            width: 300px;
            color: black;

        }

        #entrar {
            background: rgb(2, 162, 255);
            border-radius: 5px;
            height: 35px;
            width: 120px;

        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        @media screen and (max-width: 600px) {
            .formulario {
                margin-top: 0;
            }
        }
    </style>
</head>

<body>

@include('navbar')

    <div class="container">

        <form action="{{route('Entrar')}}" method="post" class="formulario">
          @csrf  
          <h1>Logar</h1>
            <div>
                <label for="">E-mail</label><br>
                <input type="email" name="email" id="email" placeholder="digite seu e-mail" require_once>
                <br><br>

                <label for="">Senha</label><br>
                <input type="password" name="password" id="password" placeholder="Digite sua senha" require_once>
                <br><br>

                <input type="submit" id="entrar" value="Entrar">
            </div>
        </form>

    </div>
 



</body>

</html>