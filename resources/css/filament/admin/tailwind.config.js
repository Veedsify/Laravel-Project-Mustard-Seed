import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/Admin/**/*.php',
        './resources/views/filament/admin/**/*.blade.php',
        './resources/views/filament/user/**/*.blade.php',
        './resources/views/livewire/user/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
}
