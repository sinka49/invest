<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    public static function getItemByParrent($id, $type=false)
    {

        if($type>0){
            $items = Menu::orderBy('priority', 'asc')->where("parrent_id", $id)->where('type', $type)->get();
            return $items;
        }

        $items = Menu::orderBy('priority', 'asc')->where("parrent_id", $id)->get();
        return $items;
    }

    public static function main($id=0)
    {
        $itemsLevel0 = Menu::getItemByParrent($id);
         foreach ($itemsLevel0 as $itemLevel0){
            $itemsLevel1 =  Menu::getItemByParrent($itemLevel0->id);
            foreach ($itemsLevel1 as $itemLevel1){
                $itemsLevel2 =  Menu::getItemByParrent($itemLevel1->id);
                $itemLevel1["items"] = $itemsLevel2;
            }
            $itemLevel0["items"] = $itemsLevel1;
        }
        return $itemsLevel0;
    }

    public static function mainType($id=0, $type=false)
    {
        $itemsLevel0 = Menu::getItemByParrent($id);
        foreach ($itemsLevel0 as $itemLevel0){
            $itemsLevel1 =  Menu::getItemByParrent($itemLevel0->id,$type);
            foreach ($itemsLevel1 as $itemLevel1){
                $itemsLevel2 =  Menu::getItemByParrent($itemLevel1->id,$type);
                $itemLevel1["items"] = $itemsLevel2;
            }
            $itemLevel0["items"] = $itemsLevel1;
        }
        return $itemsLevel0;
    }
}
