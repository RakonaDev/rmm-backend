<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido - {{ $nombres }}</title>
  <style>
    /* Reset para email */
    body,
    table,
    td,
    th,
    p,
    div,
    span,
    a {
      margin: 0;
      padding: 0;
      border: 0;
      outline: 0;
      font-size: 100%;
      vertical-align: baseline;
      background: transparent;
    }

    body {
      font-family: Arial, sans-serif !important;
      background-color: #f4f4f4;
      color: #333333;
      line-height: 1.6;
      margin: 0;
      padding: 0;
      width: 100% !important;
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    table {
      border-collapse: collapse;
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

    img {
      border: 0;
      height: auto;
      line-height: 100%;
      outline: none;
      text-decoration: none;
      -ms-interpolation-mode: bicubic;
    }

    /* Contenedor principal */
    .email-wrapper {
      width: 100%;
      background-color: #f4f4f4;
      padding: 20px 0;
    }

    .email-container {
      max-width: 600px;
      background-color: #ffffff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    /* Header */
    .header {
      background: #2191BF;
      background-color: #2191BF;
      /* Fallback */
    }

    .logo {
      max-width: 200px;
      height: auto;
      display: block;
    }

    .logo-placeholder {
      width: 200px;
      height: 80px;
      background-color: rgba(255, 255, 255, 0.2);
      border: 2px dashed rgba(255, 255, 255, 0.5);
      color: white;
      font-size: 14px;
      border-radius: 8px;
      text-align: center;
      line-height: 76px;
      margin: 0 auto;
    }

    .header-title {
      color: white;
      font-size: 28px;
      font-weight: normal;
      text-align: center;
      margin: 15px 0 0 0;
    }

    /* Contenido */
    .content-text {
      font-size: 16px;
      line-height: 1.8;
      color: #666666;
      margin: 0 0 20px 0;
    }

    .greeting {
      font-size: 18px;
      color: #333333;
      font-weight: bold;
      margin: 0 0 20px 0;
    }

    /* Botón CTA */
    .cta-button {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      background-color: #667eea;
      /* Fallback */
      color: white !important;
      text-decoration: none;
      padding: 15px 30px;
      border-radius: 25px;
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 1px;
      display: inline-block;
      font-size: 14px;
    }

    .cta-button:hover {
      background-color: #5a6fd8 !important;
    }

    /* Redes sociales */
    .social-section {
      background-color: #f8f9fa;
    }

    .social-title {
      font-size: 18px;
      color: #333333;
      font-weight: bold;
      text-align: center;
      margin: 0 0 20px 0;
    }

    .social-link {
      display: inline-block;
      width: 50px;
      height: 50px;
      background-color: #333333;
      color: white !important;
      text-decoration: none;
      border-radius: 50%;
      text-align: center;
      line-height: 50px;
      font-size: 20px;
      margin: 0 7px;
    }

    .social-link.facebook {
      background-color: #3b5998 !important;
    }

    .social-link.twitter {
      background-color: #1da1f2 !important;
    }

    .social-link.instagram {
      background-color: #e4405f !important;
    }

    .social-link.linkedin {
      background-color: #0077b5 !important;
    }

    .social-link.youtube {
      background-color: #ff0000 !important;
    }

    .social-link.tiktok {
      background-color: #000000 !important;
    }

    /* Footer */
    .footer {
      background-color: #333333;
      color: #cccccc;
    }

    .footer a {
      color: #667eea !important;
      text-decoration: none;
    }

    .footer-text {
      font-size: 14px;
      line-height: 1.6;
      margin: 0 0 10px 0;
    }

    .unsubscribe {
      font-size: 12px;
      color: #999999;
      margin: 20px 0 0 0;
    }

    /* Responsive */
    @media only screen and (max-width: 600px) {
      .email-container {
        width: 100% !important;
        max-width: 100% !important;
      }

      .header-title {
        font-size: 24px !important;
      }

      .social-link {
        width: 45px !important;
        height: 45px !important;
        line-height: 45px !important;
        font-size: 18px !important;
        margin: 0 5px !important;
      }
    }
  </style>
</head>

<body>
  <!-- Contenedor principal -->
  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" class="email-wrapper">
    <tr>
      <td align="center">
        <!-- Email Container -->
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" class="email-container">

          <!-- Header -->
          <tr>
            <td class="header" style="padding: 30px; text-align: center;">
              <!-- Logo -->
              <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                  <td align="center" style="color: #ffffff">
                    {{ $email }}
                  </td>
                </tr>

                <tr>
                  <td>
                    <h1 class="header-title" style="color: #ffffff">¡Mensaje de {{ $nombres }}!</h1>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Contenido Principal -->
          <tr>
            <td style="padding: 40px 30px;">
              <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                  {{ $mensaje }}
                </tr>

                <!-- Botón CTA -->
                <tr>
                  <td align="center" style="padding: 20px 0;">

                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Sección Redes Sociales -->
          <!--
                    <tr>
                        <td class="social-section" style="padding: 30px; text-align: center; border-top: 1px solid #e9ecef;">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td>
                                        <h3 class="social-title">¡Síguenos en nuestras redes sociales!</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <a href="#" class="social-link facebook">📘</a>
                                        
                                        <a href="#" class="social-link twitter">🐦</a>
                                        
                                        <a href="#" class="social-link instagram">📷</a>
                                        
                                        <a href="#" class="social-link linkedin">💼</a>
                                        
                                        <a href="#" class="social-link youtube">📺</a>
                                        
                                        <a href="#" class="social-link tiktok">🎵</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
      </tr>
      -->

          <!-- Footer -->
          <tr>
            <td class="footer" style="padding: 25px 30px; text-align: center;">
              <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                  <td>
                    <p class="footer-text"><strong>RMM CONSULTORIA & END</strong></p>
                    <p class="footer-text"></p>
                    <p class="footer-text">Teléfono: {{ $celular }} | Email: <a href="mailto:{{ $email }}">{{ $email }}</a></p>


                  </td>
                </tr>
              </table>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>

</html>