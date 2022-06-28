@php
// dd($value);
switch ($value) {
    case 'active':
    case 'ACTIVE':
        $status = 'bg-success-700 hover:bg-success-900 text-white';
        break;
    case 'REVIEW':
        $status = 'bg-warning-700 hover:bg-warning-900 text-base-900';
        break;
    case 'OPEN':
        $status = 'bg-info-700 hover:bg-info-900 text-white';
        break;
    default:
        $status = 'bg-base-100';
        break;
}
@endphp
<span class="rounded-full py-1 font-medium text-xs px-3 cursor-pointer {{ $status }}">
    {{ $value }}
</span>
