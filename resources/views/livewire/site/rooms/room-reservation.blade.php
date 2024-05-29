<div>
    <div class="side-form">
        <div class="card-title">
            <h3>للحجز والاستفسار</h3>
        </div>
        <form wire:submit.prevent="send" >
            <label>الاسم</label>
            <input wire:model='start_date' type="date" placeholder="الاسم">
            @error('start_date')
            <p class='text-danger' > {{ $message }} </p>
            @enderror
            <label>البريد الالكتروني</label>
            <input wire:model='end_date' type="date" placeholder="البريد الالكتروني">
             @error('end_date')
            <p class='text-danger' > {{ $message }} </p>
            @enderror
           
            <button type="submit">ارسال</button>
        </form>
    </div>
</div>
