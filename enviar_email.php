<?php
	
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$mensagem = $_POST['mensagem'];

	$arquivo = "
  <style type='text/css'>
  body {
  margin:0px;
  font-family:Verdane;
  font-size:12px;
  color: #666666;
  }
  a{
  color: #666666;
  text-decoration: none;
  }
  a:hover {
  color: #FF0000;
  text-decoration: none;
  }
  </style>
    <html>
        <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
            <tr>
              <td>
  				<tr>
                 <td width='500'>Nome:$nome</td>
                </tr>
                <tr>
                  <td width='320'>E-mail:<b>$email</b></td>
				</tr>
   
                <tr>
                  <td width='320'>Mensagem:$mensagem</td>
                </tr>
            </td>
          </tr>   
        </table>
    </html>
  ";

	// emails para quem será enviado o formulário
	$emailenviar = "alvesfernandosantos1@gmail.com";
	$destino = $emailenviar;
	$assunto = "Contato pelo Site";
   
	// É necessário indicar que o formato do e-mail é html
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: $nome <$email>';
	//$headers .= "Bcc: $EmailPadrao\r\n";
	 
	$enviaremail = mail($destino, $assunto, $arquivo, $headers);
	if($enviaremail){
	$mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
	echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
	} else {
	$mgm = "ERRO AO ENVIAR E-MAIL!";
	echo "";
	}
  ?>
 



