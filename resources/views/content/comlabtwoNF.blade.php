@extends('layout.main')

@section('content')
<div class="container">
    <div class="header">
      <h1>Good Item</h1>
      <input type="text" placeholder="Search Item..." class="search-bar">
      <div class="view-buttons">
        <button class="grid-view">Grid View</button>
        <button class="list-view">List View</button>
      </div>
    </div>

    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>Items</th>
            <th>Category</th>
            <th>Stock</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <td><img class="item-img" src="{{ asset('monitor.png') }}" alt="Item Image"></td>
            <td class="disabled">Monitor</td>
            <td class="disabled"> {{ App\Models\Item::where('CategoryID', 1)
                    ->where('Status', 'Not Functional')
                    ->whereHas('location', function ($query) {
                        $query->where('LocationName', 'Comlab2');
                    })
                    ->sum('Quantity') }}</td>
          </tr>
          <tr>
          <td><img class="item-img" src="{{ asset('ilaga.png') }}" alt="Item Image"></td>
            <td class="disabled">Mouse</td>
            <td class="disabled"> {{ App\Models\Item::where('CategoryID', 2)
                    ->where('Status', 'Not Functional')
                    ->whereHas('location', function ($query) {
                        $query->where('LocationName', 'Comlab2');
                    })
                    ->sum('Quantity') }}</td>
          </tr>
          <tr>
          <td><img class="item-img" src="{{ asset('avr.png') }}" alt="Item Image"></td>
            <td class="disabled">Avr</td>
            <td class="disabled">{{ App\Models\Item::where('CategoryID', 3)
                    ->where('Status', 'Not Functional')
                    ->whereHas('location', function ($query) {
                        $query->where('LocationName', 'Comlab2');
                    })
                    ->sum('Quantity') }}</td>
          </tr>
          <tr>
          <td><img class="item-img" src="{{ asset('keyboard.png') }}" alt="Item Image"></td>
            <td class="disabled">Keyboard</td>
            <td class="disabled">{{ App\Models\Item::where('CategoryID', 4)
                    ->where('Status', 'Not Functional')
                    ->whereHas('location', function ($query) {
                        $query->where('LocationName', 'Comlab2');
                    })
                    ->sum('Quantity') }}</td></td>
          </tr>
          <tr>
          <td><img class="item-img" src="{{ asset('SystemUnit.png') }}" alt="Item Image"></td>
            <td class="disabled">System Unit</td>
            <td class="disabled">{{ App\Models\Item::where('CategoryID', 5)
                    ->where('Status', 'Not Functional')
                    ->whereHas('location', function ($query) {
                        $query->where('LocationName', 'Comlab2');
                    })
                    ->sum('Quantity') }}</td></td>
          </tr>
          <tr>
          <td><img class="item-img" src="{{ asset('cpu.png') }}" alt="Item Image"></td>
            <td class="disabled">System Unit-CPU</td>
            <td class="disabled">{{ App\Models\Item::where('CategoryID', 6)
                    ->where('Status', 'Not Functional')
                    ->whereHas('location', function ($query) {
                        $query->where('LocationName', 'Comlab2');
                    })
                    ->sum('Quantity') }}</td></td>
          </tr>
          <tr>
          <td><img class="item-img" src="{{ asset('powersupply.png') }}" alt="Item Image"></td>
            <td class="disabled">System Unit-Power Supply</td>
            <td class="disabled">{{ App\Models\Item::where('CategoryID', 7)
                    ->where('Status', 'Not Functional')
                    ->whereHas('location', function ($query) {
                        $query->where('LocationName', 'Comlab2');
                    })
                    ->sum('Quantity') }}</td></td>
          </tr>
          <tr>
          <td><img class="item-img" src="{{ asset('RAM.png') }}" alt="Item Image"></td>
            <td class="disabled">System Unit-RAM</td>
            <td class="disabled">{{ App\Models\Item::where('CategoryID', 8)
                    ->where('Status', 'Not Functional')
                    ->whereHas('location', function ($query) {
                        $query->where('LocationName', 'Comlab2');
                    })
                    ->sum('Quantity') }}</td></td>
          </tr>
          <tr>
          <td><img class="item-img" src="{{ asset('motherboard.png') }}" alt="Item Image"></td>
            <td class="disabled">System Unit-MotherBoard</td>
            <td class="disabled">{{ App\Models\Item::where('CategoryID', 9)
                    ->where('Status', 'Not Functional')
                    ->whereHas('location', function ($query) {
                        $query->where('LocationName', 'Comlab2');
                    })
                    ->sum('Quantity') }}</td></td>
          </tr>
          <tr>
          <td><img class="item-img" src="{{ asset('Heatsinkfan.png') }}" alt="Item Image"></td>
            <td class="disabled">System Unit-Cooling Fan</td>
            <td class="disabled">{{ App\Models\Item::where('CategoryID', 10)
                    ->where('Status', 'Not Functional')
                    ->whereHas('location', function ($query) {
                        $query->where('LocationName', 'Comlab2');
                    })
                    ->sum('Quantity') }}</td></td>
          </tr>
          <tr>
          <td><img class="item-img" src="{{ asset('SSD.png') }}" alt="Item Image"></td>
            <td class="disabled">System Unit-SSD</td>
            <td class="disabled">{{ App\Models\Item::where('CategoryID', 11)
                    ->where('Status', 'Not Functional')
                    ->whereHas('location', function ($query) {
                        $query->where('LocationName', 'Comlab2');
                    })
                    ->sum('Quantity') }}</td></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  @endsection