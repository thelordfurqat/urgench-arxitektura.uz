<?php
/**
 * Created by PhpStorm.
 * User: Dilmurod
 * Date: 10.01.2019
 * Time: 15:12
 */

namespace app\components;

use app\models\Category;
use app\models\Language;
use yii\base\Widget;
use Yii;
class MenuBuilder extends Widget{

    private static $pageview = 'site/page', $newsview= 'site/news', $codename = 'code', $menuname = '';

    public static function getLang(){
        $l = Yii::$app->language;
        $res = 1;
        if($l1 = Language::findOne(['code'=>$l])){
            $res = $l1;
        }
        return $res;
    }

    public static function generate($menu, $params=null){
        if($params['pageview']){
            static::$pageview = $params['pageview'];
        }

        if($params['newsview']){
            static::$pageview = $params['newsview'];
        }

        if($params['codename']){
            static::$pageview = $params['codename'];
        }

        if($menu == 'map'){
            return static::generateMap();
        }

        $result = '<ul class="text-left">
';

            $result = static::generateItems($result);


        $result = $result . '</ul>';

        return $result;
    }

    public static function generateItems($res){
        $parents = Category::find()->where(['lang_id'=>static::getLang()])->all();
        foreach($parents as $item){
            if($item->id == 1){
                continue;
            }
            if($item->status != 1){
                continue;
            }
            if($item->parent_id == 1){
                if(Category::find()->where(['parent_id'=>$item->id])->andWhere(['status'=>1])->count()>0){
                    $url = "#";
                    $target = "";
                    $a = $item->code;
                    if($a[0]=='-'){
                        if($a[1]=='h' and $a[2]=='t' and $a[3]=='t' and $a[4]=='p'){
                            $url = substr($a,1,strlen($a)-2);
                            $target = "_blank";
                        }else{
                            $url = substr($a,1,strlen($a)-2);
                        }
                    }
                    $res = $res .
                        '<li><a href="#">'.$item->name.'</a> <ul>';
                            $res = static::generateSubItem($res,$item->id);
                            $res = $res . '</ul></li>';
                }else{

                    $url = "#";
                    $target = "";
                    $a = $item->code;
                    if($a[0]=='-'){
                        if($a[1]=='h' and $a[2]=='t' and $a[3]=='t' and $a[4]=='p'){
                            $url = substr($a,1,strlen($a)-2);
                            $target = "_blank";
                        }else{
                            $url = substr($a,1,strlen($a)-2);
                        }
                    }else{
                        if(strlen($item->icon)>0){
                            $url = Yii::$app->urlManager->createUrl([$item->icon,'code'=>$item->code]);
                        }
                    }

                    $res = $res . '<li><a href="'.$url.'" target="'.$target.'">'.$item->name.'</a></li>';
                }
            }
        }
        return $res;
    }

    public static function generateSubItem($res,$parent_id){

        foreach (Category::find()->where(['parent_id'=>$parent_id])->all() as $item ){
            if($item->status != 1){
                continue;
            }

            $url = "#";
            $target = "";
            $a = $item->code;
            if($a[0]=='-'){
                if($a[1]=='h' and $a[2]=='t' and $a[3]=='t' and $a[4]=='p'){
                    $url = substr($a,1,strlen($a)-2);
                    $target = "_blank";
                }else{
                    $url = substr($a,1,strlen($a)-2);
                }
            }else{
                if(strlen($item->icon)>0 and $item->icon!='#'){
                    $url = Yii::$app->urlManager->createUrl([$item->icon,'code'=>$item->code]);
                }
            }

            $res = $res . '<li class=""><a href="'.$url.'" target="'.$target.'">'.$item->name.'</a></li>';
        }

        return $res;

    }




    public static function generateMap(){
        $result = '<ul>';
        $result = static::generateMapItems($result);

        $result = $result . '</ul>';
        return $result;
    }



    public static function generateMapItems($res){
        $parents = Category::find()->where(['lang_id'=>static::getLang()])->all();
        foreach($parents as $item){
            if($item->id == 1){
                continue;
            }
            if($item->status != 1){
                continue;
            }
            if($item->parent_id == 1){
                if(Category::find()->where(['parent_id'=>$item->id])->andWhere(['status'=>1])->count()>0){


                    $res = $res .
                        '<li>
                    <a href="'.$url.'" target="'.$target.'">'.$item->name.'<span class="caret"></span></a>
                            <ul >';
                    $res = static::generateSubItem($res,$item->id);
                    $res = $res . '</ul></li>';
                }else{

                    $res = $res . '<li><a href="'.$url.'" target="'.$target.'">'.$item->name.'</a></li>';
                }
            }
        }
        return $res;
    }

    public static function generateMapSubItem($res,$parent_id){

        foreach (Category::find()->where(['parent_id'=>$parent_id])->all() as $item ){
            if($item->status != 1){
                continue;
            }
            if($item->page_id == 0){
                $url = Yii::$app->urlManager->createUrl([static::$newsview,static::$codename=>$item->code]);
            }elseif($item->page_id == -1){
                $url = '#';
            }else{
                $url = Yii::$app->urlManager->createUrl([static::$pageview,static::$codename=>$item->code]);
            }

            $res = $res . '<li class=""><a href="'.$url.'">'.$item->name.'</a></li>';
        }

        return $res;

    }


}