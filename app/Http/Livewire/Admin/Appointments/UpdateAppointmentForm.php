<?php

namespace App\Http\Livewire\Admin\Appointments;

use Livewire\Component;
use App\Models\Client;
use App\Models\Appointment;

class UpdateAppointmentForm extends Component
{
    public $state=[];

    public function mount(Appointment $appointment){
        $this->state=$appointment->toArray();
        // dd($appointment);
    }
    public function render()
    {
        $clients=Client::all();

        return view('livewire.admin.appointments.update-appointment-form',[
            'clients'=>$clients
        ]);
    }

}
