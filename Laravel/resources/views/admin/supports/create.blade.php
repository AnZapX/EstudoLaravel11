<h1>Adiciona novo suporte!</h1>

<form action="{{ route('supports.store') }}" method="POST">
    <input type="hidden" value="{{ csrf_token() }}", name="_token">
    <input type="text" name="subject" placeholder="Assunto">
    <textarea name="body" cols="30" rows="5" placeholder="Descrição"></textarea>
    <button type="submit">Enviar</button>
</form>