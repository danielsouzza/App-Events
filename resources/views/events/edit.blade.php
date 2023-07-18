@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Editar &nbsp; {{$event->title}}</h5>

                    <form action="/events/update/{{$event->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Banner</label>
                            <div class="d-flex justify-content-center card">
                                <img src="/img/events/{{$event->image}}" width="50%" class=" rounded "  alt="...">
                            </div>
                            <input type="file" class="form-control" id="image" name="image" aria-describedby="image of event">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" aria-describedby="title of event" value="{{$event->title}}">
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">Cidade</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{$event->city}}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descrição do evento</label>
                            <textarea type="text" class="form-control" id="description" name="description" rows="4">{{$event->description}}</textarea>
                        </div>
                        <div class="mb-3 form-check">
                            <label class="form-check-label" for="checkbox-event-private">Evento privado</label>
                            <input type="checkbox"  class="form-check-input" id="checkbox-event-private" name="private" {{ ($event->private == 1) ? "checked='checked'":""}}>
                        </div>
                        <div class="mb-3 ">
                            <label class="form-label" for="Date">Data</label>
                            <input id="Date" name="data" class="form-control" type="date" value="{{\Illuminate\Support\Carbon::parse($event->data)->format("Y-m-d")}}">

                        </div>
                        <div class="form-group">
                            <label for="titel" class="form-label">Adicionar infraestrutura</label>
                            <div class="mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text d-flex gap-4 align-content-center">
                                        <div class="d-flex align-content-center flex-wrap gap-1">
                                            <input type="checkbox" name="items[]" value="Cadeiras" {{in_array("Cadeiras", $event->items) ? "checked='checked'":""}}>cadeiras
                                        </div>
                                        <div class="d-flex align-content-center flex-wrap gap-1">
                                            <input type="checkbox" name="items[]" value="Palco" {{in_array("Palco", $event->items) ? "checked='checked'":""}}>Palco
                                        </div>
                                        <div class="d-flex align-content-center flex-wrap gap-1">
                                            <input type="checkbox" name="items[]" value="Open Bar" {{in_array("Open Bar", $event->items) ? "checked='checked'":""}}>Open Bar
                                        </div>
                                        <div class="d-flex align-content-center flex-wrap gap-1">
                                            <input type="checkbox" name="items[]" value="Open Food" {{in_array("Open Food", $event->items) ? "checked='checked'":""}}>Open Food
                                        </div>
                                        <div class="d-flex align-content-center flex-wrap gap-1">
                                            <input type="checkbox" name="items[]" value="Brindes" {{in_array("Brindes", $event->items) ? "checked='checked'":""}}>Brindes
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
