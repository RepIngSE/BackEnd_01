<div class="row">
    <!-- Campos a la Izquierda -->
    <div class="col-sm-6">
        <!-- User Id Field -->
        <div class="form-group">
            {!! Form::label('user_id', 'User Id:') !!}
            <p>{{ $qrcode->user_id }}</p>
        </div>

        <!-- Website Field -->
        <div class="form-group">
            {!! Form::label('website', 'Website:') !!}
            <p>{{ $qrcode->website }}</p>
        </div>

        <!-- Company Name Field -->
        <div class="form-group">
            {!! Form::label('company_name', 'Company Name:') !!}
            <p>{{ $qrcode->company_name }}</p>
        </div>

        <!-- Product Name Field -->
        <div class="form-group">
            {!! Form::label('product_name', 'Product Name:') !!}
            <p>{{ $qrcode->product_name }}</p>
        </div>

        <!-- Product Url Field -->
        <div class="form-group">
            {!! Form::label('product_url', 'Product Url:') !!}
            <p>{{ $qrcode->product_url }}</p>
        </div>

        <!-- Callback Url Field -->
        <div class="form-group">
            {!! Form::label('callback_url', 'Callback Url:') !!}
            <p>{{ $qrcode->callback_url }}</p>
        </div>

        <!-- Amount Field -->
        <div class="form-group">
            {!! Form::label('amount', 'Amount:') !!}
            <p>{{ $qrcode->amount }}</p>
        </div>

        <!-- Status Field -->
        <div class="form-group">
            {!! Form::label('status', 'Status:') !!}
            <p>{{ $qrcode->status }}</p>
        </div>
    </div>

    <!-- Código QR y Formulario de Pago a la Derecha -->
        <div class="col-sm-6">
        {!! Form::label('qrcode_path', 'Qrcode Path:') !!}
        <!-- Qrcode Path Field -->
        <div class="form-group text-center">
            <ul>
                <p>
                    <img src="{{ asset($qrcode->qrcode_path) }}" style="width: 100%">
                </p>
            </ul>
        </div>

        <style>
            .custom-btn {
                width: 90%;
                margin-top: 20px; 
                margin-left: 25px;
            }
        </style>

        <!-- Formulario de Pago -->
        <div class="form-group text-center">
            <form action="{{ route('payment') }}" method="post">
                @csrf
                <input type="hidden" name="amount" value="{{ $qrcode->amount }}">
                <input type="hidden" name="user_id" value="{{ $qrcode->user_id }}">
                <input type="hidden" name="qrcode_id" value="{{ $qrcode->id }}">
                <button type="submit" class="btn btn-info btn-sm custom-btn">Paypal</button>
            </form>
        </div>
    </div>
</div>
