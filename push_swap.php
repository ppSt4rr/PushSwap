<?php
$la =[];
$lb = [];
for ($i = 1; $i < count($argv); $i++) {
    $la[] = intval($argv[$i]);
}


function sa(&$la){
    $swapa= count($la);
    if($swapa >= 2){
        $temp = $la[0];
        $la[0] = $la[1];
        $la[1] = $temp;
    }
    print('sa ');
}

function sb(&$lb){
    $swapb= count($lb);
    if($swapb >= 2){
        $temp = $lb[0];
        $lb[0] = $lb[1];
        $lb[1] = $temp;
    }
    print('sb ');
}

function sc(){
    sa();
    sb();
    print('sc ');
}

function pa(&$la, &$lb){
    if(!empty($lb)){
        $x = array_shift($lb);
        array_unshift($la, $x);
    }
    print(' pa');
}

function pb2(&$la, &$lb){
    if(!empty($la)){
        $x = array_shift($la);
        array_unshift($lb, $x);
    }
    print('pb');
}

function pb(&$la, &$lb){
    if(!empty($la)){
        $x = array_shift($la);
        array_unshift($lb, $x);
    }
    print(' pb');
}

function ra(&$la){
    $x = array_shift($la);
    array_push($la, $x);
    print(' ra');
}

function rb(&$lb)
{
    $x = array_shift($lb);
    array_push($lb, $x);
    print(' rb');
}

function rr(&$lb, &$la)
{
    ra();
    rb();
    print(' rr');
}

function rra(&$la){
    $last = array_pop($la);
    array_unshift($la, $last);
    print(' rra');
}

function rrb(&$lb){
    $last = array_pop($lb);
    array_unshift($lb, $last);
    print(' rrb');
}


function rrr(&$la, &$lb){
    rra();
    rrb();
    print(' rrr');
}

function alreadtri($la){
    $count = count($la);
    for ($i=0; $i < $count-1 ; $i++) { 
        if($la[$i] > $la[$i +1]){
            return false;
        }
    }
    return true;
}
// function generator(&$la){
//     for($i=0; $i< 2000;$i++){
//         $la[]  = rand(1,3000);
//     }
// }
function pushswap(&$la, &$lb){
    if(alreadtri($la)){
        return $la;
        echo "\n";
    }else{
        $coun = count($la);
        if($coun <= 1){
            return false;
        }else{
            pb2($la, $lb);
            for ($i=0; $i < $coun-1 ; $i++) { 
                pb($la, $lb); 
        
            }
            while(!empty($lb)){ 
                $maxb = max($lb);
                if($lb[0] < $maxb){
                    rb($lb);
                }
                else{
                    pa($la, $lb);
                }
            }
            echo "\n";
        }
    }

}





pushswap($la, $lb);