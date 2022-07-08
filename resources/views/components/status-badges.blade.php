@php
if ($type == 'transaction') {
    switch ($value) {
        case 'NEW':
            $status = 'rounded-md bg-info-300 hover:bg-info-500/60 text-info-900';
            break;
        case 'VERIFIED':
            $status = 'rounded-md bg-secondary-300 hover:bg-secondary-500/60 text-secondary-900';
            break;
        case 'UNPAID':
            $status = 'rounded-md bg-warning-300 hover:bg-warning-500/60 text-yellow-400';
            break;
        case 'PAID':
        case 'FINISHED':
            $status = 'rounded-md bg-success-300 hover:bg-success-500/60 text-success-900';
            break;
        case 'CANCELED':
        case 'FAILED':
            $status = 'rounded-md bg-danger-300 hover:bg-danger-500/60 text-danger-900';
            break;
        default:
            $status = 'rounded-md bg-base-100';
            break;
    }
} else {
    switch ($value) {
        case 'active':
        case 'ACTIVE':
        case 'PAID':
        case 'FINISHED':
            $status = 'rounded-full bg-success-700 hover:bg-success-900 text-white';
            break;
        case 'REVIEW':
        case 'UNPAID':
            $status = 'rounded-full bg-warning-700 hover:bg-warning-900 text-base-900';
            break;
        case 'OPEN':
        case 'NEW':
            $status = 'rounded-full bg-info-700 hover:bg-info-900 text-white';
            break;
        case 'PROCESSING':
            $status = 'rounded-full bg-secondary-700 hover:bg-secondary-900 text-white';
            break;
        default:
            $status = 'rounded-full bg-base-100';
            break;
    }
}
@endphp

<span class="inline-block py-1 px-4 font-medium text-xs  cursor-pointer {{ $status }}">
    {{ $type == 'transaction'
        ? Str::title(
            collect(transaction_status_alias())->where('id', $value)->first()['alias'],
        )
        : $value }}
</span>
