@php
$others=App\Models\OthersModel::all();

@endphp
@foreach ($others as $other)
<section id="aa-catg-head-banner">
    <img src="{{$other->hero_banner}}" alt="fashion">
    <div class="aa-catg-head-banner-area">
        <div class="container">
            <div class="aa-catg-head-banner-content">
                <h2></h2>
                <ol class="breadcrumb">
                    <li><a href="{{ route('client.home') }}">Home</a></li>
                    <li class="active">Shop</li>
                </ol>
            </div>
        </div>
    </div>
</section>

@endforeach

