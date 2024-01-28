<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
        <?php  
        for ($i=0; $i < sizeof($students); $i++) { 
            $student = $students[$i];
            if ($student['status']=='PHP') {
                echo'<tr style="color:red;">'.'<td>'.$student['name'].'</td>'.'<td>'.$student['email'].'</td>'.'<td>'.$student['status'].'</td>';
            }else{
                echo'<tr>'.'<td>'.$student['name'].'</td>'.'<td>'.$student['email'].'</td>'.'<td>'.$student['status'].'</td>';

            }
            
            
        }
        ?>
    </table>
</body>