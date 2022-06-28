<?php

namespace App\Http\Livewire\Merchants;

use App\Models\Merchant\Merchants;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class MerchantsPictures extends Component
{
    use WithFileUploads;
    protected $listeners = ['addMerchantPictures' => 'addMerchantPictures'];

    public $pictures = [];
    public $merchant_pictures = [];

    public function mount($merchant_pictures = null)
    {
        if ($merchant_pictures) {
            // dd($merchant_pictures);
            $this->merchant_pictures = json_decode($merchant_pictures, true);
        }
    }

    public function addMerchantPictures($merchant_id = null)
    {
        // $this->validate([
        //     'pictures.*' => 'picture|max:5120', // 1MB Max
        // ]);
        for ($i = 0; $i < count($this->pictures); $i++) {
            $picture_name = "$merchant_id-merchant-picture-" . Str::random(3) . '-' . time();
            $picture_ext = $this->pictures[$i]->getClientOriginalExtension();
            $picture_filename = "$picture_name.$picture_ext";
            $storage_location = "public\pictures\\$merchant_id";
            $this->pictures[$i]->storeAs($storage_location, $picture_filename);
            $this->merchant_pictures[$i]['picture_id'] = $i + 1;
            $this->merchant_pictures[$i]['picture_filename'] = $picture_filename;
            $this->merchant_pictures[$i]['picture_location'] = $storage_location;
        }
        // dd($this->pictures, $this->merchant_pictures);
        if (count($this->merchant_pictures) > 0) {
            $merchant = Merchants::find($merchant_id);
            $merchant->merchant_pictures = $this->merchant_pictures;
            $merchant->save();
        }
        // session()->flash('message', 'pictures has been successfully Uploaded.');
        return redirect(route('merchant.home'));
    }

    public function updateMerchantPicture()
    {
    }

    public function render()
    {
        return view('livewire.merchants.merchants-pictures');
    }
}