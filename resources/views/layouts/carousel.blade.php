<div id="carouselExampleFade" class=" main-carousel carousel slide carousel-fade" data-bs-ride="carousel " >
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/02.jpg') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/01.jpg') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/03.jpg') }}" class="d-block w-100" alt="...">
        </div>
        <div class="container p-0">
            <div class="form-search">
                <div class="show-element">
                    <h1 class="mb-4 text-center  font-monospace">Trouver des propriétés</h1>
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="get">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="type">Type de biens</label>
                                            <input type="text" class="form-control" id="type" name="type" value="{{ $input['type'] ?? '' }}" placeholder="Ex: maison, terrain Appartements...">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="region">Régions</label>
                                            <input type="text" class="form-control" id="region" name="region" value="{{ $input['region'] ?? '' }}" placeholder="Ex: Dakar, Fatick, Thies....">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="ville">Villes</label>
                                            <input type="text" class="form-control" id="ville" name="ville" value="{{ $input['ville'] ?? '' }}" placeholder="Pikine, Almadies FANN, Ngor....">
                                        </div>
                                    </div>
                                    <div class="col-md-3 d-flex justify-content-end align-items-center" style="margin-top: 8px;">
                                        <div class="form-group" >
                                            <button class="btn btn-danger mt-4 me-5" type="submit">Rechercher</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

