<div class="card">
    <div class="card-body">
        <div id="table-default" class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th> # </th>
                        <th> check in data </th>
                        <th>  check out data </th>
                        <th> user name </th>
                        <th> user hone  </th>
                        <th> status </th>
                        <th>options</th>
                    </tr>
                </thead>
                <tbody class="table-tbody">
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($reservations as $reservation)
                    <tr>
                        <td> {{ $i++ }} </td>
                        <td> {{ $reservation->check_in_date->toDateString() }} <span class='text-muted'> {{ $reservation->check_in_date->diffForHumans() }} </span>  </td>
                        <td> {{ $reservation->check_out_date->toDateString() }}  <span class='text-muted'> {{ $reservation->check_out_date->diffForHumans() }} </span>  </td>
                        <td> {{ $reservation->user?->name }} </td>
                        <td> {{ $reservation->user?->phone }} </td>
                        <td> 
                            @switch($reservation->status)
                            @case(1)
                            pending
                            @break
                            @case(2)
                            approved
                            @break
                            @case(3)
                            rejected
                            @break
                            @default
                            @endswitch
                            
                        </td>

                        <td class='row g-2 align-items-center' >



                            @can('update rooms reservations')
                            @if ($reservation->status  == 1 )
                            <div class='col-6 col-sm-4 col-md-2 col-xl-auto '>
                                <a class="btn btn-primary w-100 btn-icon" wire:click="$emit('approve' , {{ $reservation->id }} )" aria-label="Facebook">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor" />
                                    </svg>
                                </a>
                            </div>


                            <div class='col-6 col-sm-4 col-md-2 col-xl-auto '>
                                <a class="btn btn-danger w-100 btn-icon" wire:click="$emit('cancel' , {{ $reservation->id }} )" aria-label="Facebook">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                      <path d="M18 6l-12 12" />
                                      <path d="M6 6l12 12" />
                                  </svg>
                              </a>
                          </div>
                          @endif
                          @endcan

                      </td>
                  </tr>
                  @endforeach


              </tbody>
          </table>
      </div>
  </div>
</div>

@section('scripts')
<script src="{{ asset('board_assets/dist/libs/fslightbox/index.js?1684106062') }}" defer></script>
<script>
    $(function() {

        Livewire.on('approve', itemId => {

           Livewire.emit('deleteITem' , itemId )
           $.toast({
            heading: 'Confirmation',
            text: 'approve successfully ',
            hideAfter: 5000 , 
            icon: 'success'  , 
            position: 'top-right',
            textAlign: 'right' , 
            allowToastClose: false , 
        })

       });

        Livewire.on('cancel', itemId => {

            Livewire.emit('deleteITem' , itemId )
            $.toast({
                heading: 'Confirmation',
                text: 'canceled successfully ',
                hideAfter: 5000 , 
                icon: 'success'  , 
                position: 'top-right',
                textAlign: 'right' , 
                allowToastClose: false , 
            })
        });

    });
</script>
@endsection