<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nest | Travel</title>

    <style type="text/css"> 
		body {
			font-size: 12px;
			font-family: Tahoma, Arial, Helvetica;
			margin: 10px auto;
		}
		#header {
			text-align: center;
		}
		#header img{

		}
		.link{
			color:#0000ff;
		}
		#header h1{
			font-size: 26px;
			font-family: Tahoma, Arial, Helvetica;
			text-align: center;
		}
        #wrapper {
			width: 600px;
			margin: 10px;
        }
		#content {
			width: 100%;
			margin-top: 30px;
		}
		.clear {
			clear: both;
		}
		table {
			border-collapse: collapse;
		}
		table td, table th {
			border: 1px solid #E2E2E2;
			padding: 8px 4px;
		}
		table thead {
			background-color: #E2E2E2;
		}

    </style>
</head>

<body>

    <div style="background-color:#f5f5f5;margin:0;padding:70px 0;width:100%;">
		
        <table align="center" border="0" cellpadding="0" cellspacing="0" style="width: 600px; heigth: 400px;color:#202020;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;border-radius:10px;">
            <tbody>
                <tr>
                    <td style="text-align: center;"><img src="{logo}" /></td>
                <tr>    
                <tr style="background-color: #003c5c; border:1px solid; border-radius: 3px;">
                    <td align="center" style="text-align: center; padding: 36px; color: #ffffff"><h1>Solicitação de redefinição de senha</h1></td>
                </tr>
                <tr>
                    <td style="padding:48px 48px 32px">
                        <div style="color:#737373;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left;">
                            <p>
                                Olá <strong>{nome_destinatario}</strong>, 
                            </p>
                            <p>
                                Foi solicitado uma nova senha para a sua conta conosco na <b>Nest Travel.</b> 
                            </p>
                            <p>
                                Se você não fez essa solicitação, por favor ignore este e-mail. Caso gostaria de prosseguir e alterar a sua senha clique no link abaixo 
                            </p>
                            <p>
                                <a href="{link_formulario}">Clique aqui para redefinir a sua senha</a>
                            </p>
                        </div>    
                    </td>
                </tr>
            </tbody>    
        </table>

	</div>
</body>
</html>