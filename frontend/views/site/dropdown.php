<?php

if (is_array($model) && count($model)>0){
    foreach ($model as $item) {
        echo "<option value='" . $item->id . "'>" . $item->name . "</option>";
    }
}else{
    echo '<option value="">нет подкатегорий</option>';
}

?>