<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AgentController extends Controller
{
    public function index()
    {
        $agents = User::where('role', 1)->with('flats')->get();

        return view('admin.agents.all-agents', compact('agents'));
    }

    public function agentLogout(){
        session()->forget('agent_id');
        session()->forget('user');

        return redirect('/login');
    }

    public function adminAddAgent()
    {
        return view('admin.agents.add-agents');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'identification_type' => 'required|string|max:255',
            'identification_number' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        $password = Str::random(8);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);
        $user->identification_type = $request->identification_type;
        $user->identification_number = $request->identification_number;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->plain_text_password = $password;
        $user->role = 1;

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $user->picture = 'images/' . $filename;
        }

        $user->save();

        session()->flash('generated_password', $password);

        return redirect()->route('admin.all_agent')->with('success', 'Agent added successfully.');
    }


    public function editAgent($id)
    {
        $agent = User::where('role', 1)->findOrFail($id);
        return view('admin.agents.edit-agents', compact('agent'));
    }

    public function update(Request $request, $id)
    {

        $agent = User::where('role', 1)->findOrFail($id);

        $validated = $request->validate([
            'identification_type' => 'required|string|max:255',
            'identification_number' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $agent->id,
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);



        $data = $request->all();

        if ($request->hasFile('picture')) {
            // Remove old picture if exists
            if ($agent->picture) {
                unlink(public_path($agent->picture));
            }

            // Store new picture
            $file = $request->file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['picture'] = 'images/' . $filename;
        }


        $agent->update($data);

        return redirect()->route('admin.all_agent')->with('success', 'Agent updated successfully.');
    }

    public function destroy($id)
    {
        $agent = User::where('role', 1)->findOrFail($id);

        if ($agent->picture) {
            unlink(public_path($agent->picture));
        }

        $agent->delete();

        return redirect()->route('admin.all_agent')->with('success', 'Agent deleted successfully.');
    }

}
