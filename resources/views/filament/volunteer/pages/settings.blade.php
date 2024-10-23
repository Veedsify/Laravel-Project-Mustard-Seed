<x-filament-panels::page>
     <div x-data="{ activeTab: 0 }">
         <!-- Tab List -->
         <ul class="flex item-center gap-2">
             <!-- Tab 1 -->
             <li>
                 <button x-transition @click="activeTab = 0" :aria-selected="activeTab === 0"
                     :class="{ 'bg-slate-600 text-white dark:text-white': activeTab === 0 }"
                     class="px-4 py-2 bg-gray-100 rounded dark:text-black font-medium" role="tab">
                     <!-- Icon and Title for Tab 1 -->
                     <span>My Account</span>
                 </button>
             </li>
             <!-- Tab 2 -->
             <li>
                 <button x-transition @click="activeTab = 1" :aria-selected="activeTab === 1"
                     :class="{ 'bg-slate-600 dark:text-white text-white': activeTab === 1 }"
                     class="px-4 py-2 bg-gray-100 rounded font-medium text-black" role="tab">
                     <span>Location</span>
                 </button>
             </li>
             <!-- Tab 3 -->
             <li>
                 <button x-transition @click="activeTab = 2" :aria-selected="activeTab === 2"
                     :class="{ 'bg-slate-600 text-white dark:text-white': activeTab === 2 }"
                     class="px-4 py-2 bg-gray-100 rounded font-medium text-black" role="tab">
                     <span>Privacy</span>
                 </button>
             </li>
         </ul>

         <!-- Panels -->
         <div role="tabpanels" class="mt-10 p-8 rounded bg-white dark:bg-gray-900">
             <!-- Panel 1 -->
             <livewire:user.profile-settings-component />
             <!-- Panel 2 -->
            <livewire:user.location-settings-component />
             <!-- Panel 3 -->
            <livewire:user.privacy-settings-component />
         </div>
     </div>
 </x-filament-panels::page>
