<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * Devuelve un Json con todos los productos
     * En caso de no encontrar productos, devuelve un error
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'data' => Product::all()
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Error en el servidor'
            ], 500);
        }
    }

    /**
     * Devuelve un Json con un producto específico
     * En caso de no encontrar el producto, devuelve un error
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            // Buscar el producto por ID
            $product = Product::find($id);

            // Si no se encuentra el producto, devolver un error
            if (!$product) {
                return response()->json([
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'Producto no encontrado'
                ], 404);
            }
            // Devolver el producto
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'data' => $product
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Error en el servidor'
            ], 500);
        }
    }

    /**
     * Crea un nuevo producto y lo guarda en la BD
     * En caso de error, devuelve un error
     * @param CreateProductRequest $request
     * @return JsonResponse
     */
    public function store(CreateProductRequest $request): JsonResponse
    {
        try {
            // Validación de los datos
            $validatedData = $request->validated();

            // Guardar el producto en la BD
            $product = Product::create($validatedData);

            // Devolver el producto creado
            return response()->json([
                'status' => 'success',
                'code' => 201,
                'message' => 'Producto creado correctamente.',
                'data' => $product
            ], 201);
        } catch (Exception $e) {

            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Error en el servidor'
            ], 500);
        }
    }

    /**
     * Actualiza un producto específico en la BD. Funciona tanto para actualizar todos los campos como para actualizar solo algunos (PUT y PATCH)
     * En caso de no encontrar el producto, devuelve un error
     * @param UpdateProductRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateProductRequest $request, int $id): JsonResponse
    {
        try {

            // Buscar el producto por ID
            $product = Product::find($id);

            // Si no se encuentra el producto, devolver un error
            if (!$product) {
                return response()->json([
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'Producto no encontrado'
                ], 404);
            }

            // Validación de los datos
            $validatedData = $request->validated();

            // Actualizar el producto en la BD
            $product->update($validatedData);

            // Devolver el producto actualizado
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Producto actualizado correctamente.',
                'data' => $product
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Error en el servidor'
            ], 500);
        }
    }

    /**
     * Elimina un producto específico de la BD
     * En caso de no encontrar el producto, devuelve un error
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            // Buscar el producto por ID
            $product = Product::find($id);

            // Si no se encuentra el producto, devolver un error
            if (!$product) {
                return response()->json([
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'Producto no encontrado'
                ], 404);
            }

            // Eliminar el producto
            $control = $product->delete();
            if (!$control) {
                return response()->json([
                    'status' => 'error',
                    'code' => 500,
                    'message' => 'Error al eliminar el producto'
                ], 500);
            }
            // Devolver el producto
            return response()->json([
                'status' => 'success',
                'code' => 200,
                "message" => "Producto eliminado correctamente",
                'data' => $product
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Error en el servidor'
            ], 500);
        }
    }

    /**
     * Devuelve un Json con los productos que tienen stock por debajo del mínimo
     * @return JsonResponse
     */
    public function stockMin(): JsonResponse
    {
        try {
            $products = Product::whereColumn('stock_actual', '<', 'stock_minimo')->get();

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Productos con stock por debajo del mínimo',
                'data' => $products
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Error en el servidor'
            ], 500);
        }
    }
}
