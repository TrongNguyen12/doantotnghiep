<?php 
	function menuMulti( $data , $parent_id = 0, $str = '---| ' ,  $select = 0 ){
		foreach ($data as $value) {
			$id = $value->cate_id;
			$name = $value->cate_name;
			if ( $value->cate_parentID ==  $parent_id ){
				if( $select != 0  && $id == $select ){
					echo '<option value='.$id.' selected> '. $str . $value->cate_name .' </option>';
				}else {
					echo '<option value='.$id.'> '. $str . $value->cate_name .' </option>';
				}
				menuMulti( $data , $id , $str . '---| ' , $select );
			}
		}
	}
	function listCate($data, $parent_id = 0, $str = '' ){
		foreach ($data as $value) {
			$id = $value->cate_id;
			$name = $value->cate_name;
			$status = $value->cate_status;
			if( $status == 0 ){
				$strStatus = '<label class="label label-danger"> Khóa </label>';
			}else {
				$strStatus = '<label class="label label-success"> Kích hoạt </label>';
			}
			if ( $value->cate_parentID ==  $parent_id ) {

				if($str == ''){
					$strName = '<td><b>'. $str.$name .'</b></td>';
				}else {
					
					$strName = '<td>'. $str.$name  .'</td>';
				}
				echo '<tr>'.$strName.' <td>' . $strStatus . '</td>
	            <td><a href="'. asset('admin/category/edit/'.$id) .'"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
	                <a href="'. asset('admin/category/delete/'.$id) .'" class="btnxoa"><i class="icon feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
	            </td></tr>';
	            listCate( $data , $id , $str . '---| '  );
			}
		}
	}

	/* Chuyển số thành chữ */
    function convert_number_to_words($number) {
        $hyphen      = ' ';
        $conjunction = '  ';
        $separator   = ' ';
        $negative    = 'âm ';
        $decimal     = ' phẩy ';
        $dictionary  = array(
            0                   => 'không',
            1                   => 'một',
            2                   => 'hai',
            3                   => 'ba',
            4                   => 'bốn',
            5                   => 'năm',
            6                   => 'sáu',
            7                   => 'bảy',
            8                   => 'tám',
            9                   => 'chín',
            10                  => 'mười',
            11                  => 'mười một',
            12                  => 'mười hai',
            13                  => 'mười ba',
            14                  => 'mười bốn',
            15                  => 'mười năm',
            16                  => 'mười sáu',
            17                  => 'mười bảy',
            18                  => 'mười tám',
            19                  => 'mười chín',
            20                  => 'hai mươi',
            30                  => 'ba mươi',
            40                  => 'bốn mươi',
            50                  => 'năm mươi',
            60                  => 'sáu mươi',
            70                  => 'bảy mươi',
            80                  => 'tám mươi',
            90                  => 'chín mươi',
            100                 => 'trăm',
            1000                => 'ngàn',
            1000000             => 'triệu',
            1000000000          => 'tỷ',
            1000000000000       => 'nghìn tỷ',
            1000000000000000    => 'ngàn triệu triệu',
            1000000000000000000 => 'tỷ tỷ'
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . convert_number_to_words(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . convert_number_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= convert_number_to_words($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }
        return $string;
    }
?>