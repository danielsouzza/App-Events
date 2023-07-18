<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventUser;
use Illuminate\Database\QueryException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View{
        $search = request('search');
        if($search){
            $events = Event::where([
                ['title','like','%'.$search.'%']
            ])->get();
        }else{
            $events = Event::orderByDesc('created_at')->paginate(3);

        }
        return view('events', ['events' => $events,'search'=>$search]);
    }

    public function dashboard(): View{
        $user = auth()->user();
        $userEvents = $user->events;
        $eventAsParticipant = $user->eventAsParticipant;

        return view('events.dashboard', ['events' => $userEvents, 'eventParticipant'=>$eventAsParticipant]);
    }

    public function create(): View{
        return view('events.create');
    }

    public function destroy(string $id){
        Event::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg','Evento deletado!!');
    }

    public function edit(string $id){
        $user = auth()->user();
        $event = Event::findOrFail($id);

        if ($user->id != $event->user_id){
            return redirect('/dashboard')->with('eMsg','Você não tem permissão para editar esse evento');
        }

        return view('events.edit', ['event'=>$event]);
    }

    public function update(Request $request){
        $data = $request->all();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now') . '.' . $extension);
            $requestImage->move(public_path('img/events'), $imageName);
            $data['image'] = $imageName;
        }
        $data['private'] = ($request->private == 'on') ? 1 : 0;
        Event::findOrFail($request->id)->update($data);
        return redirect('/dashboard')->with('msg', 'Evento atualizado!');
    }

    public function show(string $id = '1'): View{
        $user = auth()->user();
        $event = Event::findOrFail($id);
        $alreadyEvent = false;

        $userEvent = EventUser::where([
            ['user_id','=',$user->id],
            ['event_id','=',$event->id],
        ])->get()->toArray();

        if(!empty($userEvent)){
            $alreadyEvent = true;
        }

        $owner = User::where('id', $event->user_id)->first()->toArray();
        return view('events.show', ['event' => $event, 'owner'=>$owner, 'alreadyEvent'=>$alreadyEvent]);
    }

    public function store(Request $request)
    {
        $event = new Event;

        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private == 'on' ? 1 : 0;
        $event->description = $request->description;
        $event->items = $request->items;
        $event->data = $request->data;
        $event->user_id = auth()->user()->id;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now') . '.' . $extension);
            $requestImage->move(public_path('img/events'), $imageName);
            $event->image = $imageName;
        }

        $event->save();
        return redirect('/dashboard')->with('msg', 'Evento criado!');
    }

    public function leaveEvent($id){
        $user = auth()->user();
        $event = Event::findOrFail($id);
        try {
            $user->eventAsParticipant()->detach($id);
            return redirect('/dashboard')->with('msg', 'Participação cancelada no evento'.$event->title.'!');
        }catch (QueryException $e){
            return redirect('/dashboard')->with('msg', 'Não está participando do '.$event->title.'!');
        }
    }

    public function joinEvent($id){
        $event = Event::findOrFail($id);
        try {
            $user = auth()->user();
            $user->eventAsParticipant()->attach($id);

            return redirect('/dashboard')->with('msg', 'Você está participando do evento '.$event->title);
        }catch (QueryException $e){
            return redirect('/dashboard')->with('eMsg', 'Você já está participando do evento '.$event->title);
        }
    }
}
