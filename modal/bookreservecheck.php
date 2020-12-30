<?php

$check_book_reserve = "SELECT *FROM books_reserved WHERE issue_date = date_format(NOW(),'%Y.%m.%d')";
$result_reservation = mysqli_query($con, $check_book_reserve);

if (mysqli_num_rows($result_reservation) > 0) {
    while ($row = mysqli_fetch_array($result_reservation, MYSQLI_ASSOC)) {

        $book_id_cancelled = $row['book_id'];
        $user_id_cancelled = $row['registration_id'];
        $delete_reservation_update_book_count_update_studentlimit_count = "DELETE FROM `books_reserved` 
                                                                                WHERE book_id = '$book_id_cancelled' AND 
                                                                                registration_id = '$user_id_cancelled';
                                                                                UPDATE books SET 
                                                                                available_count = available_count + 1 
                                                                                WHERE book_id = '$book_id_cancelled';
                                                                                UPDATE students SET 
                                                                                book_count = book_count - 1 
                                                                                WHERE student = '$user_id_cancelled'";
        $con->multi_query($delete_reservation_update_book_count_update_studentlimit_count);
    }
}
