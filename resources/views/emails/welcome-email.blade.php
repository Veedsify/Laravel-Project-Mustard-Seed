@extends('emails.layouts.mail')
@section('title', 'Welcome to ' . config('app.name'))
@section('content')
    <table width="100%" style="width:100%" cellpadding="0" cellspacing="0" bgcolor="#f5f5f5">
        <tr>
            <td>
                <table width="600" cellpadding="0" cellspacing="0" bgcolor="#ffffff" align="center">
                    <!-- Header -->
                    <tr>
                        <td class="header">
                            <table width="100%" style="width:100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="50%">
                                        <img src="{{ asset('storage/' . optional($homePage)->logo) }}" width="50" alt="Logo" class="logo">
                                    </td>
                                    <td width="50%" align="right" class="text-green">
                                        Welcome!
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Content -->
                    <tr>
                        <td class="main-content">
                            <h1>Welcome to Our Community!</h1>
                            <p>Thank you for registering with us. We're excited to have you join our community of
                                change-makers.</p>
                            <p>{{$text}}</p>
                            <p style="text-align: center;">
                                <a href="#" class="button">
                                    Login
                                </a>
                            </p>
                        </td>
                    </tr>
                    <!-- Footer -->
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

@endsection
