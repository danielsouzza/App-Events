@extends('layouts.main')

@section('content')
    <div class="container-fluid ">
        @if(session('msg'))
            <div class="  alert alert-primary" role="alert">
                {{session('msg')}}
            </div>
        @elseif(session('eMsg'))
            <div class="  alert alert-danger" role="alert">
                {{session('eMsg')}}
            </div>
        @endif

        <div class="card-body">
            <div class="row">
                <div class="d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-body mb-4">
                            <div class="d-flex p-2 align-items-center justify-content-between">
                                <h5 class="card-title fw-semibold ">Meus Eventos</h5>
                                <a href="/events/create" class="btn btn-primary "><i class="ti ti-plus"></i>&nbsp;Novo evento</a>
                            </div>
                            @if(count($events) > 0)
                                <div class="table-responsive">
                                    <table class="table text-nowrap mb-0 align-middle">
                                        <thead class="text-dark fs-4 border-bottom border-top bg-light-gray">
                                            <tr>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Id</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Titulo</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Cidade</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Participantes</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Tipo</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Data</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Ações</h6>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($events as $event)
                                                <tr class="border-bottom">
                                                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$loop->index + 1}}</h6></td>
                                                    <td class="border-bottom-0">
                                                        <a href="/events/{{$event->id}}" class="btn btn-link m-1 fw-semibold">{{$event->title}}</a>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <p class="mb-0 fw-normal">{{$event->city}}</p>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <p class="mb-0 fw-normal">{{count($event->users)}}</p>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <div class="d-flex align-items-center gap-2">
                                                            @if($event->private)
                                                                <span class="badge bg-danger rounded-2 fw-semibold"><i class="ti ti-lock"></i></span>
                                                            @else
                                                                <span class="badge bg-success rounded-2 fw-semibold"><i class="ti ti-lock-open"></i></span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0 fs-4">{{date('d/m/Y', strtotime($event->data))}}</h6>
                                                    </td>
                                                    <td class="border-bottom-0 d-flex">
                                                        <a href="/events/edit/{{$event->id}}" class="btn btn-outline-warning m-1"><i class="ti ti-edit-circle"></i>&nbsp;Editar</a>

                                                        <form action="/events/{{$event->id}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger m-1">
                                                                <i class="ti ti-edit-circle"></i>&nbsp;Deletar
                                                            </button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Vocẽ ainda não tem eventos</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body mb-4">
                                <div class="d-flex p-2 align-items-center justify-content-between">
                                    <h5 class="card-title fw-semibold ">Participando</h5>
                                    <a href="/" class="btn btn-primary "><i class="ti ti-search"></i>&nbsp;Buscar mais</a>
                                </div>
                                @if(count($eventParticipant) > 0)
                                    <div class="table-responsive">
                                        <table class="table text-nowrap mb-0 align-middle">
                                            <thead class="text-dark fs-4 border-bottom border-top bg-light-gray">
                                            <tr>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Id</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Titulo</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Cidade</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Participantes</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Tipo</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Data</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Ações</h6>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($eventParticipant as $event)
                                                <tr class="border-bottom">
                                                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$loop->index + 1}}</h6></td>
                                                    <td class="border-bottom-0">
                                                        <a href="/events/{{$event->id}}" class="btn btn-link m-1 fw-semibold">{{$event->title}}</a>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <p class="mb-0 fw-normal">{{$event->city}}</p>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <p class="mb-0 fw-normal">{{count($event->users)}}</p>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <div class="d-flex align-items-center gap-2">
                                                            @if($event->private)
                                                                <span class="badge bg-danger rounded-2 fw-semibold"><i class="ti ti-lock"></i></span>
                                                            @else
                                                                <span class="badge bg-success rounded-2 fw-semibold"><i class="ti ti-lock-open"></i></span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0 fs-4">{{date('d/m/Y', strtotime($event->data))}}</h6>
                                                    </td>
                                                    <td class="border-bottom-0 d-flex">
                                                        <form action="/events/leave/{{$event->id}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-warning m-1">
                                                                <i class="ti ti-edit-circle"></i>&nbsp;Sair
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p>Vocẽ não está participando de nenhum evento</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
