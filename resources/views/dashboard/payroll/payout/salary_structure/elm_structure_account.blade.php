<form id="account-form" method="post" action="">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-2">
        <x-form.input id="mode_of_payment" label="Mode of Payment" name="mode_of_payment" required />
        <x-form.input id="payment_account" label="Payment Account" name="payment_account" required />
    </div>
    <div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end">
        <x-form.button label="Save changes" id="account-btn" style="primary" type="button" icon="save" />
    </div>
</form>
