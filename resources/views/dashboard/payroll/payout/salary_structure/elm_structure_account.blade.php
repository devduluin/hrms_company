<form id="overview-form" method="post" action="">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-2">
        <x-form.input id="mode_of_payment" label="Mode of Payment" name="mode_of_payment" required />
        <x-form.input id="payment_account" label="Payment Account" name="payment_account" required />     
    </div>
</form>