<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['except' => ['edit', 'update']]);
        $this->middleware('owner', ['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::orderBy('email')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->fill($request->only(['email', 'is_admin']));
        $user->password = Hash::make($request->get('password'));

        $user->save();

        return redirect()->route('users.index')->with('flash', ['level' => 'success', 'message' => 'Added "' . $user->email . '".']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'confirmed'
        ]);

        $user = User::findOrFail($id);

        $fillable = ['email'];
        if (Auth::user()->is_admin) {
            $fillable[] = 'is_admin';
        }

        $user->fill($request->only($fillable));

        $password = $request->get('password');
        if (!empty($password)) {
            $user->password = Hash::make($password);
        }

        $user->save();

        if (Auth::user()->id == $id) {
            return redirect()->route('users.edit', $id)->with('flash', ['level' => 'success', 'message' => 'Your account has been updated.']);
        }

        return redirect()->route('users.index')->with('flash', ['level' => 'success', 'message' => 'Updated "' . $user->email . '".']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users.index')->with('flash', ['level' => 'success', 'message' => 'Deleted "' . $user->email . '".']);
    }
}
