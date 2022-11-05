{{-- <div>
  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
           <div class="col-sm-6">

           </div>
           <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item"> <a href="#">Appointments</a>
            </li>
            <li class="breadcrumb-item active">create</li>
             </ol>
           </div>
        </div>
    </div>
  </div>
  <div class="content">
     <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="" wire:submit.prevent='createAppointment'></form>
            </div>
        </div>
     </div>
  </div>
</div> --}}

<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                     <h1 class="m-0 text-dark">Appointments</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="">Appointments</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form wire:submit.prevent='createAppointment' autocomplete="off">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add New Appointment</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client">Client:</label>
                                            <select class="form-control @error('client_id') is-invalid @enderror" wire:model.defer="state.client_id">
                                                <option value="">Select Client</option>
                                                @foreach($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('client_id')
                                               <span class="invalid-feedback">{{  $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="appointmentStartTime">Appointment Start Time</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                </div>
                                                <x-timepicker wire:model.defer="state.appointment_start_time" id="appointmentStartTime"/>
                                               </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="appointmentEndTime">Appointment End Time</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                </div>
                                                <x-datepicker wire:model.defer="state.appointment_end_time" id="appointmentEndTime"/>
                                               </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="appointmentDate">Appointment Date</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                                <x-datepicker wire:model.defer="state.date" id="appointmentDate" :error="'date'" />
                                                @error('date')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                             @enderror
                                               </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="appointmentTime">Appointment Time</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                </div>
                                                <x-timepicker wire:model.defer="state.time" id="appointmentTime" :error="'time'"/>
                                                @error('time')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                               </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date:</label>
                                            <div class="input-group date"
                                             wire:ignore
                                             id="appointmentDate" data-target-input="nearest" data-appointmentdate="@this">
                                                <input type="text"
                                                id="appointmentDateInput"
                                                class="form-control datetimepicker-input" data-target="#appointmentDate">
                                                <div class="input-group-append" data-target="#appointmentDate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Appointment Time:</label>
                                            <div class="input-group date" id="appointmentTime" data-target-input="nearest" data-appointmenttime="@this" wire:ingore>
                                                <input type="text"
                                                id="appointmentTimeInput"
                                                class="form-control datetimepicker-input" data-target="#appointmentTime">
                                                <div class="input-group-append" data-target="#appointmentTime" data-toggle="datetimepicker">
                                                    <div class="input-group-text">
                                                        <i class="far fa-clock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Appointment End Time:</label>
                                            <div class="input-group date" id="appointmentTime" data-target-input="nearest" data-appointmenttime="@this" wire:ingore>
                                                <input type="text"
                                                id="appointmentTimeInput"
                                                class="form-control datetimepicker-input" data-target="#appointmentTime">
                                                <div class="input-group-append" data-target="#appointmentTime" data-toggle="datetimepicker">
                                                    <div class="input-group-text">
                                                        <i class="far fa-clock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group" wire:ignore>
                                            <label for="note">Note:</label>
                                            <textarea class="form-control" wire:model.defer="state.note" id="note" data-note="@this"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client">Status:</label>
                                            <select class="form-control @error('status') is-invalid @enderror " wire:model.defer="state.status">
                                                <option value="">Select Status</option>
                                                <option value="SCHEDULED">Scheduled</option>
                                                <option value="CLOSED">closed</option>
                                            </select>
                                            @error('status')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-secondary"><i class="fa fa-times mr-1"></i> Cancel</button>
                                <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
{{-- <script>
    $(document).ready(function(){
      toastr.options={
        "positionClass":"toast-bottom-right",
        "progressBar":true,
      }

  window.addEventListener('hide-form',event=>{
  $('#form').modal('hide');
  toastr.success(event.detail.message,'success!');
   })
  });
</script> --}}
{{-- <script>
window.addEventListener('show-form',event=>{
  $('#form').modal('show');
})
window.addEventListener('show-delete-modal',event=>{
  $('#confirmation').modal('show');
})

window.addEventListener('hide-delete-modal',event=>{
  $('#confirmation').modal('hide');
  toastr.success(event.detail.message,'success!');
});
</script> --}}

{{-- <script>
 $(document).ready(function(){
   $('#appointmentDate').datetimepicker({
      format:'L',
   });

 $('#appointmentDate').on('change.datetimepicker',function(e){

      let date= $(this).data('appointmentdate');

      eval(date).set('state.date',$('#appointmentDateInput').val());
 });

 $('#appointmentTime').datetimepicker({
      format:'LT',
 });

 $('#appointmentTime').on('change.datetimepicker',function(e){
      let time=$(this).data('appointmenttime');
      eval(time).set('state.time',$('#appointmentTimeInput').val());
 });

 });

</script> --}}

<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
            .create( document.querySelector( '#note' ) )
            .then( editor => {
                    // console.log( editor );
                    // editor.model.document.on('change:data',()=>{
                        // let note=$('#note').data('note');
                        // eval(note).set('state.note',$('#note').val());
                        // console.log('changed');
                        // console.log(note);
                        // console.log($('#note').val());
                        // eval(note).set('state.note',editor.getData());
                        // });
                        document.querySelector("#submit").addEventListener('click',()=>{
                            let note =$('#note').data('note');
                            eval(note).set('state.note',editor.getData());
                        });
            } )
            .catch( error => {
                    console.error( error );
            } );
    </script>

@endpush

</div>
