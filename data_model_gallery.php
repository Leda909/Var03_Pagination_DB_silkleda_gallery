<?php 
include_once "config.php";

$current_page_number = '';
$total_number_of_pages = '';
$items_per_page = '';
$start_pos ='';

function pagination(){
    global $conn, $current_page_number, $total_number_of_pages, $items_per_page, $start_pos ;
    
    # setting up the pagination
    if ( isset( $_GET["current_page_number"] ) ) {
        $current_page_number = $_GET["current_page_number"];
    } else { 
        $current_page_number = 1;
    }

    $items_per_page = 8;
    $sql = "SELECT COUNT(*) AS count FROM gallery";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)) {
                    $total_items_in_db = $row["count"];
                    $total_number_of_pages = ceil($total_items_in_db/ $items_per_page);
                    $start_pos = ( $current_page_number * $items_per_page ) - $items_per_page;
                }

            } else {
                echo "No product found";
            }

}


# Here we fetch * from "Gallery" table
function get_all_gallery(){
    global $conn, $start_pos, $items_per_page ;

    pagination();
    $sql = "SELECT * FROM gallery LIMIT $start_pos, $items_per_page";

    $result = mysqli_query($conn, $sql);

    $galleries = [];
    // $galleries = array();

    if(mysqli_num_rows($result)> 0){

        while($row = mysqli_fetch_assoc($result)){
                 array_push($galleries, $row);
        }
        return $galleries;
    } else {
        return false;
    }
}

?>