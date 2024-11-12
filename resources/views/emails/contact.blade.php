<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Additional Email Templates</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style type="text/css">
        /* Reset styles */
        body {
            margin: 0;
            padding: 0;
            min-width: 100%;
            width: 100% !important;
            height: 100% !important;
        }

        body,
        table,
        td,
        div,
        p,
        a {
            -webkit-font-smoothing: antialiased;
            text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            line-height: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            border-collapse: collapse !important;
            border-spacing: 0;
        }

        img {
            border: 0;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        /* Custom styles */
        .header {
            background-color: #ffffff;
            padding: 20px;
        }

        .footer {
            background-color: #f8f8f8;
            padding: 20px;
        }

        .main-content {
            padding: 40px 20px;
        }

        .button {
            background-color: #2E7D32;
            color: #ffffff !important;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 500;
            display: inline-block;
        }

        .tag {
            background-color: #E8F5E9;
            color: #2E7D32;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        .text-green {
            color: #2E7D32;
        }

        .logo {
            width: 150px;
            height: auto;
        }

        /* Typography */
        body {
            font-family: 'Lexend', 'Helvetica Neue', 'Helvetica', 'Verdana', 'Open Sans', Arial, sans-serif;
            color: #333333;
        }

        h1 {
            font-size: 24px;
            font-weight: 600;
            margin: 0 0 20px 0;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            margin: 0 0 20px 0;
        }

        .footer-links a {
            color: #666666;
            text-decoration: none;
            margin: 0 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <!-- Template 4: Contact Email -->
    <table width="100%" style="width:100%" cellpadding="0" cellspacing="0" bgcolor="#f5f5f5">
        <tr>
            <td>
                <table width="600" cellpadding="0" cellspacing="0" bgcolor="#ffffff" align="center">
                    <tr>
                        <td class="header">
                            <table width="100%" style="width:100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="50%">
                                        <img src="{{ asset('storage/' . optional($homePage)->logo) }}" width="30" alt="Logo" class="logo">
                                    </td>
                                    <td width="50%" align="right" class="text-green">
                                        Contact Form
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="main-content">
                            <h1>New Contact Form Submission</h1>
                            <table width="100%" style="width:100%" cellpadding="10" cellspacing="0" style="margin: 20px 0;">
                                <tr>
                                    <td width="50%" bgcolor="#f8f8f8"><strong>Name:</strong></td>
                                    <td width="50%" bgcolor="#f8f8f8">{{ $data->fullname }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td>{{ $data->email }}</td>
                                </tr>
                                <tr>
                                    <td bgcolor="#f8f8f8"><strong>Phone:</strong></td>
                                    <td bgcolor="#f8f8f8">{{ $data->phone }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding-top: 20px;">
                                        <strong>Message:</strong><br><br>
                                        {{ $data->message }}
                                    </td>
                                </tr>
                            </table>
                            <p style="text-align: center;">
                                <a href="#" class="button">Reply to Message</a>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="footer">
                            <table width="100%" style="width:100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" class="footer-links">
                                        <a href="#">About Us</a>
                                        <a href="#">Contact</a>
                                        <a href="#">Privacy Policy</a>
                                        <a href="#">Unsubscribe</a>
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
