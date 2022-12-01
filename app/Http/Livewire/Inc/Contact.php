<?php

namespace App\Http\Livewire\Inc;

use Livewire\Component;

class Contact extends Component
{
    public $name;
    public $email;
    public $address_1;
    public $address_2;
    public $mobile;
    public $facebook;
    public $youtube;
    public $linkedin;
    public $dropbox;
    public $instagram;
    public $whatsapp;
    public $copywrite;

    public function mount(){
        $this->name = config('settings.site_name');
        $this->email = config('settings.default_email_address');
        $this->address_1 = config('settings.address_1');
        $this->address_2 = config('settings.address_2');
        $this->mobile = config('settings.mobile');

        $this->facebook = config('settings.social_facebook');
        $this->youtube = config('settings.social_youtube');
        $this->linkedin = config('settings.social_linkedin');
        $this->dropbox = config('settings.social_dropbox');
        $this->skype = config('settings.social_skype');
        $this->instagram = config('settings.social_instagram');
        $this->whatsapp = config('settings.social_twitter');

        $this->copywrite = config('settings.footer_copyright_text');
    }
    public function render()
    {
        return view('livewire.inc.contact');
    }
}
