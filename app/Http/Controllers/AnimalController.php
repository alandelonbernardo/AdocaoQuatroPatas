<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use App\Http\Requests\AnimalRequest;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $animal = Animal::all();

        return $animal;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(AnimalRequest $request) {
        $data = $request->validated();
        $animal = new Animal();
        $animal->name = $data['name'];
        $animal->specie = $data['specie'];
        $animal->breed = $data['breed'];
        $animal->age = $data['age'];
        $animal->size = $data['size'];
        $animal->description = $data['description'];
        $animal->photo = $data['photo'];
        $animal->status = $data['status'];
        $animal->save();

        return $animal;
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $animal = new Animal();
        $animal = $animal->find($id);

        if(!$animal) {
            return ['message' => 'Não existe esse animal ou foi excluido!'];
        }

        return $animal;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, AnimalRequest $request) {
        $data = $request->validated();
        $animal = Animal::find($id);

        if(!$animal) {
            return ['message' => 'Animal não existe!'];
        }

        $animal->name = $data['name'];
        $animal->specie = $data['specie'];
        $animal->breed = $data['breed'];
        $animal->age = $data['age'];
        $animal->size = $data['size'];
        $animal->description = $data['description'];
        $animal->photo = $data['photo'];
        $animal->status = $data['status'];
        $animal->save();

        return $animal;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id) {
        $animal = Animal::find($id);

        if(!$animal) {
            return ['message' => 'Animal não existe ou já foi exluido!'];
        }

        $animal->delete();

        return ['status' => 'success', 'message' => 'Excluido com sucesso!'];
    }
}
