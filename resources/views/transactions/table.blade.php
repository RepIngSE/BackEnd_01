<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="transactions-table">
        <thead class="thead" style="background-color: #17a2b8; color: #ffffff;">
            <tr>
                <th>User Id</th>
                <th>Qrcode Id</th>
                <th>Payment Method</th>
                <th>Message</th>
                <th>Amount</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->user_id }}</td>
                    <td>{{ $transaction->qrcode_id }}</td>
                    <td>{{ $transaction->payment_method }}</td>
                    <td>{{ $transaction->message }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->status }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['transactions.destroy', $transaction->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('transactions.show', [$transaction->id]) }}"
                                class='btn btn-sm btn-outline-info'
                                style="color: #17a2b8;"
                                onmouseover="this.style.color='#1B4F72';"
                                onmouseout="this.style.color='#1B4F72';">
                                    <i class="far fa-eye"></i> Ver
                            </a>
                            <a href="{{ route('transactions.edit', [$transaction->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $transactions])
        </div>
    </div>
</div>
