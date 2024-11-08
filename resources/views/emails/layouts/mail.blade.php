<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>
        @yield('title' , 'Email Templates')
    </title>
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

        .button-red {
            background-color: #D32F2F;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            display: inline-block;
        }

        .status-disabled {
            background-color: #FFEBEE;
            color: #D32F2F;
        }

        .status-approved {
            background-color: #E8F5E9;
            color: #2E7D32;
        }

        .text-green {
            color: #2E7D32;
        }

        .text-red {
            color: #D32F2F;
        }

        .logo {
            width: 150px;
            height: auto;
        }

        .alert-box {
            background-color: #FFF3E0;
            border-left: 4px solid #FF9800;
            padding: 15px;
            margin: 20px 0;
        }

        /* Typography */
        body {
            font-family: 'Lexend', 'Open Sans', Arial, sans-serif;
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
@yield('content')
</body>
</html>
