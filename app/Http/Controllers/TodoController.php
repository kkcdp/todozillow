<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Group;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;



class TodoController extends Controller
{
    public function index(Group $group, Todo $todo)
    {

        // dd($todo->owner());
       $todosfromgroup = $group->todos()->orderBy('deadlinedate', 'asc')->paginate(3);


        return Inertia::render(
                    'Groups/Todos/Index',
                    [
                        'todos' => $todosfromgroup,
                        'group' => $group
                        // 'group' => $todo->owner()
                        // 'group' => $group,
                        // 'group' => Group::find(2)
                        // 'group' => Group::where('by_group_id', $by_group_id)->latest()->get()
                        // 'todos' => Group::find(1)->todos
                        // ->orderBy('created_at', 'DESC')->paginate(5)
                        // 'todos' => $group->todos
                        // 'todos' => Todo::orderByDesc('created_at')
                        // 'todos' => Todo::where($group, 'by_group_id')
                        // 'todos' => Todo::paginate(5)

                    ]
                );
        }

    public function alltogether(Todo $todo, Group $group, Request $request)
    {
        // dd($todo->owner('group_name'));

        $filters = $request->only([
            'dateFrom', 'dateTo', 'search', 'isFinished', 'isImportant'
        ]);

        // $group = Todo::with('owner')
                // ->where('by_group_id', 4)
            //    ->get();

            // $group = Todo::where('by_group_id', $todo->by_group_id)->get();
            // $group = ["test"];
            // dd($group);

        return Inertia::render(
                    'Alltodos/Alltogether',
                    [
                        'filters' => $filters,
                        'group' => $group,
                        'todos' => Todo::mostRecent()
                        ->filter($filters)

                        ->paginate(5)
                        ->withQueryString()

                        // 'todos'=> Todo::latest()->get()
                        // 'todos' => Todo::paginate(3)->withQueryString()
                        // 'todos' => Todo::paginate(4)->through(fn($todo)=>[
                        //     'id' => $todo->id,
                        //     'todoname' =>$todo->todoname
                        // ])
                        //
                        // User::paginate( 10, ['id', 'name', 'body']);
                        // 'todos'=> Todo::where()->paginate(5)
                        // 'todos'=> Todo::latest()->simplePaginate(5)->withQueryString()
                        // 'todos' => Todo::all()
                        // $todos = Todo::Paginate(5)
                        // 'todos' => DB::table('todos')->get()->paginate(5)
                        // 'news'=>News::latest()->with('author')->simplePaginate(10)->withQueryString()
                    ]);
        }


    /**
     * Show the form for creating a new resource.
     */

    public function create(Group $group)
    {
        return inertia('Groups/Todos/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Group $group, Todo $todo, TodoRequest $request, User $user)
    {

        $validated = $request->validated();
        // $validated['by_group_id'] = $group->id;
        // šeit vajag dabūt iekšā User.id vai by_user_id no todo

        // dd($request->user()->id);

        $validated['by_group_id'] = $group->id;
        $validated['by_user_id'] = $request->user()->id;

        // $validated['by_user_id'] = $user->id;
        Todo::create($validated);

        // $validated['by_group_id'] = $todo->owner('group_id');
        // $validated['by_group_id'] = Group::find(2);
        // $validated['by_group_id'] = Group::with('todos')->get();
        // dd($validated);

        // dd($request->data);
        // dd($group->id);
        // dd($request->all());
        // dd(request('Group/Index')->all());
        // dd(Group::first(['id']));
        // dd(Todo::find('owner'));

        // dd($request->all());
        // $request->todos()->create(
        // $by_group_id = $request->by_group_id;
        // Group::find($id);
        // dd($by_group_id);

        // Todo::create($request->validated());

        // $todo->create($request->validated());

        // Todo::create(
        //     $request->validate([
        //         'todoname' => 'required|max:80',
        //         'deadlinedate' => 'date|nullable|after:yesterday',
        //         'deadlinetime' => 'nullable|after:now-2h',
        //         'importance' => 'boolean',
        //         'description' => 'max:200|nullable',
        //         'by_user_id' => 'integer',
        //         'isDone' => 'boolean',
        //         'by_group_id' => 'integer'
        //     ])
        // );

        return redirect()->route('groups.todos.index', $group)
            ->with('success', 'Todo was created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo, Group $group)
    {
        return Inertia::render(
            'Groups/Todos/Show',
            [
                'todo' => $todo,
                // 'group' => $group
                // 'group' => Group::find(2)
                'group' => Group::where($todo, 'by_group_id')
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo, Group $group)
    {
        return Inertia::render(
            'Groups/Todos/Edit',
            [
                'todo' => $todo


            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Group $group,Todo $todo, TodoRequest $request)
    {
        $todo->update($request->validated());

        // return redirect()->route('groups.todos.index', $group)
        return redirect()->route('groups.index', $group)
            ->with('success', 'Todo was updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {

        $todo->deleteOrFail();

        return redirect()->back()
            ->with('success', 'Todo was deleted!');
    }

    public function complete (Todo $todo){

            // Log::info($request);
            $todo->isDone ^= 1;
            $todo->save();

        return redirect()->back()
            ->with('success', 'Done status was updated!');
    }

}
