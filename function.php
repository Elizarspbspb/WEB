
<?php
 function print_table(array $data, $flag) 
    {
        if($flag =='1'){
        if(! $data) echo "Нет записей";
        else {echo '<table border="1">';
        echo '<tr>';

        foreach($data['0'] as $state => $mass) {
                echo'<td  class="title">'.$state.'</td>'; 
        };
        echo '</tr>';
        echo '<tr>';
         foreach ($data as $state => $mass) {
            echo '<tr>';
            foreach($mass as $inkey=>$val) {
                echo'<td>'.$val.'</td>';
            }
            echo '</tr>';
        };
        echo '</table>';   
    }     
    }
    else if($flag == '2' or $flag == '3' or $flag == '4' or $flag == '5')
	{
        if(! $data) 
			echo "Нет записей(23)";
        else 
		{
			echo '<table border="1">';
			echo '<tr>';

			foreach($data['0'] as $state => $mass) 
			{
                echo'<td  class="title">'.$state.'</td>'; 
			};
			if($flag == '2') 
				echo'<td  class="title">Купить</td>';
			elseif($flag == '3') 
				echo'<td  class="title">Удалить</td>';
			elseif($flag == '4') 
				echo'<td  class="title">Добавить</td>';
			elseif($flag == '5') 
				echo'<td  class="title">Редактировать</td>';
			echo '</tr>';
			echo '<tr>';
			foreach ($data as $state => $mass) 
			{
				echo '<tr>';
				foreach($mass as $inkey=>$val) {
					echo'<td>'.$val.'</td>';

				};
				echo '<td><input type="checkbox" name="prod[]" value="'.$mass["№"].'"></td>';
			};
        echo '</table>';   
        }     
    }
  
    };

?>