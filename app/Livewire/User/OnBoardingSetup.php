<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Models\State;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\HtmlString;
use Livewire\Component;

class OnBoardingSetup extends Component implements HasForms
{
    use InteractsWithForms;

    public $showModal = false;

    public ?array $data = [];

    public function mount(): void
    {
        $roles = ["user"];

        if (
            !auth()->user()->completed_onboarding &&
            in_array(auth()->user()->role, $roles)
        ) {
            $this->showModal = true;
        }
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->model(User::class)
            ->schema([
                Wizard::make([
                    Wizard\Step::make("Personal Details")
                        ->icon("iconsax-lin-profile-circle")
                        ->schema([
                            TextInput::make("name")
                                ->default(auth()->user()->name)
                                ->label("Name"),
                            TextInput::make("custom_username")
                                ->placeholder("Eg: marcopaulo")
                                ->required()
                                ->default(auth()->user()->custom_username ?? "")
                                ->label("User Name"),
                            Select::make("state")
                                ->placeholder("Select a state")
                                ->required()
                                ->native(false)
                                ->options(State::all()->pluck("name", "name"))
                                ->label("Location"),
                        ]),
                    Wizard\Step::make("Profile Details")
                        ->icon("iconsax-lin-profile")
                        ->schema([
                            FileUpload::make("avatar")
                                ->label("Avatar")
                                ->acceptedFileTypes(["image/*"])
                                ->avatar(),
                            Textarea::make("bio")
                                ->label("Bio")
                                ->required()
                                ->default(auth()->user()->bio)
                                ->rows(3)
                                ->placeholder("Tell us about yourself"),
                        ]),
                ])->submitAction(
                    new HtmlString(
                        Blade::render(
                            <<<BLADE
<x-filament::button
    type="submit"
    icon="far-save"
    size="sm"
>
    Save
</x-filament::button>
BLADE
                        )
                    )
                ),
            ])
            ->statePath("data");
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $this->validate([
            "data.name" => "required",
            "data.custom_username" => "required|min:7|unique:users,custom_username",
            "data.state" => "required",
            "data.bio" => "required",
        ]);

        try {

            auth()->user()->update([
                "name" => $data["name"],
                "custom_username" => $data["custom_username"],
                "location" => $data["state"],
                "bio" => $data["bio"],
                "completed_onboarding" => true,
            ]);

            $this->showModal = false;

            Notification::make()
                ->success()
                ->icon('iconsax-lin-profile-circle')
                ->title('Saved Successfully')
                ->body('User Onboarding Completed Successfully')
                ->send();

            return;
        } catch (\Exception $e) {
            Log::info("Error: " . $e->getMessage());
            Notification::make()
                ->danger()
                ->icon('iconsax-lin-profile-circle')
                ->title('Error')
                ->body('An error occurred while saving your details')
                ->send();
        }
    }
    public function closeModal(): void
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view("livewire.user.on-boarding-setup");
    }
}
