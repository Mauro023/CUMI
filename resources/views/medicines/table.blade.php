<div class="table-responsive">
    <table class="table" id="medicines-table">
        <thead>
        <tr>
            <th>Admission Date</th>
        <th>Act Number</th>
        <th>Generic Name</th>
        <th>Tradename</th>
        <th>Concentration</th>
        <th>Pharmaceutical Form</th>
        <th>Presentation</th>
        <th>Expiration Date</th>
        <th>Lot Number</th>
        <th>Health Register</th>
        <th>Registration Validity</th>
        <th>Observation Record</th>
        <th>Manufacturer Laboratory</th>
        <th>Supplier</th>
        <th>Invoice Number</th>
        <th>Received Amount</th>
        <th>Purchase Order</th>
        <th>Entered By</th>
        <th>Sample</th>
        <th>Lettering</th>
        <th>Packing</th>
        <th>Laminate</th>
        <th>Closing</th>
        <th>All</th>
        <th>Liquids</th>
        <th>Semisolid</th>
        <th>Dust</th>
        <th>Tablet</th>
        <th>Capsule</th>
        <th>Arrival Temperature</th>
        <th>Observations</th>
        <th>State</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($medicines as $medicine)
            <tr>
                <td>{{ $medicine->admission_date }}</td>
            <td>{{ $medicine->act_number }}</td>
            <td>{{ $medicine->generic_name }}</td>
            <td>{{ $medicine->tradename }}</td>
            <td>{{ $medicine->concentration }}</td>
            <td>{{ $medicine->pharmaceutical_form }}</td>
            <td>{{ $medicine->presentation }}</td>
            <td>{{ $medicine->expiration_date }}</td>
            <td>{{ $medicine->lot_number }}</td>
            <td>{{ $medicine->health_register }}</td>
            <td>{{ $medicine->registration_validity }}</td>
            <td>{{ $medicine->observation_record }}</td>
            <td>{{ $medicine->manufacturer_laboratory }}</td>
            <td>{{ $medicine->supplier }}</td>
            <td>{{ $medicine->invoice_number }}</td>
            <td>{{ $medicine->received_amount }}</td>
            <td>{{ $medicine->purchase_order }}</td>
            <td>{{ $medicine->entered_by }}</td>
            <td>{{ $medicine->sample }}</td>
            <td>{{ $medicine->lettering }}</td>
            <td>{{ $medicine->packing }}</td>
            <td>{{ $medicine->laminate }}</td>
            <td>{{ $medicine->closing }}</td>
            <td>{{ $medicine->all }}</td>
            <td>{{ $medicine->liquids }}</td>
            <td>{{ $medicine->semisolid }}</td>
            <td>{{ $medicine->dust }}</td>
            <td>{{ $medicine->tablet }}</td>
            <td>{{ $medicine->capsule }}</td>
            <td>{{ $medicine->arrival_temperature }}</td>
            <td>{{ $medicine->observations }}</td>
            <td>{{ $medicine->state }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['medicines.destroy', $medicine->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('medicines.show', [$medicine->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('medicines.edit', [$medicine->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
