<p> <b>Olá Equipe SOBRARE, </b></p>

<p> Uma nova mensagem foi recebida pelo formulário de contato do site.</p>
<br>
<p><b> Remetente:</b> {{ $data['fromName'] }} </p>
<p><b> E-mail:</b> {{ $data['fromEmail'] }} </p>
<p><b> Telefone:</b> {{ $data['phone'] }} </p>
<p><b> Assunto:</b> {{ $data['subject'] }} </p>
<p><b> Mensagem:</b> <br>
    {{ $data['message'] }} </p>