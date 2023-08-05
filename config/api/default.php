<?php

//////////////////
/// ENDPOINTS ////
/////////////////
/////contact
///send email

add_action('rest_api_init', function () {
	register_rest_route('contact/v1', '/sendmail', array(
		'methods' => 'POST',
		'callback' => 'jlh_sendmail',
	));
});


function jlh_sendmail($params)
{
	$dados = $params->get_params();
	$message = '<h1>Mensagem enviada via App - ' . $dados['nome'] . '</h1>';
	foreach ($dados as $key => $value) {
		$message .= '<li><b>' . ucfirst($key) . ':</b> ' . $value . '</li>';
	}
	$message .=
		'<p>____ <br>Este e-mail foi enviado de um formulário de contato no app</p>';
	$to = 'jeanlivino@gmail.com';
	$subject = 'Menasgem enviada via App - ' . $dados['nome'];
	if ($dados['assunto']) {
		$subject = 'Contato Via Site - ' . $dados['assunto'];
	}
	$headers = array('Content-Type: text/html; charset=UTF-8');
	$email = wp_mail($to, $subject, $message, $headers);
	return $email;
}
