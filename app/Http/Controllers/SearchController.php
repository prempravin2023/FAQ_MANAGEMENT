<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    
    
public function search(Request $request)
{
if($request->ajax())
{
$output="";


$data = DB::table('faqs')
->select(
    'faqs.id as id',
                
    'faqs.display_name as display_name',
    'faqs.description as description',
    'faq_types.type as type'
    )
    ->join('faq_types','faqs.faq_type_id','=','faq_types.id')
    ;

$products=$data->where('type','LIKE','%'.$request->search."%")->get();
if($products)
{
foreach ($products as $key => $product) {
$output.='<tr>'.
'<td>'.$product->id.'</td>'.
'<td>'.$product->type.'</td>'.
'<td>'.$product->display_name.'</td>'.
'<td>'.$product->description.'</td>'.
'</tr>';
}
return Response($output);
   }
   }
}

}
