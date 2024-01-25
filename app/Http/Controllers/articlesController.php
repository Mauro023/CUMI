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

        $results = DB::connection('SismaInventario')->select("SELECT ic.codigo, a.id, a.descripcion, 
        a.id_grupo, g.descripcion AS tipo, c.costo_actual, c.costo_promedio_actual
        FROM Sisma_Inventario_Costos ic
        JOIN articulos a ON a.codigo = ic.codigo
        JOIN grupos g ON g.id = a.id_grupo
        JOIN costo c ON c.id_articulo = a.id
        WHERE a.codigo NOT LIKE '%ASE%'
        AND a.codigo NOT LIKE '%CAF%'
        AND a.codigo NOT LIKE '%OBR%'
        AND a.codigo NOT LIKE '%OFIC%'
        AND c.ultimo_registro = 1
        ORDER BY a.codigo");
        //dd($results);
        foreach ($results as $index => $result) {
            //Se valida que el procedimiento esté registrado
            $existingArticles = Articles::where('item_code', $result->codigo)->first();
            if ($existingArticles) {              
                // Actualiza los datos del procedimiento         
                $existingArticles->item_code = $result->codigo;
                $existingArticles->type = $result->tipo;
                $existingArticles->description = $result->descripcion;
                $existingArticles->average_cost = $result->costo_promedio_actual;
                $existingArticles->last_cost = $result->costo_actual;
                    
                $existingArticles->save();
            }else {
                $newArticles = new Articles();
                $newArticles->item_code = $result->codigo;
                $newArticles->type = $result->tipo;
                $newArticles->description = $result->descripcion;
                $newArticles->average_cost = $result->costo_promedio_actual;
                $newArticles->last_cost = $result->costo_actual;
                $newArticles->save();
            }
        }
        session()->flash('success', "Articulos actualizados correctamente!!");

        return redirect(route('articles.index'));
    }
}
