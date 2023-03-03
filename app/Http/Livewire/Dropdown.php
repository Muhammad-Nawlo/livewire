<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dropdown extends Component
{
    private  $arrayOfContinents = [
        [
            'id' => 1,
            "name" => "Syria"
        ],
        [
            'id' => 2,
            "name" => "USA"
        ]
    ];

    private  $arrayOfCity = [
        [
            'id' => 1,
            "name" => "Aleppo",
            'continent_id' => 1
        ],
        [
            'id' => 2,
            "name" => "Damascus",
            'continent_id' => 1
        ],
        [
            'id' => 3,
            "name" => "L.A",
            'continent_id' => 2
        ],
        [
            'id' => 4,
            "name" => "California",
            'continent_id' => 2
        ],

    ];

    public  $continents = [];
    public  $cities = [];
    public string $selectedContinent = '-1';
    public string $selectedCity = '-1';

    public function mount(): void
    {
        $this->continents = $this->arrayOfContinents;
    }

    public function changeContinent()
    {

        $this->cities = array_filter($this->arrayOfCity, (function ($city) {
            return $city['continent_id'] == $this->selectedContinent;
        }));
    }

    public function render()
    {
        return view('livewire.dropdown');
    }
}
