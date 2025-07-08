@php
    use App\Models\Paket;
    $paket = Paket::all();
@endphp

@foreach ($paket as $item)
    <p>{{ $item->deskripsi }}</p>
@endforeach
