<div>
    <form wire:submit.prevent="send" >
        <div class="row">
            <div class="col-lg-6">
                <label>الاسم<span>*</span></label>
                <input type="text" wire:model='name' placeholder="الاسم">
                @error('name')
                <p class='text-danger' > {{ $message }} </p>
                @enderror
            </div>
            <div class="col-lg-6">
                <label> رقم الموبيل <span>*</span></label>
                <input type="text" wire:model='phone' placeholder=" رقم الموبيل">
                 @error('phone')
                <p class='text-danger' > {{ $message }} </p>
                @enderror
            </div>

            <div class="col-lg-12">
                <label>البريد الالكتروني  <span>*</span> </label>
                <input type="email" wire:model='email' placeholder="البريد الالكتروني">
                 @error('email')
                <p class='text-danger' > {{ $message }} </p>
                @enderror
            </div>

        </div>
        <label>رسالتك <span>*</span></label>
        <textarea wire:model='message' placeholder="موضوع الرسالة"></textarea>
         @error('message')
                <p class='text-danger' > {{ $message }} </p>
                @enderror
        <button type="submit">ارسال</button>
    </form>
</div>
