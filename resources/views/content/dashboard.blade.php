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
                <h1>0</h1>
            </div>
            <div class="footer">
                <a href="#" class="view-details" data-card="new-device">View Details</a>
            </div>
        </div>

        <div class="card orange">
            <div class="header">
                <i>&#128295</i> 
                <span>Device</span>
            </div>
            <div class="body">
                <h1>0</h1>
            </div>
            <div class="footer">
                <a href="#" class="view-details" data-card="damaged-device">View Details</a>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="card red">
            <div class="header">
                <i>&#10150</i> <!-- Wrench Icon -->
                <span>Comlab2</span>
            </div>
            <div class="body">
                <h1>0</h1>
            </div>
            <div class="footer">
                <a class="view-details" data-card="repaired-device">View Details</a>
            </div>
        </div>
    </div>
</div>
@endsection