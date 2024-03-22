
<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="detailModal">Les détails de la visite</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <small>Ce visite a été programmé pour le bien: <strong class="text-primary">{{ $visite->biens->titre }}</strong></small>
                <br>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <small class="mb-2">Information du client</small>: <br>
                        <small>Prénom & Nom: {{ $visite->clients->prenom }} {{ $visite->clients->nom }}</small>
                        <small>Téléphone: {{ $visite->clients->telephone }} </small> <br>
                        <small>Email: {{ $visite->clients->email }} </small> <br>
                        <small>Adresse: {{ $visite->clients->adresse }} </small> <br>
                    </div>
                    <div class="col-md-6">
                        <small class="mb-2">Information du propriétaire</small>: <br>

                        <small>Prénom & Nom: {{ $visite->proprietaire->prenom }} {{ $visite->proprietaire->nom }}</small>
                        <small>Téléphone: {{ $visite->proprietaire->telephone }} </small> <br>
                        <small>Email: {{ $visite->proprietaire->email }} </small> <br>
                        <small>Adresse: {{ $visite->proprietaire->adresse }} </small> <br>
                    </div>
                </div>
                <div class="mt-4">
                    <h6 class="text-center fw-bold">Pour la date: {{ \Carbon\Carbon::parse($visite->date_visite)->format('d/m/Y') }} à {{ $visite->heure_visite }}</h6>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
