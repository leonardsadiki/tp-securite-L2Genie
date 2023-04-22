<?php
    
    function  permutation($cle, $perm){
        if(strlen($cle)!=strlen($perm)){
            return -1;
        }
        $clePermute = "";
        for ($i=0; $i < strlen($perm); $i++) { 
            $index=(int)$perm[$i];
            $clePermute=$clePermute.$cle[$index];
        }
        return $clePermute;
    }

    function ouExclusive($cle1,$cle2){
        if(strlen($cle1)!=strlen($cle2)){
            return -1;
        }
        $result = "";
        for ($i=0; $i < strlen($cle1); $i++) { 
           if(($cle1[$i] == "0" AND $cle2[$i] == "0") OR ($cle1[$i] == "1" AND $cle2[$i] == "1")){
            $result = $result."0";
           }else{
            $result = $result."1";
           }
        }
        return $result;
    }

    function ouInclusive($cle1, $cle2){
        if(strlen($cle1)!=strlen($cle2)){
            return -1;
        }
        $result = "";
        for ($i=0; $i < strlen($cle1); $i++) { 
           if($cle1[$i] == "0" AND $cle2[$i] == "0"){
            $result = $result."0";
           }else{
            $result = $result."1";
           }
        }
        return $result;
    }

    function etLogique($cle1, $cle2){
        if(strlen($cle1)!=strlen($cle2)){
            return -1;
        }
        $result = "";
        for ($i=0; $i < strlen($cle1); $i++) { 
           if($cle1[$i] == "1" AND $cle2[$i] == "1"){
            $result = $result."1";
           }else{
            $result = $result."0";
           }
        }
        return $result; 
    }

function decalageGauche($cle,$ordre){
    $decal=substr($cle,0,$ordre);
    $reste=substr($cle,$ordre,strlen($cle)-$ordre);
    return $reste.$decal;
}

function decalageDroit($cle,$ordre){
    $taille=strlen($cle);
    $diff=$taille-$ordre;

    $decal=substr($cle,strlen($cle)-$ordre,$ordre);
    $reste=substr($cle,0,$diff);
    return $decal.$reste;
}

function inversePermutation($fonctionPermutation){
        $result="";
        for ($i=0; $i < strlen($fonctionPermutation); $i++){
            
            $position=(string)$i;
            $result=$result.strpos($fonctionPermutation,$position);
        }
        return $result;

    }

    function chiffrement($n, $pi, $p, $k1, $k2){
        $clePermute=permutation($n,$pi);
        $G0=substr($clePermute,0,strlen($clePermute)/2);
        $D0=substr($clePermute,(strlen($clePermute)/2),strlen($clePermute)/2);

        $D1=ouExclusive(permutation($G0, $p), $k1);
        $G1 = ouExclusive($D0, ouInclusive($G0, $k1));
        
        $D2 = ouExclusive(permutation($G1, $p), $k2);
        $G2 = ouExclusive($D1, ouInclusive($G1, $k2));
        
        $C = $G2.$D2;
        
        $pi_1 = inversePermutation($pi);
        
        $result = permutation($C, $pi_1);
        return $result;

    }
    function GenererCles($cle, $fonctionPermutation){
        $clePermute=permutation($cle, $fonctionPermutation);
        $k1_= substr($clePermute,0,strlen($clePermute)/2);
        $k2_= substr($clePermute,(strlen($clePermute)/2),strlen($clePermute)/2);
    
        $k1 = ouExclusive($k1_, $k2_);
        $k2 = etLogique($k2_, $k1_);
        
        $k1 = decalageGauche($k1, 2);
        $k2 = decalageDroit($k2, 1);
    
        return '('.$k1.', '.$k2.')';
    }
    function dechiffrement($n,$pi,$p,$k1,$k2){
        $clePermute=permutation($n,$pi);
         $G2=substr($clePermute,0,strlen($clePermute)/2);
        $D2=substr($clePermute,(strlen($clePermute)/2),strlen($clePermute)/2);

        $inv_p=inversePermutation($p);

        $G1=permutation(ouExclusive($D2,$k2),$inv_p);
        $D1=ouExclusive($G2,ouInclusive($G1,$k2));
        $G0=permutation(ouExclusive($D1,$k1),$inv_p);
        $D0=ouExclusive($G1,ouInclusive($G0,$k1));
        $N=$G0.$D0;
        $inv_pi=inversePermutation($pi);

        $result=permutation($N,$inv_pi);


        return $result;
    }