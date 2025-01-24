@extends('layout.main')

@section('content')
<div id="home-container" class="home-container">
    <div class="dashboard">
        <div class="card blue" >
            <div class="header">
                <i>&#128187</i> <!-- Computer Icon -->
                <span>All Stocked</span>
            </div>
            <div class="body">
                <h1>{{ App\Models\Item::sum('Quantity') }}</h1>
            </div>
            <div class="footer">
                <a class="view-details" href="{{ route('details') }}">View Details</a>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="card green">
    <div class="header">
        <i>&#10150</i>
        <span>ComLab1</span>
    </div>
    <div class="body">
        <div class="status">
            <h2>Functional</h2>
            <h1 class="quantity">
                {{ App\Models\Item::where('Status', 'Functional')->whereHas('location', function ($query) {
                    $query->where('LocationName', 'Comlab1');
                })->sum('Quantity') }}
            </h1>
        </div>
        <div class="footer">
        <a href="{{ route('laboneF') }}" class="view-details" data-card="new-device">View Details</a>
    </div>
        <div class="status">
            <h2>Not Functional</h2>
            <h1 class="quantity">
                {{ App\Models\Item::where('Status', 'Not Functional')->whereHas('location', function ($query) {
                    $query->where('LocationName', 'Comlab1');
                })->sum('Quantity') }}
            </h1>
        </div>
        <div class="footer">
        <a href="{{ route('laboneNF') }}" class="view-details" data-card="new-device">View Details</a>
    </div>
    </div>
</div>


<div class="card orange">
    <div class="header">
        <i>&#128294</i> 
        <span>Lost Device</span>
    </div>
    <div class="body">
        <div class="status">
            <h2>Comlab1</h2>
            <h1 class="quantity">
            {{ App\Models\LostItem::whereHas('location', function ($query) {
                    $query->where('LocationName', 'Comlab1');
                })->sum('Quantity') }}
            </h1>
        </div>
        <div class="footer">
        <a href="" class="view-details" data-card="new-device">View Details</a>
    </div>
        <div class="status">
            <h2>comlab2</h2>
            <h1 class="quantity">
            {{ App\Models\LostItem::whereHas('location', function ($query) {
                    $query->where('LocationName', 'Comlab2');
                })->sum('Quantity') }}
            </h1>
        </div>
        <div class="footer">
        <a href="" class="view-details" data-card="new-device">View Details</a>
    </div>
    </div>
</div>

        <!-- Card 4 -->
        <div class="card red">
    <div class="header">
        <i>&#10150</i> 
        <span>ComLab2</span>
    </div>
    <div class="body">
        <div class="status">
            <h2>Functional</h2>
            <h1 class="quantity">
                {{ App\Models\Item::where('Status', 'Functional')->whereHas('location', function ($query) {
                    $query->where('LocationName', 'Comlab2');
                })->sum('Quantity') }}
            </h1>
        </div>
        <div class="footer">
        <a href="{{ route('labtwoF') }}" class="view-details" data-card="new-device">View Details</a>
    </div>
        <div class="status">
            <h2>Not Functional</h2>
            <h1 class="quantity">
                {{ App\Models\Item::where('Status', 'Not Functional')->whereHas('location', function ($query) {
                    $query->where('LocationName', 'Comlab2');
                })->sum('Quantity') }}
            </h1>
        </div>
        <div class="footer">
        <a href="{{ route('labtwoNF') }}" class="view-details" data-card="new-device">View Details</a>
    </div>
    </div>
</div>
    </div>
</div>
@endsection