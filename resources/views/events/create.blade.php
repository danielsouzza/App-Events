@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Cadastrar Evento</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="/events" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Banner</label>
                                    <input type="file" class="form-control" id="image" name="image" aria-describedby="image of event">
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" aria-describedby="title of event">
                                </div>
                                <div class="mb-3">
                                    <label for="city" class="form-label">Cidade</label>
                                    <input type="text" class="form-control" id="city" name="city">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Descrição do evento</label>
                                    <textarea type="text" class="form-control" id="description" name="description" rows="4"></textarea>
                                </div>
                                <div class="mb-3 form-check">
                                    <label class="form-check-label" for="checkbox-event-private">Evento privado</label>
                                    <input type="checkbox" class="form-check-input" id="checkbox-event-private" name="private">
                                </div>
                                <div class="mb-3 ">
                                    <label class="form-label" for="Date">Data</label>
                                    <input id="Date" name="data" class="form-control" type="date" />
                                </div>
                                <div class="form-group">
                                    <label for="titel" class="form-label">Adicionar infraestrutura</label>
                                    <div class="mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text d-flex gap-4 align-content-center">
                                                <div class="d-flex align-content-center flex-wrap gap-1">
                                                    <input type="checkbox" name="items[]" value="Cadeiras">cadeiras
                                                </div>
                                                <div class="d-flex align-content-center flex-wrap gap-1">
                                                    <input type="checkbox" name="items[]" value="Palco">Palco
                                                </div>
                                                <div class="d-flex align-content-center flex-wrap gap-1">
                                                    <input type="checkbox" name="items[]" value="Open Bar">Open Bar
                                                </div>
                                                <div class="d-flex align-content-center flex-wrap gap-1">
                                                    <input type="checkbox" name="items[]" value="Open Food">Open Food
                                                </div>
                                                <div class="d-flex align-content-center flex-wrap gap-1">
                                                    <input type="checkbox" name="items[]" value="Brindes">Brindes
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Criar evento</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
