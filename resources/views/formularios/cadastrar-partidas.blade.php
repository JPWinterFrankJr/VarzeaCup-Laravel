@extends('navbar')
@stack('css')
<link rel="stylesheet" href="/css/telas/cadastrar-partidas.css">

@section('content')
    <form action="{{ route('cadastroPartida.cadastrar') }}" method="POST" class="formulario">
        @csrf
        <h1>Cadastrar partidas</h1>
        <label>Data das partidas</label><br>
        <label>Partida 1</label><br>
        <input type="text" name="data_partida1" id="date1" placeholder="Partida 1" required>
        <br><br>
        <label>Partida 2</label><br>
        <input type="text" name="data_partida2" id="date2" placeholder="Partida 2" required>
        <br><br>

        <!-- Selecionar times já cadastrados -->

        <label for="time1">Selecione o primeiro time:</label>
        <select name="time1_id" id="time1_id">

            @foreach ($results as $result)
                <option value="{{ $result['id'] }}">{{ $result['name'] }}</option>
            @endforeach
        </select>

        <br><br>
        <label for="time2">Selecione o segundo time:</label>
        <select name="time2_id" id="time2_id">

            @foreach ($results as $result)
                <option value="{{ $result['id'] }}">{{ $result['name'] }}</option>
            @endforeach

        </select>
        <br><br>

        <!-- puxar automaticamente os times e colocá-los um do lado do outro e só escrever o resultado
                 ex: Time A _ x _ Time B -->
        <label>Resultado da primeira partida</label><br>

        <span id="selectedTime1"></span> <input type="number" name="time1_gols1" placeholder="gols time 1"> x <input
            type="number" name="time2_gols1" placeholder="gols time 2"> <span id="selectedTime2"></span>

        <br><br>

        <label>Resultado da segunda partida</label><br>

        <span id="selectedTime3"></span> <input type="number" name="time1_gols2" placeholder="gols time 1"> x <input
            type="number" name="time2_gols2" placeholder="gols time 2"> <span id="selectedTime4"></span>

        <br><br>

        <input type="submit" name="submit" id="cadastrar" value="Cadastrar">

    </form>

    <script>
        $(function() {
            $( "#date1" ).datepicker({
                showOn: "button",
                buttonImage: "calendario.png",
                changeMonth: true,
                changeYear: true,
                buttonImageOnly: true,
                dateFormat: 'dd/mm/yy',
                dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
                dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
            });
        });
        $(function() {
            $( "#date2" ).datepicker({
                showOn: "button",
                buttonImage: "calendario.png",
                changeMonth: true,
                changeYear: true,
                buttonImageOnly: true,
                dateFormat: 'dd/mm/yyyy',
                dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
                dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
            });
        });
        //Pega o valor do input date e armazena numa variavel js 
        var data1 = document.getElementById('date1').value;
        var data2 = document.getElementById('date2').value;

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
            selectedTime3Element.textContent = `${selectedText}`;

        });
        const selectedTime1Element = document.getElementById('selectedTime1');
        const selectedTime3Element = document.getElementById('selectedTime3');



        selectTime2.addEventListener('change', (event) => {
            const selectedValue = event.target.value;
            const selectedText = event.target.options[event.target.selectedIndex].text;
            selectedTime2Element.textContent = `${selectedText}`;
            selectedTime4Element.textContent = `${selectedText}`;

        });
        const selectedTime2Element = document.getElementById('selectedTime2');
        const selectedTime4Element = document.getElementById('selectedTime4');
    </script>
@endsection
