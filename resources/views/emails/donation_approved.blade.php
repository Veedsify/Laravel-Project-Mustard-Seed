@extends('emails.layouts.mail')
@section('title', 'Account Disabled')
@section('content')

    <table width="100%" style="width:100%" cellpadding="0" cellspacing="0" bgcolor="#f5f5f5">
        <tr>
            <td>
                <table width="600" cellpadding="0" cellspacing="0" bgcolor="#ffffff" align="center">
                    <tr>
                        <td class="header">
                            <table width="100%" style="width:100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="50%">
                                        <img src="{{ asset('storage/' . optional($homePage)->logo) }}" width="50" alt="Logo" class="logo">
                                    </td>
                                    <td width="50%" align="right" class="text-green">
                                        Donation Confirmation
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="main-content">
                            <h1 style="line-height: 1.7;">
                                {{$data['message']}}
                            </h1>
                            <p>Your generous donation has been successfully processed. Here are the details:</p>
                            <table width="100%" style="width:100%" cellpadding="10" cellspacing="0" style="width:100%; margin: 20px 0;">
                                <tr>
                                    <td width="50%" bgcolor="#f8f8f8"><strong>Item:</strong></td>
                                    <td width="50%" bgcolor="#f8f8f8">
                                        {{$item->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Date:</strong></td>
                                    <td>
                                        {{date('Y-m-d H:i:s')}}
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#f8f8f8"><strong>Quantity:</strong></td>
                                    <td bgcolor="#f8f8f8">
                                        {{$item->quantity}}
                                    </td>
                                </tr>
                            </table>
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

@endsection
