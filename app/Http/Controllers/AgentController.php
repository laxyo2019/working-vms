<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use Session;
use App\Exports\Agentexport;
use App\Imports\AgentImport;
use Maatwebsite\Excel\Facades\Excel;

class AgentController extends Controller
{
    
    public function index()
    {
      $fleet_code = session('fleet_code');
      $agent =  Agent::where('fleet_code',$fleet_code)->get();
      return view('agent.show',compact('agent'));
    }
    
    public function create()
    {
        return view('agent.create');
    }

    
    public function store(Request $request)
    {
        $data  = $request->validate(["agent_name"    => 'required',
                                      "agent_code"   => 'required',
                                      "agent_phone"  => 'required|numeric',
                                      "agent_email"  => 'required|email|unique:agent_mast,agent_email',
                                      "agent_address"=> 'required'
                                    ]);
        $data['fleet_code'] = session('fleet_code');
        Agent::create($data);
        return redirect('agent');
    }

   
    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $data  = Agent::find($id);
        return view('agent.edit',compact('data'));
    }


    public function update(Request $request, $id)
    {
        $data  = $request->validate(["agent_name"    => 'required',
                                      "agent_code"   => 'required',
                                      "agent_phone"  => 'required|numeric',
                                      "agent_email"  => 'required',
                                      "agent_address"=> 'required'
                                    ]);
        $data['fleet_code'] = session('fleet_code');
        Agent::where('id',$id)->update($data);
        return redirect('agent');
    }

   
    public function destroy($id)
    {
        Agent::where('id',$id)->delete();
        return redirect('agent');
    }

    public function export() 
    {
        return Excel::download(new Agentexport, 'agent.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new AgentImport,request()->file('file'));
        
        return redirect('agent');
    }
    public function download() {
        $file_path = public_path('demo_files/Demo_agent.xlsx');
        return response()->download($file_path);
    }
}
