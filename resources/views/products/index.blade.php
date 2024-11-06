@extends('layouts.app')

@section('content')
<div class="container mt-5">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3" role="button" aria-pressed="true" style="float: right;">{{ __('Create') }}</a>
    <h2>Searchable and Sortable Table</h2>
    <input class="form-control mb-3" id="searchInput" type="text" placeholder="Search...">

    <table class="table table-bordered table-striped" id="myTable">
        <thead>
            <tr>
                <th onclick="sortTable(0)"># <span>&#x2191;&#x2193;</span></th>
                <th onclick="sortTable(1)">Product ID <span>&#x2191;&#x2193;</span></th>
                <th onclick="sortTable(2)">Name <span>&#x2191;&#x2193;</span></th>
                <th onclick="sortTable(3)">Description <span>&#x2191;&#x2193;</span></th>
                <th onclick="sortTable(4)">Price <span>&#x2191;&#x2193;</span></th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            @foreach($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->product_id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('products.show', $product) }}" class="btn btn-success">Show</a>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('products.destroy', $product) }}" method="post" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('scripts')
<script>
    // Search functionality
    // $(document).ready(function(){
    //     $("#searchInput").on("keyup", function() {
    //         var value = $(this).val().toLowerCase();
    //         $("#tableBody tr").filter(function() {
    //             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    //         });
    //     });
    // });

    // Sort functionality
    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("myTable");
        switching = true;
        dir = "asc";
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount++;
            } else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>
@endsection
