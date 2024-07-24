<h1>Detalhes do Cadastro do id - {{ $support->id }} -</h1>

<ul>
    <li>Assunto: {{ $support->subject }}</li>
    <li>Descrição: {{ $support->body }}</li>
    <li>Status: {{ $support->status }}</li>
</ul>
<form action="{{ route('supports.destroy', $support->id) }}" method="post">
    @csrf()
    @method('DELETE')
    <button type="submit">Apagar</button>
</form>