<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Agenda</title>
</head>
<body>
    <div>
        <h1>CRUD Agenda</h1>
        <div>
            <ul>
                <li>
                    <a href="http://localhost:8000/api/schedule" target="_blank" >http://localhost:8000/api/schedule</a>
                    
                    <p>
                        Busca todos os agendamentos da base de dados
                    </p>
                </li>
                <li>
                    <a href="http://localhost:8000/api/schedule/1" target="_blank" >http://localhost:8000/api/schedule/{identificador}</a>
                    
                    <p>
                        Busca todos agenda pelo identificador. Nesse exemplo busca o id 1.
                    </p>
                </li>
                <li>
                    <a href=""  >http://localhost:8000/api/schedule</a>
                    
                    <p>
                        Se enviado via POST insere uma nova agenda para o usuário indicado.
                    </p>

                    <ul>
                        <li><b>owner</b>: {identificador}</li>
                        <li><b>title</b>: {titulo}</li>
                        <li><b>description</b>: {descrição}</li>
                        <li><b>date_start</b>: {data no formado Y-m-d}</li>
                        <li><b>date_end</b>: {data no formado Y-m-d}</li>
                    </ul>
                </li>
                <li>
                    <a href="">http://localhost:8000/api/schedule/{identificador}</a>
                    <p>
                        Se enviado via DELETE remove a agenda com o identificador informado.
                    </p>
                </li>
                <li>
                    <a href="">http://localhost:8000/api/schedule/search</a>

                    <p>
                        Se enviado via POST insere uma nova agenda para o usuário indicado.
                    </p>

                    <ul>
                        <li><b>owner</b>: {identificador}</li>
                        <li><b>date_start*</b>: {data no formado Y-m-d}</li>
                        <li><b>date_end*</b>: {data no formado Y-m-d}</li>
                    </ul>

                </li>
            </ul>
        </div>
    </div>
</body>
</html>