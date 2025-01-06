@extends('activities.activities')
@section('content')

<div class="content-wrapper" style="background-color: rgb(255, 255, 255);">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Processing Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('activities.processing') }}">Processing</a></li>
                        <li class="breadcrumb-item active">Edit Processing Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="m-0">Processing Details for Order Number: {{ $orderNumber }}</h1>
            </div>
            <div class="card-body">
                <form id="bulkEditForm">
                    <input type="hidden" name="order_number" value="{{ $orderNumber }}">
                    <table id="customer" class="table table-bordered">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all"></th> <!-- Checkbox for select all -->
                                <th>No</th>
                                <th>QR Code</th>
                                <th>NOP</th>
                                <th>Item Number</th>
                                <th>Machine</th>
                                <th>Operation</th>
                                <th>Estimated Time</th>
                                <th>Total Est Machine Cost</th>
                                <th>Date Wanted</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="processing-rows">
                            @foreach ($processing as $pr)
                                <tr class="processing-row">
                                    <td><input type="checkbox" name="delete_ids[]" value="{{ $pr->id }}"></td> <!-- Checkbox for each row -->
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($pr->barcode_id)
                                            {!! QrCode::size(100)->generate($pr->barcode_id) !!}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td><input type="text" name="nop[{{ $pr->id }}]" value="{{ $pr->nop }}" class="form-control"></td>
                                    <td><input type="text" name="item_number[{{ $pr->id }}]" value="{{ $pr->item_number }}" class="form-control"></td>
                                    <td>
                                        <select name="machine[{{ $pr->id }}]" class="form-control machine-selector" data-id="{{ $pr->id }}">
                                            <option value="" disabled selected>Select Machine</option>
                                            @foreach ($machines as $machine)
                                                <option value="{{ $machine->machine_name }}" 
                                                    data-mach-cost-per-hour="{{ $machine->mach_cost_per_hour }}" 
                                                    data-operation="{{ $machine->process }}"
                                                    @if($pr->machine == $machine->machine_name) selected @endif>
                                                    {{ $machine->machine_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="text" name="operation[{{ $pr->id }}]" value="{{ $pr->operation }}" class="form-control operation-field" id="operation-{{ $pr->id }}" readonly></td>
                                    <td>
                                        <input type="number" step="0.1" name="estimated_time[{{ $pr->id }}]" value="{{ $pr->estimated_time }}" class="form-control estimated-time-field" data-id="{{ $pr->id }}">
                                    </td>
                                    <td>
                                        <input type="text" name="mach_cost[{{ $pr->id }}]" value="{{ $pr->mach_cost }}" class="form-control mach-cost-field" id="mach-cost-{{ $pr->id }}" readonly>
                                    </td>
                                    <td><input type="date" name="date_wanted[{{ $pr->id }}]}" value="{{ $pr->date_wanted }}" class="form-control"></td>
                                    <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" id="add-row" class="btn btn-success">Add Row</button>
                    <button type="button" id="delete-selected" class="btn btn-danger">Delete Selected</button>
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('activities.processing') }}" class="btn btn-secondary">Back to Processing List</a>
                        <button type="submit" class="btn btn-primary btn-custom">Save Changes</button>
                    </div>
                </form>
                
            </div>
            
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
    let rowCount = {{ $processing->count() }}; // Start with the current number of rows

    // Add a new row
    document.getElementById('add-row').addEventListener('click', function () {
        rowCount++;
        const newRow = `
            <tr class="processing-row">
                <td><input type="checkbox" name="delete_ids[]" value="new_${rowCount}"></td>
                <td>${rowCount}</td>
                <td>N/A</td>
                <td><input type="text" name="nop[new_${rowCount}]" class="form-control"></td>
                <td><input type="text" name="item_number[new_${rowCount}]" class="form-control"></td>
                <td>
                    <select name="machine[new_${rowCount}]" class="form-control machine-selector" data-id="new_${rowCount}">
                        <option value="" disabled selected>Select Machine</option>
                        @foreach ($machines as $machine)
                            <option value="{{ $machine->machine_name }}" 
                                data-mach-cost-per-hour="{{ $machine->mach_cost_per_hour }}" 
                                data-operation="{{ $machine->process }}">
                                {{ $machine->machine_name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td><input type="text" name="operation[new_${rowCount}]" class="form-control operation-field" id="operation-new_${rowCount}" readonly></td>
                <td>
                    <input type="number" step="0.1" name="estimated_time[new_${rowCount}]" class="form-control estimated-time-field" data-id="new_${rowCount}">
                </td>
                <td>
                    <input type="text" name="mach_cost[new_${rowCount}]" class="form-control mach-cost-field" id="mach-cost-new_${rowCount}" readonly>
                </td>
                <td><input type="date" name="date_wanted[new_${rowCount}]" class="form-control"></td>
                <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
            </tr>
        `;

        document.getElementById('processing-rows').insertAdjacentHTML('beforeend', newRow);
    });

    // Delegate event listener for machine selector change
    document.getElementById('processing-rows').addEventListener('change', function (e) {
        if (e.target.classList.contains('machine-selector')) {
            const rowId = e.target.dataset.id;
            const selectedOption = e.target.options[e.target.selectedIndex];

            const machCostPerHour = parseFloat(selectedOption.dataset.machCostPerHour || 0);
            const operation = selectedOption.dataset.operation || '';
            const estimatedTime = parseFloat(document.querySelector(`.estimated-time-field[data-id="${rowId}"]`).value || 0);

            // Update operation field
            document.getElementById(`operation-${rowId}`).value = operation;

            // Update mach_cost field dynamically
            const machCost = machCostPerHour * estimatedTime;
            document.getElementById(`mach-cost-${rowId}`).value = machCost.toFixed(2);
        }
    });

    // Delegate event listener for estimated time field input
    document.getElementById('processing-rows').addEventListener('input', function (e) {
        if (e.target.classList.contains('estimated-time-field')) {
            const rowId = e.target.dataset.id;
            const selectedOption = document.querySelector(`.machine-selector[data-id="${rowId}"] option:checked`);

            const machCostPerHour = parseFloat(selectedOption?.dataset.machCostPerHour || 0);
            const estimatedTime = parseFloat(e.target.value || 0);

            // Update mach_cost field dynamically
            const machCost = machCostPerHour * estimatedTime;
            document.getElementById(`mach-cost-${rowId}`).value = machCost.toFixed(2);
        }
    });

    // Delegate event listener for row removal
    document.getElementById('processing-rows').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-row')) {
            e.target.closest('tr').remove();
        }
    });

    // Form submission with AJAX
    document.getElementById('bulkEditForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission

        // Gather all form data
        const formData = new FormData(this);

        // Send AJAX request to save data
        fetch("{{ route('activities.bulkupdateprocessing') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}" // Include CSRF token for security
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Changes saved successfully!');
                location.reload(); // Reload the page to reflect changes
            } else {
                alert('An error occurred while saving changes.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An unexpected error occurred.');
        });
    });
});

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Select All functionality
    const selectAllCheckbox = document.getElementById('select-all');
    selectAllCheckbox.addEventListener('change', function () {
        const checkboxes = document.querySelectorAll('input[name="delete_ids[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });

    // Delete Selected functionality
    document.getElementById('delete-selected').addEventListener('click', function () {
        const selectedIds = Array.from(document.querySelectorAll('input[name="delete_ids[]"]:checked'))
            .map(checkbox => checkbox.value);

        if (selectedIds.length === 0) {
            alert('Please select at least one row to delete.');
            return;
        }

        if (confirm('Are you sure you want to delete the selected rows?')) {
            fetch("{{ route('activities.bulkdeleteprocessing') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ delete_ids: selectedIds }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Selected rows deleted successfully.');
                    location.reload(); // Reload the page to reflect changes
                } else {
                    alert('An error occurred while deleting rows.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An unexpected error occurred.');
            });
        }
    });
});

</script>
@endsection
