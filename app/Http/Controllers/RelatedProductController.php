<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\RelatedProduct;

class RelatedProductController extends Controller
{
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        RelatedProduct::destroy($id);

        return response()->json([
            'success'   => true,
            'message'   => "success",
        ]);
    }
}
