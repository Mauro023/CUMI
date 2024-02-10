<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatesurgeryRequest;
use App\Http\Requests\UpdatesurgeryRequest;
use App\Repositories\surgeryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Flash;
use Response;

use Carbon\Carbon;
use App\Models\doctors;
use App\Models\labour;
use App\Models\procedures;
use App\Models\basket;
use App\Models\surgery;
use App\Models\medical_fees;
use App\Models\msurgery_procedure;

class surgeryController extends AppBaseController
{
    /** @var surgeryRepository $surgeryRepository*/
    private $surgeryRepository;

    public function __construct(surgeryRepository $surgeryRepo)
    {
        $this->surgeryRepository = $surgeryRepo;
    }

    /**
     * Display a listing of the surgery.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $surgeriesQuery = Surgery::query();

        if (!empty($search)) {
            $surgeriesQuery->where('date_surgery', 'LIKE', '%' . $search . '%')
                    ->orWhere('operating_room', 'LIKE', '%' . $search . '%')
                    ->orWhere('cod_surgical_act', 'LIKE', '%' . $search . '%')
                    ->orWhere('study_number', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('procedures', function ($query) use ($search) {
                        $query->where('code', 'LIKE', '%' . $search . '%')
                            ->OrWhere('description', 'LIKE', '%' . $search . '%');
                    });
        }

        $surgeries = $surgeriesQuery->orderBy('date_surgery', 'DESC')->paginate($perPage);

        return view('surgeries.index', compact('surgeries'));
    }

    /**
     * Show the form for creating a new surgery.
     *
     * @return Response
     */
    public function create()
    {
        $doctors = Doctors::orderby('full_name')->pluck('full_name', 'id');
        $assistants = Doctors::orderby('full_name')->pluck('full_name', 'id');
        $anesthesiologists = Doctors::orderby('full_name')->pluck('full_name', 'id');
        $labours = Labour::orderby('position')->pluck('position', 'id');
        $procedures = Procedures::orderby('manual_type')->pluck('manual_type', 'id');
        $baskets = Basket::orderby('id')->pluck('id');
        return view('surgeries.create', compact('doctors', 'assistants', 'anesthesiologists', 'labours', 'procedures', 'baskets'));
    }

    /**
     * Store a newly created surgery in storage.
     *
     * @param CreatesurgeryRequest $request
     *
     * @return Response
     */
    public function store(CreatesurgeryRequest $request)
    {
        $input = $request->all();

        $startTime = Carbon::parse($request->input('start_time'));
        $endTime = Carbon::parse($request->input('end_time')); 
        $surgeryTime = $endTime->diffInMinutes($startTime);

        $input['surgeryTime'] = $surgeryTime;

        $surgery = $this->surgeryRepository->create($input);

        Flash::success('Surgery saved successfully.');

        return redirect(route('surgeries.index'));
    }

