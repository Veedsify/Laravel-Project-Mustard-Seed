<?php

namespace App\Livewire;

use App\Models\FAQ;
use Livewire\Component;

class FaqQuestionComponent extends Component
{
    public function render()
    {
        $faqs = FAQ::latest()->limit(4)->get();
        return view('livewire.faq-question-component',['faqs'=>$faqs]);
    }
}
