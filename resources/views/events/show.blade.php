@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3 class=" fw-bold mb-4">{{$event->title}}</h3>
                    <div class="mb-4" >
                        @if($alreadyEvent)
                            <form action="/events/leave/{{$event->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning m-1">
                                    <i class="ti ti-edit-circle"></i>&nbsp;Sair
                                </button>
                            </form>
                        @else
                            <form action="/events/join/{{$event->id}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary m-1">Participar</button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 card">
                        @if($event->image)
                            <img src="/img/events/{{$event->image}}" width="100%" class=" rounded"  alt="...">
                        @else
                            <img src="../assets/images/products/s4.jpg" class="card-img-top" alt="...">
                        @endif
                    </div>
                    <div class=" col-md-6 p-4">
                        <div  style="font-size: 16px">
                            <div class="mb-4" style="font-size: 18px">
                                <p class="mb-0 fw-bold">{{$event->description}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="mb-0 fw-bold"><i class="ti ti-map-pin"></i>&nbsp;&nbsp;{{$event->city}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="mb-0 fw-bold"><i class="ti ti-calendar-event"></i>&nbsp;&nbsp;{{date('d/m/Y', strtotime($event->data))}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="mb-0 fw-bold"><i class="ti ti-users"></i>&nbsp;&nbsp;{{count($event->users)}}</p>
                            </div>
                            <div class="mb-4">
                                <p class="mb-0 fw-bold"><i class="ti ti-user"></i>{{$owner['name']}}</p>
                            </div>
                            <div class="mb-4">
                                @if($event->private)
                                    <p><i class="ti ti-lock"></i>&nbsp;&nbsp;Fechado</p>
                                @else
                                    <p><i class="ti ti-lock-open"></i>&nbsp;&nbsp;Aberto</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-7">
                    @if((count($event->items) > 0))
                        @foreach($event->items as $item)
                            <span class="bg-light-primary p-2 rounded-2 fw-semibold">{{$item}}</span>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
