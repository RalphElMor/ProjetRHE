<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Piece;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PieceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pieces = Piece::paginate(5);
        return view('pieces.index', compact('pieces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pieces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $validator = Validator::make($request->all(), [
            'partName' => 'required',
            'supplier' => 'required',
            'user_id' => 'required', 
            'price' => 'required|numeric', 
            'carModel' => 'required',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('warning', 'Tous les champs sont requis')->withInput();
        }

        if ($request->file('photo')->isValid()) {
            $image = $request->file('photo');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images/upload', $fileName, 'public');
        }

      
        Piece::create([
            'partName' => $request->input('partName'),
            'supplier' => $request->input('supplier'),
            'user_id' => $request->input('user_id'),
            'price' => $request->input('price'), 
            'carModel' => $request->input('carModel'), 
            'photo' => $fileName, 
        ]); 

        return redirect('/')->with('success', 'Piece ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $piece = Piece::findOrFail($id);
        return view('pieces.show', compact('piece'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $piece = Piece::findOrFail($id);
        return view('pieces.edit', compact('piece'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Piece $piece)
{
 
    $validator = Validator::make($request->all(), [
        'partName' => 'required',
        'supplier' => 'required',
        'price' => 'required|numeric', 
        'carModel' => 'required',
        'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg', 
        'user_id' => 'required', 
    ]);

    if ($validator->fails()) {
        return redirect()->back()->with('warning', 'Tous les champs sont requis');
    }

  
    if ($request->hasFile('photo')) {
        if ($piece->photo) {
            Storage::delete('public/' . $piece->photo);
        }
        $fileName = time() . '.' . $request->file('photo')->getClientOriginalExtension();
        $path = $request->file('photo')->storeAs('images/upload', $fileName, 'public');
        $piece->photo = $fileName; 
    }


    $piece->update( [
        'partName' => $request->input('partName'),
        'supplier' => $request->input('supplier'),
        'user_id' => $request->input('user_id'),
        'price' => $request->input('price'), 
        'carModel' => $request->input('carModel'), 
       
    ]);

    return redirect('/')->with('success', 'Piece modifiée avec succès');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $piece = Piece::findOrFail($id);
        if ($piece->photo) {
            Storage::delete('public/' . $piece->photo);
        }
        $piece->delete();
        return redirect('/')->with('success', 'Piece supprimée avec succès');
    } 

    public function autocomplete(Request $request)
    {
        $search = $request->search;
        $pieces = Piece::orderby('partName', 'asc')
                    ->select('id', 'partName')
                    ->where('partName', 'LIKE', '%' . $search . '%')
                    ->get();

        $response = [];
        foreach ($pieces as $piece) {
            $response[] = [
                'value' => $piece->id,
                'label' => $piece->partName
            ];
        }

        return response()->json($response);
    } 
}
