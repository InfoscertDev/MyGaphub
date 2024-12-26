<?php

namespace App\Asset;

use App\Models\GapAssetType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PortfolioAsset extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'record',
        'name',
        'location',
        'description',
        'average_value',
        'average_income',
        'average_amount',
        'monthly_roi',
        'average_revenue',
        'photo_url'
    ];

    protected $appends = [
        'record',
        'average_income',
        'average_value',
        'average_amount',
        'average_revenue',
        'photo_url'
    ];

    public function getPortfolioTypeAttribute($value){
        $asset_type = GapAssetType::find($this->portfolio_type_id);
        if($asset_type){
            $value = $asset_type->name;
        }
        return $value;
    }

    public function getPhotoUrlAttribute(){
        //    return  url(Storage::url($this->photo));
        //    return  asset('/assets/'. $this->photo);
        return  asset('/assets/'. str_replace('public', 'storage', $this->photo));
    }

    public function getDocument1Attribute($document1){
        if($document1){
            $file = explode("|", $document1);
            return ['name' =>$file[0], 'document' => asset('/assets/'. str_replace('public', 'storage',$file[1])) ];
        }
        return $document1;
    }

    public function getDocument2Attribute($document2){
        if($document2){
            $file = explode("|", $document2);
            return ['name' =>$file[0], 'document' => asset('/assets/'. str_replace('public', 'storage',$file[1]))  ];
        }
        return $document2;
    }

    public function getDocument3Attribute($document3){
        if($document3){
            $file = explode("|", $document3);
            return ['name' =>$file[0], 'document' => asset('/assets/'. str_replace('public', 'storage',$file[1]))  ];
        }
        return $document3;
    }

    public function getDocument4Attribute($document4){
        if($document4){
            $file = explode("|", $document4);
            return ['name' =>$file[0], 'document' => asset('/assets/'. str_replace('public', 'storage',$file[1]))  ];
        }
        return $document4;
    }

    public function getDocument5Attribute($document5){
        if($document5){
            $file = explode("|", $document5);
            return ['name' =>$file[0], 'document' => asset('/assets/'. str_replace('public', 'storage',$file[1]))  ];
        }
        return $document5;
    }
    public function getDocument6Attribute($document6){
        if($document6){
            $file = explode("|", $document6);
            return ['name' =>$file[0], 'document' => asset('/assets/'. str_replace('public', 'storage',$file[1]))  ];
        }
        return $document6;
    }
    public function getDocument7Attribute($document7){
        if($document7){
            $file = explode("|", $document7);
            return ['name' =>$file[0], 'document' => asset('/assets/'. str_replace('public', 'storage',$file[1]))  ];
        }
        return $document7;
    }
    public function getDocument8Attribute($document8){
        if($document8){
            $file = explode("|", $document8);
            return ['name' =>$file[0], 'document' => asset('/assets/'. str_replace('public', 'storage',$file[1]))  ];
        }
        return $document8;
    }

    public function getRecordAttribute(){
        $asset =  PortfoloAssetRecord::where('portfolio_asset_id',$this->id)->orderBy('period', 'DESC')->first();
        return ['expendirure'=> $asset->expenditure ?? 0, 'revenue'=> $asset->revenue ?? 0];
    }

    public function getAverageIncomeAttribute(){
        $period = date('Y-m',strtotime($this->created_at));
       $period = date("Y-m-d",strtotime("-1 months", strtotime( $period.'-01')) );

        $asset =  PortfoloAssetRecord::where('portfolio_asset_id',$this->id)
                        ->whereDate('period', '>=', $period)
                        ->orderBy('period', 'DESC')->limit(6)->get();

        if(count($asset->toArray()) > 1){
            $average_income= array_sum(array_column($asset->toArray(), 'net_income'));
            $average_income=  $average_income/ (count($asset->toArray()) ? count($asset->toArray()) : 1);
        }else{
            $average_income = $this->monthly_roi;
        }
        return $average_income;
    }

    public function getMonthlyRoiAttribute($value){
       $period = date('Y-m',strtotime($this->created_at));
        $period = date("Y-m-d",strtotime("-1 months", strtotime( $period.'-01')) );
        $asset =  PortfoloAssetRecord::where('portfolio_asset_id',$this->id)
                        ->whereDate('period', '>=', $period)
                        ->orderBy('period', 'DESC')->limit(6)->get();

        if(count($asset->toArray())){
            $average_income= array_sum(array_column($asset->toArray(), 'net_income'));
            $average_income=  $average_income / count($asset->toArray());
        }else{
            $average_income = $value;
        }

        return $average_income;
    }

    public function getAssetValueAttribute($value){
        $asset =  PortfoloAssetRecord::where('portfolio_asset_id',$this->id)
                        ->orderBy('period', 'DESC')->first();
        $amount = (isset($asset->amount)) ?  $asset->amount: $value;
        return $amount;
    }

    public function getAverageAmountAttribute($value){
        $period = date('Y-m',strtotime($this->created_at));
        $period = date("Y-m-d",strtotime("-1 months", strtotime( $period.'-01')) );
        $asset =  PortfoloAssetRecord::where('portfolio_asset_id',$this->id)
                        ->whereDate('period', '>=', $period)
                        ->orderBy('period', 'DESC')->limit(6)->get();

        if(count($asset->toArray())){
            $average_value= array_sum(array_column($asset->toArray(), 'amount'));
            $average_value=  $average_value / count($asset->toArray());
        }else{
            $average_value = $value;
        }

        return $average_value;
    }

    public function getAverageValueAttribute($value){
        $period = date('Y-m',strtotime($this->created_at));
       $period = date("Y-m-d",strtotime("-1 months", strtotime( $period.'-01')) );
        $asset =  PortfoloAssetRecord::where('portfolio_asset_id',$this->id)
                        ->whereDate('period', '>=', $period)
                        ->orderBy('period', 'DESC')->limit(6)->get();

        if(count($asset->toArray())){
            $average_value= array_sum(array_column($asset->toArray(), 'expenditure'));
            $average_value=  $average_value / count($asset->toArray());
        }else{
            $average_value = $value;
        }

        return $average_value;
    }

    public function getAverageRevenueAttribute($value){
        $period = date('Y-m',strtotime($this->created_at));
         $period = date("Y-m-d",strtotime("-1 months", strtotime( $period.'-01')) );
        $asset =  PortfoloAssetRecord::where('portfolio_asset_id',$this->id)
                        ->whereDate('period', '>=', $period)
                        ->orderBy('period', 'DESC')->limit(6)->get();

        if(count($asset->toArray())){
            $average_value= array_sum(array_column($asset->toArray(), 'revenue'));
            $average_value=  $average_value / count($asset->toArray());
        }else{
            $average_value = $value;
        }

        return $average_value;
    }


}
