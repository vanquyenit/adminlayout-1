<?php

function cate_parent($data, $parent = 0, $str = "--", $select = 0){
    foreach ($data as $val){
        $name = $val["name"];
        $id = $val["id"];
        if($val["parent_id"] == $parent){
            if($select !=0 && $id == $select){
                echo "<option value='$id' selected='selected'>$str $name</option>";
            }else{
                echo "<option value='$id'>$str $name</option>";
            }
            cate_parent($data, $id, $str."--", $select);
        }
    }

}

