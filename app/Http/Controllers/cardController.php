<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecardRequest;
use App\Http\Requests\UpdatecardRequest;
use App\Repositories\cardRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\employe;
use App\Models\card;
use Flash;
use Response;
use PDF;

class cardController extends AppBaseController
{
    /** @var cardRepository $cardRepository*/
    private $cardRepository;

    public function __construct(cardRepository $cardRepo)
    {
        $this->cardRepository = $cardRepo;
    }

    /**
     * Display a listing of the card.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cards = $this->cardRepository->all();

        return view('cards.index')
            ->with('cards', $cards);
    }

    /**
     * Show the form for creating a new card.
     *
     * @return Response
     */
    public function create()
    {
        $employes = Employe::orderby('name')->pluck('name', 'id');
        return view('cards.create', compact('employes'));
    }

    /**
     * Store a newly created card in storage.
     *
     * @param CreatecardRequest $request
     *
     * @return Response
     */
    public function store(CreatecardRequest $request)
    {
        $input = $request->all();
        $input['signature_employe_card'] = $request->input('employe_signature');
        $card = $this->cardRepository->create($input);

        Flash::success('Card saved successfully.');

        return redirect()->action([cardController::class, 'generarActaEntrega'], ['id' => $card->id]);
    }

    /**
     * Display the specified card.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $card = $this->cardRepository->find($id);

        if (empty($card)) {
            Flash::error('Card not found');

            return redirect(route('cards.index'));
        }

        return view('cards.show')->with('card', $card);
    }

    /**
     * Show the form for editing the specified card.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $card = $this->cardRepository->find($id);
        $employes = Employe::pluck('name', 'id');
        $signature = $card->signature_employe_card;
        if (empty($card)) {
            Flash::error('Card not found');

            return redirect(route('cards.index'));
        }

        return view('cards.edit', compact('employes', 'signature'))->with('card', $card);
    }

    /**
     * Update the specified card in storage.
     *
     * @param int $id
     * @param UpdatecardRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecardRequest $request)
    {
        $card = $this->cardRepository->find($id);

        if (empty($card)) {
            Flash::error('Card not found');

            return redirect(route('cards.index'));
        }
        $input = $request->all();
        $input['signature_employe_card'] = $request->input('employe_signature');

        $this->cardRepository->update($input, $id);

        Flash::success('Card updated successfully.');

        return redirect()->action([cardController::class, 'generarActaEntregaCard'], ['id' => $card->id]);
    }

    /**
     * Remove the specified card from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $card = $this->cardRepository->find($id);

        if (empty($card)) {
            Flash::error('Card not found');

            return redirect(route('cards.index'));
        }

        $this->cardRepository->delete($id);

        Flash::success('Card deleted successfully.');

        return redirect(route('cards.index'));
    }

    public function generarActaEntregaCard($id)
    {
        $card = $this->cardRepository->find($id);

        if (empty($card)) {
            Flash::error('employe not found');
            return redirect(route('card.index'));
        }

        // Obtener los datos necesarios del endowment
        $id = $card->id;
        $employeId = $card->employe_id;
        $deliverDate = $card->delivery_date_card;
        $signature = $card->signature_employe_card;
        // Obtener el contrato y el empleado asociado
        $employe = employe::with('cards')->find($employeId);
        $employeeName = $card->employe->name;
        $employeeDni = $card->employe->dni;
        $employeeWork = $card->employe->work_position;


        // Cargar la vista PDF y pasar los datos necesarios
        $pdf = PDF::loadView('cards.acta_entrega_carnet', compact('id','deliverDate','employeId',
        'signature', 'employeeName', 'employeeDni', 'employeeWork'));

        // Retornar el PDF para su visualización en el navegador
        return $pdf->stream('acta_entrega_carnet.pdf');
    }
}
