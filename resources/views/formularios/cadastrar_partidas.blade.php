<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Varzeacup</title>
    <link rel="stylesheet" href="../css/partidas.css">
</head>

<body>
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
            color: black;
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

        .formulario {
            text-align: center;
            margin-top: 40px;
            color: black;
        }

        .formulario select {
            color: black;
        }

        .formulario h1 {
            font-size: 50px;
            color: black;
        }

        .formulario label {
            font-size: 30px;
            color: black;
        }

        .formulario input {
            height: 40px;
            width: 100px;
            background: rgb(255, 255, 255);
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

        #cadastrar:hover {
            background: rgb(221, 134, 134);
            border-radius: 5px;
            height: 35px;
            width: 120px;
        }

        #time1 {
            height: 30px;
            width: 120px;
        }

        #time2 {
            height: 30px;
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

                margin-top: 50px;
            }

            .formulario input {
                height: 25px;
                width: 80px;
                background: white;
                border-radius: 5px;
                text-align: center;
                color: black;
            }
        }
    </style>

@include('navbar')

    <form action="{{route('CadastroPartida.cadastrar')}}" method="POST" class="formulario">
      @csrf
        <h1>Cadastrar partidas</h1>
        <label>Data das partidas</label><br>
        <label>Partida 1</label><br>
        <input type="date" name="data_partida1" id="date1" placeholder="Partida 1" required>
        <br><br>
        <label>Partida 2</label><br>
        <input type="date" name="data_partida2" id="date2" placeholder="Partida 2" required>
        <br><br>

        <!-- Selecionar times já cadastrados -->

        <label for="time1">Selecione o primeiro time:</label>
        <select name="time1_id" id="time1_id">
            <?php

            use App\Models\Times;

            $results = Times::all();
            foreach ($results as $result ) {
                echo '<option value="' . $result['id'] . '">' . $result['name'] . '</option>';
            }
            ?>
        </select>

        <br><br>
        <label for="time2">Selecione o segundo time:</label>
        <select name="time2_id" id="time2_id">
            <?php
            foreach ($results as $result) {
                echo '<option value="' . $result['id'] . '">' . $result['name'] . '</option>';
            }
            ?>
        </select>
        <br><br>

        <!-- puxar automaticamente os times e colocá-los um do lado do outro e só escrever o resultado
             ex: Time A _ x _ Time B -->
        <label>Resultado da primeira partida</label><br>

        <span id="selectedTime1"></span> <input type="number" name="time1_gols1" placeholder="gols time 1"> x <input type="number" name="time2_gols1" placeholder="gols time 2"> <span id="selectedTime2"></span>

        <br><br>

        <label>Resultado da segunda partida</label><br>

        <span id="selectedTime1"></span> <input type="number" name="time1_gols2" placeholder="gols time 1"> x <input type="number" name="time2_gols2" placeholder="gols time 2"> <span id="selectedTime2"></span>

        <br><br>

        <input type="submit" name="submit" id="cadastrar" value="Cadastrar">

    </form>

    <script>
        const selectTime1 = document.getElementById('time1_id');
        const selectTime2 = document.getElementById('time2_id');

        //não permite selecionar o mesmo time
        selectTime1.addEventListener('change', () => {
            // Limpa a seleção do segundo select
            selectTime2.value = '';

            // Desabilita as opções que correspondem à seleção do primeiro select
            const selectedTime1Value = selectTime1.value;
            for (const option of selectTime2.options) {
                if (option.value === selectedTime1Value) {
                    option.disabled = true;
                } else {
                    option.disabled = false;
                }
            }
        });


        // Puxa os times selecionados para o resultado
        selectTime1.addEventListener('change', (event) => {
            const selectedValue = event.target.value;
            const selectedText = event.target.options[event.target.selectedIndex].text;
            selectedTime1Element.textContent = `${selectedText}`;
        });
        const selectedTime1Element = document.getElementById('selectedTime1');



        selectTime2.addEventListener('change', (event) => {
            const selectedValue = event.target.value;
            const selectedText = event.target.options[event.target.selectedIndex].text;
            selectedTime2Element.textContent = `${selectedText}`;
        });
        const selectedTime2Element = document.getElementById('selectedTime2');
    </script>
</body>

</html>