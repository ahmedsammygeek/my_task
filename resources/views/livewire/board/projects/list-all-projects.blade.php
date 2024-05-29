<div class="card">
    <div class="card-body">
        <div id="table-default" class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th> # </th>
                        <th> الصوره </th>
                        <th> اسم المشروع </th>
                        <th> التصنيف </th>
                        <th> المنطقه </th>
                        <th> السعر </th>
                        <th>حاله المشروع</th>
                        <th>خيارات</th>
                    </tr>
                </thead>
                <tbody class="table-tbody">
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($projects as $project)
                    <tr>
                        <td> {{ $i++ }} </td>
                        <td>
                         <a class="avatar" data-fslightbox="gallery" href="{{ Storage::url('projects/'.$project->image) }}">
                            <img  src="{{ Storage::url('projects/'.$project->image) }}" alt="">
                        </a>
                    </td>
                    <td> {{ $project->getTranslation('name' , 'ar') }} </td>
                    <td> {{ $project->category?->name }} </td>
                    <td> {{ $project->area?->name }} </td>
                    <td> {{ $project->price }} </td>
                    <td>
                        @switch($project->is_active)
                        @case(1)
                        <span class="badge bg-success"> فعال </span>
                        @break
                        @case(0)
                        <span class="badge bg-danger"> غير فعال </span>
                        @break
                        @endswitch
                    </td>

                    <td class='row g-2 align-items-center' >
                        <div class='col-6 col-sm-4 col-md-2 col-xl-auto '>
                            <a href="{{ route('board.projects.reservations.index' , $project) }}" class="btn btn-info w-100 btn-icon" aria-label="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event text-white" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                    <path d="M16 3l0 4" />
                                    <path d="M8 3l0 4" />
                                    <path d="M4 11l16 0" />
                                    <path d="M8 15h2v2h-2z" />
                                </svg>
                            </a>
                        </div>

                        <div class='col-6 col-sm-4 col-md-2 col-xl-auto '>
                            <a href="{{ route('board.projects.messages.index' , $project) }}" class="btn btn-success w-100 btn-icon" aria-label="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail-opened" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 9l9 6l9 -6l-9 -6l-9 6" /><path d="M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10" /><path d="M3 19l6 -6" /><path d="M15 13l6 6" /></svg>
                            </a>
                        </div>

                        <div class='col-6 col-sm-4 col-md-2 col-xl-auto '>
                            <a href="{{ route('board.projects.show' , $project) }}" class="btn btn-primary w-100 btn-icon" aria-label="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                </svg>
                            </a>
                        </div>

                        <div class='col-6 col-sm-4 col-md-2 col-xl-auto '>
                            <a href="{{ route('board.projects.edit' , $project ) }}" class="btn btn-warning w-100 btn-icon" aria-label="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 6c0 1.657 3.582 3 8 3s8 -1.343 8 -3s-3.582 -3 -8 -3s-8 1.343 -8 3"></path>
                                    <path d="M4 6v6c0 1.657 3.582 3 8 3c.478 0 .947 -.016 1.402 -.046"></path>
                                    <path d="M20 12v-6"></path>
                                    <path d="M4 12v6c0 1.526 3.04 2.786 6.972 2.975"></path>
                                    <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z"></path>
                                </svg>
                            </a>
                        </div>

                        <div class='col-6 col-sm-4 col-md-2 col-xl-auto '>
                            <a class="btn btn-danger w-100 btn-icon" wire:click="$emit('confirmDeletion' , {{ $project->id }} )" aria-label="Facebook">
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