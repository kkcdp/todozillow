<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Inertia\Inertia;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Group::class, 'group');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Group $group, Request $request)
    {
        // dd(Group::all());
        // dd($request->all());
        // dd(request('Group/Index')->all());

        // if($request->user()->cannot('view', $group)){
        //     abort(403);
        // }

        // $this->authorize('view', $group);

        return Inertia::render(
            'Groups/Index',
            [
                // 'groups' => Group::all()
                'groups' => Group::orderBy('created_at', 'asc')->paginate(8)
                // 'todos' => Todo::orderByDesc('created_at')->paginate(5)
                // 'todos' => Todo::latest()->get()
                // $groups = DB::select('select * from groups'),
                // 'groups' => $groups
                // // dd($groups)
            ]
        );

        // $id = 7;
        // $groups = DB::table('groups')
        //     ->where('id', $id)
        //     ->get();

    }


    public function create()
    {
        // $this->authorize('create', Group::class);
        return inertia('Groups/Create');
    }


    public function store(Request $request)
    {
        // Group::create(
        $request->user()->groups()->create(
            $request->validate([
                'group_name' => 'required|max:30',
                'color' => 'string'
            ],
            [
                'group_name.max' => 'The field must not be greater than 20 characters!'
            ])

        );

        return redirect()->route('groups.index')
            ->with('success', 'Group was created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group, Todo $todo)
    {

        // dd($group->id);

        // dd($group->load(['todos']));

        // $item = Todo::where('by_group_id', $group->id)->get();
        // dd($item);


        // dd(Todo::find($by_group_id));
        // dd(Todo::find(1)->todos);
        // $group = Group::with('todos')->get();

        // $item = Todo::where('by_group_id', '3')->get();
            // ->where('by_group_id', 'groups.id')->get();
        // dd($item);

        // $item = Todo::join('groups', 'groups.id', '=', 'todos.id')
        // ->where('by_group_id', 'groups.id')->get();
        // dd($item);

        // 'groups' => Group::all()

        // return inertia(

            // 'Groups/Show',
            // [

            //     // 'group' => $group -> load([
            //     //     'todos'
            //     //     // $todos = fn($query) => $query->latest()
            //     // ])


            //     'todos' => $group->todos
            //     // $todos = Todo::where('by_group_id', $group->id)->get(),
            //     // 'todo' => Todo::where('by_group_id', '2')->get()
            //     // $todos = Group::with('todos')->get(),
            //     // $item = Todo::find(1)->todos
            //     // $request->all('groups')
            // ]
        // );
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->deleteOrFail();

        return redirect()->route('groups.index')
            ->with('success', 'Group was deleted!');
    }


}
