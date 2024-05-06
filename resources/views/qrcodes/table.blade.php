<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="qrcodes-table">
        <thead class="thead" style="background-color: #17a2b8; color: #ffffff;">
            <tr>
                <th>User Id</th>
                <th>Website</th>
                <th>Company Name</th>
                <th>Product Name</th>
                <th>Product Url</th>
                <th>Callback Url</th>
                <th>Qrcode Path</th>
                <th>Amount</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($qrcodes as $qrcode)
                <tr>
                    <td>{{ $qrcode->user_id }}</td>
                    <td>{{ $qrcode->website }}</td>
                    <td>{{ $qrcode->company_name }}</td>
                    <td>{{ $qrcode->product_name }}</td>
                    <td>{{ $qrcode->product_url }}</td>
                    <td>{{ $qrcode->callback_url }}</td>
                    <td>{{ $qrcode->qrcode_path }}</td>
                    <td>{{ $qrcode->amount }}</td>
                    <td>{{ $qrcode->status }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['qrcodes.destroy', $qrcode->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('qrcodes.show', [$qrcode->id]) }}"
                                class='btn btn-sm btn-outline-info'
                                style="color: #17a2b8;"
                                onmouseover="this.style.color='#1B4F72';"
                                onmouseout="this.style.color='#1B4F72';">
                                    <i class="far fa-eye"></i> Ver
                            </a>
                            <a href="{{ route('qrcodes.edit', [$qrcode->id]) }}"
                               class='btn btn-sm btn-outline-secondary'>
                                <i class="far fa-edit"></i> Editar
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-sm btn-outline-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $qrcodes])
        </div>
    </div>
</div>
