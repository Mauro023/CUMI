<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecardRequest;
use App\Http\Requests\UpdatecardRequest;
use App\Repositories\cardRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\employe;
use App\Models\card;
use Illuminate\Support\Facades\Redirect;
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
        $this->authorize('view_cards');
        $employees = Employe::where('unit', '!=', 'pendiente')
        ->Where('unit', '!=', 'Deshabilitado')
        ->orderBy('name')->get();

        return view('cards.index')
            ->with('employees', $employees);
    }

    /**
     * Show the form for creating a new card.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('create_cards');
        $employes = Employe::where('unit', '!=', 'pendiente')
                        ->Where('unit', '!=', 'Deshabilitado')
                        ->orderBy('name')
                        ->pluck('name', 'id');
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
        $this->authorize('create_cards');
        $input = $request->all();
        $input['signature_employe_card'] = $request->input('employe_signature');
        $card = $this->cardRepository->create($input);
        $employees = Employe::where('unit', '!=', 'pendiente')
        ->Where('unit', '!=', 'Deshabilitado')
        ->orderBy('name')->get();

        Flash::success('Entrega guardada con exito.');

        $pdfUrl = route('generar.acta.entrega.card', ['id' => $card->id]);

        return redirect()->route('cards.index')
        ->with('pdfUrl', $pdfUrl)
        ->with('card', $card);
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
        $this->authorize('show_cards');
        $card = $this->cardRepository->find($id);

        if (empty($card)) {
            Flash::error('Tarjeta no encontrada');

            return redirect(route('cards.index'));
        }

        $pdfUrl = route('generar.acta.entrega.card', ['id' => $card->id]);

        return view('cards.show', compact('pdfUrl', 'card'));
    }

    public function showEmploye($id)
    {
        $this->authorize('view_cards');
        $employee = Employe::findOrFail($id);
        $cards = $employee->cards;

        return view('cards.card_show_employe')
            ->with('employee', $employee)
            ->with('cards', $cards);
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
        $this->authorize('update_cards');
        $card = $this->cardRepository->find($id);
        $employes = Employe::pluck('name', 'id');
        $signature = $card->signature_employe_card;
        if (empty($card)) {
            Flash::error('Tarjeta no encontrada');

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
        $this->authorize('update_cards');
        $card = $this->cardRepository->find($id);

        if (empty($card)) {
            Flash::error('Tarjeta no encontrada');

            return redirect(route('cards.index'));
        }
        $input = $request->all();
        $input['signature_employe_card'] = $request->input('employe_signature');
        $employees = Employe::where('unit', '!=', 'pendiente')
        ->Where('unit', '!=', 'Deshabilitado')
        ->orderBy('name')->get();

        $this->cardRepository->update($input, $id);

        Flash::success('Entrega modificada con exito.');

        $pdfUrl = route('generar.acta.entrega.card', ['id' => $card->id]);

        return redirect()->route('cards.index')
        ->with('pdfUrl', $pdfUrl)
        ->with('card', $card);
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
        $this->authorize('destroy_cards');
        $card = $this->cardRepository->find($id);

        if (empty($card)) {
            Flash::error('Tarjeta no encontrada');

            return redirect(route('cards.index'));
        }

        $this->cardRepository->delete($id);

        Flash::success('Entrega eliminada con exito.');

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

        return response($pdf->output())
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'inline; filename="acta_entrega_carnet.pdf"');
    }

    public function filter(Request $request)
    {
        $input = $request->input('dni');
        if ($input) {
            $cards = Card::join('employes', 'employes.id', '=', 'cards.employe_id')
            ->select('cards.*') 
            ->where(function ($query) use ($input) {
                $query->where('employes.dni', 'LIKE', '%'.$input.'%')
                    ->orWhere('employes.name', 'LIKE', '%'.$input.'%');
            })
            ->paginate(500);
            return view('cards.card_show_employe', ['cards' => $cards]);
        }else {
            return redirect(route('cards.index'));
        }
    }
}
