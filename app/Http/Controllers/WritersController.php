<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Writer;

class WritersController extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale,$id)
    {
        $writer = Writer::find($id);
        $writer->delete();
        return redirect()->route('post.index',app()->getlocale())->with('success','Writer Deleted successfully.');
    }
}