    /**
     * Display the specified surgery.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $surgery = $this->surgeryRepository->find($id);

        if (empty($surgery)) {
            Flash::error('Surgery not found');

            return redirect(route('surgeries.index'));
        }

        return view('surgeries.show')->with('surgery', $surgery);
    }

    /**
     * Show the form for editing the specified surgery.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $surgery = $this->surgeryRepository->find($id);

        if (empty($surgery)) {
            Flash::error('Surgery not found');

            return redirect(route('surgeries.index'));
        }

        return view('surgeries.edit')->with('surgery', $surgery);
    }

    /**
     * Update the specified surgery in storage.
     *
     * @param int $id
     * @param UpdatesurgeryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesurgeryRequest $request)
    {
        $surgery = $this->surgeryRepository->find($id);

        if (empty($surgery)) {
            Flash::error('Surgery not found');
            return redirect(route('surgeries.index'));
        }

        $startTime = $request->input('start_time');
        $endTime = $request->input('end_time');

        // Verificar si las fechas son válidas antes de calcular la diferencia
        if ($startTime->greaterThanOrEqualTo($endTime)) {
            Flash::error('End time must be after start time');
            return redirect()->back()->withInput();
        }

        $surgeryTime = $endTime->diffInMinutes($startTime);

        $input = $request->all();
        $input['surgeryTime'] = $surgeryTime;

        $this->surgeryRepository->update($input, $id);

        Flash::success('Surgery updated successfully.');

        return redirect(route('surgeries.index'));
    }


    /**
     * Remove the specified surgery from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $surgery = $this->surgeryRepository->find($id);

        if (empty($surgery)) {
            Flash::error('Surgery not found');

            return redirect(route('surgeries.index'));
        }

        $this->surgeryRepository->delete($id);

        Flash::success('Surgery deleted successfully.');

        return redirect(route('surgeries.index'));
    }

    public function getSurgery(Request $request)
    {
        // Obtener la fecha actual
        $today = now()->toDateString();
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        //Buscamos los estudios y a su vez miramos cuantos num servicios
        //Tiene asociado ese estudio
        //Tablas utilizadas: sis_medi, hoja cirugia
        $studies = DB::connection('SismaSalud')->select("SELECT estudio, COUNT(*) AS num_servicio
            FROM(
                SELECT sm.con_estudio AS estudio
                FROM sis_maes sm
                LEFT JOIN hoja_cirugia hc ON hc.estudio = sm.con_estudio
                WHERE CONVERT(DATE, hc.fecha) >= ?
                AND CONVERT(DATE, hc.fecha) <= ?
                AND hc.fecha_anulado IS NULL
                AND hc.anulado != 1
                AND sm.estado = 'C'
            )AS subconsulta
            GROUP BY estudio
            ORDER BY num_servicio"
        ,[$start_date, $end_date]);
         // Filtrar los resultados donde CantidadCodActQ es igual a 1
        $datas = array_filter($studies, function ($study) {
            return $study->num_servicio == 1;
        });

        foreach ($datas as $data) {

            // Buscamos cuantos procedimientos tiene asociado cada estudio
            //Tablas utilizadas: hoja_cirugia, hoja_cirugia_deta
            $services = DB::connection('SismaSalud')->select("SELECT CodActoQ,
                COUNT(*) AS procedimientos
                FROM (
                SELECT hc.num_servicio AS CodActoQ
                FROM hoja_cirugia hc
                LEFT JOIN hoja_cirugia_deta hcd ON hcd.num_servicio = hc.num_servicio
                    WHERE hc.estudio = ?
                    AND hc.fecha_anulado IS NULL
			        AND hc.anulado != 1
                ) AS Subconsulta
                GROUP BY CodActoQ
                ORDER BY procedimientos
            ", [$data->estudio]);

            foreach ($services as $service) {
                $codActQ = $service->CodActoQ;
                $package = DB::connection('SismaSalud')->select("SELECT * FROM sis_deta 
                        WHERE num_servicio = ?
                        AND tipo_qx = 1
                        AND total > 0 AND codigo_paquete IS NOT NULL
                    ", [$codActQ]);

                if (!$package) {
                    $category = "";
                    if ($service->procedimientos == 1) {
                        $category = "1,1,1";
                    }elseif ($service->procedimientos >= 1) {
                        $category = "1,1,*";
                    }

                    $surgeries = DB::connection('SismaSalud')->select("SELECT CONVERT(VARCHAR(20), hcd.id) AS id_tabla,
                        hc.estudio AS Estudio, hc.num_servicio AS CodActoQ, CONVERT(DATE, hc.fecha) AS Fecha, hc.horaini AS HoraI, hc.horafin AS HoraF,
                        hc.duracion, hc.cod_medico AS Medico, sm.cedula AS CedulaMD1, sm.nombre AS Nombre,
                        hc.cod_medico_b AS Medico_2, sm2.cedula AS CedulaMD2, sm2.nombre, hc.cod_anaste AS Anestesiologo,
                        anes.cedula AS CedulaAn, anes.nombre AS NombreAn, hc.cod_ayudante, hc.cod_instrumentador,
                        hc.cod_rotador, smaes.autoid, spaci.NombreCompleto, 
                        spaci.nro_historia, NULL AS ns_corregido, CONVERT(VARCHAR(10), hc.sala_cirugia) AS sala_cirugia,
                        qf.nomgrupo, hcd.cod_cirugia AS Procedimiento, hcd.nom_cirugia AS Descripcion,
                        1 AS CantidadP,
                        CASE
                        WHEN hc.anulado = 1
                            THEN hc.fecha_anulado
                        ELSE NULL
                        END AS fecha_anulado,
                        hcd.tipo_rea
                        FROM hoja_cirugia hc
                        LEFT JOIN
                            hoja_cirugia_deta hcd ON hcd.num_servicio = hc.num_servicio
                        LEFT JOIN 
                            sis_medi sm ON sm.codigo = hc.cod_medico
                        LEFT JOIN 
                            sis_medi sm2 ON sm2.codigo = hc.cod_medico_b
                        LEFT JOIN 
                            sis_medi anes ON anes.codigo = hc.cod_anaste
                        LEFT JOIN
                            quirofano qf ON qf.codigo = hc.sala_cirugia
                        LEFT JOIN
                            sis_maes smaes ON smaes.con_estudio = hc.estudio
                        LEFT JOIN
                            sis_paci spaci ON spaci.autoid = smaes.autoid
                        WHERE hc.num_servicio = ?
                        AND hc.fecha_anulado IS NULL
                        AND hc.anulado != 1
                        AND qf.codigo != 6
                        ORDER BY fecha, HoraI DESC
                ", [$codActQ]);
                    //dd($surgeries);
                    $count = 0;
                    foreach ($surgeries as $surgerie) {
                        $Medico2 = $surgerie->Medico_2;
                        $Anestes = $surgerie->Anestesiologo;
                        $cod_helper = $surgerie->cod_ayudante;
                        $cod_instrumentator = $surgerie->cod_instrumentador;
                        $cod_rotator = $surgerie->cod_rotador;
                        $Medico2 = ($Medico2 === "" || $Medico2 === "0") ? NULL : $Medico2;
                        $Anestes = ($Anestes === "" || $Anestes === "0") ? NULL : $Anestes;
                        $cod_helper = ($cod_helper === "") ? 0 : $cod_helper;
                        $cod_instrumentator = ($cod_instrumentator === "") ? 0 : $cod_instrumentator;
                        $cod_rotator = ($cod_rotator === "") ? 0 : $cod_rotator;
                        if ($surgerie->duracion === "NaN") {
                            $surgerie->duracion = Carbon::parse($surgerie->HoraF)->diffInMinutes(Carbon::parse($surgerie->HoraI));
                        }
                        if ($count < 2) {
                            //dd($Anestes);
                            //Se valida que el procedimiento esté registrado
                            $existingSurgeries = Surgery::where('cod_surgical_act', $codActQ)->first();
                            $doctors = Doctors::where('code', $surgerie->Medico)->first();
                            if ($existingSurgeries && $doctors->category_doctor !== "Medico General") {              
                                // Actualiza los datos del procedimiento      
                                $existingSurgeries->date_surgery = $surgerie->Fecha;   
                                $existingSurgeries->start_time = $surgerie->HoraI;
                                $existingSurgeries->end_time = $surgerie->HoraF;
                                $existingSurgeries->surgeryTime = $surgerie->duracion;
                                $existingSurgeries->operating_room = $surgerie->nomgrupo;
                                $existingSurgeries->cod_surgical_act = $codActQ;
                                $existingSurgeries->study_number = $surgerie->Estudio;
                                $existingSurgeries->patient = $surgerie->NombreCompleto;
                                $existingSurgeries->id_doctor = $surgerie->Medico;
                                $existingSurgeries->id_doctor2 = $Medico2;
                                $existingSurgeries->id_anesthesiologist = $Anestes;
                                $existingSurgeries->cod_helper = (int) $cod_helper;
                                $existingSurgeries->cod_instrumentator = (int) $cod_instrumentator;
                                $existingSurgeries->cod_rotator = (int) $cod_rotator;
                                $existingSurgeries->category = $category;
                                $existingSurgeries->save();
                                $this->addProcedures($surgerie);
                                $this->addBasket($codActQ, $surgerie->Estudio, $surgerie->nomgrupo);
                            }else {
                                if ($doctors->category_doctor !== "Medico General") {
                                    $newSurgery = new Surgery();
                                    $newSurgery->date_surgery = $surgerie->Fecha;
                                    $newSurgery->start_time = $surgerie->HoraI;
                                    $newSurgery->end_time = $surgerie->HoraF;
                                    $newSurgery->surgeryTime = $surgerie->duracion;
                                    $newSurgery->operating_room = $surgerie->nomgrupo;
                                    $newSurgery->cod_surgical_act = $codActQ;
                                    $newSurgery->study_number = $surgerie->Estudio;
                                    $newSurgery->patient = $surgerie->NombreCompleto;
                                    $newSurgery->id_doctor = $surgerie->Medico;
                                    $newSurgery->id_doctor2 = $Medico2;
                                    $newSurgery->id_anesthesiologist = $Anestes;
                                    $newSurgery->cod_helper = (int) $cod_helper;
                                    $newSurgery->cod_instrumentator = (int) $cod_instrumentator;
                                    $newSurgery->cod_rotator = (int) $cod_rotator;
                                    $newSurgery->category = $category;
                                    $newSurgery->save();
                                    $this->addProcedures($surgerie);
                                    $this->addBasket($codActQ, $surgerie->Estudio, $surgerie->nomgrupo);
                                }
                            }
                        }
                    }    
                }
            }
        }
        session()->flash('success', "Cirugias actualizadas correctamente!!");

        return redirect(route('surgeries.index'));
    }

    public function addBasket($codActQ, $study, $opRoom)
    {
        $results = DB::connection('SismaSalud')->select("SELECT
            ms.estudio AS Estudio,
            (SELECT nombre FROM sis_costo WHERE codigo = ms.ccorigen) AS Bodega_origen,
            ms.articulo AS Articulo,
            ms.cantidad AS Cantidad,
            CASE WHEN
            (SELECT TOP 1 observacion from orden_enfer WHERE numero = ms.nro_orden AND tipo_transaccion = 15) IS NOT NULL
            THEN CAST(1 AS BIT) 
            ELSE CAST(0 AS BIT)   
            END AS Reutilizar_insumo,
            CONVERT(DATE, ms.fecha) AS Fecha
            FROM movStock ms 
            LEFT JOIN sis_deta AS sd ON sd.id = ms.servicio AND sd.cod_servicio = ms.articulo
            WHERE ms.estudio = ?
            AND ms.revertido = 0
        ", [$study]);
        //dd($results, $study);
        $bodega = "";
        if ($opRoom === 'QUIROFANO 1' || $opRoom === 'QUIROFANO 2' || $opRoom === 'QUIROFANO 3' || $opRoom === 'QUIROFANO 4' || $opRoom === 'QUIROFANO 5') {
            $bodega = "BODEGA CIRUGIA";
        }elseif ($opRoom === 'SALA DE ENDOSCOPIAS') {
            $bodega = "BODEGA CONSULTA EXTERNA";
        }elseif ($opRoom === "SALA DE PROCEDIMIENTOS IMAGENOLOGIA") {
            $bodega = "IMAGENOLOGIA";
        }elseif ($opRoom === "HEMODINAMIA") {
            $bodega = "HEMODINAMIA";
        }

        foreach ($results as $result) {
            $existingBasket = Basket::where('id_article', $result->Articulo)
                                    ->where('surgical_act', $codActQ)->first();
            $quantity = $result->Cantidad;
            if($quantity > 0 && $quantity < 1)
            {
                $quantity = 1;
            }
            if ($existingBasket) {              
                // Actualiza los datos de la canasta    
                $existingBasket->store = $bodega;
                $existingBasket->item_quantity = $quantity;
                $existingBasket->reusable = $result->Reutilizar_insumo;
                $existingBasket->id_article = $result->Articulo;
                $existingBasket->surgical_act = $codActQ;
                $existingBasket->save();
            }else {
                $newBasket = new Basket();
                $newBasket->store = $bodega;
                $newBasket->item_quantity = $quantity;
                $newBasket->reusable = $result->Reutilizar_insumo;
                $newBasket->id_article = $result->Articulo;
                $newBasket->surgical_act = $codActQ;
                $newBasket->save();
            }
        }
    }

    public function addProcedures($surgery)
    {
        //dd($surgery);
        $procedure = $this->validateProcedure($surgery->Procedimiento, $surgery->Medico, $surgery->CodActoQ);
        $existingProcedure = Msurgery_procedure::where('cod_surgical_act', $surgery->CodActoQ)
                ->where('code_procedure', $procedure)->first();

        if ($existingProcedure) {
            $existingProcedure->amount = $surgery->CantidadP;
            $existingProcedure->type = $surgery->tipo_rea;
            $existingProcedure->cod_surgical_act = $surgery->CodActoQ;
            $existingProcedure->code_procedure = $this->validateProcedure($surgery->Procedimiento, $surgery->Medico, $surgery->CodActoQ);
            $existingProcedure->save();
        }else {
            $newProcedure = new Msurgery_procedure();
            $newProcedure->amount = $surgery->CantidadP;
            $newProcedure->type = $surgery->tipo_rea;
            $newProcedure->cod_surgical_act = $surgery->CodActoQ;
            $newProcedure->code_procedure = $this->validateProcedure($surgery->Procedimiento, $surgery->Medico, $surgery->CodActoQ);
            $newProcedure->save();
        }
    }

    public function validateProcedure($procedure, $doctor, $codActQ)
    {
        //Log::info("Surgery: " . $procedure . " " . $doctor. " ". $codActQ);
        //Datos del médico
        $doctor = Doctors::where('code', $doctor)->first();
        //Datos de los honorarios médicos
        $fees = Medical_fees::where('honorary_code', $doctor->id_fees)->first();
        //Procedimiento correspondiente
        $procedures = Procedures::where('code', $procedure)
        ->where('manual_type', $fees->fees_type)->first();

        if (!$procedures) {
            $procedures = Procedures::where('cups', $procedure)
            ->where('manual_type', $fees->fees_type)->first();
        }
        return $procedures->id;
    }
}
