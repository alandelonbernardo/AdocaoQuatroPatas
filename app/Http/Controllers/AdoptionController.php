<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use Illuminate\Http\Request;
use App\Http\Requests\AdoptionRequest;

class AdoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $adoption = Adoption::all();

        return $adoption;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(AdoptionRequest $request) {
        $data = $request->validated();
        $adoption = new Adoption();
        $adoption->user_id = $data['user_id'];
        $adoption->animal_id = $data['animal_id'];
        $adoption->status = $data['status'];
        $adoption->save();

        return $adoption;
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $adoption = Adoption::find($id);

        if(!$adoption) {
            return ['message' => 'Adoção não existe'];
        }

        return $adoption;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdoptionRequest $request, $id) {
        $adoption = $request->validated();
        $adoption = Adoption::finf($id);

        if(!$adoption) {
            return ['message' => 'Adoção não existe'];
        }

        $adoption->user_id = $data['user_id'];
        $adoption->animal_id = $data['animal_id'];
        $adoption->status = $data['status'];
        $adoption->save();

        return $adoption;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id) {
        $adoption = Adoption::find($id);

        if(!$adoption) {
            return ['message' => 'Adoção já foi excluida ou não existe!'];
        }

        $adoption->delete();

        return ['status' => 'success', 'message' => 'Adoção excluida com sucesso'];
    }
}
