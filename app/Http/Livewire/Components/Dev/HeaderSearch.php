<?php

namespace App\Http\Livewire\Components\Dev;

use App\Models\MasterCity;
use Livewire\Component;
use App\Models\MasterUnit;
use App\Models\Banner;

class HeaderSearch extends Component
{
    public $master_units, $master_cities, $master_banner;
    public function render()
    {
        //get master_units
        $this->master_units = MasterUnit::all();
        //get master_city
        $this->master_cities = MasterCity::all();
        $this->master_banner = Banner::all();
        // dd($this->master_banner);
        return view('livewire.components.dev.header-search');
    }
}
