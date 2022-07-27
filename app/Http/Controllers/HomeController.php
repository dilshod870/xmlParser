<?php

namespace App\Http\Controllers;

use App\Models\Catalog;

class HomeController extends Controller
{
    function index(string $file = 'data_light.xml'): void
    {
        $xmlFile = file_get_contents(public_path($file));
        $xmlObject = simplexml_load_string($xmlFile);
        $dataArray = json_decode(json_encode($xmlObject), true);
        if (count($dataArray['offers']) > 0) {
            foreach ($dataArray['offers']['offer'] as $value) {
                $data = [
                    "id" => $value['id'],
                    "mark" => $value['mark'],
                    "model" => $value['model'],
                    "generation" => !is_array($value['generation']) ? $value['generation'] : '',
                    "year" => $value['year'],
                    "run" => !is_array($value['run']) ? $value['run'] : '',
                    "color" => !is_array($value['color']) ? $value['color'] : '',
                    "body_type" => !is_array($value['body-type']) ? $value['body-type'] : '',
                    "engine_type" => !is_array($value['engine-type']) ? $value['engine-type'] : '',
                    "transmission" => !is_array($value['transmission']) ? $value['transmission'] : '',
                    "gear_type" => !is_array($value['gear-type']) ? $value['gear-type'] : '',
                    "generation_id" => !is_array($value['generation_id']) ? $value['generation_id'] : null,
                ];
                $item = Catalog::find($value['id']);
                $ids[] = $value['id'];
                if (!$item) {
                    Catalog::insert($data);
                } else {
                    $item->update($data);
                }
            }
            Catalog::whereNotIn('id', $ids)->delete();
        }
        echo "OK";
    }
}
