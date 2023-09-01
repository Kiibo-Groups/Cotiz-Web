<section class="section banners">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="card info-card">
                    <div class="card-header card-header-border-bottom">
                        @if (!$data->id)
                            <h5>Agregar Nueva Empresa</h5>
                        @else
                            <h2> Empresa {{ $data->nombre }}</h2>
                        @endif
                    </div>

                    <div class="row ec-vendor-uploads">
                        <div class="col-lg-12">
                            @include('alerts')
                            <div class="ec-vendor-upload-detail">
                                <form class="text-start mb-3" method="POST" enctype="multipart/form-data"
                                    action="{{ route('register_empresa') }}">
                                    @csrf


                                    <div class="row" >
                                        <input name="id" type="hidden" value="{{ $data->id }}" >
                                        <div class="col-md-12  mb-2">
                                            <label for="cashback">Cashback</label>
                                            <input id="cashback" type="number" class="form-control slug-title"
                                                name="cashback" value="{{ $data->cashback }}" required placeholder="Ej: 500"
                                                autocomplete="cashback">

                                        </div>

                                    </div>

                                    <div class="row mb-12">
                                        <div class="col-md-10" style="margin-top:25px; text-align: right">
                                            <a href="javascript:history.back()" class="btn btn-primary mb-2 btn-pill">
                                                Volver Atrás
                                            </a>

                                        </div>

                                        <div class="col-md-2" style="margin-top:25px;">
                                            <button type="submit" class="btn btn-primary mb-2 btn-pill">
                                                @if(!$data->id)
                                                Agregar
                                                @else
                                                Actualizar
                                                @endif
                                            </button>
                                        </div>
                                    </div>

                                    <form>






                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
