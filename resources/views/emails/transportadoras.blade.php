<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Transportadoras</title>
</head>
<body>
    <h1>Lista de Transportadoras</h1>
    <ul>
        @foreach ($transportadoras as $transportadora)
            <li>{{ $transportadora->nome }}</li>
            <li>{{ $transportadora->endereco }}</li>
            <li>{{ $transportadora->cep }}</li>
            <li>{{ $transportadora->bairro }}</li>
            <li>{{ $transportadora->cidade }}</li>
            <li>{{ $transportadora->uf }}</li>
            <li>{{ $transportadora->limite_credito }}</li>
            <li>{{ $transportadora->data_analise_credito }}</li>
        @endforeach
    </ul>
</body>
</html>