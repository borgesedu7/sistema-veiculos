<?php





namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="API de Veículos",
 *      description="API para gerenciamento de veículos"
 * )
 *
 * @OA\Get(
 *      path="/api/veiculos",
 *      summary="Listar veículos",
 *      description="Retorna todos os veículos",
 *      operationId="getVeiculos",
 *      tags={"Veículos"},
 *      @OA\Response(
 *          response=200,
 *          description="Sucesso",
 *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Veiculo"))
 *      )
 * )
 */


class VeiculoController extends Controller
{
    // Método para listar todos os veículos
    public function index()
    {
        return response()->json(Veiculo::all(), 200);
    }

    // Método para exibir um veículo específico
    public function show($id)
    {
        $veiculo = Veiculo::find($id);

        if (!$veiculo) {
            return response()->json(['message' => 'Veículo não encontrado'], 404);
        }

        return response()->json($veiculo, 200);
    }

    // Método para criar um novo veículo
    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'ano_fabricacao' => 'required|integer|min:1900|max:' . date('Y'),
            
        ]);

        $data = $request->only(['marca', 'modelo', 'ano_fabricacao']);

       
        $veiculo = Veiculo::create($data);

        return response()->json($veiculo, 201);
    }

    // Método para atualizar um veículo
    public function update(Request $request, $id)
    {
        $veiculo = Veiculo::find($id);

        if (!$veiculo) {
            return response()->json(['message' => 'Veículo não encontrado'], 404);
        }

        $request->validate([
            'marca' => 'nullable|string|max:255',
            'modelo' => 'nullable|string|max:255',
            'ano_fabricacao' => 'nullable|integer|min:1900|max:' . date('Y'),
           
        ]);

        $veiculo->fill($request->only(['marca', 'modelo', 'ano_fabricacao']));

        
        $veiculo->save();

        return response()->json($veiculo, 200);
    }

    // Método para excluir um veículo
    public function destroy($id)
    {
        $veiculo = Veiculo::find($id);

        if (!$veiculo) {
            return response()->json(['message' => 'Veículo não encontrado'], 404);
        }

    

        $veiculo->delete();

        return response()->json(['message' => 'Veículo removido com sucesso'], 200);
    }
}
