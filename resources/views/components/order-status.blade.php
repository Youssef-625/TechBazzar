@props(['status'])

@if ($status == 'shipped')

    <p class="text-sky-500 font-bold">{{$slot}}</p>

@elseif ($status == 'pending')

    <p class="text-yellow-500 font-bold">{{$slot}}</p>

@elseif($status=='canceled')

    <p class="text-red-500 font-bold">{{$slot}}</p>

@else

    <p class="text-green-600 font-bold">{{$slot}}</p>

@endif
