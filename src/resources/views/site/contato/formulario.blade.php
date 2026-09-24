<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$ok = 0;
// email != '';
if(isset($_POST['email'])){

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'vendor/phpmailer/Exception.php';
require 'vendor/phpmailer/PHPMailer.php';
require 'vendor/phpmailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    // Pegar informações do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $fone = $_POST["telefone"];
    $assunto = $_POST["assunto"];
    $mens = $_POST["mensagem"];

    // Banco de dados
    require_once('admin/ControleContato.php');

    $contato = new ClassContato();

    $contato->nomeContato = $nome;
    $contato->emailContato = $email;
    $contato->foneContato = $fone;
    $contato->assuntoContato = $assunto;
    $contato->mensContato = $mens;

    $contato->Inserir();
    
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->CharSet    = 'UTF-8';
    $mail->Host       = 'sandbox.smtp.mailtrap.io';              //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '3590217d3379e5';                       //SMTP username
    $mail->Password   = '99a74b2a9061ca';                       //SMTP password
    $mail->Port       = 2525;                                   //TCP port to connect to

    //Recipients
    $mail->setFrom('no-reply@vivabemspa.com.br', 'VivaBem Spa');  // Quem dispara o e-mail
    $mail->addAddress('gui.pignataro.cruz@gmail.com',);     //Add a recipient
    $mail->addReplyTo($email, $nome);
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Nova mensagem enviada pelo site VivaBem Spa';
    $mail->Body    = "
        Nome: $nome <br>
        E-Mail: $email <br>
        Telefone: $fone <br>
        Assunto: $assunto <br>
        Mensagem: $mens
    ";
    $mail->AltBody = "
        Nome: $nome \n
        E-Mail: $email \n
        Telefone: $fone \n
        Assunto: $assunto \n
        Mensagem: $mens
    ";

    $mail->send();
    $ok = 1;
} catch (Exception $e) {
    $ok = 2;
}

}
?>

<div class="contato-conteudo">
                    <section class="contato-formulario">
                        <h3>Envie uma Mensagem</h3>
                        <p>Conte um pouco sobre o que você procura e nossa equipe terá o prazer de indicar a melhor experiência para o seu momento, com carinho e atenção aos detalhes.</p>

                        <?php if ($ok === 1): ?>
                            <div class="mensagem-form mensagem-form-sucesso">
                                <strong>Mensagem enviada com sucesso!</strong>
                                <span>Recebemos seu contato e em breve nossa equipe falará com você.</span>
                            </div>
                        <?php elseif ($ok === 2): ?>
                            <div class="mensagem-form mensagem-form-erro">
                                <strong>Não foi possível enviar.</strong>
                                <span>Tente novamente em instantes ou fale conosco por outro canal.</span>
                            </div>
                        <?php endif; ?>

                        <form class="formulario-contato" action="#" method="post">
                            <div class="linha-formulario">
                                <input type="text" name="nome" placeholder="Seu nome*" required>
                                <input type="email" name="email" placeholder="Seu e-mail*" required>
                            </div>
                            <input type="tel" name="telefone" placeholder="Seu telefone*" inputmode="tel" autocomplete="tel" pattern="[0-9()+\-\s]*" data-telefone>
                            <input type="text" name="assunto" placeholder="Assunto">
                            <textarea name="mensagem" placeholder="Mensagem" rows="7" required></textarea>
                            <button type="submit">Enviar Mensagem</button>
                        </form>
                    </section>

                    <aside class="contato-detalhes">
                        <h3>Detalhes de Contato</h3>
                        <p>Estamos prontos para receber você com acolhimento, cuidado e atendimento personalizado.</p>

                        <div class="detalhe-contato">
                            <h4>Localização</h4>
                            <address>
                                Av Marechal Tito, 1500<br>
                                São Miguel Paulista, São Paulo - SP, 08115-100
                            </address>
                        </div>

                        <div class="detalhe-contato">
                            <h4>Fale Conosco</h4>
                            <p>Telefone: +55 11 99999-9999</p>
                            <p>E-mail: contato@vivabemspa.com.br</p>
                            <p>WhatsApp: +55 11 99999-9999</p>
                        </div>

                        <div class="detalhe-contato">
                            <h4>Horários</h4>
                            <p>Seg - Sex: 11:00 - 22:00</p>
                            <p>Sábado: 10:00 - 18:30</p>
                            <p>Domingo: 11:00 - 16:30</p>
                        </div>
                    </aside>
                </div>
            </section>
        </section>