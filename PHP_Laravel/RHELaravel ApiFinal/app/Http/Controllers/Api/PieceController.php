<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Piece;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PieceController extends Controller
{

    public function index()
    {
        $pieces = Piece::all();  
        return response()->json($pieces, 200);
    }

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
            return response()->json(['error' => 'Tous les champs sont requis'], 400);
        }


        if ($request->file('photo')->isValid()) {
            $image = $request->file('photo');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images/upload', $fileName, 'public');
        }

        $piece = Piece::create([
            'partName' => $request->input('partName'),
            'supplier' => $request->input('supplier'),
            'user_id' => $request->input('user_id'),
            'price' => $request->input('price'),
            'carModel' => $request->input('carModel'),
            'photo' => $fileName,
        ]);

        return response()->json($piece, 201);
    }

    public function show($id)
    {
        $piece = Piece::find($id);
        if (!$piece) {
            return response()->json(['error' => 'Piece not found'], 404);
        }
        return response()->json($piece, 200);
    }

    public function edit($id)
    {
        $piece = Piece::find($id);
        if (!$piece) {
            return response()->json(['error' => 'Piece not found'], 404);
        }
        return response()->json($piece, 200); 
    }

    public function update(Request $request, $id)
    {
        $piece = Piece::find($id);
        if (!$piece) {
            return response()->json(['error' => 'Piece not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'partName' => 'required',
            'supplier' => 'required',
            'price' => 'required|numeric',
            'carModel' => 'required',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Tous les champs sont requis'], 400);
        }

        if ($request->hasFile('photo')) {
            if ($piece->photo) {
                Storage::delete('public/' . $piece->photo);
            }
            $fileName = time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $path = $request->file('photo')->storeAs('images/upload', $fileName, 'public');
            $piece->photo = $fileName;
        }

        $piece->update([
            'partName' => $request->input('partName'),
            'supplier' => $request->input('supplier'),
            'user_id' => $request->input('user_id'),
            'price' => $request->input('price'),
            'carModel' => $request->input('carModel'),
        ]);

        return response()->json($piece, 200);
    }

    public function destroy($id)
    {
        $piece = Piece::find($id);
        if (!$piece) {
            return response()->json(['error' => 'Piece not found'], 404);
        }

        if ($piece->photo) {
            Storage::delete('public/' . $piece->photo);
        }
        $piece->delete();

        return response()->json(['message' => 'Piece deleted successfully'], 200);
    }
    public function autocomplete(Request $request)
    {
       $query = $request->input('query');
       $pieces = Piece::where('partName','LIKE',"%{$query}%")->limit(10)->get();
       return response()->json($pieces);
    }
}
