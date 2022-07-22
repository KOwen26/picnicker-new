<?php

namespace App\Http\Livewire\Others;

use Livewire\Component;

class CustomerNavbar extends Component
{
    public $params, $route, $latitude, $longitude;
    public function search()
    {
        if ($this->latitude && $this->longitude) {
            session(['latitude' => $this->latitude, 'longitude' => $this->longitude]);
            // dd($this->latitude, $this->longitude, session('latitude'), session('longitude'));
        }
        if ($this->route !== 'customer.search-result') {
            redirect(route('customer.search-result', ['params' => $this->params]));
        } else {
            $this->emitTo('merchants.customers-merchant-filter', 'search', $this->params);
        }
    }

    public function logout()
    {
        auth()->guard('customer')->logout();
        return redirect()->back();
    }

    public function loginModal()
    {
        return $this->emit("openModal", 'customers.customers-login');
    }

    public function registerModal()
    {
        return $this->emit("openModal", 'customers.customers-register');
    }

    public function render()
    {
        return view('livewire.others.customer-navbar');
    }
}