<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatebasketRequest;
use App\Http\Requests\UpdatebasketRequest;
use App\Repositories\basketRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\articles;
use App\Models\basket;
use App\Models\surgery;

class basketController extends AppBaseController
{
    /** @var basketRepository $basketRepository*/
    private $basketRepository;

    public function __construct(basketRepository $basketRepo)
    {
        $this->basketRepository = $basketRepo;
    }

    /**
     * Display a listing of the basket.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $this->authorize('view_baskets');
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $basketQuery = Basket::query();

        if (!empty($search)) {
            $basketQuery->where('store', 'LIKE', '%' . $search . '%')
                        ->orWhere('reusable', 'LIKE', '%' . $search . '%')
                        ->orWhere('id_article', 'LIKE', '%' . $search . '%')
                        ->orWhere('surgical_act', 'LIKE', '%' . $search . '%')
                        ->orWhereHas('articles', function ($query) use ($search) {
                            $query->where('description', 'LIKE', '%' . $search . '%');
                        });
        }

        $baskets = $basketQuery->paginate($perPage);

        return view('baskets.index', compact('baskets'));
    }

    /**
     * Show the form for creating a new basket.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('create_baskets');
        $articles = Articles::orderby('description')->pluck('description', 'id');
        $surgical_acts = Surgery::orderby('cod_surgical_act')->pluck('cod_surgical_act', 'cod_surgical_act');
        return view('baskets.create', compact('articles', 'surgical_acts'));
    }

    /**
     * Store a newly created basket in storage.
     *
     * @param CreatebasketRequest $request
     *
     * @return Response
     */
    public function store(CreatebasketRequest $request)
    {
        $this->authorize('create_baskets');
        $input = $request->all();
        $basket = $this->basketRepository->create($input);

        Flash::success('Basket saved successfully.');

        return redirect(route('baskets.index'));
    }

    /**
     * Display the specified basket.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('show_baskets');
        $basket = $this->basketRepository->find($id);

        if (empty($basket)) {
            Flash::error('Basket not found');

            return redirect(route('baskets.index'));
        }

        return view('baskets.show')->with('basket', $basket);
    }

    /**
     * Show the form for editing the specified basket.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('update_baskets');
        $basket = $this->basketRepository->find($id);

        if (empty($basket)) {
            Flash::error('Basket not found');

            return redirect(route('baskets.index'));
        }

        return view('baskets.edit')->with('basket', $basket);
    }

    /**
     * Update the specified basket in storage.
     *
     * @param int $id
     * @param UpdatebasketRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebasketRequest $request)
    {
        $this->authorize('update_baskets');
        $basket = $this->basketRepository->find($id);

        if (empty($basket)) {
            Flash::error('Basket not found');

            return redirect(route('baskets.index'));
        }

        $basket = $this->basketRepository->update($request->all(), $id);

        Flash::success('Basket updated successfully.');

        return redirect(route('baskets.index'));
    }

    /**
     * Remove the specified basket from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('destroy_baskets');
        $basket = $this->basketRepository->find($id);

        if (empty($basket)) {
            Flash::error('Basket not found');

            return redirect(route('baskets.index'));
        }

        $this->basketRepository->delete($id);

        Flash::success('Basket deleted successfully.');

        return redirect(route('baskets.index'));
    }
}
