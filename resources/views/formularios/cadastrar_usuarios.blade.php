<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Varzeacup</title>
  <style>
    .formulario {
      text-align: center;
      margin-top: 180px;

    }

    .formulario h1 {
      font-size: 50px;
      color: black;
    }

    .formulario label {
      font-size: 35px;
      color: black;
    }

    .formulario input {
      height: 30px;
      width: 300px;
      background: white;
      border-radius: 5px;
      text-align: center;
      color: black;
    }

    #cadastrar {
      background: rgb(2, 162, 255);
      border-radius: 5px;
      height: 35px;
      width: 120px;
    }

    @media(max-width:575.98px) {
      .formulario label {
        font-size: 25px;
      }

      .formulario h1 {
        font-size: 30px;
      }

      .formulario {

        margin-top: 170px;
      }

      .formulario input {
        height: 25px;
        width: 250px;
        background: rgb(0, 0, 0);
        border-radius: 5px;
        text-align: center;
        color: rgb(0, 0, 0);
      }
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
 </style>


</head>

<body>

@include('navbar')

  <div class="container">
    <form action="{{route('CadastroUsuario.cadastrar')}}" method="post" class="formulario">
        @csrf
      <h1>Cadastrar Usuário</h1>
      <label>Nome</label><br>
      <input type="text" name="name" id="name" placeholder="Digite o seu nome">
      <br><br>
      <label>E-mail</label><br>
      <input type="email" name="email" id="email" placeholder="Digite o seu melhor e-mail">
      <br><br>
      <label>Senha</label><br>
      <input type="password" name="password" id="password" placeholder="Digite sua senha">
      <br><br>
      <input type="submit" name="submit" id="cadastrar" value="Cadastrar">
    </form>
  </div>
</body>

</html>