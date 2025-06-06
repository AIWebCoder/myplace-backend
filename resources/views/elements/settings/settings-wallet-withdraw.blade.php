@if (Auth::user()->stripe_account_id && !Auth::user()->stripe_onboarding_verified)
    @include('elements.stripe-connect-pending-onboarding')
@endif

@if (
    getSetting('payments.tax_info_dac7_enabled') &&
    getSetting('payments.tax_info_dac7_withdrawals_enforced') &&
    $userTax == null
)
    @include('elements.dac7-withdraw-enforced')
@endif

@include('elements/settings/settings-wallet-withdrawal/fees-and-pending-balance')
@include('elements/settings/settings-wallet-withdrawal/withdrawal-input-container')
