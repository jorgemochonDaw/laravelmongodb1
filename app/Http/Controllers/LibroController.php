<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Category;
use App\Http\Requests\SaveLibro;
use App\Http\Controllers\Controller;


class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->testhasOne();
        $this->testhasOneEmbedido();
        $this->hasMany();
        $this->hasManyOll();
        $libros = Libro::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.libro.index', ['libros' => $libros]);
    }

    private function testhasOne()
    {
        // $b = Libro::find('61a38157f5cdec8fff083438');
        // $c = Category::find('61a3825df5cdec8fff08343a');
        // $b->category()->save($c);

    }

    private function testhasOneEmbedido()
    {
        // $b = Libro::find('61a381eef5cdec8fff083439');
        // $c = Category::find('61a3df880a7b042d122d1ac4')->ToArray();
        // $b->category = $c;
        // $b->save();
        // dd($b->category);
    }

    private function hasMany()
    {
        // $b = Libro::find('61a3ec1d0a7b042d122d1acb');
        // $c = Category::find('61a3ebf80a7b042d122d1ac9');
        // $c->libros()->save($b);
        // // dd($c->libros);
        // dd($b->category);
    }

    private function hasManyOll() {
        // $b = Libro::find('61a4b77c65cf00b4ff590322');
        // $c = Category::find('61a4bc1a65cf00b4ff590324')->ToArray();
        // $b->push('categorias',$c);
        // $b->save();
        // dd($b->categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.libro.create', ['libro' => new Libro(),'categorias' => Category::pluck('_id','title')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveLibro $request)
    {
        // Libro::create($request->all());
        Libro::create($request->validated()); //Para poner tus validaciones personalizadas
        return back()->with('status', 'Libro creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        return view('dashboard.libro.edit', ['libro' => $libro,'categorias' => Category::pluck('_id','title')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(SaveLibro $request, Libro $libro)
    {
        $libro->update($request->validated());
        return back()->with('status', 'Libro ' . $libro->title .  ' actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return back()->with('status', "Libro eliminado correctamente");
    }
}
