<h1>Página de Suportes</h1>

<a href="{{ route('supports.create') }}">Adicionar novo suporte</a>


<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th></th>
    </thead>
    <tbody>
        @foreach($supports as $support)
        <tr>
            <td> {{ $support->subject }} </td>
            <td> {{ $support->status }} </td>
            <td> {{ $support->body }} </td>
            <td>
                <a href="{{ route('supports.show', $support->id) }}"> Verificar Cadastro </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>