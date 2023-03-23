<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateemployeRequest;
use App\Http\Requests\UpdateemployeRequest;
use App\Repositories\employeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class employeController extends AppBaseController
{
    /** @var employeRepository $employeRepository*/
    private $employeRepository;

    public function __construct(employeRepository $employeRepo)
    {
        $this->employeRepository = $employeRepo;
    }

    /**
     * Display a listing of the employe.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $employes = $this->employeRepository->paginate(10);

        return view('employes.index')
            ->with('employes', $employes);
    }

    /**
     * Show the form for creating a new employe.
     *
     * @return Response
     */
    public function create()
    {
        return view('employes.create');
    }

    /**
     * Store a newly created employe in storage.
     *
     * @param CreateemployeRequest $request
     *
     * @return Response
     */
    public function store(CreateemployeRequest $request)
    {
        $input = $request->all();

        $employe = $this->employeRepository->create($input);

        Flash::success('¡¡Empleado guardado exitosamente!!.');

        return redirect(route('employes.index'));
    }

    /**
     * Display the specified employe.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $employe = $this->employeRepository->find($id);

        if (empty($employe)) {
            Flash::error('Employe not found');

            return redirect(route('employes.index'));
        }

        return view('employes.show')->with('employe', $employe);
    }

    /**
     * Show the form for editing the specified employe.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $employe = $this->employeRepository->find($id);

        if (empty($employe)) {
            Flash::error('Employe not found');

            return redirect(route('employes.index'));
        }

        return view('employes.edit')->with('employe', $employe);
    }

    /**
     * Update the specified employe in storage.
     *
     * @param int $id
     * @param UpdateemployeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateemployeRequest $request)
    {
        $employe = $this->employeRepository->find($id);

        if (empty($employe)) {
            Flash::error('Employe not found');

            return redirect(route('employes.index'));
        }

        $employe = $this->employeRepository->update($request->all(), $id);

        Flash::success('¡¡Empleado modificado exitosamente!!.');

        return redirect(route('employes.index'));
    }

    /**
     * Remove the specified employe from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $employe = $this->employeRepository->find($id);

        if (empty($employe)) {
            Flash::error('Employe not found');

            return redirect(route('employes.index'));
        }

        $this->employeRepository->delete($id);

        Flash::info('¡¡Usuario eliminado correctamente!!.');

        return redirect(route('employes.index'));
    }
}
