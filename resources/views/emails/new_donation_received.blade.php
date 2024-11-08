@extends('emails.layouts.mail')
@section('title', 'Volunteer Signup')
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
                                        <img src="logo.png" alt="Logo" class="logo">
                                    </td>
                                    <td width="50%" align="right" class="text-green">
                                        New Donation
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="main-content">
                            <h1>New Donation Received!</h1>
                            @if($data['user'] == 'volunteer')
                                <p>{{$data['message']}}</p>
                            @else
                                <p>{{$data['message']}}</p>
                            @endif
                            <table width="100%" style="width:100%" cellpadding="10" cellspacing="0" style="width:100%; margin: 20px 0;">
                                <tr>
                                    <td width="50%" bgcolor="#f8f8f8"><strong>Donor:</strong></td>
                                    <td width="50%" bgcolor="#f8f8f8">
                                        {{$user->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Item:</strong></td>
                                    <td>
                                        {{$item->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#f8f8f8"><strong>Quantity:</strong></td>
                                    <td bgcolor="#f8f8f8">
                                        {{$item->quantity}}
                                    </td>
                                </tr>
                            </table>
                            <p style="text-align: center;">
                                <a href="{{route('login')}}" class="button">
                                    {{$data['user'] === 'volunteer' ? 'Accept Donation' : 'View Donation'}}
                                </a>
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
@endsection
