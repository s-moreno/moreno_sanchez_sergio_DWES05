<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Devuelve un Json con todos las categorías
     * En caso de no encontrar categorías, devuelve un error
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'data' => Category::all()
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
     * Devuelve un Json con una categoría específica
     * En caso de no encontrar la categoría, devuelve un error
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            // Buscar la categoría por ID
            $category = Category::find($id);

            // Si no se encuentra la categoría, devolver un error
            if (!$category) {
                return response()->json([
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'Categoría no encontrada'
                ], 404);
            }
            // Devolver la categoría
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'data' => $category
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
     * Crea una nueva categoría y lo guarda en la BD
     * En caso de error, devuelve un error
     * @param CreateCategoryRequest $request
     * @return JsonResponse
     */
    public function store(CreateCategoryRequest $request): JsonResponse
    {
        try {
            // Validación de los datos
            $validatedData = $request->validated();

            // Guardar la categoría en la BD
            $category = Category::create($validatedData);

            // Devolver la categoría creada
            return response()->json([
                'status' => 'success',
                'code' => 201,
                'message' => 'Categoría creada correctamente.',
                'data' => $category
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
     * Actualiza una categoría específico en la BD. Funciona tanto para actualizar todos los campos como para actualizar solo algunos (PUT y PATCH)
     * En caso de no encontrar la categoría, devuelve un error
     * @param UpdateCategoryRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateCategoryRequest $request, int $id): JsonResponse
    {
        try {
            // Buscar el producto por ID
            $category = Category::find($id);

            // Si no se encuentra el producto, devolver un error
            if (!$category) {
                return response()->json([
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'Categoría no encontrado'
                ], 404);
            }

            // Validación de los datos
            $validatedData = $request->validated();

            // Actualizar la categoría en la BD
            $category->update($validatedData);

            // Devolver la categoría actualizada
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Categoría actualizada correctamente.',
                'data' => $category
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
     * Elimina una categoría específica de la BD
     * En caso de no encontrar la categoría, devuelve un error
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            // Buscar la categoría por ID
            $product = Category::find($id);

            // Si no se encuentra la categoría, devolver un error
            if (!$product) {
                return response()->json([
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'Categoría no encontrado'
                ], 404);
            }

            // Eliminar la categoría
            $control = $product->delete();
            if (!$control) {
                return response()->json([
                    'status' => 'error',
                    'code' => 500,
                    'message' => 'Error al eliminar la categoría'
                ], 500);
            }
            // Devolver la categoría
            return response()->json([
                'status' => 'success',
                'code' => 200,
                "message" => "Categoría eliminada correctamente",
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
}
