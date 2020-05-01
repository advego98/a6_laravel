<?php

namespace App\Http\Controllers;
use App\Property;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use phpDocumentor\Reflection\Types\Null_;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties= Property::all();
        return view('properties.index',compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('properties.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user= auth()->user()->id;



        $path=$request->file('photo')->store('photos','public');


        if ($request->publicar != null){
            $publicar = 1;
        } else {
            $publicar =0;
        }

        Property::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'user_id'=>$user,
            'photo'=>$path,
            'published'=>$publicar

        ]);
        return redirect()->route('properties.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property=Property::find($id);
        $users=User::all();
        return view('properties.edit',compact('property','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $property=Property::find($id);


        if ($request->file('photo')!= null){
            $path=$request->file('photo')->store('photos','public');
        } else {
            $path = Property::find($id)->photo;
        }


        if ($request->publicar != null){
            $publicar = 1;
        } else {
            $publicar =0;
        }

        $property->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'owner_id'=>$request->owner_id,
            'photo'=>$path,
            'published'=>$publicar
        ]);

        return redirect()->route('properties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $properties = Property::find($id);
        $properties->delete();
        return redirect()->route('properties.index');

    }
}
