<?php

namespace App\Livewire\Comps;

use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Resend\Laravel\Facades\Resend;

class ContactComponentForm extends Component
{
    public $fullname = '';
    public $email = '';
    public $phone = '';
    public $message = '';

    protected function sendMail(Contact $contact, string $to): bool
    {
        try {
            // Mail::to($to)->send(new ContactMail($contact));
            $firstAdmin = User::where('role', 'admin')->first();
            Resend::emails()->send([
                'from' => 'Mustard Seed Charity <info@mustardseedcharity.com>',
                'to' => $firstAdmin->email,
                'subject' => 'New Contact Form Submission',
                'html' => (new ContactMail($contact))->render(),
            ]);
            return true;
        } catch (\Exception $e) {
            // Handle the exception (log it, show a message, etc.)
            Log::error('Failed to send email: ' . $e->getMessage());
            session()->flash('error', 'Failed to send email.');
            return false;
        }
    }

    public function save()
    {
        $this->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20', // Adjust max length as needed
            'message' => 'required|string|max:1000', // Adjust max length as needed
        ]);

        $contact = Contact::create([
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,
        ]);

        $this->sendMail($contact, $this->email);
        $this->reset();
        $this->dispatch('notify', message: 'We have received your message and will get back to you soon.');
    }

    public function render()
    {
        $contacts = Contact::all();
        return view('livewire.comps.contact-component-form', [
            'contacts' => $contacts,
        ]);
    }
}
