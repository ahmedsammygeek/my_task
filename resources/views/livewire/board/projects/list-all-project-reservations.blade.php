<div class="card">
    <div class="card-body">
        <div id="table-default" class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th> # </th>
                        <th> تاريخ الوصول </th>
                        <th>  تاريخ المغادره </th>
                        <th> اسم العميل </th>
                        <th> رقم جوال العميل </th>
                        <th> تم اضافه الحجز بواسطه </th>
                        <th>خيارات</th>
                    </tr>
                </thead>
                <tbody class="table-tbody">
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($reservations as $reservation)
                    <tr>
                        <td> {{ $i++ }} </td>
                        <td> {{ $reservation->start_date->toDateString() }} <span class='text-muted'> {{ $reservation->start_date->diffForHumans() }} </span>  </td>
                        <td> {{ $reservation->end_date->toDateString() }}  <span class='text-muted'> {{ $reservation->end_date->diffForHumans() }} </span>  </td>
                        <td> {{ $reservation->user_name }} </td>
                        <td> {{ $reservation->user_phone }} </td>
                        <td> {{ $reservation->user?->name }} </td>

                        <td class='row g-2 align-items-center' >
                           
                            <div class='col-6 col-sm-4 col-md-2 col-xl-auto '>
                                <a href="{{ route('board.projects.reservations.show' , [ 'project' => $project , 'reservation' => $reservation ]) }}" class="btn btn-primary w-100 btn-icon" aria-label="Facebook">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                    </svg>
                                </a>
                            </div>

                          

                            <div class='col-6 col-sm-4 col-md-2 col-xl-auto '>
                                <a class="btn btn-danger w-100 btn-icon" wire:click="$emit('confirmDeletion' , {{ $reservation->id }} )" aria-label="Facebook">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 7l16 0"></path>
                                        <path d="M10 11l0 6"></path>
                                        <path d="M14 11l0 6"></path>
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                    </svg>
                                </a>
                            </div>
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

        Livewire.on('confirmDeletion', itemId => {

            Swal.fire({
                title: 'تاكيد حذف العنصر ؟',
                showDenyButton: true,
                confirmButtonText: 'نعم',
                denyButtonText: `تراجع`,
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteITem' , itemId )
                    $.toast({
                        heading: 'رسال تاكيد',
                        text: 'تم الحذف بنجاح',
                        hideAfter: 5000 , 
                        icon: 'success'  , 
                        position: 'top-right',
                        textAlign: 'right' , 
                        allowToastClose: false , 
                    })
                }
            })

        });
    });
</script>
@endsection