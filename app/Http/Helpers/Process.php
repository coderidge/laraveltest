<?php


namespace App\Http\Helpers;


class Process
{

    public static function content($string) {

        $str = str_replace('%',',',$string);
        $bits = explode(',',$str);
        $array = array();
        $position = null;

        foreach($bits as $bit) {
            if(preg_match('/elapsed_time=/', $bit)) {
                $elapsed_time = str_replace('elapsed_time=', '', $bit);
                $array['elapsed_time'] = $elapsed_time;
            } elseif(preg_match('/type-/', $bit)) {
                $array['type'] = str_replace('type-','',$bit);
            } elseif(preg_match('/radius-/', $bit)) {
                $array['data']['features']['radius'] = str_replace('radius-1-','',$bit);
            } elseif(preg_match('/position/', $bit)) {
                // get id initial array
                $array['data']['features']['id'] = ltrim(substr($bit,strpos($bit,'position')+strlen('position'),2),'-');
                if(ltrim(substr($bit,strpos($bit,'position')+strlen('position'),2),'-') > $position || $position === null) {
                    // initial array
                   // $array['data']['features']['position'];
                }

                $position = ltrim(substr($bit,strpos($bit,'position')+strlen('position'),2),'-');

                if(ltrim(substr($bit,strpos($bit,'position')+strlen('position'),2),'-') > 0)
                {
                    // start new position
                    $replace = array('/=/');
                    $array['data']['features']['position'][] = str_replace('//','',preg_replace($replace,'',str_replace('position-'. $position,'',$bit)));
                }

            }  elseif(preg_match('/direction-1=/', $bit)) {

                $array['data']['features']['direction'] = str_replace('direction-1=', '', $bit);
            }
        }
        return $array;
    }
}
