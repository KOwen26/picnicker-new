<?php

namespace App\Http\Livewire\Merchants;

use App\Models\Merchant\Merchants;
use Livewire\Component;

class MerchantsOpenSchedule extends Component
{
    // public Merchants $merchant;

    protected $listeners = ['addMerchantSchedule' => 'addMerchantSchedule'];
    public $merchant;
    public $dates = [
        ['id' => 'monday', 'alias' => 'Senin', 'status' => 'active'],
        ['id' => 'tuesday', 'alias' => 'Selasa', 'status' => 'active'],
        ['id' => 'wednesday', 'alias' => 'Rabu', 'status' => 'active'],
        ['id' => 'thursday', 'alias' => 'Kamis', 'status' => 'active'],
        ['id' => 'friday', 'alias' => 'Jumat', 'status' => 'active'],
        ['id' => 'saturday', 'alias' => 'Sabtu', 'status' => 'active'],
        ['id' => 'sunday', 'alias' => 'Minggu', 'status' => 'active'],
    ];
    public $times = [];
    public $selected_dates = [];
    public $open_time;
    public $close_time;
    public $merchant_schedule = [
        ['schedule_id' => 'monday', 'open_time' => null, 'close_time' => null],
        ['schedule_id' => 'tuesday', 'open_time' => null, 'close_time' => null],
        ['schedule_id' => 'wednesday', 'open_time' => null, 'close_time' => null],
        ['schedule_id' => 'thursday', 'open_time' => null, 'close_time' => null],
        ['schedule_id' => 'friday', 'open_time' => null, 'close_time' => null],
        ['schedule_id' => 'saturday', 'open_time' => null, 'close_time' => null],
        ['schedule_id' => 'sunday', 'open_time' => null, 'close_time' => null],
    ];

    public function setTime()
    {
        $start_time = '00:00';  // your start time
        $end_time = '24:00';  // End time
        $duration = '30';  // split by 30 mins

        $array_of_time = array();
        $start_time    = strtotime($start_time); //change to strtotime
        $end_time      = strtotime($end_time); //change to strtotime

        $add_mins  = $duration * 60;

        while ($start_time <= $end_time) // loop between time
        {
            $array_of_time[] = date("H:i", $start_time);
            $start_time += $add_mins; // to check endtie=me
        }
        $cleansing = array_pop($array_of_time);
        return  $array_of_time;
    }

    public function mount($merchant_schedule = null)
    {
        // $this->merchant = $merchant_schedule;
        $this->dates = $this->dates;
        $this->times = $this->setTime();
        if ($merchant_schedule) {
            // dd(array(collect(json_decode($merchant_schedule, true))->where('open_time', '!=', null)->implode('schedule_id')));
            $this->selected_dates = explode(',', collect(json_decode($merchant_schedule, true))->where('open_time', '!=', null)->implode('schedule_id', ','));
            $this->merchant_schedule = json_decode($merchant_schedule, true);
        }
    }

    public function setMerchantSchedule()
    {
        foreach ($this->selected_dates as $date) {
            for ($i = 0; $i < count($this->merchant_schedule); $i++) {
                if ($date == $this->merchant_schedule[$i]['schedule_id']) {
                    $this->merchant_schedule[$i]['open_time'] = $this->open_time;
                    $this->merchant_schedule[$i]['close_time'] = $this->close_time;
                }
            }
            // for ($i = 0; $i < count($this->dates); $i++) {
            //     if ($date == $this->dates[$i]['id']) {
            //         $this->dates[$i]['status'] = 'disabled';
            //     }
            // }
        }
    }

    public function addMerchantSchedule($merchant_id = null)
    {
        $merchant = Merchants::find($merchant_id);
        $merchant->merchant_schedule = $this->merchant_schedule;
        $merchant->save();
        $this->emitTo('merchants.merchants-facilities', 'addMerchantFacilities', $merchant_id);
    }

    public function render()
    {
        return view('livewire.merchants.merchants-open-schedule');
    }
}
