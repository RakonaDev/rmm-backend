<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    public function index(Request $request)
    {   
        /*
        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);

        $productos = Producto::paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'data' => $productos->items(),
            'pagination' => [
                'current_page' => $productos->currentPage(),
                'per_page' => $productos->perPage(),
                'total' => $productos->total(),
                'last_page' => $productos->lastPage(),
                'from' => $productos->firstItem(),
                'to' => $productos->lastItem(),
            ]
        ]);
        */
        $productos = Producto::all();

        return response()->json($productos);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'categoria' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,webp,avif',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos',
                'errors' => $validator->errors()
            ], 422);
        }

        // Guardar imagen en public/imagenes/
        $imagen = $request->file('imagen');
        $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
        $ruta = 'imagenes/' . $nombreImagen;

        // Mover a carpeta public/imagenes
        $imagen->move(public_path('imagenes'), $nombreImagen);

        // Guardar producto con ruta de imagen
        $producto = Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria,
            'imagen' => $ruta,
        ]);

        return response()->json([
            'message' => 'Producto creado correctamente',
            'producto' => $producto
        ], 201);
    }

    public function show($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        return response()->json($producto);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|required|string',
            'categoria' => 'sometimes|required|string',
            'imagen' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos',
                'errors' => $validator->errors()
            ], 422);
        }

        // Actualizar campos básicos
        $producto->fill($request->only(['nombre', 'descripcion', 'categoria']));

        // Verificar si hay una nueva imagen
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $ruta = 'imagenes/' . $nombreImagen;

            // Guardar imagen en carpeta public/imagenes
            $imagen->move(public_path('imagenes'), $nombreImagen);

            // (Opcional) Eliminar la imagen anterior del disco
            if ($producto->imagen && file_exists(public_path($producto->imagen))) {
                unlink(public_path($producto->imagen));
            }

            // Guardar nueva ruta
            $producto->imagen = $ruta;
        }

        $producto->save();

        return response()->json([
            'message' => 'Producto actualizado correctamente',
            'producto' => $producto
        ]);
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        // Eliminar imagen del disco si existe
        if ($producto->imagen && file_exists(public_path($producto->imagen))) {
            unlink(public_path($producto->imagen));
        }

        // Eliminar el registro
        $producto->delete();

        return response()->json(['message' => 'Producto eliminado correctamente']);
    }
}
