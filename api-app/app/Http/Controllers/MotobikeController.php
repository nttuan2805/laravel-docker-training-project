<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MotobikeController extends Controller
{
    private $alphabel_jp = [
        'a'  => ['ア', 'イ', 'ウ', 'エ', 'オ'],
        'ka' => ['カ', 'キ', 'ク', 'ケ', 'コ'],
        'sa' => ['サ', 'シ', 'ス', 'セ', 'ソ'],
        'ta' => ['タ', 'チ', 'ツ', 'テ', 'ト'],
        'na' => ['ナ', 'ニ', 'ヌ', 'ネ', 'ノ'],
        'ha' => ['ハ', 'ヒ', 'フ', 'ヘ', 'ホ'],
        'ma' => ['マ', 'ミ', 'ム', 'メ', 'モ'],
        'ya' => ['ヤ', 'ジ', 'ズ', 'ゼ', 'ゾ'],
        'ra' => ['ラ', 'リ', 'ル', 'レ', 'ロ'],
        'wa' => ['ワ', 'ヲ']
    ];

    private $alphabel_en = [
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I',
        'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
        'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
    ];

    private $motoDisplacement = [
        '50' => [0, 50],
        '51-125' => [51, 125],
        '126-250' => [126, 250],
        '251-400' => [251, 400],
        '401-750' => [401, 750],
        '751-1000' => [751, 1000],
        '1000Up' => [1000, 100000]
    ];

    public function kanaPrefixHeader()
    {
        return response()->json(array_keys($this->alphabel_jp));
    }

    public function namePrefixHeader()
    {
        return response()->json($this->alphabel_en);
    }

    public function displacementHeader()
    {
        return response()->json(array_keys($this->motoDisplacement));
    }

    public function markerHeader($test = false)
    {
        $db = $test ? 'mysql2' : 'mysql';

        return DB::connection($db)->table('mst_model_maker')->select('model_maker_code', 'model_maker_hyouji')
        ->groupBy('model_maker_code', 'model_maker_hyouji')
        ->orderBy('model_maker_code')
        ->limit(15)
        ->get();
    }

    public function kanaPrefixHasModel($test = false)
    {
        $db = $test ? 'mysql2' : 'mysql';

        $query = DB::connection($db)->table('mst_model_v2')->select('model_kana_prefix')
            ->whereRaw("NULLIF(model_kana_prefix, ' ') IS NOT NULL");
        
        if (!$test)
        {
            $query->groupBy('model_kana_prefix');
        }
            
        return $query->orderBy('model_kana_prefix')
            ->get();
    }

    public function namePrefixHasModel($test = false)
    {
        $db = $test ? 'mysql2' : 'mysql';

        $query = DB::connection($db)->table('mst_model_v2')->select('model_name_prefix')
            ->whereRaw("NULLIF(model_name_prefix, ' ') IS NOT NULL");
        
        if (!$test)
        {
            $query->groupBy('model_name_prefix');
        }

        return $query->orderBy('model_name_prefix')
            ->get();
    }

    public function displacementHasModel($test = false)
    {
        $db = $test ? 'mysql2' : 'mysql';

        $query = DB::connection($db)->table('mst_model_v2')->select('model_displacement')
                    ->whereRaw("NULLIF(model_displacement, ' ') IS NOT NULL");

        if (!$test)
        {
            $query->groupBy('model_displacement');
        }
            
        $data =$query->orderBy('model_displacement')
                ->get();

        $data = array_column($data->toArray(), 'model_displacement');

        $displacements = array();

        foreach($this->motoDisplacement as $key => $value)
        {
            foreach($data as $val)
            {
                if ($val > $value[0] && $val <= $value[1])
                {
                    array_push($displacements,  $key);
                    break;
                }
            }
        }

        return $displacements;
    }

    public function markerHasModel($test = false)
    {
        $db = $test ? 'mysql2' : 'mysql';

        $makerCodes = DB::connection($db)->table('tbl_category_maker')->select('maker_code')
            ->groupBy('maker_code')
            ->orderBy('maker_code')
            ->get();

        $makerCodes = array_column($makerCodes->toArray(), 'maker_code');

        return DB::connection($db)->table('mst_model_maker')->select('mst_model_maker.model_maker_code')
            ->leftJoin('mst_model_v2', 'mst_model_maker.model_maker_code', '=', 'mst_model_v2.model_maker_code')
            ->whereIn('mst_model_maker.model_maker_code', $makerCodes)
            ->groupBy('mst_model_maker.model_maker_code')
            ->orderBy('mst_model_maker.model_maker_select_view_no')
            ->get();
    }

    public function filterMotobikeList($kana=null,  $name=null, $disp=null, $maker=null, $test = false)
    {
        $db = $test ? 'mysql2' : 'mysql';

        $query = DB::connection($db)->table('mst_model_v2')->selectRaw(
                'model_name,
                 model_hyouji,
                 model_count,
                 TRUNCATE(IFNULL(model_kakaku_min, 0) / 10000, 2) as model_kakaku_min,
                 TRUNCATE(IFNULL(model_kakaku_max, 0) / 10000, 2) as model_kakaku_max,
                 model_image_url');

        if(!empty($kana) && $kana != '0')
        {
            $kanaPrefixs = $this->alphabel_jp[$kana];
            $query->whereIn('model_kana_prefix', $kanaPrefixs);
        }

        if(!empty($name) && $name != '0')
        {
            $query->where('model_name_prefix', $name);
        }

        if(!empty($disp) && $disp != '0')
        {
            $fromDisplace = $this->motoDisplacement[$disp][0];
            $toDisplace = $this->motoDisplacement[$disp][1];

            $query->where('model_displacement', '>', $fromDisplace);
            $query->where('model_displacement', '<=', $toDisplace);
        }

        if(!empty($maker) && $maker != '0')
        {
            $query->where('model_maker_code', '=', $maker);
        }

        $query->where('model_count', '>', 0)
            ->orderBy('model_kana_prefix');

        return $query->get();
    }
}
