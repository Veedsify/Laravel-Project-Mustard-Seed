<?php

use App\Http\Controllers\AuthController;
use App\Livewire\AboutComponent;
use App\Livewire\BlogComponent;
use App\Livewire\BlogDetailsComponent;
use App\Livewire\ContactComponent;
use App\Livewire\DonatedItemsComponent;
use App\Livewire\DonationComponent;
use App\Livewire\DonationItemPreview;
use App\Livewire\DonationDetailComponent;
use App\Livewire\DonationPayComponent;
use App\Livewire\EventsComponent;
use App\Livewire\FaqComponents;
use App\Livewire\HomeComponent;
use App\Livewire\LoginComponent;
use App\Livewire\PrivacyPolicyComponent;
use App\Livewire\RegisAsVolunteer;
use App\Livewire\RegisterComponent;
use App\Livewire\TermsComponent;
use App\Livewire\VolunteersComponent;
use App\Livewire\VolunteersDetailsComponent;
use App\Mail\ContactMail;
use App\Models\Blog;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

// Home Page Routes
Route::get('/', HomeComponent::class)->name('home');
Route::get('/about', AboutComponent::class)->name('about');
Route::get('/blog/{slug}', BlogDetailsComponent::class)->name('blog.details');
Route::get('/blogs', BlogComponent::class)->name('blogs');
Route::get('/login', LoginComponent::class)->name('login');
Route::get('/register', RegisterComponent::class)->name('register');
// Route::get('/logout', [LoginComponent::class, 'logout'])->name('logout');
Route::get('/contact', ContactComponent::class)->name('contact');

Route::get('/events/{slug}', EventsComponent::class)->name('events.details');

Route::get("/campaigns", DonationComponent::class)->name('campaigns');
Route::get("/campaign/{slug}", DonationDetailComponent::class)->name('donate.details');
Route::get('/campaign/{slug}/payment', DonationPayComponent::class)->name('donate.payment');

Route::get("/donations", DonatedItemsComponent::class)->name('donations');
Route::get("/item/{slug}", DonationItemPreview::class)->name('item.preview');

Route::get("/volunteers", VolunteersComponent::class)->name('volunteers');
Route::get("/volunteer/{username}", VolunteersDetailsComponent::class)->name('volunteers.details');

Route::get("/faq", FaqComponents::class)->name('faq');
Route::get("/privacy-policy", PrivacyPolicyComponent::class)->name("privacy.policy");
Route::get('/terms-and-conditions', TermsComponent::class)->name('terms');


//Register As A Volunteer
Route::get('/register/volunteer', RegisAsVolunteer::class)->name('register.as.volunteer');

// Google Auth
Route::get("/register/google", [AuthController::class, 'redirectToGoogle'])->name("redirect.google");
Route::get("/auth/google-callback", [AuthController::class, 'authCallback'])->name("redirect.google.callback");
