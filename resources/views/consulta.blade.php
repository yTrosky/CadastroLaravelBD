<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>

    @vite([
        'resources/css/app.css', 
            'resources/js/app.js',
            'node_modules/bootstrap/dist/css/bootstrap.min.css',
            'node_modules/bootstrap/dist/js/bootstrap.bundle.js'
        ])
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col">
                <nav class="navbar bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            

                        </a>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                            <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">SISTEMA WEB</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="/">Cadastrar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="consulta">Consultar</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        
        <h4 class="table-title"> Consultar - Agendados </h4>
        
        <div class="table-responsive-md">
            <table class="table table-borderless">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Origem</th>
                    <th scope="col">Contato</th>
                    <th scope="col">Observação</th>
                    <th scope="col">Ação</th>
                </tr>

                </thead>
                <tbody>
                    @foreach($agendamentos as $tableagenda)
                    <tr>  
                        <td>{{ $tableagenda->nome }}</td>
                        <td>{{ $tableagenda->telefone }}</td>
                        <td>{{ $tableagenda->origem }}</td>
                        <td>{{ $tableagenda->data_contato }}</td>
                        <td>{{ $tableagenda->observacao }}</td>
                        <td>
                        <div class="btn-group">
                            <form action="{{ route('agendamentos.destroy', $tableagenda->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-primary">Excluir</button>
                            </form>
                            <form action="{{ route('agendamentos.edit', $tableagenda->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary">Editar</button>
                            </form>
                        </div>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
            </table>
            </div>
            </div>
        </div>
    </div>
</body>
</html>