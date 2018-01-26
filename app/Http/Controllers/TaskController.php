<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tasks = Task::select('*');
        if ($request->has('archived') && strlen($request->get('archived')) > 0) {
            $tasks = Task::where('archived', $request->get('archived'));
        }
        $tasks = $tasks->paginate(10);

        return view('admin.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task();

        return view('admin.tasks.edit-add', compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'list' => 'required|string|min:5|max:255',
            'due' => 'required|date',
        ]);

        $pkey = $this->generate_pkey();

        $task = new Task();
        $task->pkey = $pkey;
        $task->name = $request->input('name');
        $task->list = $request->input('list');
        $task->account = 1499700995.4461;
        $task->due = strtotime($request->input('due'));
        $task->notes = $request->input('notes');
        $task->save();

        return redirect()->route('tasks.index')->with(['alert-type' => 'success', 'message' => 'Successfully Added New']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('admin.tasks.read', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('admin.tasks.edit-add', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'list' => 'required|string|min:5|max:255',
            'due' => 'required|date'
        ]);

        $task->name = $request->input('name');
        $task->list = $request->input('list');
        $task->due = strtotime($request->input('due'));
        $task->notes = $request->input('notes');
        $task->archived = $request->has('archived') ? 1 : 0;

        $task->save();

        return redirect()->route('tasks.index')->with(['alert-type' => 'success', 'message' => 'Successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with(['alert-type' => 'success', 'message' => 'Successfully Deleted']);
    }

//    Fetch Tasks from API
    public function fetch()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://capi.tokeet.com/v1/task?account=1499700995.4461",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: 0aad3f53-e918-4ea5-b1fc-08a72670bc9e",
                "Accept: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);


        if ($status_code == 200) {
            Task::truncate();
            $tasks = json_decode($response, true)['data'];
            foreach ($tasks as $task) {
                Task::create($task);
            }

            return redirect()->route('tasks.index')->with(['alert-type' => 'success', 'message' => 'Fetched successfully']);
        } else {
            return redirect()->route('tasks.index')->with(['alert-type' => 'error', 'message' => 'Fetched Failed']);
        }
    }

//    Generate Primary Key of task and check it not repeated
    private function generate_pkey()
    {
        $pkey = $this->random_str(8) . '-' . $this->random_str(4) . '-' . $this->random_str(4) . '-' . $this->random_str(4) . '-' . $this->random_str(12);
        $check_pkey = Task::where('pkey', $pkey)->count();

        if ($check_pkey > 0) {
            $this->generate_pkey();
        }

        return $pkey;
    }

//    Generate random string
    private function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyz')
    {
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        return $str;
    }
}
