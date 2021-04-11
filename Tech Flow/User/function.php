<?php
    function pr($arr){
        echo '<pre>' ;
        print_r($arr);
    }

    function prx($arr){
        echo '<pre>' ;
        print_r($arr);
        die();
    }

    function get_safe_val($con,$str){
        if($str!=''){
            $str = trim($str);
            return mysqli_real_escape_string($con,$str);
        }
    }

    function get_product($con,$limit='',$cata_id='',$pro_id='',$sub_catagories='',$search_str='',$sort_order='',$is_best_seller='',$all_product=''){
        $sql = "select distinct(product.id), product.*,catagories.catagories from product inner join catagories 
on product.catagories_id=catagories.id
where product.status = 1";
        if($cata_id!=''){
            $sql.=" and product.catagories_id=$cata_id";
        }
        if($pro_id!=''){
            $sql.=" and product.id=$pro_id ";
        }
        if($is_best_seller!=''){
            $sql.=" and product.best_seller =1";
        }
        if($sub_catagories!=''){
            $sql.=" and product.sub_catagories_id=$sub_catagories ";
        }
        if($all_product!=''){
            $sql ;
        }
        if($search_str!=''){
            $sql.=" and (product.name like '%$search_str%' or product.long_desc like '%$search_str%') ";
        }
        if($sort_order!=''){
            $sql.=$sort_order;
        }else{
            $sql.=" order by id desc ";
        }
        if($limit!=''){
            $sql.=" limit $limit ";
        }

        //echo $sql;
        $res=mysqli_query($con,$sql);
        $data=array();
        while($row=mysqli_fetch_assoc($res)){
            $data[]=$row;
        }
        return $data;
    }
?>