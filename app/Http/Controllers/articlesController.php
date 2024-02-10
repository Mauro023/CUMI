<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatearticlesRequest;
use App\Http\Requests\UpdatearticlesRequest;
use App\Repositories\articlesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Articles;
use Flash;
use Response;
//ModelosSisma
use App\Models\SismaInventario\articulos;
use App\Models\SismaInventario\costo;
use App\Models\SismaInventario\grupos;
use App\Models\SismaInventario\Sisma_Inventario_Costos;


class articlesController extends AppBaseController
{
    /** @var articlesRepository $articlesRepository*/
    private $articlesRepository;

    public function __construct(articlesRepository $articlesRepo)
    {
        $this->articlesRepository = $articlesRepo;
    }

    /**
     * Display a listing of the articles.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $articlesQuery = Articles::query();

        if (!empty($search)) {
            $articlesQuery->where('item_code', 'LIKE', '%' . $search . '%')
                    ->orWhere('type', 'LIKE', '%' . $search . '%')
                    ->orWhere('description', 'LIKE', '%' . $search . '%')
                    ->orWhere('average_cost', 'LIKE', '%' . $search . '%')
                    ->orWhere('last_cost', 'LIKE', '%' . $search . '%');
        }

        $articles = $articlesQuery->paginate($perPage);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new articles.
     *
     * @return Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created articles in storage.
     *
     * @param CreatearticlesRequest $request
     *
     * @return Response
     */
    public function store(CreatearticlesRequest $request)
    {
        $input = $request->all();

        $articles = $this->articlesRepository->create($input);

        Flash::success('Articles saved successfully.');

        return redirect(route('articles.index'));
    }

    /**
     * Display the specified articles.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $articles = $this->articlesRepository->find($id);

        if (empty($articles)) {
            Flash::error('Articles not found');

            return redirect(route('articles.index'));
        }

        return view('articles.show')->with('articles', $articles);
    }

    /**
     * Show the form for editing the specified articles.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $articles = $this->articlesRepository->find($id);

        if (empty($articles)) {
            Flash::error('Articles not found');

            return redirect(route('articles.index'));
        }

        return view('articles.edit')->with('articles', $articles);
    }

    /**
     * Update the specified articles in storage.
     *
     * @param int $id
     * @param UpdatearticlesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatearticlesRequest $request)
    {
        $articles = $this->articlesRepository->find($id);

        if (empty($articles)) {
            Flash::error('Articles not found');

            return redirect(route('articles.index'));
        }

        $articles = $this->articlesRepository->update($request->all(), $id);

        Flash::success('Articles updated successfully.');

        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified articles from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $articles = $this->articlesRepository->find($id);

        if (empty($articles)) {
            Flash::error('Articles not found');

            return redirect(route('articles.index'));
        }

        $this->articlesRepository->delete($id);

        Flash::success('Articles deleted successfully.');

        return redirect(route('articles.index'));
    }

    public function getArticles()
    {

        $results = Sisma_Inventario_Costos::join('articulos', 'articulos.codigo', '=', 'Sisma_Inventario_Costos.codigo') 
            ->join('grupos', 'grupos.id', '=', 'articulos.id_grupo')
            ->join('costo', 'costo.id_articulo', '=', 'articulos.id')
            ->whereRaw("articulos.codigo NOT LIKE '%ASE%'")
            ->whereRaw("articulos.codigo NOT LIKE '%CAF%'") 
            ->whereRaw("articulos.codigo NOT LIKE '%OBR%'")
            ->whereRaw("articulos.codigo NOT LIKE '%OFIC%'") 
            ->whereRaw("articulos.codigo NOT LIKE '%DH%'") 
            ->whereRaw("articulos.codigo NOT LIKE '%MTOS%'") 
            ->where('costo.ultimo_registro', 1)
            ->select('Sisma_Inventario_Costos.codigo', 'articulos.id', 'articulos.descripcion', 'articulos.id_grupo', 'grupos.descripcion AS tipo', 'costo.costo_actual', 'costo.costo_promedio_actual')
            ->orderBy('articulos.codigo')
            ->get();
        
        //dd($results);
        foreach ($results as $result) {
            //dd($result);
            if ($result->costo_actual == 1) {
                $previousCost = Costo::where('id_articulo', $result->id)
                    ->where('ultimo_registro', 0)
                    ->orderBy('id', 'desc')
                    ->first();
                
                if ($previousCost != NULL) {
                    $result->costo_actual = $previousCost->costo_actual;
                }
            }
            //Se valida que el procedimiento esté registrado
            $existingArticles = Articles::where('item_code', $result->codigo)->first();
            if ($existingArticles) {   
                // Actualiza los datos del procedimiento         
                $existingArticles->update([
                    'item_code' => $result->codigo,
                    'type' => $result->tipo,
                    'description' => $result->descripcion,
                    'average_cost' => $result->costo_promedio_actual,
                    'last_cost' => $result->costo_actual
                ]);           
            }else {
                Articles::create(
                [
                    'item_code' => $result->codigo,
                    'type' => $result->tipo,
                    'description' => $result->descripcion,
                    'average_cost' => $result->costo_promedio_actual,
                    'last_cost' => $result->costo_actual
                ]);
            }
        }
        session()->flash('success', "Articulos actualizados correctamente!!");

        return redirect(route('articles.index'));
    }
}
