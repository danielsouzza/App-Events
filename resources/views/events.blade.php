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
        @include('layouts.salutation')
        <div class="card ">
            <div class="card-body">
                <div class="row">
                    @if($search)
                        <h5 class="card-title fw-semibold mb-4">Eventos sobre {{$search}}</h5>
                    @else
                        <h5 class="card-title fw-semibold mb-4">Eventos mais recentes</h5>
                    @endif
                    @foreach($events as $event)
                        <div class="col-md-4">
                            <div class="card h-100">
                                @if($event->image)
                                    <img src="/img/events/{{$event->image}}" class="card-img-top" alt="...">
                                @else
                                    <img src="../assets/images/products/s4.jpg" class="card-img-top" alt="...">
                                @endif

                                <div class="card-body d-flex flex-column align-items-center gap-2" >
                                    <h5 class="card-title">{{$event->title}}</h5>
                                    @if($event->private)
                                        <i class=" ti ti-lock"></i>
                                    @else
                                        <i class="ti ti-lock-open ti"></i>
                                    @endif
                                    <p class="card-text text-center ">{{Str::limit($event->description, 50)}}</p>
                                    <a href="/events/{{$event->id}}" class="btn btn-primary">Saiba mais</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        <div class="pt-9">
                            {{$events->links()}}
                        </div>
                    @if(count($events) == 0)
                        <p>Não há eventos disponível</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
