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
                                        <img src="{{ asset('storage/' . optional($homePage)->logo) }}" width="30" alt="Logo" class="logo">
                                    </td>
                                    <td width="50%" align="right" class="text-green">
                                        New Job Posted
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="main-content">
                            <h1>Job Approved</h1>
                            @if($user->role === 'user')
                                <p>
                                    Hi {{ $user->name }}, your job listing has been successfully approved. It is now
                                    live
                                    on the platform.
                                </p>
                                <p>
                                    You will start receiving applications from interested candidates. Good luck!
                                </p>
                            @else
                                <p>
                                    A new job has been posted on the platform. Please review the details below and take
                                    the necessary action.
                                </p>
                            @endif
                            <table width="100%" style="width:100%" cellpadding="10" cellspacing="0"
                                   style="margin: 20px 0;">
                                <tr>
                                    <td width="50%" bgcolor="#f8f8f8"><strong>Title:</strong></td>
                                    <td width="50%" bgcolor="#f8f8f8">
                                        {{ $myJob->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Location:</strong></td>
                                    <td>
                                        {{ $myJob->location }}
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#f8f8f8"><strong>Status:</strong></td>
                                    <td bgcolor="#f8f8f8">
                                        <span class="tag">
                                            {{ $myJob->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#f8f8f8"><strong>Type:</strong></td>
                                    <td bgcolor="#f8f8f8">
                                        <span class="tag">
                                            {{ $myJob->type }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Posted On:</strong></td>
                                    <td>
                                        {{ $myJob->created_at->format('d M, Y') }}
                                    </td>
                                </tr>
                            </table>
                            <p style="text-align: center;">
                                <a href="{{route('job.details',[$myJob->slug])}}" class="button">View Job Listing</a>
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
