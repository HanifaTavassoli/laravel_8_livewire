<?php

namespace App\Http\Livewire\Admin\Appointments;

use Livewire\Component;
use App\Models\Client;
use App\Models\Appointment;
use Illuminate\Support\Facades\Validator;

class CreateAppointmentForm extends Component
{
    public $state = [
        'status'=>'SCHEDULED',
    ];

    public function createAppointment()
    {
        // dd($this->state);

        // validate

        Validator::make(
        $this->state,
        [
           'client_id'=>'required',
           'date'=>'required',
           'time'=>'required',
           'note'=>'nullable',
           'status'=>'required|in:SCHEDULED,CLOSED',
        ],
        [
            'client_id.required'=>'client field is required.'
            ])->validate();

        //  $this->state['time']='00:00:00';

        // $this->state['status'] = 'open';

        Appointment::create($this->state);

        $this->dispatchBrowserEvent('alert', [
            'message' => 'Appointment created successfully!',
        ]);
    }
    public function render()
    {
        $clients = Client::all();
        return view('livewire.admin.appointments.create-appointment-form', [
            'clients' => $clients,
        ]);
    }
}
