<?php

namespace App\Http\Livewire\User;

use Auth;
use App\User;
use Livewire\WithFileUploads;
use Livewire\Component;

class Update extends Component
{
	use WithFileUploads;

	public $name;
	public $password;
	public $avatar;

    public function render()
    {
        return view('livewire.user.update');
    }

    public function update()
    {
    	$this->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if(Auth::user()->id)
        {
        	$biodata = Biodata::find(Auth::user()->id);

        	if($this->avatar)
	    	{
	    		$imgName = str_replace(' ', '_', Auth::user()->name).$this->avatar->getClientOriginalExtension();
	    		$this->avatar->storeAs('public', $imgName, 'local');
	    		$this->avatar = $imgName;
	    	}

        	$biodata->update([
        		'name' => $this->name,
        		'password' => bcrypt($this->password),
        		'avatar' => $imgName,
        	]);
        }
        return redirect('/user/update')->with(['success' => 'Berhasil update profile']);
    }
}
