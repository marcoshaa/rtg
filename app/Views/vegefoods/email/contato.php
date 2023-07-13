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

        @font-face {
        font-family: PlayfairDisplay;
        src: url(/nesttravel/public/assets/vegefoods/fonts/PlayfairDisplay/PlayfairDisplaySC-Black.ttf);
        }  

        @font-face {
        font-family: Ubuntu_light;
        src: url(/nesttravel/public/assets/vegefoods/fonts/Ubuntu_Light/Ubuntu-Light.ttf);
        }  

        @font-face {
        font-family: Ubuntu;
        src: url(/nesttravel/public/assets/vegefoods/fonts/Ubuntu_Light/Ubuntu-BoldItalic.ttf);
        }  

		body {
			font-size: 12px;
			font-family: Ubuntu_Light, Arial, Helvetica;
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
		#header h2{
			font-size: 26px;
			font-family: Ubuntu_Light, Arial, Helvetica;
			text-align: center;
		}
        #wrapper {
			width: 800px;
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
		
        <table align="center" border="0" cellpadding="0" cellspacing="0" style="width: 800px; heigth: 400px;color:#202020;border-bottom:0;line-height:100%;vertical-align:middle;border-radius:10px;">
            <tbody>
                <tr>
                    <td style="text-align: center;"><img src="{logo}" /></td>
                <tr>    
                <tr style="background-color: #003c5c; border:1px solid; border-radius: 10px;">
                    <td align="center" style="text-align: center; padding: 36px; color: #ffffff"><h1>Fale Conosco Nest Travel</h1></td>
                </tr>
                <tr>
                    <td style="padding:48px 48px 32px">
                        <div style="color:#737373;font-size:14px;line-height:150%;text-align:left;">
                            <p>
                                <h2>Uma nova mensagem foi enviada pelo formulário de contato do <b>Nest Travel.</b></h2> 
                            </p>
                            <p>
                                <table>
                                    <tr>
                                        <td><strong>Nome: </strong></td>
                                        <td>{name}</td>
                                    </tr>    
                                    <tr>
                                        <td><strong>E-mail: </strong></td>
                                        <td>{email}</td>
                                    </tr>    
                                    <tr>
                                        <td><strong>Telefone: </strong></td>
                                        <td>{phone}</td>
                                    </tr>   
                                    <tr>
                                        <td><strong>CPF/CNPJ: </strong></td>
                                        <td>{code}</td>
                                    </tr>   
                                    <tr>
                                        <td><strong>Mensagem: </strong></td>
                                        <td>{message}</td>
                                    </tr>   
                                </table>
                            </p>
                        </div>    
                    </td>
                </tr>
            </tbody>    
        </table>

	</div>
</body>
</html>