<div>
    <div class="side-form">
        <div class="card-title">
            <h3>للحجز والاستفسار</h3>
        </div>
        <form wire:submit.prevent="send" >
            <label>الاسم</label>
            <input wire:model='name' type="text" placeholder="الاسم">
            @error('name')
            <p class='text-danger' > {{ $message }} </p>
            @enderror
            <label>البريد الالكتروني</label>
            <input wire:model='email' type="email" placeholder="البريد الالكتروني">
             @error('email')
            <p class='text-danger' > {{ $message }} </p>
            @enderror
            <label>رقم الهاتف / الواتساب</label>
            <input type="text" wire:model='phone' placeholder="رقم الهاتف">
             @error('phone')
            <p class='text-danger' > {{ $message }} </p>
            @enderror
            <label>رسالتك</label>
            <textarea  wire:model='message' placeholder="ماذا تريد بشأن هذا العقار"></textarea>
             @error('message')
            <p class='text-danger' > {{ $message }} </p>
            @enderror
            <button type="submit">ارسال</button>
            <span>أو</span>
            <div class="whatsapp">
                <a href="https://wa.me/{{ $data['settings']->whatsapp }}?text=ارغب فى  الاستفسار عن مشروع : {{ $project->name }} " target="-blank">
                    تواصل عن طريق الواتساب
                </a>
            </div>
        </form>
    </div>
</div>
