<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Varzeacup</title>
    <style>
        .container {
            text-align: center;
            font-size: 30px;
            margin-top: 250px;
        }

        .container a {
            display: inline-block;
            position: block;
            width: 350px;
            height: 50px;
            margin: 5px;
            background-color: #333;
            text-decoration: none;
            color: white;
        }

        .container a:hover {
            color: #333;
            background: #ddd;
        }

        /* Responsividade */
        @media screen and (max-width: 600px) {
            .container {
                margin-top: 50px;
            }
        }

        .container {
            text-align: center;
            margin-top: 350px;
        }

        .formulario label {
            font-size: 50px;
        }

        .formulario input {
            height: 35px;
            width: 500px;
            background: white;
            border-radius: 5px;
            text-align: center;
            color: black;
        }

        #submit {
            width: 150px;
            background: rgb(2, 162, 255);
        }

        @media(max-width:575.98px) {

            .container {
                margin-left: 20px;
                margin-top: 270px;
            }

            .formulario label {
                font-size: 30px;
            }

            .formulario input {
                height: 30px;
                width: 300px;
                background: white;
                border-radius: 5px;
                text-align: center;
                color: black;
            }

            #submit {
                width: 100px;
                background: rgb(2, 162, 255);
            }
        }
    </style>
</head>

<body>

@include('navbar')
    <div class="container">
        <form action="{{route('CadastroTime.cadastrar')}}" method="POST" class="formulario">
        @csrf
            <label>Cadastrar o time</label><br>
            <input type="text" name="name" id="name" placeholder="Digite o nome do time">
            <br><br>
            <input type="submit" name="submit" id="submit" value="Cadastrar">

        </form>
    </div>
</body>

</html>